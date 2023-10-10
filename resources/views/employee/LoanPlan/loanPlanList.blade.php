@extends('employee.employee_dashboard')
@section('employee')
 

<div class="page-content">
    @include('sweetalert::alert')
	<div class="container">
		@include('employee.LoanPlan.monthly_loan_plan',['month' => $month]);
	</div>

    <div class="container">
		@include('employee.LoanPlan.yearly_loan_plan',['Year' => $Year]);
	</div>

    <div class="container">
		@include('employee.LoanPlan.multiyearly_loan_plan',['multiYear' => $multiYear]);
	</div>
</div>

@endsection