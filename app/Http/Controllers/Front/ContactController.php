<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSendMail;


use App\Models\Contact;
use App\Models\Newsletter;

class ContactController extends Controller
{
    
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact(){
        
        return view('front.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this -> validate($request,[
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);


        $contact = new Contact;
        $contact -> name = $request -> name;
        $contact -> subject = $request -> subject;
        $contact -> email = $request -> email;
        $contact -> message = $request -> message;
        $contact -> save();

        if ($contact->save()==true) {

            Mail::to('contact@centrorefugiohefzi-ba.com')->send(new ContactSendMail($data));
            
            $newsletter = new Newsletter;
            $newsletter -> name = $request -> name;
            $newsletter -> email = $request -> email;
            $newsletter -> statusx = 1;
            $newsletter -> save();

            return back();
            //return view('emails.thanks');

        }else {

            return back();
            
        }

    }


}
