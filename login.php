<?php

require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Ping Server Login</title>
    <!-- Favicon-->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.min.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="../"> PING Server Login </a>
        </div>
        <div class="card">
            <div class="body">
                <form id="login" method="POST">
                    <div class="msg">Please login to continue</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group" id="response"></div>
                    <div class="row">
							
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="login">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


 
</body>

</html>

<?php
if(isset($_POST['login'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$select_user="select * from user where email='$email' and password='$password'";
	$run_query=mysqli_query($connect,$select_user);
	$check_user=mysqli_num_rows($run_query);
	if($check_user==0){
		echo"<script>alert('Password or Email is incorrect')</script>";
		exit();
	}
	else{
		$_SESSION['email']=$email;
		echo"
		
		
		<script>alert('Correct')</script>
		<script>window.open('ip_list.php','_self')</script>";
		
		
	}
	
	
}

?>