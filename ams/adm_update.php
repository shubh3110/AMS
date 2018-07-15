<!--header part-->
<!DOCTYPE html>
<html>
<head>
    <title>Attendance Management System</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body style = "background:#f1f1f1; font-family: 'Lato', sans-serif; height: 100%; line-height: 1.8;">

    <!--header-->
    <div class="container-fluid" style="margin-bottom: 5px; height: 100px;">
        <nav class="navbar navbar-default navbar-fixed-top" style="background: #ffffff; -webkit-box-shadow: rgba(110,110,110,.5) 3px 3px 10px; height: 100px;">
            <div class="row">
                <div class="col-sm-12">
                    <h1 style="color: #d2d2d2; margin-top: 30px; margin-left: 70px;"><span class="glyphicon glyphicon-flag" style="color: #76FF03; font-size: 40px;"></span>Add or Remove Admin</h1>
                </div>
            </div>
        </nav>
    </div>

    
    <!--body part-->
    <div class="row">
        <div class="col-sm-12">
            <a href="adm_acc.php" style="text-decoration: none;"><h3 style="color: #000000; margin: 30px;"><span class="glyphicon glyphicon-backward"></span> Go back</h3></a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="margin-bottom: 5px;">
            <div class="aa center-block" style="width: 600px; height: 600px; background-color: rgba(0,0,0,0.2);
                margin-top: 30px;
                margin-bottom: 30px;
                padding-top: 10px;
                padding-left: 50px;
                padding-right: 50px;
                border-radius: 15px;
                webkit-border-radius: 15px;
                -o-border-radius: 15px;
                -moz-border-radius: 15px;
                box-shadow: inset -4px -4px rgba(0,0,0,0.5);">
                <form role="form" action="includes/register.inc.php" method="POST">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname"><span class="glyphicon glyphicon-user"></span> First name</label>
                                    <input type="text" class="form-control" name="first" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname"><span class="glyphicon glyphicon-user"></span> Last name</label>
                                    <input type="text" class="form-control" name="last" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label for="email-id"><span class="glyphicon glyphicon-envelope"></span> Email-Id</label>
                        <input type="text" class="form-control" name="email_id" placeholder="Enter email-id">
                    </div>
                    <div class="form-group">
                        <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                        <input type="text" class="form-control" name="uid" placeholder="Enter username">
                    </div>
                    <div class="form-group" style="margin-bottom: 45px;">
                        <label for="passsword"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                        <input type="password" class="form-control" name="pwd" placeholder="Enter password">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" name="Admin_add_submit" class="btn btn-success btn-block pull-right"><span class="glyphicon glyphicon-off"></span>Add</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" name="Admin_remove_submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span>Remove</button>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
    include_once 'footer.php';
    include_once 'script.php';
?>