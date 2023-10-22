<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/icon" href="{{ asset('assets/logo/favicon.png')}}"/>
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

                                            <div style="padding: 1rem;" class="form-group">
                                                <select name='branch' required>
                                                    <option style="font-family: 'Times New Roman', Times, serif;color:black" value="">Select Branch</option>
                                                    <option style="font-family: 'Times New Roman', Times, serif;color:black" value="dhaka">Dhaka</option>
                                                    <option style="font-family: 'Times New Roman', Times, serif;color:black" value="khulna">Khulna</option>
                                                    <option style="font-family: 'Times New Roman', Times, serif;color:black" value="rajshahi">rajshahi</option>
                                                    <option style="font-family: 'Times New Roman', Times, serif;color:black" value="chittagang">chittagang</option>
                                                </select>
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
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">Submit</button>
                                                </div>
                                            </div>
                                            <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                        </form>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <h6 style="font-family: 'Times New Roman', Times, serif;font-weight:900;font-size:20px;text-align:right;padding-top:1rem;color:rgb(242, 248, 89);">Do you have already account?</h6>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <a href="{{route('customer.login')}}" class="btn btn-success">Login</a>
                                            </div>
                                            
                                        </div>
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
                        name: {required : true,}, 
                        username: {required : true,}, 
                        email: {required : true,}, 
                        password: {required : true,}, 
                        phone: {required : true,}, 
                        address: {required : true,}, 
                        photo: {required : true,}, 
                        branch: {required : true,},  
                    },
                    messages :{
                        name: {required : 'Please enter a name',}, 
                        username: {required : 'Please enter a username',}, 
                        email: {required : 'Please enter a email',}, 
                        password: {required : 'Please enter a password',}, 
                        phone: {required : 'Please enter a phone',},
                        address: {required : 'Please enter a address',}, 
                        branch: {required : 'Please enter a branch',}, 
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