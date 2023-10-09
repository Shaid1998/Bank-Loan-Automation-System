<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Customer Register Form</title>
</head>
<body>
    @include('sweetalert::alert')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('welcome')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Create an Account</h1>
                                            <p class="mb-30">Already have an account? <a href="{{route('customer.login')}}">Login</a></p>
                                        </div>
                                        <form method="post" action="{{route('cus.data.to.employee')}}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <input type="text"  name="name" placeholder="Full Name" required/>
                                                <span style="color: red;">@error('name'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text"  name="username" placeholder="Username" required/>
                                                <span style="color: red;">@error('username'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <input type="email"  name="email" placeholder="Email" required/>
                                                <span style="color: red;">@error('email'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <input type="phone"  name="phone" placeholder="Phone" required/>
                                                <span style="color: red;">@error('phone'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="Password" required/>
                                                <span style="color: red;">@error('password'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="address" placeholder="Address" required/>
                                                <span style="color: red;">@error('address'){{$message}}@enderror</span>
                                            </div>
                                
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Photo</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="file" name="photo" class="form-control"  id="image" required  />
                                                    <span style="color: red;">@error('photo'){{$message}}@enderror</span>
                                                </div>
                                            </div>
            
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0"> </h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <img id="showImage"  alt="my photo" style="width:100px; height: 100px;"  >
                                                </div>
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">Submit</button>
                                            </div>
                                            <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        photo_title: {required : true,}, 
                        photo_text: {required : true,}, 
                        photo: {required : true,}, 
                    },
                    messages :{
                        photo_title: {required : 'Please enter a photo title',}, 
                        photo_text: {required : 'Please enter a photo text',}, 
                        photo: {required : 'Please upload a photo',}, 
                    },
                    errorElement : 'span', 
                    errorPlacement: function (error,element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight : function(element, errorClass, validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight : function(element, errorClass, validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });
            
        </script>
        
        
        
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        
        
        </script>
    </main>
</body>
</html>