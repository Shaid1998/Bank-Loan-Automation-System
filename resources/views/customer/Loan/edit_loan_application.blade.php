@extends('customer.customer_dashboard')
@section('customer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
    @include('sweetalert::alert')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">EDIT APPLICATION</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">MAKE CHANGES</li>
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
                            <form id="myForm" method="post" action="{{route('customer.loan.application.edit.store')}}">
                                @csrf

                                <input type="hidden" name="id" value="{{$loan->id}}" >

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Amount</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" name="Amount" class="form-control" value="{{$loan->Amount}}"/>
                                    </div>
                                </div>

                                <input type="hidden" name="chosen_loan" value="{{$loan->Loan_id}}"/>


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Commitment</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <textarea type="text" name="Commitment" id="myForm" class="form-control" value="{{$loan->Commitment}}"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Branch</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select name='branch' value="{{$loan->branch}}">
                                            <option value="">Select One</option>
                                            <option value="dhaka">Dhaka</option>
                                            <option value="khulna">Khulna</option>
                                            <option value="rajshahi">rajshahi</option>
                                            <option value="chittagang">chittagang</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="SUBMIT" />
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




@endsection