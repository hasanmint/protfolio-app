@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit</h4>

            <div class="page-title-right">
                <ol class="m-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                    <li class="breadcrumb-item active">Edit</li>
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

                <h4 class="card-title display-4 ">Home Slide Page</h4>


                <!-- start Form -->
                <form method="post"  action="{{ route('update.slider',$homeSlide->id)}}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $homeSlide->id}}">
                <!-- start row -->
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="title" type="text" value="{{ $homeSlide->title }}" >
                    </div>
                </div>
                <!-- end row -->

                   <!-- start row -->
                   <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Short Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="short_title" type="text" value="{{ $homeSlide->short_title }}" >
                    </div>
                </div>
                <!-- end row -->

                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Video URL</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="video_url" type="text" value="{{ $homeSlide->video_url }}" >
                    </div>
                </div>
                <!-- end row -->

                   <!-- start row -->
                   <div class="mb-3 row">
                    <label for="file" class="col-sm-2 col-form-label">Slider Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="home_slide" type="file"  id="image">
                    </div>
                </div>
                <!-- end row -->

              <!-- start row -->
              <div class="mb-3 row">
                <label for="image" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <img class="rounded avatar-lg"   id="showImage" src="{{ (!empty ($homeSlide->home_slide)) ? url($homeSlide->home_slide) : url('public/upload/no_image.jpg')  }}" alt="avatar-5" class="rounded avatar-md">
                </div>
            </div>
            <!-- end row -->

                <input  type="submit" class="btn btn-info waves-effect waves-light btn-lg" value="Update Slide">
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
