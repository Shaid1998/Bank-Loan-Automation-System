<!doctype html>
<html lang="en">

<head>
	<!-- meta data -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!--font-family-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	
	<!-- title of site -->
	<title>Visitor Home Page</title>

	<!-- For favicon png -->
	<link rel="shortcut icon" type="image/icon" href="{{ asset('assets/logo/favicon.png')}}"/>
   
	<!--font-awesome.min.css-->
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}">

	<!--linear icon css-->
	<link rel="stylesheet" href="{{ asset('assets/css/linearicons.css')}}">

	<!--animate.css-->
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">

	<!--flaticon.css-->
	<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css')}}">

	<!--slick.css-->
	<link rel="stylesheet" href="{{ asset('assets/css/slick.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css')}}">
	
	<!--bootstrap.min.css-->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
	
	<!-- bootsnav -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootsnav.css')}}" >	
	
	<!--style.css-->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
	
	<!--responsive.css-->
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}">
</head>

<body> 
	<!--wrapper-->
	<div class="wrapper">

		<!--start header -->
		@include('visitor.body.visitor_header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('visitor')
		</div>
		<!--end page wrapper -->

 
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('visitor.body.visitor_footer')
	</div>
	<script src="{{ asset('assets/js/jquery.js')}}"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
		
		<!-- bootsnav js -->
		<script src="{{ asset('assets/js/bootsnav.js')}}"></script>

        <!--feather.min.js-->
        <script  src="{{ asset('assets/js/feather.min.js')}}"></script>

        <!-- counter js -->
		<script src="{{ asset('assets/js/jquery.counterup.min.js')}}"></script>
		<script src="{{ asset('assets/js/waypoints.min.js')}}"></script>

        <!--slick.min.js-->
        <script src="{{ asset('assets/js/slick.min.js')}}"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		     
        <!--Custom JS-->
        <script src="{{ asset('assets/js/custom.js')}}"></script>

</body>

</html>