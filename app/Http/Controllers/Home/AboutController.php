<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Image;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function aboutPage(){
        $aboutPage=About::find(1);
        return view('admin.about_page.about_page_all',compact('aboutPage'));
    }

    public function updateAbout(request $request){
        $mult_image_id=$request->id;
        if($request->file('about_image')){
           $image=$request->file('about_image');
           $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

           Image::make($image)->resize(523,605)->save('public/upload/about_image/'.$name_gen);
           $save_url='public/upload/about_image/'.$name_gen;

           About::findOrFail($mult_image_id)->update([
              'title' => $request->title,
              'short_title' => $request->short_title,
              'short_description' => $request->short_description,
              'long_description' => $request->long_description,
              'about_image' => $save_url,
           ]);

           $notification = array(
              'message'=> 'About Page updated with Image Successfully',
              'alert-type'=>'success'
          );

          return redirect()->back()->with($notification);
        }else{
            About::findOrFail($mult_image_id)->update([
              'title' => $request->title,
              'short_title' => $request->short_title,
              'short_description' => $request->short_description,
              'long_description' => $request->long_description,

           ]);

           $notification = array(
              'message'=> 'About Page updated without Image Successfully',
              'alert-type'=>'success'
          );

          return redirect()->back()->with($notification);
        }
     }

     public function About(){
        $aboutPage=About::find(1);
        return view('frontend.about',compact('aboutPage'));

     }

     public function aboutMultiImage (){
        $aboutMultiImage=About::find(1);
        return view('admin.about_page.multi_image',compact('aboutMultiImage'));
     }

     public function aboutStoreImage(request $request){
        $image=$request->file('multi_image');

        foreach($image as $multi_image){
            $name_gen=hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();

            Image::make($multi_image)->resize(220,220)->save('public/upload/multi_img/'.$name_gen);
            $save_url='public/upload/multi_img/'.$name_gen;

            MultiImage::insert([
               'multi_image' => $save_url,
               'created_at' => Carbon::now(),
            ]);

        }

            $notification = array(
               'message'=> 'About Mulity  Image added Successfully',
               'alert-type'=>'success'
           );

           return redirect()->back()->with($notification);


     }

     public function allMultiImage(){
        $allMultiImage=MultiImage::all();
        return view('admin.about_page.all_multi_image',compact('allMultiImage'));
     }


     //end method

     public function editMultiImage($id){
        $multiImage=MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image',compact('multiImage'));
     }

     //end method

     public function updateMultiImage(request $request){
        $mult_image_id=$request->id;
        if($request->file('multi_image')){
           $image=$request->file('multi_image');
           $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

           Image::make($image)->resize(220,220)->save('public/upload/multi_img/'.$name_gen);
           $save_url='public/upload/multi_img/'.$name_gen;

           MultiImage::findOrFail($mult_image_id)->update([

              'multi_image' => $save_url,
           ]);

           $notification = array(
              'message'=> 'updated  Single Image Successfully',
              'alert-type'=>'success'
          );

          return redirect()->route('all.multi.image')->with($notification);

        }else{
            MultiImage::findOrFail($mult_image_id)->update([


           ]);

           $notification = array(
              'message'=> 'updated without Image Successfully',
              'alert-type'=>'success'
          );

          return redirect()->route('all.multi.image')->with($notification);
        }
     }

     // end method

     public function deleteMultiImage($id){
        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);

        MultiImage::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }
}
