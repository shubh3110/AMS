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
                            <h1 style="color: #d2d2d2; margin-left: 70px;"> Subjects In Semester</h1>
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
        <div class="col-sm-12" style="margin-bottom: 20px;">
            <a href="user_acc.php" style="text-decoration: none;"><h3 style="color: #2d2d2d; margin: 30px;"><span class="glyphicon glyphicon-backward"></span> Go back</h3></a>
        </div>
    </div>
    <div class="container" style="height: 400px;">    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="text-align: center;">Subject</th>
                    <th style="text-align: center;">Faculty</th>
                    <th style="text-align: center;">Email-id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //include_once 'dbh.inc.php';
                    //session_start();
                    $dbServername="localhost";
                    $dbUsername="root";
                    $dbPassword="";
                    $dbName="ams";
                    $conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
                    $var=$_SESSION['sem_id'];

                    $sql="SELECT subjects.subname, subjects.semid, faculty.firstname, faculty.lastname, faculty.emailid FROM subjects NATURAL JOIN faculty WHERE subjects.uid=faculty.username";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        if($var==$row['semid'])
                            echo "<tr><td style='text-align: center'>" . $row["subname"]. "</td><td style='text-align: center'>" . $row["firstname"]. " " . $row["lastname"]. "</td><td style='text-align: center'>" .$row["emailid"]. "</td></tr>";
                    }
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

<?php
    include_once 'footer.php';
    include_once 'script.php';
?>