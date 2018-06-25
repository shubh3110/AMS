<?php
    include_once 'includes/dbh.inc.php';
    session_start();
    if(!isset($_SESSION['uid'])) header("Location: ../ams/index.php");
?>

<!--header-part-->
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
    			<div class="col-sm-8">
    				<h1 style="color: #d2d2d2; margin-left: 30px;">Attendance Management System</h1>
    			</div>
    			<div class="col-sm-4">
    				<div class="row" style="margin-bottom: 2px;">
    				    <div class="col-sm-12">
    				        <form action="includes/logout.inc.php" method="POST">
                                <button type="button submit" name="submit" class = "btn btn-success pull-right" style="margin: 30px;">Log Out</button>
                            </form>
    				    </div>
    				</div>
    			</div>
    		</div>
        </nav>
	</div>