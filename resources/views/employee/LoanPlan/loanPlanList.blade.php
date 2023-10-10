@extends('employee.employee_dashboard')
@section('employee')
 
<div style="background-image: linear-gradient(to bottom right, rgb(234, 255, 0), rgb(22, 241, 241));text-align:center;" class="page-content">
	<div class="row">
        <div class="row text-center">
            <div class="column"><h1 style="font-family: 'Times New Roman', Times, serif;background-color:rgb(39, 12, 210);font-size:50px;height:100px;width:100%;text-align:center;padding-top:1rem;color:aliceblue;border:0;border-radius:25px;">ALL MONTHLY LOAN PLAN</h1></div>						
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div class=" align-items-center">
                    <div class="row">
                        <div style="width: 50%;padding-top:.5rem;" class="column"><h5 style="font-family: 'Times New Roman', Times, serif;font-style:italic;font-size:40px;color:rgb(6, 38, 249);text-align:center;" class="mb-0">All Monthly Loan Plan</h5></div>
                        <div style="width: 50%;padding-top:2rem;padding-left:22rem;" class="column"><a href='#' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >ADD NEW</a></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Sl</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Photo</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Name</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Email</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Status</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">join Date</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Payment Information</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Action</th> 
                        </tr>
                    </thead>
                        @foreach ($month as $allworker)
                        <tbody>
                            <tr>
                                <td>{{$allworker->id}}</td>
                                <td><img src="{{ asset($allworker->photo)}}" height="70px" width="70px" /></td>
                                <td>{{$allworker->name}}</td>
                                <td>{{$allworker->email}}</td>
                                <td>{{$allworker->status}}</td>
                                <td>{{$allworker->created_at}}</td>
                                <td>{{$allworker->payment_info}}</td>
                                <td>
                                    <a href='#' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >UPDATE</a>
                                    <a href='#'style="font-family: 'Times New Roman', Times, serif;font-style:bold;font-size:20px;cursor:pointer;color:white;" id="delete" class="btn btn-danger" >DELETE</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="column"><h1 style="font-family: 'Times New Roman', Times, serif;background-color:rgb(39, 12, 210);font-size:50px;height:100px;width:100%;text-align:center;padding-top:1rem;color:aliceblue;border:0;border-radius:25px;">ALL YEARLY LOAN PLAN</h1></div>						
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div class=" align-items-center">
                    <div class="row">
                        <div style="width: 50%;padding-top:.5rem;" class="column"><h5 style="font-family: 'Times New Roman', Times, serif;font-style:italic;font-size:40px;color:rgb(6, 38, 249);text-align:center;" class="mb-0">All Yearly Loan Plan</h5></div>
                        <div style="width: 50%;padding-top:2rem;padding-left:22rem;" class="column"><a href='#' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >ADD NEW</a></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Sl</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Photo</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Name</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Email</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Status</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">join Date</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Payment Information</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Action</th> 
                        </tr>
                    </thead>
                        @foreach ($Year as $allworker)
                        <tbody>
                            <tr>
                                <td>{{$allworker->id}}</td>
                                <td><img src="{{ asset($allworker->photo)}}" height="70px" width="70px" /></td>
                                <td>{{$allworker->name}}</td>
                                <td>{{$allworker->email}}</td>
                                <td>{{$allworker->status}}</td>
                                <td>{{$allworker->created_at}}</td>
                                <td>{{$allworker->payment_info}}</td>
                                <td>
                                    <a href='#' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >UPDATE</a>
                                    <a href='#'style="font-family: 'Times New Roman', Times, serif;font-style:bold;font-size:20px;cursor:pointer;color:white;" id="delete" class="btn btn-danger" >DELETE</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row text-center">
                <div class="column"><h1 style="font-family: 'Times New Roman', Times, serif;background-color:rgb(39, 12, 210);font-size:50px;height:100px;width:100%;text-align:center;padding-top:1rem;color:aliceblue;border:0;border-radius:25px;">ALL MULTI-YEARLY LOAN PLAN</h1></div>						
            </div>
            <div class="card radius-10">
                <div class="card-body">
                    <div class=" align-items-center">
                        <div class="row">
                            <div style="width: 50%;padding-top:.5rem;" class="column"><h5 style="font-family: 'Times New Roman', Times, serif;font-style:italic;font-size:40px;color:rgb(6, 38, 249);text-align:center;" class="mb-0">Multi-Yearly Loan Plan</h5></div>
                            <div style="width: 50%;padding-top:2rem;padding-left:22rem;" class="column"><a href='#' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >ADD NEW</a></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Sl</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Photo</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Name</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Email</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Status</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">join Date</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Payment Information</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Action</th> 
                            </tr>
                        </thead>
                            @foreach ($multiYear as $allworker)
                            <tbody>
                                <tr>
                                    <td>{{$allworker->id}}</td>
                                    <td><img src="{{ asset($allworker->photo)}}" height="70px" width="70px" /></td>
                                    <td>{{$allworker->name}}</td>
                                    <td>{{$allworker->email}}</td>
                                    <td>{{$allworker->status}}</td>
                                    <td>{{$allworker->created_at}}</td>
                                    <td>{{$allworker->payment_info}}</td>
                                    <td>
                                        <a href='#' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >UPDATE</a>
                                        <a href='#'style="font-family: 'Times New Roman', Times, serif;font-style:bold;font-size:20px;cursor:pointer;color:white;" id="delete" class="btn btn-danger" >DELETE</a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection