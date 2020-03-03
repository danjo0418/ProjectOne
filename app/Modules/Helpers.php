<?php 

namespace App\Modules;

use App\Property;
use App\PropertyType;
use App\PropertyStatus;
use App\PropertyAgent;
use App\PropertyPhoto;
use App\User;
use App\Province;
use App\CityMunicipality;
use App\Mails;

use Auth;
use DB;

Class Helpers {

	public static function propertyType()
	{
		return PropertyType::select('id','type')->get();
	}

	public static function propertyStatus()
	{
		return PropertyStatus::select('id','status')->get();
	}

	public static function queue()
	{
		return Property::select('name', 'city_municipality', 'province')->groupBy('name', 'city_municipality', 'province')->get();
	}

	public static function findTeamLead($id = null) 
	{
		return User::where('id', $id)->first();
	}

	public static function agents()
	{
		return User::where('role_id', 2)->orderBy('lname', 'ASC')->get();
	}

	public static function province()
	{
		return Province::orderBy('province','ASC')->get();
	}

	public static function cities($province_name)
	{
		$province = Province::where('province', $province_name)->first();

		$query = CityMunicipality::where('province_id', $province->id)->orderBy('city_municipality', 'ASC')->get();

		return $query;
	}

	public static function ReadMessage($code)
	{
		$getid = Mails::where('code', $code)->first();

		return Mails::find($getid->id)->update(['is_read' => 1]);
	}

	public static function countInboxMessage()
	{
		return Mails::where('to', Auth::user()->id)->where('is_read', 0)->where('is_deleted', 0)->count();
	}

	//UPDATED FUNCTIONS
	public static function filterTeamLeader($id = null)
	{
		return User::select('id','teamlead_id','fname','lname')
					->where('id','!=', $id)
					->where('is_teamlead', 1)
					->where('status', 'active')
					->where('is_approved', 1)
					->orderBy('id','DESC')->get();
	}

	public static function searchAgentName($approved)
	{
		return User::where('role_id', 2)->where('is_approved', $approved)->orderBy('lname', 'ASC')->get();
	}

	public static function countPendingAgent()
	{
		return User::where('is_approved', 0)->count();
	}

	public static function thumbnail($property_id)
	{
		return PropertyPhoto::where('property_id', $property_id)->first();
	}

	public static function propertyAgents($property_id)
	{
		return PropertyAgent::with('details')->where('property_id', $property_id)->get();
	}
}