@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Add Blog Category</a></li>
                    <li class="breadcrumb-item active">add</li>
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

                <h4 class="card-title display-3  ">Protoflio Page</h4>
              
                <p></p>
                <!-- start Form -->
                <form method="post"  action="{{ route('store.blog.categroy')}}">
                    @csrf

                <!-- start row -->
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Blog Cateogory Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="blog_category" type="text" value="" >
                        @error('blog_category')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <!-- end row -->

        
                <input  type="submit" class="btn btn-info waves-effect waves-light btn-lg" value="Add Blog Category">
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>





@endsection