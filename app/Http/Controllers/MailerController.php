<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\MailModule;
use App\Modules\UserModule;
use App\Modules\GenerateModule;
use Carbon\Carbon;
use Auth;
use Image;


class MailerController extends Controller
{
	protected $mailmodule;
	protected $usermodule;
	protected $generatemodule;

	public function __construct(MailModule $mail, UserModule $user, GenerateModule $generate)
	{
		$this->mailmodule = $mail;
		$this->usermodule = $user;
        $this->generatemodule = $generate;
	}

    public function inbox()
    {
    	$messages = $this->mailmodule->view();
        return view('mailer.inbox')->with(compact('messages'));
    }

    public function message($code)
    {
    	$detail = $this->mailmodule->details($code);
	    return view('mailer.message')->with(compact('detail'));
    }

    public function createApplication()
    {
    	$request = Request();

    	// get current user ID.
		$userid = $this->usermodule->currentId();
		$currentid = $userid->id+1;

		// generate code number
		$leading_zero = str_pad($currentid, 5, '0', STR_PAD_LEFT);
		$string_rand = $this->generatemodule->code(5);
		$generate_code = $leading_zero.$string_rand;

        $now = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');

    	$data = ['to' => 1, // Admin Keyland Realty
                 'code'=> $generate_code,
    			 'fname'=> $request->fname,
    			 'lname'=> $request->lname,
    			 'email'=> $request->email,
    			 'phone'=> $request->phone,
    			 'title'=> 'be our agents',
    			 'subject'=> '<h5>Be one of our Real Estate Professionals!</h5>',
    			 'message'=> $request->message,
                 'date_sent'=> $now];

    	$create = $this->mailmodule->create($data);
    	
    	if($create) return redirect()->back()->with('mail', 'Your application was successfully sent');
    	else return redirect()->back()->with('error', 'Failed to send your messages.');
    	
    }

    public function createContactMessage()
    {
    	$request = Request();

    	// get current user ID.
		$userid = $this->usermodule->currentId();
		$currentid = $userid->id+1;

		// generate code number
		$leading_zero = str_pad($currentid, 5, '0', STR_PAD_LEFT);
		$string_rand = $this->generatemodule->code(5);
		$generate_code = $leading_zero.$string_rand;

        $now = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');

    	$data = ['to' => 1, // Admin keylang realty
                 'code'=> $generate_code,
    			 'fname'=> $request->fname,
    			 'lname'=> $request->lname,
    			 'email'=> $request->email,
    			 'title'=> 'contact us',
    			 'subject'=> '<h5>Contact Us</h5>',
    			 'message'=> $request->message,
                 'date_sent'=>$now];

    	$create = $this->mailmodule->create($data);
    	
    	if($create) return redirect()->back()->with('mail', 'Your message was successfully sent');
    	else return redirect()->back()->with('error', 'Failed to send your messages.');
    }

    public function createInquiry()
    {
    	$request = Request();

    	// get current user ID.
		$userid = $this->usermodule->currentId();
		$currentid = $userid->id+1;

		// generate code number
		$leading_zero = str_pad($currentid, 5, '0', STR_PAD_LEFT);
		$string_rand = $this->generatemodule->code(5);
		$generate_code = $leading_zero.$string_rand;

        $now = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');

		$interested = '';

		if($request->interested === 'Others') $interested = $request->other;
		else $interested = $request->interested;

    	$data = ['to' => 1, //Keyland Realty 
                 'code'=> $generate_code,
    			 'fname'=> $request->fname,
    			 'lname'=> $request->lname,
    			 'email'=> $request->email,
    			 'phone'=> $request->phone,
    			 'title'=> 'we\'d love to hear from you',
    			 'subject'=> '<h5>We\'d love to hear from you.</h5>',
    			 'message'=> $request->message,
    			 'interested'=> $interested,
                 'date_sent' => $now];

    	$create = $this->mailmodule->create($data);
    	
    	if($create) return redirect()->back()->with('mail', 'Your message was successfully sent');
    	else return redirect()->back()->with('error', 'Failed to send your messages.');
    }

    public function creatAskProperty()
    {
    	$request = Request();

    	// get current user ID.
		$userid = $this->usermodule->currentId();
		$currentid = $userid->id+1;

		// generate code number
		$leading_zero = str_pad($currentid, 5, '0', STR_PAD_LEFT);
		$string_rand = $this->generatemodule->code(5);
		$generate_code = $leading_zero.$string_rand;

        $now = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');

		$data = ['to'=> $request->to,
                 'code'=> $generate_code,
    			 'fname'=> $request->fname,
    			 'lname'=> $request->lname,
    			 'email'=> $request->email,
                 'phone'=> $request->phone,
    			 'title'=> 'ask about property',
    			 'subject'=> '<h5>Asking about property - '.$request->property_name.'</h5>',
    			 'message'=> $request->message,
                 'date_sent'=>$now];

    	$create = $this->mailmodule->create($data);
    	
    	if($create) return redirect()->back()->with('mail', 'Your message about asking this property was successfully sent');
    	else return redirect()->back()->with('error', 'Failed to send your messages.');
    }

    public function createSellProperty()
    {
        $request = Request();

        // get current user ID.
        $userid = $this->usermodule->currentId();
        $currentid = $userid->id+1;

        // generate code number
        $leading_zero = str_pad($currentid, 5, '0', STR_PAD_LEFT);
        $string_rand = $this->generatemodule->code(5);
        $generate_code = $leading_zero.$string_rand;

        $now = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');

        $data = ['to'=>1, // Admin Keyland Realty
                 'code'=> $generate_code,
                 'fname'=> $request->fname,
                 'lname'=> $request->lname,
                 'email'=> $request->email,
                 'phone'=> $request->phone,
                 'title'=> 'sell your properties',
                 'subject'=> '<h5>List your property with us!</h5>',
                 'message'=> $request->message,
                 'property_location'=>$request->location,
                 'property_lotsize'=>$request->lotsize,
                 'date_sent'=> $now];

        if($request->has('img')) { 

            $imgname = str_replace(' ','', time().$request->img->getClientOriginalName()); 
            $imgextension =  $request->img->getClientOriginalExtension();
            $filesize = $request->img->getSize();

            if($filesize != false)

                if(in_array($imgextension, ['pdf','docx'])) {

                    $path = 'assets/mail/sketch';
                    $request->img->move($path, $imgname);
                    $data['property_sketch_extention'] = $imgextension;
                    $data['property_sketch'] = $imgname;

                } else return redirect()->back()->with('error', 'You upload invalid image extension, Image must be jpg or png.');

            else return redirect()->back()->with('error', 'Filesize must be less than to 100MB');

        }

        $create = $this->mailmodule->create($data);
        
        if($create) return redirect()->back()->with('mail', 'Your list property information was successfully sent.');
        else return redirect()->back()->with('error', 'Failed to send your messages.');

    }

    public function removeMessage(Request $request)
    {	

    	$data = ['is_deleted' => 1];

    	$remove = $this->mailmodule->remove($request->id, $data);

    	if($remove) return response()->json(['status' => 'success']);
    	else return response()->json(['status' => 'failed']);
    }
    
    public function createSchedule()
    {
        $request = Request();

        // get current user ID.
        $userid = $this->usermodule->currentId();
        $currentid = $userid->id+1;

        // generate code number
        $leading_zero = str_pad($currentid, 5, '0', STR_PAD_LEFT);
        $string_rand = $this->generatemodule->code(5);
        $generate_code = $leading_zero.$string_rand;

        $now = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');

        $data = ['to' => $request->to,
                 'code' => $generate_code,
                 'fname' => $request->fname,
                 'lname' => $request->lname,
                 'email' => $request->email,
                 'phone' => $request->phone,
                 'title' => 'schedule a free site viewing',
                 'subject' => '<h5>Schedule a Free Site Viewing</h5>',
                 'message' => $request->fname.' '.$request->lname.' has requested a schedule for site viewing to '.$request->property_name.' property',
                 'property_code' => $request->property_code,
                 'appointment_date' => $request->pickdate,
                 'appointment_time' => $request->picktime,
                 'date_sent'=>$now];

        $create = $this->mailmodule->create($data);
        
        if($create) return redirect()->back()->with('mail', 'Your request for a site viewing was successfully sent.');
        else return redirect()->back()->with('error', 'Failed to send your messages.');

    }
}
