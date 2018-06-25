<?php

	//session_start();
	
	$dbServername="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="ams";
    $conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

    session_start();
	//search user
	if(isset($_POST['submit']))
	{
		$user=mysqli_real_escape_string($conn,$_POST['user']);
		
		
		$sql="SELECT *FROM faculty WHERE username='$user' OR firstname='$user'";
		$result=mysqli_query($conn,$sql);
		$resultCheck=mysqli_num_rows($result);

		if($resultCheck==1)
		{
			$row=mysqli_fetch_assoc($result);
			$var=1;
		}
		else
		{
			$sql="SELECT *FROM users WHERE regid='$user' OR firstname='$user'";
			$result=mysqli_query($conn,$sql);
			$resultCheck=mysqli_num_rows($result);
			$row=mysqli_fetch_assoc($result);
			$var=0;
		}	
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
    <div class="container-fluid" style="height: 80px;">
        <nav class="navbar navbar-default navbar-fixed-top" style="background: #ffffff; -webkit-box-shadow: rgba(110,110,110,.5) 3px 3px 10px; height: 80px;">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row" style="margin-bottom: 2px;">
                        <div class="col-sm-12">
                            <h1 style="color: #d2d2d2; margin-left: 70px;"> Profile Page</h1>
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
    	<div class="row" style="margin-bottom: 20px;">
    		<div class="col-sm-12">
    		</div>
    	</div>

        <div class="row">
            <div class="col-sm-6" style="padding-top: 30px;">  
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="2" style="text-align: center;" >Profile Info</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                            if($var)
                            {
                                $x='Name:';
                                $y='Department:';
                                $z='Email-Id:';
                                echo "<tr><td style='text-align: center'>".$x."</td><td style='text-align: center'>" . $row["firstname"]. " " . $row["lastname"]. "</td></tr>";
                                echo "<tr><td style='text-align: center'>".$y."</td><td style='text-align: center'>" . $row["branchid"]. "</td></tr>";
                                echo "<tr><td style='text-align: center'>".$z."</td><td style='text-align: center'>" . $row["emailid"]. "</td></tr>";
                            }
                            else
                            {
                                $w='Name:';
                                $x='Branch:';
                                $y='Semester:';
                                $z='Email-Id:';
                                echo "<tr><td style='text-align: center'>".$w."</td><td style='text-align: center'>" . $row["firstname"]. " " . $row["lastname"]. "</td></tr>";
                                echo "<tr><td style='text-align: center'>".$x."</td><td style='text-align: center'>" . $row["branchid"]. "</td></tr>";
                                echo "<tr><td style='text-align: center'>".$y."</td><td style='text-align: center'>" . $row["semid"]. "</td></tr>";
                                echo"<tr><td style='text-align: center'>".$z."</td><td style='text-align: center'>" . $row["emailid"]. "</td></tr>";
                            }
                            //mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                <div class="row" style="padding-bottom: 50px;">
                    <div class="col-sm-12">
                        <div class="container-fluid">
                            <?php

                                if(!$row['profileimg']) echo "<img src='profilephotos/default-avatar.png' class='img-responsive img-circle center-block' style='height: 300px; width: 300px;' alt='profile' >";
                                else echo "<img src='profilephotos/".$row['profileimg']."' class='img-responsive img-circle center-block' style='height: 300px; width: 300px;' alt='profile'>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once 'footer.php';
    include_once 'script.php';
?>