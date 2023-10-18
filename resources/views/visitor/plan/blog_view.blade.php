@extends('visitor.visitor_dashboard')
@section('visitor')

<div style="background-image: linear-gradient(to bottom right, rgb(68, 0, 255), rgb(0, 255, 26))" class="page-content">
    <div class="row text-center">
        <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-size:50px;color:aliceblue;padding-top:3rem">Title: <span style="color: red">{{$blog->blog_title}}</span></h1>
    </div>
    
    <div class="row">
        <h1 style="font-family: Arial, Helvetica, sans-serif;font-weight:900;font-size:40px;padding:2rem;text-align:center;text-decoration:underline;color:aliceblue">CONTACT</h1>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(240, 247, 117)">Details: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214);padding-top:1rem;padding-left:5rem;padding-right:5rem">{{$blog->blog_details}}</span></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(241, 249, 87)">Publisher: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214);padding: 1rem;padding-right:5rem">{{$blog->blog_posted_by}}</span></h6>
        <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:600;font-size:35px;padding-left:5rem;padding:1rem;color:rgb(241, 249, 87)">Published Date: <span style="font-family: 'Times New Roman', Times, serif;font-weight:400;font-size:25px;padding-left:1rem;color:rgb(136, 244, 214);padding:1rem;padding-bottom:5rem;padding-right:5rem">{{$blog->blog_post_date}}</span></h6>
    </div>

</div>
@endsection