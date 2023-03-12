<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Protfolio;
use Image;
use Illuminate\Support\Carbon;


class ProtfolioController extends Controller
{
    public function allProtfolio(){
        $protfolio=Protfolio::latest()->get();
        return view('admin.protfolio.protfolio_all',compact('protfolio'));
    }
    //method end

    public function addProtfolio(){
        return view('admin.protfolio.add_protfolio');
    }
    //method end

    public function storeProtfolio(Request $request){
        $request->validate([
            'protfolio_name' => 'required',
            'protfolio_title' => 'required',
            'protfolio_image' => 'required',

        ],[

            'protfolio_name.required' => 'Portfolio Name is Required',
            'protfolio_title.required' => 'Portfolio Titile is Required',
        ]);

        $image=$request->file('protfolio_image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(1020,519)->save('public/upload/protfolio_img/'.$name_gen);
        $save_url='public/upload/protfolio_img/'.$name_gen;

        Protfolio::insert([
           'protfolio_name' => $request->protfolio_name,
           'protfolio_title' => $request->protfolio_title,
           'protfolio_description' => $request->protfolio_description,
           'protfolio_image' => $save_url,
           'created_at' => Carbon::now(),

        ]);

        $notification = array(
           'message'=> 'Protfolio Data Insert Successfully',
           'alert-type'=>'success'
       );

       return redirect()->route('all.protfolio')->with($notification);


    }

    //method end


    public function editProtfolio($id){
        $protfolio=Protfolio::findOrFail($id);
        return view('admin.protfolio.edit_protfolio',compact('protfolio'));
    }
    //method end

    public function updateProtfolio(request $request){
        $protfolio_id=$request->id;
        if($request->file('protfolio_image')){
           $image=$request->file('protfolio_image');
           $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

           Image::make($image)->resize(1020,519)->save('public/upload/protfolio_img/'.$name_gen);
           $save_url='public/upload/protfolio_img/'.$name_gen;

           Protfolio::findOrFail($protfolio_id)->update([
            'protfolio_name' => $request->protfolio_name,
            'protfolio_title' => $request->protfolio_title,
            'protfolio_description' => $request->protfolio_description,
            'protfolio_image' => $save_url,
           ]);

           $notification = array(
              'message'=> 'Protfolio updated with Image Successfully',
              'alert-type'=>'success'
          );

          return redirect()->route('all.protfolio')->with($notification);
        }else{
            Protfolio::findOrFail($protfolio_id)->update([
            'protfolio_name' => $request->protfolio_name,
            'protfolio_title' => $request->protfolio_title,
            'protfolio_description' => $request->protfolio_description,

           ]);

           $notification = array(
              'message'=> 'Protfolio updated without Image Successfully',
              'alert-type'=>'success'
          );

          return redirect()->route('all.protfolio')->with($notification);
        }
     }
        //end method

        public function deleteProtfolio($id){
            $protfolio=Protfolio::findOrFail($id);
            $img = $protfolio->protfolio_image;
            unlink($img);

            Protfolio::findOrFail($id)->delete();

             $notification = array(
                'message' => 'Protfolio Data Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

         }
         //end method


         public function detailsProtfolio($id){
            $protfolio=Protfolio::findOrFail($id);
            return view('frontend.protfolio_details',compact('protfolio'));
        }
        //method end

         public function homeProtfolio (){

            $protfolio=Protfolio::latest()->get();
            return view('frontend.protfolio',compact('protfolio'));
        }
        //method end
}

