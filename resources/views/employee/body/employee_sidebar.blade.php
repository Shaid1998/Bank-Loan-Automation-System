
<div style="background-image: linear-gradient(to bottom right, red, yellow);" class="sidebar-wrapper" data-simplebar="true">
	@php
		$id = Auth::user()->id;
		$adminData = App\Models\User::find($id);
	@endphp	
	<div class="user-profile text-center mt-3">
		<div class="">
			<img src="{{$adminData->photo}}" height="40px" width="40px" class="avatar-md rounded-circle">
		</div>
		<div class="mt-3">
			<h4 style="color:rgb(0, 30, 255);font-size:40px;" class="font-size-16 mb-1">{{$adminData->username}}</h4>
			<span style="color:rgb(0, 30, 255);font-size:20px;" class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
		</div>
	</div>
		<!--navigation-->
	<div>
		<ul class="metismenu" id="menu">
			<li style="padding-top: 1rem">
				<a href="{{ route('employee.dashobard') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-home'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">HOME</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{ route('employee.all.account.requests') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-user'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">ACCOUNT REQUESTS</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{ route('employee.all.loan.requests') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-paper-plane'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">LOAN REQUESTS</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{ route('employee.all.active.loan') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-thumbs-up'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">ACTIVE LOAN</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{ route('employee.loan.plan') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-hand-holding-usd'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">LOAN PLAN</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{ route('employee.messages') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-message'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">MESSAGES</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{ route('employee.customer.inquire.view') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-question-circle'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">QUESTION</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{ route('employee.customer.list') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-users'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">CUSTOMERS</div>
				</a>
			</li>
		</ul>
	</div>
	<!--end navigation-->
</div>