@extends('customer.customer_dashboard')
@section('customer')
 
<div style="background-image: linear-gradient(to bottom right, rgb(234, 255, 0), rgb(22, 241, 241));text-align:center;" class="page-content">
    @include('sweetalert::alert')
	<div class="row">
        <div class="row text-center">
            <div class="column"><h1 style="font-family: 'Times New Roman', Times, serif;background-color:rgb(39, 12, 210);font-size:50px;height:100px;width:100%;text-align:center;padding-top:1rem;color:aliceblue;border:0;border-radius:25px;">ALL ACTIVE LOAN PLAN</h1></div>						
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div class=" align-items-center">
                    <div class="row">
                        <div style="width: 50%;padding-top:.5rem;" class="column"><h5 style="font-family: 'Times New Roman', Times, serif;font-style:italic;font-size:40px;color:rgb(6, 38, 249);text-align:center;" class="mb-0">{{$branchn}} &nbsp; Branch All Loan Plan</h5></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:3%">Sl</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:6%">Loan ID</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%">Loan Type</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%">Loan Duration</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:40%">Loan Description</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:3%">EMI</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:4%">Interest Rate</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:4%">Duration</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:30%">Action</th> 
                        </tr>
                    </thead>
                    @foreach ($lplan as $m)
                    <tbody>
                        <tr>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:3%;text-align:center;">{{$loop->iteration}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:6%;text-align:center;">{{$m->Loan_id}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:5%;text-align:center;">{{$m->Loan_type}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:5%;text-align:center;">{{$m->loan_duration}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:40%;text-align:center;">{{$m->loan_description}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:3%;text-align:center;">{{$m->emi}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:4%;text-align:center;">{{$m->interest_rate}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:4%;text-align:center;">{{$m->loan_duration}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:30%;text-align:center;">
                                <a href='{{route('customer.active.loan.plan.info',$m->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-primary" >INFO</a>
                                <a href='{{route('customer.apply.loan',$m->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >APPLY</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            {{$lplan->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>




@endsection