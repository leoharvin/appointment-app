<?php

require './classes/db.php';

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $place = $_POST['address'];

    if($fullname == '' || $email == '' || $password == '' || $mobile == '' || $place == ''){
        die('Invalid entry');
    }
    // Database
    DB::query("INSERT INTO users (name, email, password, address, phone) VALUES (:name, :email, :password, :address, :phone)",
               array(":name"=> $fullname, ":email" => $email, ":password"=>$password, ":address"=>$place,":phone"=>$mobile) 
            );
    die("Success");

}


?>


<!DOCTYPE html>
<html lang="en">


<!-- register24:03-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Register - Appointment</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper  account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="./register.php" method="post" class="form-signin">
						<div class="account-logo">
                            <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Fullname</label>
                            <input name="fullname" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input name="email" type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input name="mobile" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address / Place</label>
                            <input name="address" type="text" class="form-control">
                        </div>
                        <div class="form-group checkbox">
                            <label>
                                <input type="checkbox"> I have read and agree the Terms & Conditions
                            </label>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="submit" value="register">
                        </div>
                        <div class="text-center login-link">
                            Already have an account? <a href="login.php">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- register24:03-->
</html>