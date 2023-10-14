@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
    @include('sweetalert::alert')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">BRANCH HEAD</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <a href="{{route('admin.branch.employee.message.send',$head->id)}}" class="btn btn-primary" aria-current="page">Message</a>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">		 
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <img style="width:100px;height:100px;" src="{{ asset($head->photo)}}"/>    
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;" class="mb-0">Name :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;color:blue;">{{$head->name}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;" class="mb-0">User Id :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;color:blue;">{{$head->user_id}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;" class="mb-0">Username :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;color:blue;">{{$head->username}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;" class="mb-0">Email :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;color:blue;">{{$head->email}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;" class="mb-0">Phone :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;color:blue;">{{$head->phone}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;" class="mb-0">Address :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;color:blue;">{{$head->address}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;" class="mb-0">Designation :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;color:blue;">{{$head->role}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;" class="mb-0">Branch :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-style:italic;font-size:20px;color:blue;">{{$head->branch}}</h1>
                                </div>
                            </div>
                        </div>
	                </div>
		        </div>
			</div>
		</div>
	</div>
</div>

@endsection