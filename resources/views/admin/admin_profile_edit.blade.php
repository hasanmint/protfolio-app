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

                <h4 class="card-title">Edit Profile</h4>


                <!-- start Form -->
                <form method="post"  action="{{ route('store.profile')}}" enctype="multipart/form-data">
                    @csrf
                <!-- start row -->
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="name" type="text" value="{{ $editData->name }}" >
                    </div>
                </div>
                <!-- end row -->
{{--
                 <!-- start row -->
                 <div class="mb-3 row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="username" type="text" value="{{ $editData->username }}" id="username">
                    </div>
                </div>
                <!-- end row --> --}}


              <!-- start row -->
                 <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="email" type="text" value="{{ $editData->email }}" id="email">
                    </div>
                </div>
                <!-- end row -->

                <!-- start row -->
                 <div class="mb-3 row">
                    <label for="file" class="col-sm-2 col-form-label">Profile Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="profile_image" type="file"  id="image">
                    </div>
                </div>
                <!-- end row -->

                  <!-- start row -->
                  <div class="mb-3 row">
                    <label for="image" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img class="rounded avatar-lg"  id="showImage" src="{{ (!empty ($editData->profile_image)) ? url('public/public/upload/admin_images/'.$editData->profile_image) : url('public/upload/no_image.jpg')  }}" alt="avatar-5" class="rounded avatar-md">
                    </div>
                </div>
                <!-- end row -->

                <input  type="submit" class="btn btn-info waves-effect waves-light btn-lg" value="Update Profile">
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
