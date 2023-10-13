@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
    @include('sweetalert::alert')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">ADD NEW LOAN PLAN</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">NEW PLAN</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">		 
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <form id="myForm" method="post" action="{{route('admin.new.branch.store')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Branch Name</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" name="branch_name" class="form-control" placeholder="New Branch Name .."/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Branch Address</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" name="branch_address" class="form-control" placeholder="New Branch Address .."/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Branch Contact</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="phone" name="branch_contact" class="form-control" placeholder="New Branch Contact .."/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Branch Email</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="email" name="branch_email" class="form-control" placeholder="New Branch email .."/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Branch Foundation Year</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select name="select" class="form-control" id="dropdownYear"style="width: 120px;" onchange="getProjectReportFunc()"></select>
                                    </div>
                                </div>
                                        
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Description</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <textarea type="text" name="branch_text" id="myForm" class="form-control" placeholder="Branch Description...."></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Branch Head</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" name="branch_head" class="form-control" placeholder="Branch Head Name"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Photo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" name="branch_photo" class="form-control"  id="image"  />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"> </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <img id="showImage"  alt="branch photo" style="width:100px; height: 100px;"  >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="ADD" />
                                    </div>
                                </div>
                            </div>
		                </form>
	                </div>
		        </div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    var i, currentYear, startYear, endYear, newOption, dropdownYear;
    dropdownYear = document.getElementById("dropdownYear");
    currentYear = (new Date()).getFullYear();
    startYear = currentYear - 100;
    endYear = currentYear ;

    for (i=startYear;i<=endYear;i++) {
    newOption = document.createElement("option");
    newOption.value = i;
    newOption.label = i;
        if (i == currentYear) {
            newOption.selected = true;
        }
    dropdownYear.appendChild(newOption);
    }
</script>

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

@endsection