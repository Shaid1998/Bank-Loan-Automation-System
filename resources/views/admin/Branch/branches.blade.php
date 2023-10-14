@extends('admin.admin_dashboard')
@section('admin')
 
<div style="background-image: linear-gradient(to bottom right, rgb(234, 255, 0), rgb(22, 241, 241));text-align:center;" class="page-content">
    @include('sweetalert::alert')
	<div class="row">
        <div class="row text-center">
            <div class="column"><h1 style="font-family: 'Times New Roman', Times, serif;background-color:rgb(39, 12, 210);font-size:50px;height:100px;width:100%;text-align:center;padding-top:1rem;color:aliceblue;border:0;border-radius:25px;">ALL BRANCHES</h1></div>						
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div class=" align-items-center">
                    <div class="row">
                        <div style="width: 50%;padding-top:.5rem;" class="column"><h5 style="font-family: 'Times New Roman', Times, serif;font-style:italic;font-size:40px;color:rgb(6, 38, 249);text-align:center;" class="mb-0">All Branches</h5></div>
                        <div style="width: 50%;padding-top:2rem;padding-left:22rem;" class="column"><a href='{{route('admin.add.branch')}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >ADD NEW BRANCH</a></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%">Sl</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:10%">Photo</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%">Branch ID</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%">Branch Name</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%">Branch Address</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%">Founded</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%">Contact</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%">Email</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%">Head IN Charge</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:27%">Action</th> 
                        </tr>
                    </thead>
                    @foreach ($branch as $b)
                    <tbody>
                        <tr>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$loop->iteration}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:5%;"><img src="{{ asset($b->branch_photo)}}" height="70px" width="70px" /></td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$b->branch_id}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$b->branch_name}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$b->branch_address}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:47%">{{$b->branch_funded_year}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:7%">{{$b->branch_contact}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:7%">{{$b->branch_email}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:7%">{{$b->branch_head}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:30%">
                                <a href='{{route('admin.branch.employee.view',$b->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-primary" >HEAD</a>
                                <a href='{{route('admin.branch.details',$b->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >ALL</a>
                                <a href='{{route('admin.branch.delete',$b->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-danger" >DELETE</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            {{$branch->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>




@endsection