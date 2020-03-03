<?php 

namespace App\Modules;

use App\Property;
use App\PropertyPhoto;
use App\PropertyStatus;
use App\PropertyType;
use App\PropertyAgent;
use App\User;
use App\Role;

use Mail;
use Auth;
use DB;

class UserModule 
{
	
	public function create($data)
	{
		return User::create($data);
	}

	public function update($id, $data)
	{
		return User::find($id)->update($data);
	}

	public function delete($id)
	{
		return User::where('id',$id)->delete();
	}

	public function validateEmail($email,$fname, $lname)
	{
		return User::where('email', $email)->where('fname', $fname)->where('lname', $lname)->first();
	}

	public function agents()
	{	
		$request = request();

		$query = User::where('role_id', 2)->where('status','active')->where('is_approved', '!=', 2);

		if($request->has('lead')) {
			$query->where('teamlead_id', $request->get('lead'));
		} else $query;

		if($request->has('status')) {

			$approved;

			if($request->get('status') == 'pending') $approved = 0;
			else $approved = 1;

			$query->where('is_approved', $approved);

		} else $query;

		return $query->where(DB::raw("CONCAT(fname,' ',lname)"), 'like', '%'.$request->get('q').'%')->orderBy('id', 'DESC')->paginate(15);

	}

	public function details($code) 
	{
		return User::where('code', $code)->first();
	}

	public function listed($code)
	{
		$agent = $this->details($code);
		
		return Property::with('type','status','thumbnail','agents.details','author')
						->where('created_by', $agent->id)
						->orderBy('id','DESC')
						->paginate(15);
	}

	public function assigned($code) 
	{
		$agent = $this->details($code);

		return  DB::table('property')
					->join('property_agent','property_agent.property_id','=','property.id')
					->join('property_status', 'property_status.id','=','property.status_id')
					->join('property_type','property_type.id','=','property.type_id')
					->join('users','users.id','=','property.created_by')
					->select('property.id',
					         'property.code',
							 'property.offer_type',
							 'property.type_id',
							 'property.status_id',
							 'property.name',
							 'property.street_barangay',
							 'property.city_municipality',
							 'property.province',
							 'property.is_approved',
							 'property.created_by',
							 'property.created_at',
							 'property_agent.agent_id',
							 'property_status.status',
							 'property_type.type',
							 'property.created_by',
							 'users.fname as listed_fname',
							 'users.lname as listed_lname')
					->where('property_agent.agent_id', $agent->id)
					->where('created_by','!=',$agent->id)
					->where('property.is_approved', 1)
					->orderBy('property.id','DESC')
					->paginate(15);
	}

	public function listedProperties($code)
	{
		$agent = $this->details($code);
	}

	public function findMembers($teamlead_id) 
	{
		return User::where('teamlead_id', $teamlead_id)->get();
	}

	public function removeTeamLead($id, $data)
	{
		return User::find($id)->update($data);
	}

	public function allAgents()
	{
		return User::where('role_id', 2)->where('status', 'active')->where('is_approved', 1)->orderBy('fname','ASC')->get();
	}

	public function sendCredential($email)
	{
		return User::select('email','generate')->where('email', $email)->first();
	}

	public function currentId()
	{
		return User::select('id')->latest()->first();
	}

	public function findAgent($agentid) 
	{
		return User::where('id', $agentid)->first();
	}


	//website
	public function ourAgents()
	{
		$query = User::where('role_id', 2)->where('status','active')->where('is_approved', 1);

		if(request()->has('q')) $query->where(DB::raw("CONCAT(fname,' ',lname)"), 'like', '%'.request()->get('q').'%');
		else $query;

		return $query->orderBy('id', 'DESC')->paginate(12);
	}

	public function ourAgentDetails($name)
	{	
		$name_slug = str_replace('-', ' ', $name);
		return User::where(DB::raw("CONCAT(fname,' ',lname)"), $name_slug)->first();
	}

	public function ourAgentListed($name_slug)
	{

		$name = str_replace('-', ' ', $name_slug);

		$agent = User::where(DB::raw("CONCAT(fname,' ',lname)"),'like','%'.$name.'%')->first();

		return Property::with('type','status','thumbnail','agents.details','author')
						->where('created_by', $agent->id)
						->where('is_approved',1)
						->orderBy('id','DESC')
						->paginate(15);
	}

	public function ourAgentAssigned($name_slug)
	{
		$name = str_replace('-', ' ', $name_slug);

		$agent = User::where(DB::raw("CONCAT(fname,' ',lname)"),'like','%'.$name.'%')->first();

		return  DB::table('property')
					->join('property_agent','property_agent.property_id','=','property.id')
					->join('property_status', 'property_status.id','=','property.status_id')
					->join('property_type','property_type.id','=','property.type_id')
					->join('users','users.id','=','property.created_by')
					->select('property.*',
							 'property.created_at',
							 'property_agent.agent_id',
							 'property_status.status',
							 'property_type.type',
							 'property.created_by',
							 'users.fname as listed_fname',
							 'users.lname as listed_lname')
					->where('property_agent.agent_id', $agent->id)
					->where('created_by','!=',$agent->id)
					->where('property.is_approved', 1)
					->orderBy('property.id','DESC')
					->paginate(15);
						
	}

	public function restoreAgents()
	{
		$request = request();
		
		return User::where('role_id', 2)->where('status','inactive')->orWhere('is_approved', 2)
										->where(DB::raw("CONCAT(fname,' ',lname)"), 'like', '%'.$request->get('q').'%')
										->orderBy('id', 'DESC')
										->paginate(15);
	}

}