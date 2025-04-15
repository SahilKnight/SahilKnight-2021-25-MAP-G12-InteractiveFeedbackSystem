<?php
// Start the session at the very beginning
session_start();

// Include the database configuration file
require('dbconfig.php'); 


$login_err = ""; 
$faculty_login_err = "";


if (isset($_POST['login_save'])) {
    $email = isset($_POST['e']) ? trim($_POST['e']) : '';
    $password = isset($_POST['p']) ? $_POST['p'] : ''; 

    if (empty($email) || empty($password)) {
        $login_err = "<font color='red'>Please fill in both email and password.</font>";
    } else {
        $hashed_password = md5($password); 
        $sql_query = "SELECT * FROM user WHERE email=? AND pass=?";
        $stmt = mysqli_prepare($conn, $sql_query);
        
        if ($stmt) {
             mysqli_stmt_bind_param($stmt, "ss", $email, $hashed_password);
             mysqli_stmt_execute($stmt);
             $result = mysqli_stmt_get_result($stmt);
             $num_rows = mysqli_num_rows($result);
             mysqli_stmt_close($stmt); 

             if ($num_rows == 1) {
                 $_SESSION['user'] = $email; 
                 header('Location: user'); 
                 exit; 
             } else {
                 $login_err = "<font color='red'>Invalid login details.</font>";
             }
        } else {
             $login_err = "<font color='red'>Database error. Please try again later.</font>";
        }
    }
} 


if (isset($_POST['faculty_login_save'])) {
    
    $faculty_email = isset($_POST['f_e']) ? trim($_POST['f_e']) : ''; 
    $faculty_password = isset($_POST['f_p']) ? $_POST['f_p'] : ''; 

    if (empty($faculty_email) || empty($faculty_password)) {
        $faculty_login_err = "<font color='red'>Please fill in both email and password.</font>";
    } else {
     
        $sql_query = "SELECT * FROM faculty WHERE email=?";
        $stmt = mysqli_prepare($conn, $sql_query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $faculty_email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($faculty = mysqli_fetch_assoc($result)) {
         
                if ($faculty_password === $faculty['password']) { 
                
                    $_SESSION['faculty_login'] = $faculty_email; 
                    header('Location: faculty'); 
                    exit; 
                } else {
                
                    $faculty_login_err = "<font color='red'>Invalid login details.</font>";
                }
            } else {
             
                $faculty_login_err = "<font color='red'>Invalid login details.</font>";
            }
            mysqli_stmt_close($stmt); 
        } else {
            
             $faculty_login_err = "<font color='red'>Database error. Please try again later.</font>";
        }
       
    }
} 


@$info = $_GET['info']; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Feedback system for XYZ College">
    <meta name="author" content="XYZ College">
    <title>SISTec College Feedback System</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style>
        :root {
            --college-blue: #3366cc; 
            --college-blue-darker: #2952a3; 
            --college-text-light: #FFFFFF;
        }
    
        .navbar-default.navbar-fixed-top { background-color: var(--college-blue); border-color: var(--college-blue-darker); }
        .navbar-default .navbar-brand, .navbar-default .navbar-nav > li > a { color: var(--college-text-light); }
        .navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus, .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus { color: var(--college-text-light); background-color: var(--college-blue-darker); }
        .navbar-default .navbar-toggle { border-color: var(--college-text-light); }
        .navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus { background-color: var(--college-blue-darker); }
        .navbar-default .navbar-toggle .icon-bar { background-color: var(--college-text-light); }
        .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus { background-color: var(--college-blue); color: var(--college-text-light); }
        .footer-bottom { background-color: var(--college-blue); color: var(--college-text-light); }
        .carousel .item .fill { width: 100%; height: 100%; background-position: center center; background-size: cover; }
        #myCarousel { height: 60vh; max-height: 450px; }
        .carousel-inner > .item { height: 100%; }
        .carousel-inner > .item > img, .carousel-inner > .item > a > img { min-height: 100%; width: auto; margin: auto; }
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SISTec College Feedback System</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                     <li><a href="index.php"><i class="fa fa-home fa-fw"></i>Home</a></li>
                     <li><a href="index.php?info=about"><i class="fa fa-info-circle fa-fw"></i>About</a></li>
                     <li><a href="index.php?info=registration"><i class="fa fa-user-plus fa-fw"></i>Registration</a></li>
                     <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in fa-fw"></i>Login <span class="caret"></span></a>
                         <ul class="dropdown-menu">
                             <li><a href="index.php?info=login">Student</a></li>
                             <li><a href="index.php?info=faculty_login">Faculty</a></li>
                             <li><a href="admin">Admin</a></li> 
                         </ul>
                     </li>
                     <li><a href="index.php?info=contact"><i class="fa fa-phone fa-fw"></i>Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php 

    if ($info != "") {
        if ($info == "about") {
            include('about.php');
        } else if ($info == "contact") {
            include('contact.php');
        } else if ($info == "login") {
            global $login_err; 
            include('login.php'); 
        } else if ($info == "faculty_login") {
            global $faculty_login_err; 
            include('faculty_login.php'); 
        } else if ($info == "registration") {
            include('registration.php');
        } else {
             echo "<div class='container'><p>Page not found.</p></div>";
        }
    } else {
    
    ?>
    <header id="myCarousel" class="carousel slide">
         <ol class="carousel-indicators">
             <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
             <li data-target="#myCarousel" data-slide-to="1"></li>
             <li data-target="#myCarousel" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner" role="listbox"> 
              <div class="item active">
                  <div class="fill" style="background-image:url('images/hostel.webp');" alt="XYZ College main building"></div>
                  <div class="carousel-caption"><h2>Welcome to SISTec College</h2></div>
              </div>
              <div class="item">
                  <div class="fill" style="background-image:url('images/principal.webp');" alt="XYZ College Principal's message placeholder"></div>
                  <div class="carousel-caption"><h2>Dedicated Faculty</h2></div>
              </div>
              <div class="item">
                  <div class="fill" style="background-image:url('images/hostel.webp');" alt="XYZ College campus facilities"></div>
                  <div class="carousel-caption"><h2>Vibrant Campus Life</h2></div>
              </div>
         </div>
         <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span></a>
         <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span></a>
     </header>
     <div class="container">
         <div class="row">
             <div class="col-lg-12"> 
                 <div class="col-sm-10" style="margin-top:60px; margin-bottom:80px;">
                     <h2>About the SISTec College Feedback System</h2>
                     <p>Welcome to the official Feedback System for <strong>SISTec College</strong>...</p> 
                     <p><strong>Students:</strong> Please log in...</p>
                      <p><strong>Faculty:</strong> Log in to view feedback...</p>
                      <p><strong>Admin:</strong> The administrator manages...</p>
                      <p>Use the navigation menu...</p>
                 </div>
             </div>
         </div>
     </div>
    <?php 
        } 
    ?>
    
    <div class="navbar-fixed-bottom nav navbar-inverse text-center footer-bottom" style="padding:15px; height:50px;"> 
         <p style="margin: 5px 0;">&copy; <?php echo date('Y'); ?> SISTec College. All Rights Reserved.</p> 
    </div>

    <script src="css/jquery.js"></script> 
    <script src="css/bootstrap.min.js"></script> 
    <script>
    $(document).ready(function(){
        $('.carousel').carousel({ interval: 5000 });
    });
    </script>

</body>
</html>
