<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function contact(){
        return view('frontend.contact');
    }//method end

    public function storeMessage(Request $request){

        Contact::insert([

            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message, 
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Your Message Submited Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod 


    public function allContact(){
        $contacts=Contact::latest()->get();
        return view('admin.contact.allcontact',compact('contacts'));
    }//method end

    public function deleteContact($id){

        Contact::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Your Message Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end mehtod 
   

}
