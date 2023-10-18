@extends('visitor.visitor_dashboard')
@section('visitor')

<div style="background-image: linear-gradient(to bottom right, rgb(68, 0, 255), rgb(0, 255, 26))" class="page-content">
    <div class="row text-center">
        <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-size:50px;color:aliceblue;padding-top:3rem">Loan ID: <span style="color: red">{{$plan->Loan_id}}</span></h1>
    </div>
    
    <div style="padding-left: 10rem" class="row">
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(240, 247, 117)">Loan Type: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214);padding-top:1rem;padding-left:5rem;padding-right:5rem">{{$plan->Loan_type}}</span></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(241, 249, 87)">Branch name: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214);padding: 1rem;padding-right:5rem">{{$plan->branch_name}}</span></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(241, 249, 87)">Loan Duration: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214);padding:1rem;padding-right:5rem">{{$plan->loan_duration}}</span></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(241, 249, 87)">Loan Description: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214);padding:1rem;padding-right:5rem">{{$plan->loan_description}}</span></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(241, 249, 87)">Emi: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214);padding:1rem;padding-right:5rem">{{$plan->emi}}</span></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(241, 249, 87)">Interest rate: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214);padding:1rem;padding-bottom:5rem;padding-right:5rem">{{$plan->interest_rate}}</span></h6>
    </div>
    <div class="row">
        <div style="width: 50%;padding-bottom:5rem;text-align:center;" class="col-md-6 col-sm-6">
            <a href="{{route('customer.login')}}" style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-size:25px;padding-left:10rem;padding-right:10rem;" class="btn btn-info">Login for apply</a>
        </div>
        <div style="width: 50%;padding-bottom:5rem;text-align:center;" class="col-md-6 col-sm-6">
            <a style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-size:25px;padding-left:10rem;padding-right:10rem;" class="btn btn-primary"> inquire</a>
        </div>
    </div>

</div>
@endsection