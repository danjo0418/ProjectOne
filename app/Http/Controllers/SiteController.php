<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Modules\PropertyModule;
use App\Modules\UserModule;
use App\Modules\GenerateModule;

class SiteController extends Controller
{
    protected $generatemodule;
	protected $propertymodule;
    protected $usermodule;

    public function __construct(GenerateModule $generate, PropertyModule $property, UserModule $user) 
    {
        $this->generatemodule = $generate;
    	$this->propertymodule = $property;
        $this->usermodule = $user;
    }

    public function home()
    {
        $status = [1,2]; // Status sell and rent
    	$featured = $this->propertymodule->featuredProperty($status);
    	return view('home.home')->with(compact('featured'));
    }

    public function property($offer = null)
	{
        $status = [1,2]; // Status sell and rent
        $properties = $this->propertymodule->sellAndRent($offer, $status);
        return view('property.list')->with(compact('properties'));
	}

	public function propertyDetails($code)
	{
    	$detail = $this->propertymodule->details($code);
        return view('property.details')->with(compact('detail'));
	}

    public function beOurAgent()
    {
        return view('agent.beanagent');
    }

    public function ourAgents()
    {
        $agents = $this->usermodule->ourAgents();
        return view('agent.ouragents')->with(compact('agents'));
    }

    public function ourAgentDetails($name)
    {
        $listed = $this->usermodule->ourAgentListed($name);
        $assigned = $this->usermodule->ourAgentAssigned($name);
        $detail = $this->usermodule->ourAgentDetails($name);
        return view('agent.ouragentdetails')->with(compact('detail','listed','assigned'));
    }

    public function sellYourProperties()
    {
        return view('property.sellproperties');
    }

    public function contactUs()
    {
         return view('contact.index');
    }

    // UPDATED FUNCTION
    public function registerAccount() 
    {
        $request = request();


        // get current user ID.
        $userid = $this->usermodule->currentId();
        $currentid = $userid->id+1;

        // generate code number
        $leading_zero = str_pad($currentid, 4, '0', STR_PAD_LEFT);
        $string_rand = $this->generatemodule->code(4);
        $generate_code = $leading_zero.$string_rand;

        $data = ['code' => $generate_code,
                 'role_id' => 2,
                 'email' => $request->email,
                 'password' => Hash::make($request->password),
                 'fname' => $request->fname,
                 'lname' => $request->lname,
                 'phone' => $request->phone,
                 'socialmedia' => $request->socialmedia,
                 'status' => 'active',
                 'is_approved' => 0];

        $validate = $this->usermodule->validateEmail($request->email, $request->fname, $request->lname);

        if(!is_object($validate)) {

            $create = $this->usermodule->create($data);
            return redirect()->back()->with('success', 'Registration completed successfully, Please wait for admin approval they will notify once it\'s already approved.');

        } else return redirect()->back()->with('exist', 'Credentials information is already in used. Please provide another information');
    }


    public function resources()
    {
        return view('resources.index');
    }
}
