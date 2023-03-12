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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Protoflio</a></li>
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

                <h4 class="card-title display-4 ">Protoflio Page</h4>
              

                <!-- start Form -->
                <form method="post"  action="{{ route('update.protfolio')}}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $protfolio->id}}">

                <!-- start row -->
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Protfolio Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="protfolio_name" type="text" value="{{ $protfolio->protfolio_name}}" >
                        @error('protfolio_name')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <!-- end row -->

                  <!-- start row -->
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Protfolio Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="protfolio_title" type="text" value="{{ $protfolio->protfolio_title}}" >
                        @error('protfolio_title')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <!-- end row -->
             

        

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Protofolio Description </label>
                    <div class="col-sm-10">
                        <textarea  class="form-control" id="protfolio_description" rows="5" name="protfolio_description" >{{ $protfolio->protfolio_description }}</textarea>
                    </div>
                </div>
                <!-- end row -->


                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Profilio Image </label>
                    <div class="col-sm-10">
               <input name="protfolio_image" class="form-control" type="file" id="image">
                    </div>
                </div>
                <!-- end row -->
    
    
                  <div class="row mb-3">
                     <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                    <div class="col-sm-10">
                  <img id="showImage" class="rounded avatar-lg" src="{{ asset($protfolio->protfolio_image) }}" alt="Card image cap">
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