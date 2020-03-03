<?php 

namespace App\Modules;

use App\Property;
use App\PropertyPhoto;
use App\PropertyStatus;
use App\PropertyType;
use App\PropertyAgent;
use App\User;
use App\Province;
use App\CityMunicipality;

use Auth;
use DB;

class PropertyModule 
{
	//GLOBAL
	public function pricing()
	{
		$value = request()->get('price');
		$range = explode('-', $value);

		return $range;
	}

	public function sellAndRent($offer, $status)
	{
		
		$array =  request()->get('type');
		$array_type = explode(',', str_replace("-", " ", $array));
		$propertype = PropertyType::whereIn('type', $array_type)->get();
		$type_id = [];

		foreach($propertype as $type) {
			$type_id[] = $type->id;
		}

		$pricerange = $this->pricing();

		$province = request()->get('province');

		$city = request()->get('city');

		$queue = request()->get('q');

		$query = Property::with('type','status','thumbnail','agents.details');

		if(in_array($offer, ['buy','rent'])) $query->where('offer_type', $offer);
		else $query;

		if(request()->has('type')) $query->whereIn('type_id', $type_id);
		else $query;

		if(request()->has('price')) $query->where('price','>=',$pricerange[0])->where('price','<=',$pricerange[1]);
		else $query;

		if(request()->has('province')) $query->where('province', $province);
		else $query;

		if(request()->has('city')) $query->where('city_municipality', $city);
		else $query;

		if(request()->has('q')) $query->where(DB::raw("CONCAT(province,', ',city_municipality)"),'like','%'.$queue.'%');
		else $query;

		return $query->whereIn('status_id', $status)->where('is_approved',1)->orderBy('id','DESC')->paginate(5);
	}

	public function featuredProperty($status)
	{
		return Property::with('thumbnail')->where('is_featured', 1)
										  ->where('is_approved',1)
										  ->orderBy('id','DESC')
										  ->whereIn('status_id', $status)
										  ->paginate(8);
	}

	public function currentID()
	{
		return Property::select('id')->latest()->first();
	}

	public function countProperties()
	{
		$request = request();

		$statuses = PropertyStatus::where('status', $request->get('property'))->first();

		$query = Property::select('id','status_id');

		if($request->has('property')) $query->where('status_id', $statuses->id);
		else $query;

		return $query->count();
	}

	public function countAgents()
	{
		$request = request();
		$query = User::where('role_id', 2);

		if($request->has('agent')) $query->where('status', $request->get('agent'));
		else $query;

		return $query->count();
	}

	public function recentProperty() 
	{
		return Property::with('type','status','thumbnail','agents.details','author')->orderBy('id', 'DESC')->limit(5)->get();
	}

	public function removeAssignedAgent($id)
	{
		return DB::table('property_agent')->where('id', $id)->delete();
	}

	public function findProperty($id)
	{
		return Property::with('agent')->where('id', $id)->first();
	}

	public function assignAgentProperty($data)
	{
		return PropertyAgent::create($data);
	}

	public function listOfProperty()
	{
		$request = request();

		$query = Property::with('type','status','thumbnail','agents.details','author');

		if($request->has('status')) {

			$approved;

			if($request->get('status') == 'pending') $approved = 0;
			else if($request->get('status') == 'approved') $approved = 1;

			$query->where('is_approved', $approved);

		} else $query;

		if($request->has('agent')) {

			$subject = $request->get('agent');
			$name_slug = str_replace('-', ' ', $subject);

			$agent = User::where(DB::raw("CONCAT(fname,' ',lname)"), 'like', '%'.$name_slug.'%')->first();

			$query->where('created_by', $agent->id);

		} else $query;


		if($request->has('q')) $query->where(DB::raw("CONCAT(province,', ',city_municipality)"),'like','%'.$request->get('q').'%');
		else $query;

		if(Auth::user()->role_id == 2) $query->where('created_by', Auth::user()->id);
		else $query;
								// 0 = pending, 1 = approved
		return $query->whereIn('is_approved', [0,1])->orderBy('id','DESC')->paginate(10); 
	}

	public function assignedProperty()
	{

		$request = request();

		$query = DB::table('property')
					->join('property_agent','property_agent.property_id','=','property.id')
					->join('property_status', 'property_status.id','=','property.status_id')
					->join('property_type','property_type.id','=','property.type_id')
					->join('users','users.id','=','property.created_by')
					->select('property.id',
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
					->where('property_agent.agent_id', Auth::user()->id)
					->where('created_by','!=', Auth::user()->id);

		if($request->has('agent')) {

			$subject = $request->get('agent');
			$name_slug = str_replace('-', ' ', $subject);

			$agent = User::where(DB::raw("CONCAT(fname,' ',lname)"), 'like', '%'.$name_slug.'%')->first();

			$query->where('property.created_by', $agent->id);

		} else $query;

		return $query->where('property.is_approved', 1)->orderBy('property.id','DESC')->paginate(15);
	}

	public function details($code)
	{
		return Property::with('type','status','photos','agents.details')->where('code', $code)->first();
	}

	public function create($data)
	{
		return Property::create($data);
	}

	public function createPhoto($data)
	{
		return PropertyPhoto::create($data);
	}

	public function update($id, $data)
	{
		return Property::find($id)->update($data);
	}

	public function deletePhoto($id)
	{
		return DB::table('property_photo')->where('id', $id)->delete();
	}

	public function findStatus($id)
	{
		return PropertyStatus::select('id','status')->where('id', $id)->first();
	}

	public function validateAgents($ids)
	{
		return User::where('role_id', 2)->whereNotIn('id', $ids)->orderBy('fname','ASC')->get();
	}

	public function province()
	{
		return Province::orderBy('province','ASC')->get();
	}

	public function findProvince($province_id)
	{
		return Province::where('province', $province_id)->first();
	}

	public function cityMunicipality($province_id)
	{
		return CityMunicipality::where('province_id', $province_id)->orderBy('city_municipality', 'ASC')->get();
	}

	public function cities()
	{
		return CityMunicipality::orderBy('city_municipality','ASC')->get();
	}

	public function restoreProperty()
	{
		$request = request();

		$query = Property::with('type','status','thumbnail','agents.details','author');

		if($request->has('status')) {

			$approved;

			if($request->get('status') == 'declined') $approved = 2;
			else if($request->get('status') == 'removed') $approved = 3;

			$query->where('is_approved', $approved);

		} else $query;


		if($request->has('q')) $query->where(DB::raw("CONCAT(province,', ',city_municipality)"),'like','%'.$request->get('q').'%');
		else $query;

		if(Auth::user()->role_id == 2) $query->where('created_by', Auth::user()->id);
		else $query;
								// 2 = decline, 3 = remove
		return $query->whereIn('is_approved', [2,3])->orderBy('id','DESC')->paginate(10); 
	}
}