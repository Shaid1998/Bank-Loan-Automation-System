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
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:10%;">Request Id</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:10%;">Plan</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%;">User</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:10%;">Requested Amount</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:21%;">Commitment</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:10%;">Branch</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%;">REQ Time</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:20%;">Action</th> 
					</tr>
				</thead>
					@foreach ($req as $request)
					<tbody>
						<tr>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:3%;text-align:center;">{{$loop->iteration}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:10%;text-align:center;">{{$request->loan_request_id}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:10%;text-align:center;">{{$request->chosen_loan}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:8%;text-align:center;">{{$request->user_id}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:10%;text-align:center;">{{$request->Amount}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:21%;text-align:center;">{{$request->Commitment}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:10%;text-align:center;">{{$request->branch}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:8%;text-align:center;">{{$request->created_at}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:20%;text-align:center;">
								<a href='{{ route ('employee.loan.request.review',$request->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" id="review" class="btn btn-primary" >REVIEW</a>
								<a href='{{ route ('employee.account.request.delete',$request->id)}}'style="font-family: 'Times New Roman', Times, serif;font-style:bold;font-size:20px;cursor:pointer;color:white;" id="delete" class="btn btn-danger" >DELETE</a>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
		<div class="row">
            {{$req->links('pagination::bootstrap-5') }}
        </div>
	</div>
</div>

@endsection