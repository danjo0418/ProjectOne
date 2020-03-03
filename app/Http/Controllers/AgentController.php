<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Modules\UserModule;
use App\Modules\GenerateModule;
use App\Modules\HistoryModule;
use App\Modules\PropertyModule;
use Mail;
use Auth;
use Image;

class AgentController extends Controller
{
	protected $usermodule;
	protected $generatemodule;
	protected $historymodule;
	protected $propertymodule;

    public function __construct(UserModule $user, GenerateModule $generate, HistoryModule $history, PropertyModule $property)
    {
        $this->usermodule = $user;
        $this->generatemodule = $generate;
        $this->historymodule = $history;
        $this->propertymodule = $property;
    }

	public function listOfAgent()
    {
    	if(Auth::user()->role_id == 1) {

	    	$agents = $this->usermodule->agents();
	    	return view('agent.listofagent')->with(compact('agents'));

   		} return abort(404);
    }

    public function details($code)
    {
    	$assigned = $this->usermodule->assigned($code);
    	$listed = $this->usermodule->listed($code);
    	$detail = $this->usermodule->details($code);

    	return view('agent.details')->with(compact('assigned','listed','detail'));
    }

    public function activeAgent()
	{
		$request = request();


		$update = $this->usermodule->update($request->agent_id, ['status' => 'active']);

		if($update) {

			$description = "<strong>".$request->agent_name."'s</strong> status is set to Active.";
			$dataHistory = ['user_id' => Auth::user()->id, 'description' => $description];
            $this->historymodule->create($dataHistory);
            
			return redirect('list-of-agents')->with('success', $request->agent_name.' status is set to Active');
		}
		return $request->agent_id.' '.$request->agent_name;
	}

	public function inactiveAgent()
	{
		$request = request();

		$update = $this->usermodule->update($request->agent_id, ['status' => 'inactive']);

		if($update) {

			$description = "<strong>".$request->agent_name."'s</strong> status is set to Inactive.";
			$dataHistory = ['user_id' => Auth::user()->id, 'description' => $description];
            $this->historymodule->create($dataHistory);

			return redirect('restore/agents')->with('success', $request->agent_name.' status is set to Inactive');
		}
	}

    public function approveAgent()
    {
    	$request = request();

    	$update = $this->usermodule->update($request->agent_id, ['status' => 'active', 'is_approved' => 1]);

		if($update) {

			$description = "<strong>".$request->agent_name."'s</strong> Application has been approved.";
			$dataHistory = ['user_id' => Auth::user()->id, 'description' => $description];
            $this->historymodule->create($dataHistory);

			return redirect('list-of-agents')->with('success', $request->agent_name.' Application has been approved');
		}

    }

    public function declineAgent()
    {
    	$request = request();

    	$update = $this->usermodule->update($request->agent_id, ['status' => 'inactive', 'is_approved' => 2]);

		if($update) {

			$description = "<strong>".$request->agent_name."'s</strong> Application has been declined.";
			$dataHistory = ['user_id' => Auth::user()->id, 'description' => $description];
            $this->historymodule->create($dataHistory);

			return redirect('restore/agents')->with('success', $request->agent_name.' Application has been declined');
		}

    }

    public function registerForm()
	{
		if(Auth::user()->role_id == 1)	{
			return view('agent.register');
		} else return abort(404);
	}

	public function registerAgent()
	{

		$request = request();

		$isteamlead = $request->is_teamlead == 0 ? null:1;

		// get current user ID.
		$userid = $this->usermodule->currentId();
		$currentid = $userid->id+1;

		// generate code number
		$leading_zero = str_pad($currentid, 4, '0', STR_PAD_LEFT);
		$string_rand = $this->generatemodule->code(4);
		$generate_code = $leading_zero.$string_rand;

		$data = ['code' => $generate_code,
				 'teamlead_id' => $request->teamlead_id,
				 'is_teamlead' => $isteamlead,
		         'role_id' => 2,
		         'email' => $request->email,
		         'password' => Hash::make($request->password),
	             'fname' => $request->fname,
	             'lname' => $request->lname,
	             'phone' => $request->phone,
	             'socialmedia' => $request->socialmedia,
	             'is_approved' => 1];

	    $validate = $this->usermodule->validateEmail($request->email,$request->fname, $request->lname);

	    if(!is_object($validate)) {

	    	if($request->has('file')) { 

	    		$filename = str_replace(' ','', time().$request->file->getClientOriginalName()); 
            	$filextension =  $request->file->getClientOriginalExtension();

            	if(in_array($filextension, ['jpeg','jpg','png'])) {

	                $resize = Image::make($request->file->getRealPath());

	                $thumbnail = $resize->resize(250,250, function($constraint) {
	                                $constraint->aspectRatio();
	                             })->save(base_path().'/assets/img/users/'.$filename,60); 

	                $data['profile'] = $filename;

	                $create = $this->usermodule->create($data);

	                if($create) {

		                $description = Auth::user()->fname.' '.Auth::user()->lname." added new agent named <strong>".$request->fname.' '.$request->lname."</strong> with email <i><a href='mailto:".$request->email."'>".$request->email."</a></i>.";
             			$history = ['user_id' => Auth::user()->id, 'description' => $description];
             			$this->historymodule->create($history);

		     			return redirect()->back()->with('success', 'Agent '.$request->fname.' '.$request->lname.' was successfully added.');
	                }

	            } else return redirect()->back()->with('success', 'Invalid extention. Images must be JPG or PNG.');

	    	} else {


	    		$create = $this->usermodule->create($data);

                if($create) {

	                $description = Auth::user()->fname.' '.Auth::user()->lname." added new agent named <strong>".$request->fname.' '.$request->lname."</strong> with email <i><a href='mailto:".$request->email."'>".$request->email."</a></i>.";
         			$history = ['user_id' => Auth::user()->id, 'description' => $description];
         			$this->historymodule->create($history);

	     			return redirect()->back()->with('success', 'Agent '.$request->fname.' '.$request->lname.' was successfully added.');
                }

	    	}

	    } else return redirect()->back()->with('exist', $request->email.' is already in used. Please provide another email');

	}

	public function updateForm($code)
    {	
    	$detail = $this->usermodule->details($code);
    	return view('agent.update')->with(compact('detail'));
    }

	public function updateAgent()
	{

		$request = request();

		$data = ['teamlead_id' => $request->teamlead_id,
			     'is_teamlead' => $request->is_teamlead,
	             'fname' => $request->fname,
	             'lname' => $request->lname,
	             'phone' => $request->mobile,
	             'socialmedia' => $request->socialmedia];

	    $description = "<strong>".$request->fname." ".$request->lname."'s</strong> Profile has been updated.";
	    $history = ['user_id' => Auth::user()->id, 'description' => $description];

	    if($request->current_is_teamlead == 1 && $request->is_teamlead == null) {
	     	
	     	$members = $this->usermodule->findMembers($request->userid);

	     	if(is_object($members)) {

		     	foreach ($members as $member) {
		     		$data = ['teamlead_id' => null];	
		     		$this->usermodule->removeTeamLead($member->id, $data);
		     	}

		     	if($request->has('file')) { 

		    		$filename = str_replace(' ','', time().$request->file->getClientOriginalName()); 
	            	$filextension =  $request->file->getClientOriginalExtension();

	            	if(in_array($filextension, ['jpeg','jpg','png'])) {

		                $resize = Image::make($request->file->getRealPath());

		                $thumbnail = $resize->resize(250,250, function($constraint) {
		                                $constraint->aspectRatio();
		                             })->save(base_path().'/assets/img/users/'.$filename,60); 

		                $data['profile'] = $filename;

		            } else return redirect()->back()->with('error', 'Invalid extention. Images must be JPG or PNG.');
		    	} 

	    		$update = $this->usermodule->update($request->userid, $data);
		    	if($update) {
            		$this->historymodule->create($history);
	    			return redirect()->back()->with('success', $request->fname.' '.$request->lname.' profile was successfully updated.');
	    		}
		    	
		    }

	    } else {

	    	if($request->has('file')) { 

	    		$filename = str_replace(' ','', time().$request->file->getClientOriginalName()); 
            	$filextension =  $request->file->getClientOriginalExtension();

            	if(in_array($filextension, ['jpeg','jpg','png'])) {

	                $resize = Image::make($request->file->getRealPath());

	                $thumbnail = $resize->resize(250,250, function($constraint) {
	                                $constraint->aspectRatio();
	                             })->save(base_path().'/assets/img/users/'.$filename,60); 

	                $data['profile'] = $filename;

	            } else return redirect()->back()->with('error', 'Invalid extention. Images must be JPG or PNG.');
	    	} 

    		$update = $this->usermodule->update($request->userid, $data);
	    	if($update) {
        		$this->historymodule->create($history);
    			return redirect()->back()->with('success', $request->fname.' '.$request->lname.' profile was successfully updated.');
    		}
	    }

	}

	public function restore()
	{
		$agents = $this->usermodule->restoreAgents();
		return view('restore.agent')->with(compact('agents'));
	}

}
