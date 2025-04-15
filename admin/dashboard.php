<?php
session_start();
if(!isset($_SESSION['user']))
{
header('location:index.php');
}
include('../dbconfig.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            margin: 0;
            padding: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        body.loaded {
            opacity: 1;
        }

        #wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        #page-wrapper {
            flex: 1;
            padding: 15px;
            background-color: #f8f8f8;
        }

        .navbar-default {
            background-color: #007bff;
            border-color: #007bff;
        }

        .navbar-default .navbar-brand {
            color: white;
        }

        .navbar-default .navbar-brand:hover,
        .navbar-default .navbar-brand:focus {
            color: #e6f7ff;
        }

        .navbar-default .navbar-toggle {
            border-color: #fff;
        }

        .navbar-default .navbar-toggle .icon-bar {
            background-color: #fff;
        }

        .navbar-default .navbar-collapse {
            border-color: #007bff;
        }

        .navbar-default .navbar-nav > li > a {
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar-default .navbar-nav > li > a:hover,
        .navbar-default .navbar-nav > li > a:focus {
            background-color: rgba(255, 255, 255, 0.1);
            color: #e6f7ff;
        }

        .navbar-default .navbar-nav > .open > a,
        .navbar-default .navbar-nav > .open > a:hover,
        .navbar-default .navbar-nav > .open > a:focus {
            background-color: rgba(255, 255, 255, 0.1);
            color: #e6f7ff;
        }

        .navbar-default .dropdown-menu {
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-default .dropdown-menu > li > a {
            color: #333;
            padding: 10px 20px;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 3px;
        }

        .navbar-default .dropdown-menu > li > a:hover,
        .navbar-default .dropdown-menu > li > a:focus {
            background-color: #007bff;
            color: white;
        }

        .sidebar {
            background-color: #2a363b;
            color: white;
            padding-bottom: 20px;
            min-height: 100%;
        }

        .sidebar .sidebar-nav.navbar-collapse {
            padding: 0;
            margin: 0;
        }

        .sidebar .sidebar-nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .sidebar .sidebar-nav li {
            position: relative;
        }

        .sidebar .sidebar-nav li a {
            color: #e0e0e0;
            padding: 15px 25px;
            display: block;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar .sidebar-nav li a:hover,
        .sidebar .sidebar-nav li a:focus {
            background-color: #007bff;
            color: white;
            border-left-color: #007bff;
        }

        .sidebar .sidebar-nav li a i {
            margin-right: 10px;
        }

        .sidebar .sidebar-nav .active > a {
            background-color: #0056b3;
            color: white;
            border-left-color: #0056b3;
        }

        .sidebar .sidebar-nav .active > a:hover,
        .sidebar .sidebar-nav .active > a:focus{
             background-color: #004080;
             color: white;
             border-left-color: #004080;
        }

        .sidebar .sidebar-nav .nav-second-level li a {
            padding-left: 40px;
        }

        .sidebar .sidebar-nav .nav-second-level li a:hover,
        .sidebar .sidebar-nav .nav-second-level li a:focus {
            background-color: rgba(255, 255, 255, 0.1);
            color: #e6f7ff;
            border-left-color: transparent;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -250px;
                width: 250px;
                height: 100%;
                z-index: 1000;
                overflow-y: auto;
                transition: transform 0.3s ease-in-out;
                background-color: #2a363b;
            }

            .sidebar.in {
                transform: translateX(250px);
            }

            .navbar-header button {
                display: block;
            }

            #page-wrapper {
                margin-left: 0;
            }

            .navbar-default .navbar-toggle {
                display: block;
            }
        }
    </style>

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Student Review System</a>
            </div>
            <ul class="nav navbar-top-links navbar-right" style="background-color: white;">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">

                        <li><a href="dashboard.php?info=update_password"><i class="fa fa-gear fa-fw"></i>Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    </li>
                </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li style="color:black; font-size:20px;">
                            <a href="dashboard.php" style="color:black;"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i>Faculty<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="dashboard.php?info=add_faculty" style="color:black;><i class="fa fa-plus fa-fw"></i> Add Faculty</a>
                                </li>
                                 <li>
                                    <a href="dashboard.php?info=show_faculty" style="color:black;><i class="fa fa-eye"></i> Manage faculty</a>
                                </li>
                            </ul>
                            </li>


                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i>Student<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                 <li>
                                    <a href="dashboard.php?info=display_student" style="color:black;><i class="fa fa-eye"></i> Manage Student</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                           <a href="#"><i class="fa fa-user fa-book"></i>Feedback<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li><a href="dashboard.php?info=feedback" style="color:black;><i class="fa fa-eye"></i> feedback</a></li>
                                <li><a href="dashboard.php?info=feedback_average" style="color:black;><i class="fa fa-eye"></i> feedback Average</a></li>

                            </ul>
                        </li>
                        <!-- <li>
                            <a href="dashboard.php?info=contact"><i class="fa fa-eye"></i> Contact us</a>
                        </li> -->

                    </ul>
                </div>
                </div>
            </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <?php
                        @$id=$_GET['id'];
                        @$info=$_GET['info'];
                        if($info!="")
                        {
                            if($info=="add_faculty")
                            {
                                 include('add_faculty.php');
                            }

                             elseif($info=="show_faculty")
                            {
                                 include('show_faculty.php');
                            }

                            elseif($info=="edit_faculty")
                            {
                                 include('edit_faculty.php');
                            }
                            
                            elseif($info=="display_student")
                            {
                                 include('display_student.php');
                            }

                            elseif($info=="contact")
                            {
                                 include('contact.php');
                            }
                             elseif($info=="feedback")
                            {
                                 include('feedback.php');
                            }
                            elseif($info=="feedback_average")
                            {
                                 include('feedback_average.php');
                            }

                            else if($info=="update_password")
                            {
                             include('update_password.php');
                            }

                        }
                        else
                        {
                         include('dashboard_home.php');
                        }

                    ?>

                </div>
                </div>

            </div>
        </div>
    <script src="../css/jquery.min.js"></script>

    <script src="../css/bootstrap.min.js"></script>

    <script src="../css/metisMenu.min.js"></script>

    <script src="../css/sb-admin-2.js"></script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('loaded');
        });
    </script>

</body>

</html>
