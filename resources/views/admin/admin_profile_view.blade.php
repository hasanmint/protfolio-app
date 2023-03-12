@extends('admin.admin_master')
@section('content')

 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Profile</h4>

            <div class="page-title-right">
                <ol class="m-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-8 offset-md-2 offset-lg-2 col-xl-5">

        <!-- Simple card -->
        <div class="card">
            <div class="mt-5 profile d-flex justify-content-center">
                <img class="rounded-circle avatar-xl" src="{{ (!empty ($adminData->profile_image)) ? url('public/public/upload/admin_images/'.$adminData->profile_image) : url('upload/no_image.jpg')  }}" alt="avatar-5" class="rounded avatar-md">
            </div>
            <div class="card-body">
                <div class="card-body">

                    <div class="text-center profile_info">
                        <h4 class="card-title">Admin Profile Details</h4>
                    <p class="card-title-desc">Welcome !</p>
                    </div>

                    <dl class="mb-0 row">
                        <dt class="col-sm-3">Name:</dt>
                        <dd class="col-sm-9">{{$adminData->name}}</dd>

                        <dt class="col-sm-3">Username:</dt>
                        <dd class="col-sm-9">hasanmint73</dd>
                        <dd class="col-sm-9 offset-sm-3">( You can use email or username )</dd>

                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9">{{$adminData->email}}</dd>

                        <dt class="col-sm-3 text-truncate">Persaon:</dt>
                        <dd class="col-sm-9">Male</dd>
                    </dl>

                </div>
                <a href="{{ route('edit.profile') }}" type="button" class="btn btn-info waves-effect waves-light btn-lg">Edit Profile</a>
            </div>
        </div>

    </div><!-- end col -->


</div>
<!-- end row -->
@endsection
