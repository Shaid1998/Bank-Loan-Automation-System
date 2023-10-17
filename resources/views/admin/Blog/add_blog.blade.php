@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
    @include('sweetalert::alert')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">ADD NEW BLOG</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">NEW BLOG</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">		 
                <form id="myForm" method="post" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id"  >

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Blog Title</h6>
                        </div>
                        <div class="form-group col-sm-9 text-secondary">
                            <input type="text" name="blog_title" class="form-control" placeholder="Blog Title .."/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Blog Details</h6>
                        </div>
                        <div class="form-group col-sm-9 text-secondary">
                            <textarea type="text" name="blog_details" id="myForm" class="form-control" placeholder="detailed blog"...."></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Photo</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="file" name="blog_image" class="form-control"  id="image"  />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"> </h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <img id="showImage"  alt="photo" style="width:100px; height: 100px;"  >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="UPLOAD" />
                        </div>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>


<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                photo_title: {required : true,}, 
                photo_text: {required : true,}, 
                photo: {required : true,}, 
            },
            messages :{
                photo_title: {required : 'Please enter a photo title',}, 
                photo_text: {required : 'Please enter a photo text',}, 
                photo: {required : 'Please upload a photo',}, 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>




<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection