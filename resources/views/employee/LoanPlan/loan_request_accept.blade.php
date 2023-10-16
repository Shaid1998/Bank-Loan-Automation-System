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
                <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Accept" />
                </div>
            </div>
		</form>         
	</div>
</div>

@endsection