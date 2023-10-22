@extends('admin.admin_dashboard')
@section('admin')
 

<div class="page-content">
	<div class="row row-cols-1 row-cols-md-2 row-cols-xl-6">
		<div class="col">
			<div class="card radius-10 bg-gradient-deepblue">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{$branch}}</h5>
						<div class="ms-auto">
							<i class='fas fa-bank fs-3 text-white'></i>
						</div>
					</div>
					<div class="progress my-3 bg-light-transparent" style="height:3px;">
						<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Total Branch</p>
						<p class="mb-0 ms-auto">--<span><i class='bx bx-up-arrow-alt'></i></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-orange">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{$emp}}</h5>
						<div class="ms-auto">
							<i class='fa fa-user-cog fs-3 text-white'></i>
						</div>
					</div>
					<div class="progress my-3 bg-light-transparent" style="height:3px;">
						<div class="progress-bar bg-white" role="progressbar" style="width: 100%%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Total Employee</p>
						<p class="mb-0 ms-auto">--<span><i class='bx bx-up-arrow-alt'></i></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-ohhappiness">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{$cus}}</h5>
						<div class="ms-auto">
							<i class='fas fa-user fs-3 text-white'></i>
						</div>
					</div>
					<div class="progress my-3 bg-light-transparent" style="height:3px;">
						<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Total Customer</p>
						<p class="mb-0 ms-auto">--%<span><i class='bx bx-up-arrow-alt'></i></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-ibiza">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{$message}}</h5>
						<div class="ms-auto">
							<i class='fa fa-message fs-3 text-white'></i>
						</div>
					</div>
					<div class="progress my-3 bg-light-transparent" style="height:3px;">
						<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Total Message</p>
						<p class="mb-0 ms-auto">--%<span><i class='bx bx-up-arrow-alt'></i></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-deepblue">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{$loan}}</h5>
						<div class="ms-auto">
							<i class='fas fa-bank fs-3 text-white'></i>
						</div>
					</div>
					<div class="progress my-3 bg-light-transparent" style="height:3px;">
						<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Total Active Loan</p>
						<p class="mb-0 ms-auto">--<span><i class='bx bx-up-arrow-alt'></i></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-orange">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{$plan}}</h5>
						<div class="ms-auto">
							<i class='fa fa-user-cog fs-3 text-white'></i>
						</div>
					</div>
					<div class="progress my-3 bg-light-transparent" style="height:3px;">
						<div class="progress-bar bg-white" role="progressbar" style="width: 100%%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Total Active Plan</p>
						<p class="mb-0 ms-auto">--<span><i class='bx bx-up-arrow-alt'></i></span></p>
					</div>
				</div>
			</div>
		</div>
	</div><!--end row-->
	<div style="background-image:linear-gradient(to right, rgb(115, 255, 0) , rgb(0, 229, 255));padding:2rem">
		<div style="height: 80px;width:100%;background-image:linear-gradient(to right, rgb(115, 255, 0) , rgb(0, 229, 255));margin-left:0px;margin-bottom:10px" class="row radius-10 d-flex align-items-center">
			<h1 style="font-family: Arial, Helvetica, sans-serif;font-weight:900;font-size:40px;font-style:italic;text-align:center;padding:10px;">MY DATA</h1>
		</div>
		<div >
			<div>
				<div class="d-flex align-items-center">
					<div>
						<h5 style="font-family: 'Times New Roman', Times, serif;font-weight:800;font-size:35px;font-style:italic;color:black;padding-bottom:1rem" class="mb-0"><img src="{{ asset($user->photo)}}" height="70px" width="70px" /></h5>
						<h5 style="font-family: 'Times New Roman', Times, serif;font-weight:800;font-size:35px;font-style:italic;color:black;padding-bottom:1rem" class="mb-0">Username: <span style="font-size: 25px;color:aliceblue;">{{$user->username}}</span></h5>
						<h5 style="font-family: 'Times New Roman', Times, serif;font-weight:800;font-size:35px;font-style:italic;color:black;padding-bottom:1rem" class="mb-0">UserID: <span style="font-size: 25px;color:aliceblue;">{{$user->user_id}}</span></h5>
						<h5 style="font-family: 'Times New Roman', Times, serif;font-weight:800;font-size:35px;font-style:italic;color:black;padding-bottom:1rem" class="mb-0">Name: <span style="font-size: 25px;color:aliceblue;">{{$user->name}}</span></h5>
						<h5 style="font-family: 'Times New Roman', Times, serif;font-weight:800;font-size:35px;font-style:italic;color:black;padding-bottom:1rem" class="mb-0">Email:<span style="font-size: 25px;color:aliceblue;"> {{$user->email}}</span></h5>
						<h5 style="font-family: 'Times New Roman', Times, serif;font-weight:800;font-size:35px;font-style:italic;color:black;padding-bottom:1rem" class="mb-0">Phone:<span style="font-size: 25px;color:aliceblue;"> {{$user->phone}}</span></h5>
						<h5 style="font-family: 'Times New Roman', Times, serif;font-weight:800;font-size:35px;font-style:italic;color:black;padding-bottom:1rem" class="mb-0">Address: <span style="font-size: 25px;color:aliceblue;"> {{$user->address}}</span></h5>
						<h5 style="font-family: 'Times New Roman', Times, serif;font-weight:800;font-size:35px;font-style:italic;color:black;padding-bottom:1rem" class="mb-0">Role: <span style="font-size: 25px;color:aliceblue;">{{$user->role}}</span></h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection