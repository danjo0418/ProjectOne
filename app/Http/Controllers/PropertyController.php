<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\PropertyModule;
use App\Modules\GenerateModule;
use App\Modules\HistoryModule;
use App\Modules\UserModule;
use App\CityMunicipality;
use Image;
use Auth;

class PropertyController extends Controller
{
	protected $propertymodule;
	protected $generatemodule;
	protected $historymodule;
	protected $usermodule;

    public function __construct(PropertyModule $property, GenerateModule $generate, HistoryModule $history, UserModule $user) 
    {
    	$this->propertymodule = $property;
    	$this->generatemodule = $generate;
    	$this->historymodule = $history;
    	$this->usermodule = $user;
    }

	
	//UPDATE FUNCTION 
	public function listOfProperty()
	{
        $properties = $this->propertymodule->listOfProperty();
		return view('property.listofproperty')->with(compact('properties'));
	}

	public function AssignProperty()
	{
		$properties = $this->propertymodule->assignedProperty();
		return view('property.assignproperty')->with(compact('properties'));
	}

	public function details($code)
	{
		$detail = $this->propertymodule->details($code);
		return view('property.view')->with(compact('detail'));
	}

	
	public function createForm()
	{	
		$province = $this->propertymodule->province();
		return view('property.create')->with(compact('province'));
	}

	public function createProperty()
	{

		$request = request();

		if($request->has('file')) {

			// currentid
			$currendid = $this->propertymodule->currentID();

			// property id
			$propertyid;
			is_object($currendid) ? $propertyid = $currendid->id+1 : $propertyid = 1;

			// generate code
			$leading_zero = str_pad($propertyid, 4, '0', STR_PAD_LEFT);
			$string_rand = $this->generatemodule->code(5);
			$generate_code = $leading_zero.$string_rand;

			// featured property
			$is_featured;
			is_null($request->is_featured) ? $is_featured = 0:$is_featured = 1;

			$approve;
			if(Auth::user()->role_id == 1) $approve = 1;
			else $approve = 0;

			$data = ['code'=>$generate_code,
			         'offer_type'=>$request->offer_type,
	                 'type_id'=>$request->property_type,
	                 'status_id'=>$request->status_id,
	                 'name'=>$request->property_name,
	                 'about'=>$request->about,
	                 'bedrooms'=>$request->bedrooms,
	                 'bathrooms'=>$request->bathrooms,
	                 'floor_area'=>$request->floor_area,
	                 'land_size'=>$request->land_size,
	                 'building_name'=>$request->building_name,
	                 'block_lotnum'=>$request->block_lot,
	                 'developer'=>$request->developer,
	                 'furnished'=>$request->furnished,
	                 'rooms'=>$request->rooms,
	                 'car_space'=>$request->car_space,
	                 'build_year'=>$request->build_year,
	                 'deposit_bond'=>$request->deposit_bond,
	                 'price'=>$request->price,
	                 'price_condition'=>$request->price_condition,
	                 'street_barangay'=>$request->street_barangay,
	                 'city_municipality'=>$request->city_municipality,
	                 'province'=>$request->province,
	                 'map'=>$request->google_iframe,
	                 'is_featured'=>$is_featured,
	                 'is_approved'=>$approve,
	                 'created_by'=>$request->created_by];

			foreach($request->file as $file) {


				$filename = str_replace(' ','', time().$file->getClientOriginalName()); 
				$filextension =  $file->clientExtension();

                if(in_array($filextension, ['jpeg','jpg','png','tiff'])) {

					$resize = Image::make($file->getRealPath());

					$thumbnail = $resize->resize(null,220, function($constraint) {
									$constraint->aspectRatio();
								 })->save(base_path().'/assets/img/properties/thumb/'.$filename,60); 

					$carousel = $resize->resize(null,360, function($constraint) {
									$constraint->aspectRatio();
								})->save(base_path().'/assets/img/properties/'.$filename,60);

					$photos = ['property_id' => $propertyid,'filename'=>$filename];
                	$this->propertymodule->createPhoto($photos); 
                } 
			}

			$create = $this->propertymodule->create($data);

			if($create) {

				// History
				$description = Auth::user()->fname." ".Auth::user()->lname." posted new property in title <strong>".$request->property_name."</strong>.";

				$history = ['user_id' => Auth::user()->id, 'description' => $description];
				$this->historymodule->create($history);

				//Self Assigned for agent
				if(Auth::user()->role_id == 2) {
					$data = ['property_id' => $propertyid, 'agent_id' => Auth::user()->id]; 
					$this->propertymodule->assignAgentProperty($data);
				}

				return redirect()->back()->with('success', 'Property was successfully added.');

			} else return redirect()->back()->with('error', 'Failed to post property');

		}
	}

	public function updateForm($code)
	{
		$province = $this->propertymodule->province();
		$cities =  $this->propertymodule->cities();
		$detail = $this->propertymodule->details($code);
		return view('property.update')->with(compact('detail','province','cities'));
	}

	public function updateProperty()
	{
		$request = request();	
		$photoid = explode(",",$request->photo_id); 

		// featured property
		$is_featured;
		is_null($request->is_featured) ? $is_featured = 0:$is_featured = 1;

		$data = ['offer_type'=>$request->offer_type,
                 'type_id'=>$request->property_type,
                 'status_id'=>$request->status_id,
                 'name'=>$request->property_name,
                 'about'=>$request->about,
                 'bedrooms'=>$request->bedrooms,
                 'bathrooms'=>$request->bathrooms,
                 'floor_area'=>$request->floor_area,
                 'land_size'=>$request->land_size,
                 'building_name'=>$request->building_name,
                 'block_lotnum'=>$request->block_lot,
                 'developer'=>$request->developer,
                 'furnished'=>$request->furnished,
                 'rooms'=>$request->rooms,
                 'car_space'=>$request->car_space,
                 'build_year'=>$request->build_year,
                 'deposit_bond'=>$request->deposit_bond,
                 'price'=>$request->price,
                 'price_condition'=>$request->price_condition,
                 'street_barangay'=>$request->street_barangay,
                 'city_municipality'=>$request->city_municipality,
                 'province'=>$request->province,
                 'map'=>$request->map,
                 'is_featured'=>$is_featured];

		if(!is_null($request->photo_id)) {

			foreach($photoid as $id) {
				$this->propertymodule->deletePhoto($id);
			}

			$description = "Delete some photo's of <strong>".$request->property_name."</strong>. property";

			$dataHistory = ['user_id' => Auth::user()->id, 'description' => $description];
			$this->historymodule->create($dataHistory);
		}

		if($request->has('file')) {

			foreach($request->file as $file) {

				$filename = str_replace(' ','', time().$file->getClientOriginalName()); 
				$filextension =  $file->clientExtension();

                if(in_array($filextension, ['jpeg','jpg','png','tiff'])) {

					$resize = Image::make($file->getRealPath());

					$thumbnail = $resize->resize(null,220, function($constraint) {
									$constraint->aspectRatio();
								 })->save(base_path().'/assets/img/properties/thumb/'.$filename,60); 

					$carousel = $resize->resize(null,360, function($constraint) {
									$constraint->aspectRatio();
								})->save(base_path().'/assets/img/properties/'.$filename,60);

					$dataPhoto = ['property_id' => $request->property_id,'filename'=>$filename];
                	$this->propertymodule->createPhoto($dataPhoto); 

                } 
			}

			$update = $this->propertymodule->update($request->property_id,$data);

			if($update) {

				$description = "New photo has been added on <strong>".$request->property_name."</strong> property.";
				$history = ['user_id' => Auth::user()->id, 'description' => $description];
				$this->historymodule->create($history);

				return redirect()->back()->with('success', 'Property was successfully updated.');

			} 


		} else {


			$update = $this->propertymodule->update($request->property_id,$data);

			if($update) {

				$description = "<strong>".$request->property_name."</strong> details has been updated.";
				$history = ['user_id' => Auth::user()->id, 'description' => $description];
				$this->historymodule->create($history);

				return redirect()->back()->with('success', 'Property was successfully updated.');

			} 
		}

	}

	public function changeStatus()
	{
		$request = request();

		$data = ['status_id' => $request->status_id];
		$update = $this->propertymodule->update($request->property_id, $data);

		if($update) {

			$status = $this->propertymodule->findStatus($request->status_id);

			$description = "Property <strong>".$request->propname."</strong> status is set to ".$status->status;
			$history = ['user_id' => Auth::user()->id, 'description' => $description];
			$this->historymodule->create($history);

			return redirect()->back()->with('success', 'Property Status was successfully changed.');
		}
	}

	public function assignAgentValidation(Request $request)
	{

		if(is_null($request->agents)) {
			$validate = $this->usermodule->allAgents();
			return response()->json($validate);
		} else {
			$validate = $this->propertymodule->validateAgents($request->agents);
			return response()->json($validate);
		}
	}

	public function assignAgent()
	{
		$request = Request();

		if(!is_null($request->agent_id)) {

			foreach($request->agent_id as $agentid) {

				$data = ['property_id' => $request->property_id, 'agent_id' => $agentid]; 
				$this->propertymodule->assignAgentProperty($data);

				$find = $this->usermodule->findAgent($agentid);
				$description = "Assign <strong>".$find->fname.' '.$find->lname."</strong> as agent on ".$request->property_name." property";
				$history = ['user_id' => Auth::user()->id, 'description' => $description];
				$this->historymodule->create($history);

			}

			return redirect()->back()->with('success', 'Agent was successfully added on '.$request->property_name.' property.');
			
		} else return redirect()->back()->with('error', 'No agent selected. Please select agent to continue this action.');

	}

	public function removeAgent()
	{
		$request = request();
		$removed = $this->propertymodule->removeAssignedAgent($request->property_agentid);

		if($removed) {

			$description = "Remove <strong>".$request->agent_name."</strong> as agent on <strong>".$request->property_name."</strong> property.";
			$history = ['user_id' => Auth::user()->id, 'description' => $description];
			$this->historymodule->create($history);

			return redirect()->back()->with('success', 'Remove agent successfully.');
		} 
	}

	public function cities(Request $request)
	{
		$province = $this->propertymodule->findProvince($request->province);
		return $this->propertymodule->cityMunicipality($province->id);
	}


	public function approveProperty()
	{
		$request = request();

		$data = ['is_approved' => 1]; // approve property

		$update = $this->propertymodule->update($request->property_id, $data);

		if($update) {

			$description = "<strong>".$request->property_name."</strong> property has been approved";
			$history = ['user_id' => Auth::user()->id, 'description' => $description];
			$this->historymodule->create($history);

			return redirect('list-of-properties')->with('success', 'Property Status has been approved.');
		}
	}

	public function declineProperty()
	{
		$request = request();

		$data = ['is_approved' => 2]; // decline property

		$update = $this->propertymodule->update($request->property_id, $data);

		if($update) {

			$description = "<strong>".$request->property_name."</strong> property has been declined";
			$history = ['user_id' => Auth::user()->id, 'description' => $description];
			$this->historymodule->create($history);

			return redirect('restore/properties')->with('success', 'Property Status has been declined.');
		}
	}

	public function removedProperty()
	{
		$request = request();

		$data = ['is_approved' => 3]; // removed property

		$removed = $this->propertymodule->update($request->property_id, $data);

		if($removed) {

			$description = "<strong>".$request->property_name."</strong> property has been removed";
			$history = ['user_id' => Auth::user()->id, 'description' => $description];
			$this->historymodule->create($history);

			return redirect('restore/properties')->with('success', 'Property Status has been removed.');
		}
	}

	public function archiveProperty()
	{
		$request = request();

		$data = ['is_approved' => 1]; // archive property

		$archive = $this->propertymodule->update($request->property_id, $data);

		if($archive) {

			$description = "<strong>".$request->property_name."</strong> property has been archive";
			$history = ['user_id' => Auth::user()->id, 'description' => $description];
			$this->historymodule->create($history);

			return redirect('list-of-properties')->with('success', 'Property Status has been archive.');
		}
	}

	public function restore()
	{	
		$properties = $this->propertymodule->restoreProperty();
		return view('restore.property')->with(compact('properties'));
	}
}

