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

                <h4 class="card-title display-4 ">About Page</h4>


                <!-- start Form -->
                <form method="post"  action="{{ route('update.about',$aboutPage->id)}}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $aboutPage->id}}">

                <!-- start row -->
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="title" type="text" value="{{ $aboutPage->title }}" >
                    </div>
                </div>
                <!-- end row -->


                   <!-- start row -->
                   <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Short Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="short_title" type="text" value="{{ $aboutPage->short_title }}" >
                    </div>
                </div>
                <!-- end row -->

                 <!-- start row -->
                 <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                        <textarea  class="form-control" id="short_description" rows="5" name="short_description" >{{ $aboutPage->short_description }}</textarea>
                    </div>
                </div>
                <!-- end row -->

                <div class="mb-3 row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Long Description </label>
                    <div class="col-sm-10">
          <textarea id="elm1" name="long_description">
       {{ $aboutPage->long_description }}
          </textarea>
                    </div>
                </div>
                <!-- end row -->


                <div class="mb-3 row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">About Image </label>
                    <div class="col-sm-10">
               <input name="about_image" class="form-control" type="file" id="image">
                    </div>
                </div>
                <!-- end row -->


                  <div class="mb-3 row">
                     <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                    <div class="col-sm-10">
      <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($aboutPage->about_image))? url( $aboutPage->about_image):url('public/upload/no_image.jpg') }}" alt="Card image cap">
                    </div>
                </div>
                <!-- end row -->



                <input  type="submit" class="btn btn-info waves-effect waves-light btn-lg" value="Update About">
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
