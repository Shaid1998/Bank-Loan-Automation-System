
<div style="background-image: linear-gradient(to bottom right, red, yellow);" class="sidebar-wrapper" data-simplebar="true">
	@php
		$id = Auth::user()->id;
		$customerData = App\Models\User::find($id);
	@endphp	
	<div class="user-profile text-center mt-3">
		<div class="">
			<img src="{{$customerData->photo}}"  class="avatar-md rounded-circle">
		</div>
		<div class="mt-3">
			<h4 style="color:rgb(0, 30, 255);font-size:40px;" class="font-size-16 mb-1">{{$customerData->username}}</h4>
			<span style="color:rgb(0, 30, 255);font-size:20px;" class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
		</div>
	</div>
		<!--navigation-->
	<div>
		<ul class="metismenu" id="menu">
			<li style="padding-top: 1rem">
				<a href="{{ route('customer.dashobard') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-home'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">DASHBOARD</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{ route('customer.branch') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-bank'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">BRANCH</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{ route('customer.loan') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-chart-line'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">LOAN</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{ route('customer.message.list') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-message'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">MESSAGES</div>
				</a>
			</li>
		</ul>
	</div>
	<!--end navigation-->
</div>