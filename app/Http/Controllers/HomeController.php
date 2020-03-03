<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Modules\UserModule;
use App\Modules\PropertyModule;
use App\Modules\HistoryModule;
use Image;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $usermodule;
    protected $propertymodule;
    protected $historymodule;

    public function __construct(UserModule $user, PropertyModule $property, HistoryModule $history)
    {
        $this->middleware('auth');
        $this->usermodule = $user;
        $this->propertymodule = $property;
        $this->historymodule = $history;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function summary()
    {   
       
        $count_property = $this->propertymodule->countProperties();
        $count_agent = $this->propertymodule->countAgents();
        $properties = $this->propertymodule->recentProperty();

        if(Auth::user()->role_id == 1) {
            return view('home.summary')->with(compact('properties','count_agent','count_property'));
        } else return abort(404);
    }

    public function profile()
    {
        return view('agent.profile');
    }

    public function updateProfile()
    {
        $request = request();

        $data = ['email' => $request->email,
                 'fname' => $request->fname,
                 'lname' => $request->lname,
                 'mobile' => $request->mobile,
                 'facebook_url' => $request->facebook_url];

        if($request->has('file')) {

            $filename = str_replace(' ','', time().$request->file->getClientOriginalName()); 
            $filextension =  $request->file->getClientOriginalExtension();

            if(in_array($filextension, ['jpeg','jpg','png'])) {

                $resize = Image::make($request->file->getRealPath());

                $thumbnail = $resize->resize(250,250, function($constraint) {
                                $constraint->aspectRatio();
                             })->save(base_path().'/assets/img/users/'.$filename,60); 

                $data['profile'] = $filename;

                $update = $this->usermodule->update($request->userid, $data);

                if($update) {

                    $history = ['user_id' => Auth::user()->id, 'description' => 'Update profile information.'];
                    $this->historymodule->create($history);

                    return redirect()->back()->with('success', 'Your profile details was successfully updated.');
                }

            } else return redirect()->back()->with('success', 'Invalid extention. Images must be JPG or PNG.');

        }  else {

            $update = $this->usermodule->update($request->userid, $data);

            if($update) {

                $history = ['user_id' => Auth::user()->id, 'description' => 'Update profile information.'];
                $this->historymodule->create($history);

                return redirect()->back()->with('success', 'Your profile details was successfully updated.');
            }

        }
    }

    public function changePassword(Request $request)
    {

        if($request->newpass == $request->retype) {

            $dataHistory = ['user_id' => Auth::user()->id, 'description' => "Changed password."];
            $this->historymodule->create($dataHistory);

            $data = ['password' => Hash::make($request->newpass)];
            $change = $this->usermodule->update($request->userid, $data);

            return response()->json(['status' => 'success']);

        } else return response()->json(['status' => 'failed', 'message' => 'You must enter the same password twice in order to confirm it.']);
    }
}
