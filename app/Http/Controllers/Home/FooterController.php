<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function footerSetting(){
        
    $allfooter = Footer::find(1);
    return view('admin.footer.footer_setting',compact('allfooter'));

    }// end method 

    public function updateFooter(request $request){
    
    $footer_id= $request->id;
    Footer::findOrFail($footer_id)->update([
        'number' => $request->number,
        'country' => $request->country,
        'media' => $request->media,
        'short_description' => $request->short_description,
        'address' => $request->address,
        'email' => $request->email,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'instagram' => $request->instagram,
        'copyright' => $request->copyright,
        
     ]);

     $notification = array(
        'message'=> 'Footer Setting updated Successfully',
        'alert-type'=>'success'
    );

    return redirect()->back()->with($notification);
  

    } // end method 

}
