@extends('employee.employee_dashboard')
@section('employee')
 

<div class="page-content">
    @include('sweetalert::alert')
	<div class="card radius-10">
		<div class="card-body">
			<div class=" align-items-center">
				<div class="row">
					<div style="width: 50%;padding-top:1.5rem;" class="column"><h5 style="font-family: 'Times New Roman', Times, serif;font-style:italic;font-size:40px;color:rgb(6, 38, 249);text-align:center;" class="mb-0">ALL ACCOUNTS REQUESTS</h5></div>
				</div>
			</div>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table align-middle mb-0">
				<thead class="table-light">
					<tr>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:3%;">Sl</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Photo</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:10%;">Full Name</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:10%;">Email</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Username</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:10%;">Password</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%;">Phone</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:10%;">Address</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%;">Request ID</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%;">REQ Time</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:33%;">Action</th> 
					</tr>
				</thead>
					@foreach ($accData as $acc)
					<tbody>
						<tr>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:3%;">{{$loop->iteration}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;"><img src="{{ asset($acc->req_photo)}}" height="70px" width="70px" /></td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:10%;">{{$acc->req_full_name}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:10%;">{{$acc->req_email}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;">{{$acc->req_username}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:10%;">{{$acc->req_password}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:8%;">{{$acc->req_phone}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:10%;">{{$acc->req_address}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:8%;">{{$acc->req_user_id}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:8%;">{{$acc->created_at}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:33%;">
								<a href='{{ route ('employee.account.request.review',$acc->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" id="review" class="btn btn-primary" >REVIEW</a>
								<a href='{{ route ('employee.account.request.delete',$acc->id)}}'style="font-family: 'Times New Roman', Times, serif;font-style:bold;font-size:20px;cursor:pointer;color:white;" id="delete" class="btn btn-danger" >DELETE</a>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
		<div class="row">
            {{$accData->links('pagination::bootstrap-5') }}
        </div>
	</div>
</div>

@endsection