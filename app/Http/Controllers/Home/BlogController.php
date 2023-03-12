<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function allBlog(){
        $blog=Blog::latest()->get();
        return view('admin.blog.all_blog',compact('blog'));
    }
    //method end

    public function addBlog(){
        $categories=BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog.add_blog',compact('categories'));
    }
    //method end

    public function storeBlog(Request $request){

        $image=$request->file('blog_image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(430,327)->save('public/upload/blog_img/'.$name_gen);
        $save_url='public/upload/blog_img/'.$name_gen;

        Blog::insert([
           'blog_category_id' => $request->blog_category_id,
           'blog_title' => $request->blog_title,
           'blog_tag' => $request->blog_tag,
           'blog_description' => $request->blog_description,
           'blog_image' => $save_url,
           'created_at' => Carbon::now(),

        ]);

        $notification = array(
           'message'=> 'blog Data Insert Successfully',
           'alert-type'=>'success'
       );

       return redirect()->route('all.blog')->with($notification);

    }
    //method end

    public function editBlog($id){
        $blog=Blog::findOrFail($id);
        $categories=BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog.edit_blog',compact('blog','categories'));
    }
    //method end

    public function updateBlog(request $request){
        $blog_id=$request->id;
        if($request->file('blog_image')){
           $image=$request->file('blog_image');
           $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

           Image::make($image)->resize(1020,519)->save('public/upload/blog_img/'.$name_gen);
           $save_url='public/upload/blog_img/'.$name_gen;

           Blog::findOrFail($blog_id)->update([
            'blog_category_id' => $request->blog_category_id,
           'blog_title' => $request->blog_title,
           'blog_tag' => $request->blog_tag,
           'blog_description' => $request->blog_description,
           'blog_image' => $save_url,

           ]);

           $notification = array(
              'message'=> 'blog updated with Image Successfully',
              'alert-type'=>'success'
          );

          return redirect()->route('all.blog')->with($notification);
        }else{
           Blog::findOrFail($blog_id)->update([
            'blog_category_id' => $request->blog_category_id,
           'blog_title' => $request->blog_title,
           'blog_tag' => $request->blog_tag,
           'blog_description' => $request->blog_description,


           ]);

           $notification = array(
              'message'=> 'blog updated without Image Successfully',
              'alert-type'=>'success'
          );

          return redirect()->route('all.blog')->with($notification);
        }
     }
        //end method


    public function deleteBlog($id){
        $blog=Blog::findOrFail($id);
        $img = $blog->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Blog Data Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }
     //end method



    public function detailsBlog($id){
        $allblogs=Blog::latest()->limit(5)->get();
        $blog=Blog::findOrFail($id);
        $categories=BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog_details',compact('blog','allblogs','categories'));
    }
    //method end


    public function blogCategory($id){

        $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $categoryname = BlogCategory::findOrFail($id);
        return view('frontend.blog_category_details',compact('blogpost','allblogs','categories','categoryname'));
        // return view('frontend.blog_category_details');
    }
    //method end


    public function homeBlog(){
        $allblogs=Blog::latest()->limit(5)->get();
        // $blog=Blog::findOrFail($id);
        $categories=BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog',compact('allblogs','categories'));
    }
    //method end



}
