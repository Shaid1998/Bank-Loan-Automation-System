@extends('employee.employee_dashboard')
@section('employee')
 
<div style="background-image: linear-gradient(to bottom right, rgb(234, 255, 0), rgb(22, 241, 241));text-align:center;" class="page-content">
    @include('sweetalert::alert')
	<div class="row">
        <div class="row text-center">
            <div class="column"><h1 style="font-family: 'Times New Roman', Times, serif;background-color:rgb(39, 12, 210);font-size:50px;height:100px;width:100%;text-align:center;padding-top:1rem;color:aliceblue;border:0;border-radius:25px;">ALL MONTHLY LOAN PLAN</h1></div>						
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div class=" align-items-center">
                    <div class="row">
                        <div style="width: 50%;padding-top:.5rem;" class="column"><h5 style="font-family: 'Times New Roman', Times, serif;font-style:italic;font-size:40px;color:rgb(6, 38, 249);text-align:center;" class="mb-0">All Monthly Loan Plan</h5></div>
                        <div style="width: 50%;padding-top:2rem;padding-left:22rem;" class="column"><a href='{{route('employee.loan.plan.add')}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >ADD NEW</a></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:4%">Sl</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%">Loan ID</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%">Loan Type</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%">Branch Name</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%">Loan Duration</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:15%">Loan Description</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:3%">EMI</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:4%">Interest Rate</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%">Added</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%">Updated</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:32%">Action</th> 
                        </tr>
                    </thead>
                        @foreach ($month as $m)
                        <tbody>
                            <tr>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:4%">{{$loop->iteration}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$m->Loan_id}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:5%">{{$m->Loan_type}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$m->branch_name}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:5%">{{$m->loan_duration}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:15%">{{$m->loan_description}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:3%">{{$m->emi}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:4%">{{$m->interest_rate}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$m->created_at}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$m->updated_at}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:32%">
                                    <a href='{{ route ('employee.loan.plan.edit',$m->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-primary" >UPDATE</a>
                                    <a href='{{ route ('employee.loan.plan.delete',$m->id)}}'style="font-family: 'Times New Roman', Times, serif;font-style:bold;font-size:20px;cursor:pointer;color:white;" id="delete" class="btn btn-danger" >DELETE</a>
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
                        <div style="width: 50%;padding-top:2rem;padding-left:22rem;" class="column"><a href='{{route('employee.loan.plan.add')}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >ADD NEW</a></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Sl</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Loan ID</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Loan Type</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Branch Name</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Loan Duration</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Loan Description</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">EMI</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Interest Rate</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Added</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Updated</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Action</th> 
                        </tr>
                    </thead>
                        @foreach ($Year as $y)
                        <tbody>
                            <tr>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:4%">{{$loop->iteration}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$y->Loan_id}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:5%">{{$y->Loan_type}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$y->branch_name}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:5%">{{$y->loan_duration}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:15%">{{$y->loan_description}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:3%">{{$y->emi}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:4%">{{$y->interest_rate}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$y->created_at}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$y->updated_at}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:32%">
                                    <a href='{{ route ('employee.loan.plan.edit',$y->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-primary" >UPDATE</a>
                                    <a href='{{ route ('employee.loan.plan.delete',$y->id)}}'style="font-family: 'Times New Roman', Times, serif;font-style:bold;font-size:20px;cursor:pointer;color:white;" id="delete" class="btn btn-danger" >DELETE</a>
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
                            <div style="width: 50%;padding-top:2rem;padding-left:22rem;" class="column"><a href='{{route('employee.loan.plan.add')}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >ADD NEW</a></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Sl</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Loan ID</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Loan Type</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Branch Name</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Loan Duration</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Loan Description</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">EMI</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Interest Rate</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Added</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Updated</th>
                                <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;">Action</th> 
                            </tr>
                        </thead>
                            @foreach ($multiYear as $multi)
                            <tbody>
                                <tr>
                                    <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:4%">{{$loop->iteration}}</td>
                                    <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$multi->Loan_id}}</td>
                                    <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:5%">{{$multi->Loan_type}}</td>
                                    <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$multi->branch_name}}</td>
                                    <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:5%">{{$multi->loan_duration}}</td>
                                    <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:15%">{{$multi->loan_description}}</td>
                                    <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:3%">{{$multi->emi}}</td>
                                    <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:4%">{{$multi->interest_rate}}</td>
                                    <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$multi->created_at}}</td>
                                    <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$multi->updated_at}}</td>
                                    <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:32%">
                                        <a href='{{ route ('employee.loan.plan.edit',$multi->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-primary" >UPDATE</a>
                                        <a href='{{ route ('employee.loan.plan.delete',$multi->id)}}'style="font-family: 'Times New Roman', Times, serif;font-style:bold;font-size:20px;cursor:pointer;color:white;" id="delete" class="btn btn-danger" >DELETE</a>
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