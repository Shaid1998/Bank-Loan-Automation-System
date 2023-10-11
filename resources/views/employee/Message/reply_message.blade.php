@extends('employee.employee_dashboard')
@section('employee')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    @include('sweetalert::alert') 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Message</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Type Here</li>
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
                            <form id="myForm" method="post" action="{{route('employee.send.message.reply.store')}}">
                                @csrf
                                <input type="hidden" name="id"  >
                                        
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Message</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <textarea type="text" name="text" id="myForm" class="form-control" placeholder="message....."></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Receiver</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" name="receiver_id" class="form-control" value="{{$message->sender_id}}" />
									</div>
								</div>

                                <div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Parent Message</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" name="parent_id" class="form-control" value="{{$message->message_id}}" />
									</div>
								</div>

                                <div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Reason</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" name="message_for" class="form-control" value="{{$message->message_id}}" />
									</div>
								</div>
                                
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="REPLY" />
                                    </div>
                                </div>
                            </div>
		                </form>
	                </div>
		        </div>
			</div>
		</div>
	</div>
</div>

@endsection