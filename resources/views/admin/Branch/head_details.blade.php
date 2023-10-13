@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
    @include('sweetalert::alert')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">ADD NEW LOAN PLAN</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">NEW PLAN</li>
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
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1>{{$head->name}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">User Id :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1>{{$head->user_id}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Username :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1>{{$head->username}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1>{{$head->email}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1>{{$head->phone}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1>{{$head->address}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Designation :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1>{{$head->role}}</h1>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Branch :</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <h1>{{$head->branch}}</h1>
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