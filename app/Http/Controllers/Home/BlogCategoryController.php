<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function allBlogCategroy(){
        $blogcategory=BlogCategory::latest()->get();
        return view('admin.blog_category.all_blog_category',compact('blogcategory'));
    }
    //end method


    public function addBlogCategroy(){
        return view('admin.blog_category.add_blog_category');
    }
    //end method

    public function storeBlogCategroy(Request $request){
        $request->validate([
            'blog_category' => 'required',
            

        ],[

            'blog_category.required' => 'Blog category Name is Required',
            
        ]);

        BlogCategory::insert([
           'blog_category' => $request->blog_category,
        
        ]);

        $notification = array(
           'message'=> 'Blog Category Data Insert Successfully',
           'alert-type'=>'success'
       );
     
       return redirect()->route('all.blog.categroy')->with($notification);
    
        
        
    }
    //end method

    public function editBlogCategroy($id){
        $blogcategory=BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit_blog_category',compact('blogcategory'));
       
    }

    //method end

    public function updateBlogCategroy(Request $request){
        $blogcategory_id=$request->id;
        BlogCategory::findOrFail($blogcategory_id)->update([
            'blog_category' => $request->blog_category,
         
         ]);
 
         $notification = array(
            'message'=> 'Blog Category Data update Successfully',
            'alert-type'=>'success'
        );
      
        return redirect()->route('all.blog.categroy')->with($notification);
       
    }

    //method end

    public function deleteBlogCategroy($id){
        // $blogcategory=BlogCategory::findOrFail($id);
       
        BlogCategory::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Blog Category Data Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
