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
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Sl</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Review Id</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Reviewer Id</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Reviewer Name</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:50%;">Review</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%;">Date</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:25%;">Action</th> 
					</tr>
				</thead>
					@foreach ($review as $rev)
					<tbody>
						<tr>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$loop->iteration}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$rev->review_id}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$rev->reviewer_id}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$rev->reviewer_name}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:50%;text-align:center;">{{$rev->review}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;text-align:center;">{{$rev->date}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:25%;text-align:center;">
								<a href='{{ route ('admin.customer.review.delete',$rev->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:15px;cursor:pointer;" id="review" class="btn btn-primary" >DELETE</a>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
		<div class="row">
            {{$review->links('pagination::bootstrap-5') }}
        </div>
	</div>
</div>

@endsection