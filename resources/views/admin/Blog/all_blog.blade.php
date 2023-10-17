@extends('admin.admin_dashboard')
@section('admin')
<div style="background-image: linear-gradient(to bottom right, rgb(234, 255, 0), rgb(22, 241, 241));text-align:center;" class="page-content">
    @include('sweetalert::alert')
	<div class="row">
        <div class="row text-center">
            <div class="column"><h1 style="font-family: 'Times New Roman', Times, serif;background-color:rgb(39, 12, 210);font-size:50px;height:100px;width:100%;text-align:center;padding-top:1rem;color:aliceblue;border:0;border-radius:25px;">ALL BLOG</h1></div>						
        </div>
        <div >
            <div >
                <div class=" align-items-center">
                    <div class="row">
                        <div style="width: 50%;padding-top:.5rem;" class="column"><h5 style="font-family: 'Times New Roman', Times, serif;font-style:italic;font-size:40px;color:rgb(6, 38, 249);text-align:center;" class="mb-0">All Blog</h5></div>
                        <div style="width: 50%;padding-top:2rem;padding-left:22rem;" class="column"><a href='{{route('admin.add.branch')}}' style="font-family: 'Times New Roman', Times, serif;font-style:bold;color:white;font-size:20px;cursor:pointer;" class="btn btn-success" >ADD NEW BLOG</a></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:3%">Sl</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:10%">Photo</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%">Blog ID</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:8%">Blog Title</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:57%">Blog Details</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%">Post Date</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:5%">Posted By</th>
                            <th style="font-family: 'Times New Roman', Times, serif;font-size:15px;text-align:center;width:15%">Action</th> 
                        </tr>
                    </thead>
                    @foreach ($blog as $b)
                    <tbody>
                        <tr>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:2%">{{$loop->iteration}}</td>
							<td style="font-family: 'Times New Roman', Times, serif;font-size:15px;font-weight:300;width:10%;"><img src="{{ asset($b->blog_image)}}" height="70px" width="70px" /></td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:5%">{{$b->blog_id}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:8%">{{$b->blog_title}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:57%">{{$b->blog_details}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:5%">{{$b->blog_post_date}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:5%">{{$b->blog_posted_by}}</td>
                            <td style="font-family: 'Times New Roman', Times, serif;font-size:18px;width:15%">
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
            {{$blog->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@endsection