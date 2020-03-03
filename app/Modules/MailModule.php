<?php 

namespace App\Modules;

use App\Mails;

use Auth;
use DB;

Class MailModule {

	public function create($data)
	{
		return Mails::create($data);
	}

	public function view()
	{

		$from = request()->get('from');
		$to = request()->get('to');


		$query =  Mails::orderBy('id','DESC');

		if(request()->has('from') && request()->has('to')) {

			$query->where(DB::raw("(DATE_FORMAT(date_sent,'%Y-%m-%d'))"), '>=', $from)
				  ->where(DB::raw("(DATE_FORMAT(date_sent,'%Y-%m-%d'))"), '<=', $to);

		} else $query;

		return $query->where('is_deleted', 0)->where('to', Auth::user()->id)->orderBy('id','DESC')->paginate(15);
	}

	public function details($code)
	{
		return Mails::with('toagent')->where('code',$code)->first();
	}

	public function remove($id, $data)
	{
		return Mails::find($id)->update($data);
	}
}