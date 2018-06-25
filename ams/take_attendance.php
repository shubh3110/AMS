<?php
    session_start();
    
    if(!isset($_SESSION['uid'])) header("Location: ../ams/index.php");

    $dbServername="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="ams";
    $conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
    $var1=$_SESSION['uid'];
    $var2=$_SESSION['sem_id'];
    $var3=$_SESSION['roleid'];

    if($var3=='Faculty')
    {
        $sql="SELECT *FROM admins WHERE username='$var1'";
        $result=mysqli_query($conn,$sql);
        $row1=mysqli_fetch_assoc($result);
    }

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
                            <h1 style="color: #d2d2d2; margin-left: 70px;"> Mark the Attendance</h1>
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
    <div class="container-fluid" style="margin-bottom: 30px;">
        <div class="row">
            <div class="col-sm-12">
                <?php
                    if($var3=='Faculty')
                    {
                        echo "<a href='fac_acc.php' style='text-decoration: none;'><h3 style='color: #2d2d2d; margin: 30px;'><span class='glyphicon glyphicon-backward'></span> Go back</h3></a>";
                    }
                ?>
            </div>
        </div>
        <div class="row">    
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 300px; text-align: center;">Registration Id</th>
                            <th style="width: 300px; text-align: center;">Name</th>
                            <th style="width: 300px; text-align: center;">Mark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $sql="SELECT regid,firstname,lastname FROM users WHERE semid='$var2'";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($result))
                            {
                                echo "<tr><td style='width: 300px; text-align: center'>" . $row["regid"]. "</td><td style='width: 300px; text-align: center;'>" . $row["firstname"]. " " . $row["lastname"]. "</td><td style='width: 300px; text-align: center;'><form role='form' method='POST'><input type='radio' name='optradio' onclick='update_attendance.php'></form></td></tr>";
                            }
                            //mysqli_close($conn);

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
    include_once 'footer.php';
    include_once 'script.php';
?>