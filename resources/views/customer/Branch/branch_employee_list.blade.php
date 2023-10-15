@extends('customer.customer_dashboard')
@section('customer')

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
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%;">Sl</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:17%;">Photo</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:17%;">Full Name</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:17%;">Email</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:12%;">Phone</th>
						<th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:23%;">Action</th> 
					</tr>
				</thead>
					@foreach ($nemp as $accData)
					<tbody>
						<tr>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:8%;text-align:center;">{{$loop->iteration}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:17%;text-align:center;"><img src="{{ asset($accData->photo)}}" height="70px" width="70px" /></td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:17%;text-align:center;">{{$accData->name}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:17%;text-align:center;">{{$accData->email}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:12%;text-align:center;">{{$accData->phone}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:23%;text-align:center;">
								<a href='{{route('customer.message.send',$accData->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" id="message" class="btn btn-primary" >MESSAGE</a>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
        <div class="row">
            {{$nemp->links('pagination::bootstrap-5') }}
        </div>
	</div>
</div>

@endsection