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
        <form id="myForm" method="post" action="{{route('employee.accept.loan.store')}}">
            @csrf
            <input type="hidden" name="id" value="{{$loanreq->id}}" >
                    
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">User Id</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="user_id" class="form-control" value="{{$user->user_id}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Chosen Plan</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="plan_id" class="form-control" value="{{$loan->Loan_id}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Plan Type</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="plan_type" class="form-control" value="{{$loan->loan_duration}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Plan Interest Rate</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="plan_interest_rate" class="form-control" value="{{$loan->interest_rate}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Amount</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="loan_amount" class="form-control" value="{{$loanreq->Amount}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Plan Emi</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="plan_emi" class="form-control" value="{{$loan->emi}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Plan Branch</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="plan_branch" class="form-control" value="{{$loan->branch_name}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Distribution Branch</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="distribution_branch" class="form-control" value="{{$loanreq->branch}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">User Commitment</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="user_commitment" class="form-control" value="{{$loanreq->Commitment}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">User Name</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="user_name" class="form-control" value="{{$user->name}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">User Phone</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="phone" name="user_phone" class="form-control" value="{{$user->phone}}"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">User Email</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="email" name="user_email" class="form-control" value="{{$user->email}}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">User Address</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="user_address" class="form-control" value="{{$user->address}}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">User Branch</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="text" name="user_branch" class="form-control" value="{{$user->branch}}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Issue Date</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="date" name="issue_date" class="form-control" required />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Expire Date</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                    <input type="date" name="expire_date" class="form-control" required />
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3"></div>
                <div style="padding: 1rem;" class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Accept" />
                </div>
            </div>
		</form>         
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                user_id: {required : true,}, 
                plan_id: {required : true,}, 
                plan_type: {required : true,}, 
                plan_interest_rate: {required : true,}, 
                loan_amount: {required : true,}, 
                plan_emi: {required : true,}, 
                plan_branch: {required : true,}, 
                distribution_branch: {required : true,},  
                user_commitment: {required : true,},  
                user_name: {required : true,},  
                user_phone: {required : true,},  
                user_email: {required : true,},  
                user_address: {required : true,},  
                user_branch: {required : true,},  
                issue_date: {required : true,},  
                expire_date: {required : true,},  
            },
            messages :{
                user_id: {required : 'user id missing!',}, 
                user_name: {required : 'user name missing!',}, 
                plan_id: {required : 'plan id missing!',}, 
                plan_type: {required : 'plan type missing!',}, 
                plan_interest_rate: {required : 'plan interest rate missing!',},
                loan_amount: {required : 'loan amount missing!',}, 
                plan_emi: {required : 'plan emi missing!',}, 
                plan_branch: {required : 'plan branch missing!',}, 
                distribution_branch: {required : 'distribution branch missing!',}, 
                user_phone: {required : 'user phone missing!',}, 
                user_email: {required : 'user email missing!',}, 
                user_address: {required : 'user address missing!',}, 
                user_branch: {required : 'user branch missing!',}, 
                issue_date: {required : 'issue date missing!',}, 
                expire_date: {required : 'expire date missing!',}, 
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