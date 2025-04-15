<?php
    include('../dbconfig.php');
    session_start();
    extract($_POST);
    if(isset($login))
    {
        $que=mysqli_query($conn,"select user, pass from admin where user='$email' and pass='$pass'");
        $row=mysqli_num_rows($que);
        if($row)
        {
            $_SESSION['user']=$email;
            header('location:dashboard.php');
        }
        else
        {
            $err="<font color='red'>Wrong Email or Password !</font>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <style>
      body {
        background-image: url('../images/admin_bg.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
        padding: 0;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    body.loaded {
        opacity: 1;
    }

    .login-panel {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        width: 100%;
        max-width: 450px;
    }

    .panel-heading {
        background-color: #007bff;
        color: white;
        text-align: center;
        padding: 15px;
        border-bottom: 1px solid #ddd;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .panel-title {
        font-size: 1.8em;
        font-weight: bold;
        margin: 0;
    }

    .panel-body {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-control {
        border-radius: 5px;
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        width: 100%;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        border-radius: 5px;
        padding: 12px 20px;
        font-size: 18px;
        font-weight: bold;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        width: 100%;
    }

    .btn-success:hover {
        background-color: #1e7e34;
        border-color: #1c7430;
        box-shadow: 0 0 7px rgba(0, 0, 0, 0.3);
    }

    label {
        display: block;
        margin-top: 10px;
        font-size: 1.1em;
        color: #555;
        text-align: center;
    }

    @media (max-width: 768px) {
        .login-panel {
            padding: 20px;
        }

        .panel-title {
            font-size: 1.5em;
        }

        .form-control {
            font-size: 1.4em;
            padding: 10px;
        }

        .btn-success{
            font-size: 1.4em;
            padding: 10px 18px;
        }

        label{
            font-size: 1em;
        }
    }
    </style>

    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Admin Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="email" type="email" autofocus required placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" type="password" required>
                                </div>


                                <div class="form-group">
                                    <input name="login" type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                                </div>


                                <div class="form-group">
                                    <label>
                                        <?php echo @$err;?>
                                    </label>
                                </div>


                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../demo/css/css/jquery.min.js"></script>

    <script src="../../demo/css/css/bootstrap.min.js"></script>

    <script src="../..demo/css/css/metisMenu.min.js"></script>

    <script src="../../demo/css/css/sb-admin-2.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('loaded');
        });
    </script>

</body>

</html>
