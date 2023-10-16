@extends('employee.employee_dashboard')
@section('employee')
 

<div class="page-content">
    @include('sweetalert::alert')
	<div >
		<div >
			<div class=" align-items-center">
				<div class="row">
					<div style="width: 50%;padding-top:1.5rem;" class="column"><h5 style="font-family: 'Times New Roman', Times, serif;font-style:italic;font-size:40px;color:rgb(6, 38, 249);text-align:center;" class="mb-0">ACTIVE LOAN</h5></div>
				</div>
			</div>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table align-middle mb-0">
				<thead class="table-light">
					<tr>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:3%;">Sl</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Loan Id</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">User Id</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Amount</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:3%;">Interest rate</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">User Name</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Issued By</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Issue Date</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Expire Date</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Branch</th> 
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:25%;">Action</th> 
					</tr>
				</thead>
					@foreach ($active as $request)
					<tbody>
						<tr>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:3%;text-align:center;">{{$loop->iteration}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$request->loan_distribution_id}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$request->user_id}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$request->loan_amount}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:3%;text-align:center;">{{$request->plan_interest_rate}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$request->user_name}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$request->issued_by}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$request->issue_date}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$request->expire_date}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$request->distribution_branch}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:25%;text-align:center;">
								<a href='{{ route ('admin.loan.inquire',$request->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:15px;cursor:pointer;" id="review" class="btn btn-primary" >INQUIRE</a>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
		<div class="row">
            {{$active->links('pagination::bootstrap-5') }}
        </div>
	</div>
</div>

@endsection