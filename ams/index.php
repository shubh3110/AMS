<?php
	$dbServername="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="ams";
    $conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
    session_start();

    if(isset($_SESSION['uid']))
    {
    	$var=$_SESSION['uid'];
    	
    	if($_SESSION['roleid']=='Admin')
    	{
    		$sql="SELECT *FROM faculty WHERE username='$var'";
			$result=mysqli_query($conn,$sql);
			$resultCheck=mysqli_num_rows($result);
			if($resultCheck==1)
			{
				$row=mysqli_fetch_assoc($result);
				if($row['admin'])
				{
					header("Location: ../ams/adm_acc.php");
					exit();
				}
			}
		}
    	else if($_SESSION['roleid']=='Faculty')
    	{
    		$sql="SELECT *FROM faculty WHERE username='$var'";
			$result=mysqli_query($conn,$sql);
			$resultCheck=mysqli_num_rows($result);
			if($resultCheck==1)
			{
				header("Location: ../ams/fac_acc.php");
				exit();
			}
    	}
    	else if($_SESSION['roleid']=='Student')
    	{
    		$sql="SELECT *FROM faculty WHERE username='$var' OR regid='$var'";
			$result=mysqli_query($conn,$sql);
			$resultCheck=mysqli_num_rows($result);
			if($resultCheck==1)
			{
				header("Location: ../ams/user_acc.php");
				exit();
			}
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

<style>
.mySlides {display:none;}
</style>

<body style = "background:#f1f1f1; font-family: 'Lato', sans-serif; height: 100%; line-height: 1.8;">

    <!--header-->
	<div class="container-fluid" style="margin-bottom: 10px; height: 100px;">
        <nav class="navbar navbar-default navbar-fixed-top" style="background: #ffffff; -webkit-box-shadow: rgba(110,110,110,.5) 3px 3px 10px; height: 100px;">
    		<div class="row">
    			<div class="col-sm-8">
    				<h1 style="color: #d2d2d2; margin-left: 30px;">Attendance Management System</h1>
    			</div>
    			<div class="col-sm-4">
    				<div class="row grid-divider" style="margin-bottom: 2px;">
    				    <div class="col-sm-12">
    				        <button type="button" class = "btn btn-success pull-right" data-toggle="modal" data-target="#loginModal" style="margin-top: 20px; margin-right: 20px;">Log In</button>
    				    </div>
    				</div>
    			</div>
    		</div>
        </nav>
	</div>

    <!--login modal-->
    <div class="modal fade" id="loginModal" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color: #ffffff; font-size: 30px;"><span class="glyphicon glyphicon-log-in"></span> Log In</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" action="includes/login.inc.php" method="POST">
                        <div class="form-group">
                            <label for="role"><span class="glyphicon glyphicon-log-in"></span> Log In As</label>
                            <input list="role" class="form-control" name="role_id" placeholder="Enter your role">
                            <datalist id="role">
                                <option value="Admin">
                                <option value="Faculty">
                                <option value="Student">
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="username"><span class="glyphicon glyphicon-user"></span> User-id</label>
                            <input type="text" class="form-control" name="uid" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                            <input type="password" class="form-control" name="pwd" placeholder="Enter password">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="" Unchecked>Remember me</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-info btn-block" style="background-color: #7E57C2;"><span class="glyphicon glyphicon-off"></span> Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div> 
    
    <!--body_part-->
    <div class="row" style="margin-bottom: 5px;">
        <div class="col-sm-12">
            <img class="mySlides" src="images/ap_100270986276-e1494991419413.jpg" style="height: 600px; width:100%">
            <img class="mySlides" src="images/maxresdefault.jpg" style="height: 600px; width:100%">
            <img class="mySlides" src="images/eupf_seminar.jpg" style="height: 600px; width:100%">
            <img class="mySlides" src="images/121512252.jpg" style="height: 600px; width:100%">
            <img class="mySlides" src="images/Seminars.JPG" style="height: 600px; width:100%">
        </div>
    </div>
    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 10000); // Change image every 4 seconds
        }
    </script>
    
<?php
    include_once 'footer.php';
    include_once 'script.php';
?>