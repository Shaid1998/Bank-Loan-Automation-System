@extends('employee.employee_dashboard')
@section('employee')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
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
                            <form id="myForm" method="post" action="{{route('employee.loan.plan.store')}}">
                                @csrf
                                <input type="hidden" name="id"  >
                                        
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Description</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <textarea type="text" loan_description" id="myForm" class="form-control" placeholder="loan Description...."></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Loan Type</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select name='Loan_type' required>
                                            <option value="">Select One</option>
                                            <option value="farm">Farm</option>
                                            <option value="business">Business</option>
                                            <option value="education">Education</option>
                                            <option value="project">Project</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Branch Name</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select name='branch_name' required>
                                            <option value="">Select One</option>
                                            <option value="dhaka">Dhaka</option>
                                            <option value="rajshahi">Rajshahi</option>
                                            <option value="khaulna">Khulna</option>
                                            <option value="chittagang">Chittagang</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Loan Duration</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select name='loan_duration' required>
                                            <option value="">Select One</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                            <option value="multiyearly">Multi-Yearly</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">EMI</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select name='emi' required>
                                            <option value="">Select One</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Interest Rate</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" name="interest_rate" class="form-control" placeholder="Interest Rate .."/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="ADD PLAN" />
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
                loan_description: {required : true,}, 
                Loan_type: {required : true,}, 
                branch_name: {required : true,}, 
                loan_duration: {required : true,}, 
                emi: {required : true,}, 
                interest_rate: {required : true,},  
            },
            messages :{
                loan_description: {required : 'loan description missing!',}, 
                Loan_type: {required : 'Loan type missing!',}, 
                branch_name: {required : 'branch_name missing!',}, 
                plan_type: {required : 'plan type missing!',}, 
                loan_duration: {required : 'loan_duration missing!',},
                emi: {required : 'emi missing!',}, 
                interest_rate: {required : 'interest_rate missing!',}, 
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