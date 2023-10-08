
<div style="background-image: linear-gradient(to bottom right, red, yellow);" class="sidebar-wrapper" data-simplebar="true">
	@php
		$id = Auth::user()->id;
		$adminData = App\Models\User::find($id);
	@endphp	
	<div class="user-profile text-center mt-3">
		<div class="">
			<img src="{{$adminData->photo}}"  class="avatar-md rounded-circle">
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
				<a href="{{ route('admin.dashobard') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class='fa fa-home'></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">DASHBOARD</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{route ('all.user.information')}}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class="fas fa-user-check"></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">USER INFO</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{route ('all.worker.information')}}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class="fas fa-user-check"></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">WORKER INFO</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{ route('all.incomeing.messages') }}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class="fas fa-envelope"></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">MESSAGES</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{route('admin.notice.board')}}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class="fas fa-bell"></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">NOTICE</div>
				</a>
			</li>
			<li style="padding-top: 1rem">
				<a href="{{route('admin.other.option')}}">
					<div style="color:rgb(0, 30, 255);font-size:25px;" class="parent-icon"><i class="fas fa-bell"></i></div>
					<div style="color:rgb(0, 30, 255);font-size:16px;font-weight:500;" class="menu-title">OTHERS</div>
				</a>
			</li>
		</ul>
	</div>
	<!--end navigation-->
</div>