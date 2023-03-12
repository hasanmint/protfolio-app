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

                <h4 class="card-title my-3 font-bold">Admin Profile Change Password</h4>

                @if (count($errors))
                    @foreach ( $errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$error}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                        
                    @endforeach
                @endif

                <!-- start Form -->
                <form method="post"  action="{{ route('update.password')}}" >
                    @csrf
                <!-- start row -->
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="oldpassword" type="password"   id="oldpassword">
                    </div>
                </div>

                  <!-- start row -->
                  <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="newpassword" type="password"   id="newpassword">
                    </div>
                </div>

                    <!-- start row -->
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">New Confirm Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="confirmpassword" type="password" id="confirmpassword">
                        </div>
                    </div>
                <input  type="submit" class="btn btn-info waves-effect waves-light btn-lg" value="Change Password">
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