@extends('admin.admin_dashboard')
@section('admin')
 
<div style="background-image: linear-gradient(to bottom right, rgb(234, 255, 0), rgb(22, 241, 241));text-align:center;" class="page-content">
    @include('sweetalert::alert')
	<div class="row">
        <div class="row text-center">
            <div class="column"><h1 style="font-family: 'Times New Roman', Times, serif;background-color:rgb(39, 12, 210);font-size:50px;height:100px;width:100%;text-align:center;padding-top:1rem;color:aliceblue;border:0;border-radius:25px;">MESSAGE TO ME</h1></div>						
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div class=" align-items-center">
                    <div class="row">
                        <div style="width: 50%;padding-top:.5rem;" class="column"><h5 style="font-family: 'Times New Roman', Times, serif;font-style:italic;font-size:40px;color:rgb(6, 38, 249);text-align:center;" class="mb-0">All Incoming Message</h5></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:3%">Sl</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:6%">Sender</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:6%">Reason</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:6%">Reply for</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:44%">Message</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:7%">Date & Time</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:30%">Action</th> 
                        </tr>
                    </thead>
                        @foreach ($receiveMessage as $receiveMessage)
                        <tbody>
                            <tr>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$receiveMessage->id}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$receiveMessage->sender_id}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$receiveMessage->message_for}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$receiveMessage->parent_id}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:47%">{{$receiveMessage->text}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:7%">{{$receiveMessage->created_at}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:30%">
                                    <a href='{{route('admin.send.message',$receiveMessage->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-primary" >REPLY</a>
                                    <a href='{{route('admin.send.message',$receiveMessage->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-danger" >DELETE</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="column"><h1 style="font-family: 'Times New Roman', Times, serif;background-color:rgb(39, 12, 210);font-size:50px;height:100px;width:100%;text-align:center;padding-top:1rem;color:aliceblue;border:0;border-radius:25px;">MESSAGES FROM ME</h1></div>						
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div class=" align-items-center">
                    <div class="row">
                        <div style="width: 50%;padding-top:.5rem;" class="column"><h5 style="font-family: 'Times New Roman', Times, serif;font-style:italic;font-size:40px;color:rgb(6, 38, 249);text-align:center;" class="mb-0">All Outgoing Message</h5></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%">Sl</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%">Receiver</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:47%">Message</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:7%">Date & Time</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:30%">Action</th> 
                        </tr>
                    </thead>
                        @foreach ($sendMessage as $sendMessage)
                        <tbody>
                            <tr>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$sendMessage->id}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$sendMessage->receiver_id}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:47%">{{$sendMessage->text}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:7%">{{$sendMessage->created_at}}</td>
                                <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:30%">
                                    <a href='{{route('admin.send.message',$sendMessage->id)}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-danger" >DELETE</a>
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




@endsection