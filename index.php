<?php
require_once './classes/db.php';
require './classes/login.php';

// Login check
if(!Login::isLoggedIn()){
    header('location:./login.php');
}

$bookings = DB::query("SELECT * FROM bookings WHERE date=CURDATE()");

$booked = DB::query("SELECT COUNT(*) FROM bookings WHERE date = CURDATE()")[0][0];
$total = 6;
$remaining = $total - $booked;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Booking</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Book your slot</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <!-- <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">3</span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    
                                </li>
                                <li class="notification-message">
                                    
                                </li>
                                <li class="notification-message">
                                  
                                </li>
                                <li class="notification-message">
                                    
                                </li>
                                <li class="notification-message">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a>
                </li>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>Admin</span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
						<a class="dropdown-item" href="settings.html">Settings</a>
						<a class="dropdown-item" href="login.html">Logout</a>
					</div>
                </li>
            </ul> -->
            <!-- <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div> -->
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						<li>
                            <a href="view-report.php"><i class="fa fa-file"></i> <span>Report</span></a>
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
                        
                        <!-- <li class="menu-title">Extras</li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-columns"></i> <span>Pages</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="login.html"> Login </a></li>
                                <li><a href="register.html"> Register </a></li>
                                <li><a href="forgot-password.html"> Forgot Password </a></li>
                                <li><a href="change-password2.html"> Change Password </a></li>
                                <li><a href="lock-screen.html"> Lock Screen </a></li>
                            </ul>
                        </li> -->
                       
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<!-- <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span> -->
							<div class="dash-widget-info text-right">
								<h3><?php echo $total; ?></h3>
								<span class="widget-title1">Total <i class="fa fa-check" aria-hidden="true"></i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <!-- <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span> -->
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $booked; ?></h3>
                                <span class="widget-title2">Booked <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <!-- <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span> -->
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $remaining; ?></h3>
                                <span class="widget-title3">Remaining <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>618</h3>
                                <span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div> -->
                </div>
				
				
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="appointments.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead class="d-none">
											<tr>
												<th>Appointment ID</th>
												<th>Name</th>
                                                <th>Slot</th>
												<th>Date</th>
											</tr>
										</thead>
										<tbody>

                                        <?php 
                                            foreach($bookings as $booking){
                                                echo '<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.html">'.substr($booking['name'], 0, 2).'</a>
													<h2><a href="profile.html">'.$booking['name'].'</a></h2>
												</td>                 
												<td>
													<h5 class="time-title p-0">Appointment Date</h5>
													<p>'.$booking['date'].'</p>
												</td>
												<td>
													<h5 class="time-title p-0">Timing</h5>
													<p>'.$booking['slot'].'</p>
												</td>
											</tr>
                                                ';
                                            }
                                        
                                        ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
                    <!-- <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
							<div class="card-header bg-white">
								<h4 class="card-title mb-0">Doctors</h4>
							</div>
                            <div class="card-body">
                                <ul class="contact-list">
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">John Doe</span>
                                                <span class="contact-date">MBBS, MD</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status offline"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">Richard Miles</span>
                                                <span class="contact-date">MD</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status away"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">John Doe</span>
                                                <span class="contact-date">BMBS</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">Richard Miles</span>
                                                <span class="contact-date">MS, MD</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status offline"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">John Doe</span>
                                                <span class="contact-date">MBBS</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status away"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">Richard Miles</span>
                                                <span class="contact-date">MBBS, MD</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="doctors.html" class="text-muted">View all Doctors</a>
                            </div>
                        </div>
                    </div> -->
				</div>
				<!-- <div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">New Patients </h4> <a href="patients.html" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-block">
								<div class="table-responsive">
									<table class="table mb-0 new-patient-table">
										<tbody>
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
													<h2>John Doe</h2>
												</td>
												<td>Johndoe21@gmail.com</td>
												<td>+1-202-555-0125</td>
												<td><button class="btn btn-primary btn-primary-one float-right">Fever</button></td>
											</tr>
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
													<h2>Richard</h2>
												</td>
												<td>Richard123@yahoo.com</td>
												<td>202-555-0127</td>
												<td><button class="btn btn-primary btn-primary-two float-right">Cancer</button></td>
											</tr>
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
													<h2>Villiam</h2>
												</td>
												<td>Richard123@yahoo.com</td>
												<td>+1-202-555-0106</td>
												<td><button class="btn btn-primary btn-primary-three float-right">Eye</button></td>
											</tr>
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
													<h2>Martin</h2>
												</td>
												<td>Richard123@yahoo.com</td>
												<td>776-2323 89562015</td>
												<td><button class="btn btn-primary btn-primary-four float-right">Fever</button></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-4">
						<div class="hospital-barchart">
							<h4 class="card-title d-inline-block">Hospital Management</h4>
						</div>
						<div class="bar-chart">
							
							<div class="chart clearfix">
								<div class="item">
									
								</div>
								<div class="item">
									
								</div>
								<div class="item">
									
								</div>
								<div class="item">
									
								</div>
								<div class="item">
									
								</div>
							</div>
						</div>
					 </div>
				</div> -->
            </div>
            <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            <li>
                                <a href="chat.html">
                                   
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                   
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                  
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                   
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                   
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                   
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                   
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                   
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                 
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="chat.html">See all messages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>



</html>