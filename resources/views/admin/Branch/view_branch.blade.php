@extends('admin.admin_dashboard')
@section('admin')

<div style="background-image: linear-gradient(to bottom right, rgb(68, 0, 255), rgb(0, 255, 26))" class="page-content">
    <div class="row text-center">
        <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-size:50px;color:aliceblue">{{$branch->branch_name}}</h1>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
        <a href="{{route('admin.branch.employee.list',$branch->id)}}">
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{$nemp}}</h5>
                            <div class="ms-auto">
                                <i class='fas fa-user fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Employee</p>
                            <p class="mb-0 ms-auto">--<span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{route('admin.branch.customer.list',$branch->id)}}">
            <div class="col">
                <div class="card radius-10 bg-gradient-orange">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{$cust}}</h5>
                            <div class="ms-auto">
                                <i class='fa fa-users fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 77%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">total Customer</p>
                            <p class="mb-0 ms-auto">--<span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{route('admin.branch.active.loan.list',$branch->id)}}">
            <div class="col">
                <div class="card radius-10 bg-gradient-ohhappiness">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{$loan}}</h5>
                            <div class="ms-auto">
                                <i class='fas fa-hand-holding-usd fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 23%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Active Loan Plan</p>
                            <p class="mb-0 ms-auto">--<span><i style="color:red" class='bx bx-down-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
	</div><!--end row-->
    <div class="row">
        <h1 style="font-family: Arial, Helvetica, sans-serif;font-weight:900;font-size:40px;padding:2rem;text-align:center;text-decoration:underline;color:aliceblue">CONTACT</h1>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(240, 247, 117)">Phone: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214)">{{$branch->branch_contact}}</span></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(241, 249, 87)">Email: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214)">{{$branch->branch_email}}</span></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(241, 249, 87)">About: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214)">{{$branch->branch_text}}</span></h6>
    </div>
    <div class="row">
        <h1 style="font-family: Arial, Helvetica, sans-serif;font-weight:900;font-size:40px;padding:2rem;text-align:center;text-decoration:underline;color:aliceblue">HEAD IN CHARGE</h1>
        <div style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:100%;"><img src="{{ asset($head->photo)}}" height="90px" width="90px" /></div>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(240, 247, 117)">Name: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214)">{{$head->name}}</span></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(241, 249, 87)">Email: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214)">{{$head->email}}</span></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(241, 249, 87)">Phone: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214)">{{$head->phone}}</span></h6>
        <a href="{{route('admin.branch.employee.view',$branch->id)}}" class="btn btn-primary" style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;"> Details Head</a>
    </div>
</div>

@endsection