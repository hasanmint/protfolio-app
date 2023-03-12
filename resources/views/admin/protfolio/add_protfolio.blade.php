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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Protoflio</a></li>
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

                <h4 class="card-title display-4 ">Protoflio Page</h4>


                <!-- start Form -->
                <form method="post"  action="{{ route('store.protfolio')}}" enctype="multipart/form-data">
                    @csrf

                    {{-- <input type="hidden" name="id" value=""> --}}

                <!-- start row -->
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Protfolio Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="protfolio_name" type="text" value="" >
                        @error('portfolio_name')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <!-- end row -->

                  <!-- start row -->
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Protfolio Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="protfolio_title" type="text" value="" >
                        @error('protfolio_title')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <!-- end row -->




                <div class="mb-3 row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Protofolio Description </label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="protfolio_description">

                        </textarea>
                    </div>
                </div>
                <!-- end row -->


                <div class="mb-3 row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Profilio Image </label>
                    <div class="col-sm-10">
               <input name="protfolio_image" class="form-control" type="file" id="image">
                    </div>
                </div>
                <!-- end row -->


                  <div class="mb-3 row">
                     <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                    <div class="col-sm-10">
                  <img id="showImage" class="rounded avatar-lg" src="{{ url('public/upload/no_image.jpg') }}" alt="Card image cap">
                    </div>
                </div>
                <!-- end row -->


                <input  type="submit" class="btn btn-info waves-effect waves-light btn-lg" value="Add protoflio Data">
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
