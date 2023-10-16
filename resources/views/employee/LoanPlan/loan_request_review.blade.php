@extends('employee.employee_dashboard')
@section('employee')
 

<div style="background-image: linear-gradient(to bottom right, rgb(68, 0, 255), rgb(0, 255, 26))" class="page-content">
    <div class="row text-center">
        <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-size:50px;color:aliceblue">BRANCH NAME: <span style="font-family: Arial, Helvetica, sans-serif;font-size:50px;text-transform:uppercase;color:rgb(242, 79, 19)">{{$loanbranch->branch}}</h1>
    </div>
    
    <div class="row">
        <h1 style="font-family: Arial, Helvetica, sans-serif;font-weight:900;font-size:40px;padding:2rem;text-align:center;text-decoration:underline;color:aliceblue">REQUEST DETAILS</h1>
        <h1 style="font-family: Arial, Helvetica, sans-serif;font-weight:900;font-size:30px;padding:1rem;text-align:center;text-decoration:underline;color:rgb(237, 253, 91)">User Details</h1>
		<img style="width: 30%;text-align:center;" src="{{ asset($user->photo)}}" height="70px" width="70px" />
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(240, 247, 117)">User Name: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$user->name}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">User Email: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$user->email}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">User Branch: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$user->branch}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">User Phone: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$user->phone}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">User Address: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$user->address}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">Role : <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$user->role}}" readonly /></h6>
        <h1 style="font-family: Arial, Helvetica, sans-serif;font-weight:900;font-size:30px;padding-top:3rem;text-align:center;text-decoration:underline;color:rgb(237, 253, 91)">Plan Details</h1>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">Chosen Plan: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$loan->Loan_id}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">Loan Type: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$loan->Loan_type}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">Loan Duration: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$loan->loan_duration}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">Available Branch: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$loan->branch_name}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">Description: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$loan->loan_description}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">EMI: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$loan->emi}}" readonly /></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;color:rgb(241, 249, 87)">Interest Rate: <input style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(13, 13, 224);border:0;border-radius:25px" value="{{$loan->interest_rate}}" readonly /></h6>
        <div style="padding-left: 2rem;padding-right:1rem;padding-top:2rem;padding-bottom:3rem" class="row">
            <div style="width: 50%;padding-left: 1rem;padding-right:1rem" class="column"><a href="{{route('employee.loan.request.accept',$loanbranch->id)}}" style="width: 95%;font-size:40px;border:0;border-radius:55px;" class="btn btn-primary">ACCEPT</a></div>
            <div style="width: 50%;padding-left: 1rem;padding-right:1rem" class="column"><a href="{{route('customer.loan.inquiery',$user->id)}}" style="width: 95%;font-size:40px;border:0;border-radius:55px;"  class="btn btn-danger">REJECT</a></div>
        </div>
    </div>

</div>

@endsection