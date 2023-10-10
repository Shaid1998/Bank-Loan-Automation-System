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
                            <form id="myForm" method="post" action="{{route('employee.loan.plan.update')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$loanData->id}}" >
                                        
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Description</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <textarea type="text" name="loan_description" id="myForm" class="form-control" value="{{$loanData->loan_description}}"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Loan Type</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select name='Loan_type' value="{{$loanData->Loan_type}}">
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
                                        <select name='branch_name' value="{{$loanData->branch_name}}">
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
                                        <select name='loan_duration' value="{{$loanData->loan_duration}}">
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
                                        <select name='emi' value="{{$loanData->emi}}">
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
                                        <input type="text" name="interest_rate" class="form-control" value="{{$loanData->interest_rate}}"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="UPDATE PLAN" />
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

@endsection