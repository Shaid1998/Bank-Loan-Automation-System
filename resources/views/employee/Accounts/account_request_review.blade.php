@extends('employee.employee_dashboard')
@section('employee')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">REVIEW ACCOUNT REQUESTS</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">REVIEW RECORD</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <form id="myForm" method="post" action="{{route('employee.accept.account')}}">
            @csrf
            <input type="hidden" name="id" value="{{$accData->id}}" >
                    
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Name</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="name" class="form-control" value="{{$accData->req_full_name}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Username</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="username" class="form-control" value="{{$accData->req_username}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="email" name="email" class="form-control" value="{{$accData->req_email}}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Password</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="password" name="password" class="form-control" value="{{$accData->req_password}}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Phone</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="phone" name="phone" class="form-control" value="{{$accData->req_phone}}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Address</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="address" class="form-control" value="{{$accData->req_address}}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Branch</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="branch" class="form-control" value="{{$accData->req_branch}}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Photo</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="photo" class="form-control" value="{{$accData->req_photo}}" />
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Accept & Create Account" />
                </div>
            </div>
        </form>         
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {required : true,}, 
                username: {required : true,}, 
                email: {required : true,}, 
                password: {required : true,}, 
                phone: {required : true,}, 
                address: {required : true,}, 
                photo: {required : true,}, 
                branch: {required : true,},  
            },
            messages :{
                name: {required : 'Please enter a name',}, 
                username: {required : 'Please enter a username',}, 
                email: {required : 'Please enter a email',}, 
                password: {required : 'Please enter a password',}, 
                phone: {required : 'Please enter a phone',},
                address: {required : 'Please enter a address',}, 
                branch: {required : 'Please enter a branch',}, 
                photo: {required : 'Please add a photo address',}, 
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

@endsection