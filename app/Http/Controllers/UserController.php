<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;
use Validator,Redirect,Response;
use Session;

class UserController extends Controller
{
    public function postLogin(Request $request)
    {

        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

 		$users =  $this->getActiveUser($request->email);

        $credential = $request->only('email', 'password');

        if(is_object($users)) {

        	if($users->status == 'active') {

		        if(Auth::attempt($credential)) {

                    $redirect = '';

                    if($users->role_id == 1) $redirect = 'summary';
                    else $redirect = 'list-of-properties';

		        	return response()->json(['status' => 'success', 'message' => 'Welcome to KeylandRealty'.$users->fname, 'redirect' => $redirect]);

                } else  return response()->json(['status' => 'failed', 'message' => 'These credentials do not match our records.']);

		    } else 	return response()->json(['status' => 'failed', 'message' => 'These credentials do not match our records.']);

	    } else return response()->json(['status' => 'failed', 'message' => 'These credentials do not match our records.']);

    }

    public function getActiveUser($email)
    {
    	return User::select('id','email','status','role_id')->where('email', $email)->where('is_approved', 1)->first();
    }
}
