<!--header part-->
<?php
    session_start();
    if(!isset($_SESSION['uid'])) header("Location: ../ams/index.php");
?>

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
                    <div class="row" style="margin-bottom: 2px;">
                        <div class="col-sm-12">
                            <h1 style="color: #d2d2d2; margin-left: 70px;"><span class="glyphicon glyphicon-ban-circle" style="color: #D50000; font-size: 40px;"></span> Cancel Registration</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <form action="includes/logout.inc.php" method="POST">
                        <button type="button submit" name="submit" class = "btn btn-success pull-right" style="margin: 30px;">Log Out</button>
                    </form>
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
            <div class="aa center-block" style="width: 600px; height: 500px; background-color: rgba(0,0,0,0.2);
                margin-top: 5px;
                margin-bottom: 30px;
                padding-top: 10px;
                padding-left: 50px;
                padding-right: 50px;
                border-radius: 15px;
                webkit-border-radius: 15px;
                -o-border-radius: 15px;
                -moz-border-radius: 15px;
                box-shadow: inset -4px -4px rgba(0,0,0,0.5);">
                <form role="form" action="includes/reg_cancel.inc.php" method="POST">
                    <div class="form-group">
                        <label for="branch"><span class="glyphicon glyphicon-book"></span> Branch-name</label>
                        <input list="branch" class="form-control" name="branch_id" placeholder="Enter Branch name">
                        <datalist id="branch">
                            <option value="Civil">
                            <option value="Computer Science">
                            <option value="Electrical">
                            <option value="Mechanical">
                            <option value="Metallurgy">
                            <option value="Production">
                        </datalist>
                    </div>
                    <div class="form-group" style="margin-bottom: 40px;">
                        <label for="username"><span class="glyphicon glyphicon-registration-mark"></span> Registration-id</label>
                        <input type="text" class="form-control" name="reg_id" placeholder="Enter Registration-id">
                    </div>  
                    <button type="submit" name="reg_cancel_submit" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-off"></span> Cancel Registration</button>
                </form>
            </div>
        </div>
    </div>

<?php
    include_once 'footer.php';
    include_once 'script.php';
?>