@extends('admin.admin_dashboard')
@section('admin')

 

<div class="page-content">
    @include('sweetalert::alert')
	<div class="card radius-10">
		<div class="card-body">
			<div class=" align-items-center">
				<div class="row">
					<div style="width: 50%;padding-top:1.5rem;" class="column"><h5 style="font-family: 'Times New Roman', Times, serif;font-style:italic;font-size:40px;color:rgb(6, 38, 249);text-align:center;" class="mb-0">{{$branchn}} &nbsp; Branch Employee</h5></div>
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
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%;">Phone</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:10%;">Address</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">User ID</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Join Date</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:6%;">Branch</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:33%;">Action</th> 
					</tr>
				</thead>
					@foreach ($ncus as $accData)
					<tbody>
						<tr>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:3%;">{{$loop->iteration}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;"><img src="{{ asset($accData->photo)}}" height="70px" width="70px" /></td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:10%;">{{$accData->name}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:10%;">{{$accData->email}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;">{{$accData->username}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:8%;">{{$accData->phone}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:10%;">{{$accData->address}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;">{{$accData->user_id}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;">{{$accData->created_at}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:6%;">{{$accData->branch}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:33%;">
								<a href='{{route('admin.branch.employee.message.send',$accData->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" id="message" class="btn btn-primary" >MESSAGE</a>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
        <div class="row">
            {{$ncus->links('pagination::bootstrap-5') }}
        </div>
	</div>
</div>


@endsection