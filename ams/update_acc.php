<!--header part-->
<?php
    session_start();

    if(!isset($_SESSION['uid'])) header("Location: ../ams/index.php");
    
    $dbServername="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="ams";
    $conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
    $var1=$_SESSION['uid'];
    //$var2=$_SESSION['sem_id'];
    $var3=$_SESSION['roleid'];
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
    <div class="container-fluid" style="height: 80px;">
        <nav class="navbar navbar-default navbar-fixed-top" style="background: #ffffff; -webkit-box-shadow: rgba(110,110,110,.5) 3px 3px 10px; height: 80px;">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row" style="margin-bottom: 2px;">
                        <div class="col-sm-12">
                            <h1 style="color: #d2d2d2; margin-left: 70px;">Update Profile</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <form action="search.php" method="POST" style="display: flex;">
                        <input type="text" class="form-control" name="user" placeholder="Enter name of user" style="margin:30px;">
                        <button type="button submit" name="submit" class = "btn btn-success pull-right" style="margin-top: 30px; margin-bottom: 30px;">Search</button>
                    </form>
                </div>
                <div class="col-sm-2">
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
                    if($var3=='Admin')
                    {
                        echo "<a href='adm_acc.php' style='text-decoration: none;'><h3 style='color: #2d2d2d; margin: 30px;'><span class='glyphicon glyphicon-backward'></span> Go back</h3></a>";
                    }

                    else if($var3=='Faculty')
                    {
                        echo "<a href='fac_acc.php' style='text-decoration: none;'><h3 style='color: #2d2d2d; margin: 30px;'><span class='glyphicon glyphicon-backward'></span> Go back</h3></a>";
                    }
                    else if($var3=='Student')
                    {
                        echo "<a href='user_acc.php' style='text-decoration: none;'><h3 style='color: #2d2d2d; margin: 30px;'><span class='glyphicon glyphicon-backward'></span> Go back</h3></a>";
                    }
                ?>
            </div>
        </div>
  
        <div class="row">
            <div class="col-sm-6" style="padding-top: 50px;">  
                <div class="row">
                    <div class="col-sm-12">
                        <form role="form" action="acc_update.php" method="POST">
                            <div class="form-group">
                                <label for="username"><span class="glyphicon glyphicon-user"></span> Change username</label>
                                <input typ="text" class="form-control" name="user_id" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Old Password</label>
                                <input type="password" class="form-control" name="old_pwd" placeholder="Old Password">
                            </div>
                            <div class="form-group">
                                <label for="password"><span class="glyphicon glyphicon-eye-open"></span> New Password</label>
                                <input type="password" class="form-control" name="new_pwd" placeholder="New Password">
                            </div>
                            <button type="submit" name="update1" class="btn btn-success btn-block">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row" style="padding-bottom: 50px;">
                    <div class="col-sm-12">
                        <div class="container-fluid">
                            <?php
                                if($var3=='Admin')
                                {
                                    $sql="SELECT *FROM admin WHERE username='$var1'";
                                }
                                else if($var3=='Faculty')
                                {
                                    $sql="SELECT *FROM faculty WHERE username='$var1'";
                                }

                                else if($var3=='Student')
                                {
                                    $sql="SELECT *FROM users WHERE regid='$var1' OR username='$var1'";
                                }

                                $result=mysqli_query($conn,$sql);
                                $row=mysqli_fetch_assoc($result);

                                if($var3=='Admin')
                                {
                                    if(!$row['profileimage']) echo "<img src='profilephotos/default-avatar.png' class='img-responsive img-circle center-block' style='height: 300px; width: 300px;' alt='profile' >";
                                    else echo "<img src='profilephotos/".$row['profileimage']."' class='img-responsive img-circle center-block' style='height: 300px; width: 300px;' alt='profile'>";
                                }
                                else
                                {
                                    if(!$row['profileimg']) echo "<img src='profilephotos/default-avatar.png' class='img-responsive img-circle center-block' style='height: 300px; width: 300px;' alt='profile' >";
                                    else echo "<img src='profilephotos/".$row['profileimg']."' class='img-responsive img-circle center-block' style='height: 300px; width: 300px;' alt='profile'>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form action="acc_update.php" method="POST" enctype="multipart/form-data">
                        <div class="col-sm-6" style="padding-left: 160px;">
                            <input type="file" name="profilePicture">
                        </div>
                        <div class="col-sm-6" style="padding-left: 70px;">
                            <input type="submit" name="update2" value="Update Profile Picture">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once 'footer.php';
    include_once 'script.php';
?>