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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Footer</a></li>
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

                <h4 class="card-title display-4 ">Footr Page</h4>
              
                <!-- start Form -->
                <form method="post"  action="{{ route('update.footer',$allfooter->id)}}">
                    @csrf

                    <input type="hidden" name="id" value="{{ $allfooter->id}}">

                  <!-- start row -->
                  <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Number</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="number" type="text" value="{{ $allfooter->number }}" >
                    </div>
                </div>
                <!-- end row -->

                  <!-- start row -->
                  <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Country</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="country" type="text" value="{{ $allfooter->country }}" >
                    </div>
                </div>
                <!-- end row -->

                
                  <!-- start row -->
                  <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Media</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="media" type="text" value="{{ $allfooter->media }}" >
                    </div>
                </div>
                <!-- end row -->

                
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"> Short Description </label>
                    <div class="col-sm-10">
                        <textarea  class="form-control" id="short_description" rows="5" name="short_description" >{!! $allfooter->short_description !!}</textarea>
                    </div>
                </div>
                <!-- end row -->


                  <!-- start row -->
                  <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="address" type="text" value="{{ $allfooter->address }}" >
                    </div>
                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="email" type="email" value="{{ $allfooter->email }}" >
                    </div>
                </div>
                <!-- end row -->

                  <!-- start row -->
                  <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">facebook</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="facebook" type="text" value="{{ $allfooter->facebook }}" >
                    </div>
                </div>
                <!-- end row -->

                  <!-- start row -->
                  <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Instagram</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="instagram" type="text" value="{{ $allfooter->instagram }}" >
                    </div>
                </div>
                <!-- end row -->

                  <!-- start row -->
                  <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="twitter" type="text" value="{{ $allfooter->twitter }}" >
                    </div>
                </div>
                <!-- end row -->

                  <!-- start row -->
                  <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">copyright</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="copyright" type="text" value="{{ $allfooter->copyright }}" >
                    </div>
                </div>
                <!-- end row -->


                
                
                

           





            

                <input  type="submit" class="btn btn-info waves-effect waves-light btn-lg" value="Update Footer">
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>





@endsection