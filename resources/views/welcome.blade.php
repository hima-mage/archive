<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>:: Archive ::</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Baxster Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="/assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link rel="icon" href="favicon.ico" type="image/x-icon" >
<!-- font-awesome icons -->
<link href="/assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!-- js -->
<script src="/assets/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
</head> 
<body class="login-bg">

        <div class="row">
				<div class="col-md-6" style="margin-right: 5%; margin-top: -5%;">
					<img src="/assets/images/loglon.png" style="width: 10%;" >
				</div>
	
			</div>
	
		
		<div class="login-body">
			<div class="login-heading">
				<h1>Login Archive </h1>
			</div>
			<div class="login-info">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
						<div class="col-md-11">
							<input type="text" class="user" name="email" id="email" type="email" placeholder="Email" required="">
                        </div>
						<div class="col-md-1" style="margin-top:14px">
                            <i class="fa fa-user"></i>
                        </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
					</div>
                    
                    <div class="row">
						<div class="col-md-11">
							<input type="password" id="password" name="password" class="lock" placeholder="Password">
						</div>
						<div class="col-md-1" style="margin-top:14px">
                            <i class="fa fa-key"></i>
                        </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
					</div>
                    
                    <div class="forgot-top-grids">
                        <div class="forgot-grid">
                            <ul>
                                <li>
                                    <input type="checkbox" id="brand1" value="">
                                    <label for="brand1"><span></span>Remember me</label>
                                </li>
                            </ul>
                        </div>
                        <div class="forgot">
							@if (Route::has('password.request'))
							<a class="btn btn-link" href="{{ route('password.request') }}">
								{{ __('Forgot Password?') }}
							</a>
							@endif
                        </div>
                        <div class="clearfix"> </div>
					</div>
					
					<input type="submit" name="Sign In" value="Login">
                    <div class="signup-text">
						<a href="signup.html">Don't have an account? Create one now</a>
					</div>
                </form>
    		</div>
		</div>
		<div class="go-back login-go-back">
			<a href="index.html">Go To Home</a>
		</div>
		<div class="copyright login-copyright">
			<p>© 2018 Archive . All Rights Reserved . Design by <a href="http://dohapp.com/">Dohapp</a></p> 
		</div>
</body>
</html>