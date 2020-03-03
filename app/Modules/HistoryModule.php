<?php 

namespace App\Modules;
use App\History;
use Auth;

Class HistoryModule 
{

	public function create($data)
	{
		return History::create($data);
	}

	public function view()
	{
		$query = History::with('user');

    	if(Auth::user()->role_id == 2) $query->where('user_id', Auth::user()->id);
		else $query;
  
    	return $query->orderBy('id','DESC')->paginate(20);
	}

}