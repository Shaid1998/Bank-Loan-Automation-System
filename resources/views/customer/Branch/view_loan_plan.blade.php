@extends('customer.customer_dashboard')
@section('customer')

<div style="background-image: linear-gradient(to bottom right, rgb(68, 0, 255), rgb(0, 255, 26))" class="page-content">
    <div class="row text-center">
        <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-size:50px;color:aliceblue">BRANCH NAME: <span style="font-family: Arial, Helvetica, sans-serif;font-size:50px;text-transform:uppercase;color:rgb(242, 79, 19)">{{$lplan->branch_name}}</h1>
    </div>
    
    <div class="row">
        <h1 style="font-family: Arial, Helvetica, sans-serif;font-weight:900;font-size:40px;padding:2rem;text-align:center;text-decoration:underline;color:aliceblue">ABOUT PLAN</h1>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(240, 247, 117)">Loan ID: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$lplan->Loan_id}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">Loan Type: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$lplan->Loan_type}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">Branch: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$lplan->branch_name}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">Loan Duration Type: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$lplan->loan_duration}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">Loan Description: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$lplan->loan_description}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">EMI : <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$lplan->emi}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">Interest Rate: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$lplan->interest_rate}}" readonly /></h6>
        <div style="padding-left: 2rem;padding-right:1rem;padding-top:2rem;padding-bottom:3rem" class="row">
            <div style="width: 50%;padding-left: 1rem;padding-right:1rem" class="column"><a href="{{route('customer.apply.loan',$lplan->id)}}" style="width: 95%;font-size:40px;border:0;border-radius:55px;" class="btn btn-primary">APPLY</a></div>
            <div style="width: 50%;padding-left: 1rem;padding-right:1rem" class="column"><a href="#" style="width: 95%;font-size:40px;border:0;border-radius:55px;"  class="btn btn-warning">INQUIRY</a></div>
        </div>
    </div>

</div>

@endsection