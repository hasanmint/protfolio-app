@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                    <li class="breadcrumb-item active">Update</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title display-4 ">Add Blog Page</h4>
              

                <!-- start Form -->
                <form method="post"  action="{{ route('update.blog')}}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$blog->id}}" >

                <!-- start row -->
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Blog Category Name</label>
                    <div class="col-sm-10">
                        <select name="blog_category_id" class="form-select" aria-label="Default select example">
                            <option selected="">Slect Category</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }} " {{ $cat->id == $blog->blog_category_id ? 'selected' : ''}}>{{ $cat->blog_category }}</option>
                                @endforeach
                          
                          
                         </select>
                      
                    </div>
                </div>
                <!-- end row -->

                  <!-- start row -->
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Blog Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="blog_title" type="text" value="{{$blog->blog_title}}" >
                        @error('blog_title')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <!-- end row -->

                   <!-- start row -->
                   <div class="row mb-3">
                    <label for="blog_tag" class="col-sm-2 col-form-label">Blog Tags</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="blog_tag" type="text" value="{{$blog->blog_tag}}" data-role="tagsinput" >
                        @error('blog_tag')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <!-- end row -->
             

        

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Protofolio Description </label>
                    <div class="col-sm-10">
                       
                        <textarea  class="form-control" id="blog_description" rows="5" name="blog_description" > {!! $blog->blog_description !!} </textarea>
                    </div>
                </div>
                <!-- end row -->


                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image </label>
                    <div class="col-sm-10">
               <input name="blog_image" class="form-control" type="file" id="image">
                    </div>
                </div>
                <!-- end row -->
    
    
                  <div class="row mb-3">
                     <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                    <div class="col-sm-10">
                  <img id="showImage" class="rounded avatar-lg" src="{{ asset($blog->blog_image) }}" alt="Card image cap">
                    </div>
                </div>
                <!-- end row -->

        
                <input  type="submit" class="btn btn-info waves-effect waves-light btn-lg" value="Update Blog Data">
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader= new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>



@endsection