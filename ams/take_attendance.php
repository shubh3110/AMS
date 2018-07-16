<?php
    session_start();
    
    if(!isset($_SESSION['uid'])) header("Location: ../ams/index.php");

    $dbServername="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="ams";
    $conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
    $var1=$_SESSION['uid'];
    $var3=$_SESSION['roleid'];

    if(isset($_POST['stud_list']))
    {
        $branch_id=mysqli_real_escape_string($conn,$_POST['branch_id']);
        $sem_id=mysqli_real_escape_string($conn,$_POST['sem_id']);
        $course_id=mysqli_real_escape_string($conn,$_POST['course_id']);
        $date=mysqli_real_escape_string($conn,$_POST['date']);

        if(empty($branch_id)||empty($sem_id)||empty($course_id)||empty($date))
        {
            header("Location: ../ams/select_course.php?fill_up_the_entries");
            exit();
        }

        $sql="SELECT *FROM subjects WHERE course_id='$course_id'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        if($row['semid']!=$sem_id)
        {
            header("Location: ../ams/select_course.php?sem_id_does_not_match_with_semester_of_course_id ");
            exit();
        } 
        $_SESSION['course_id']=$course_id;
        $_SESSION['date']=$date;
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
                <a href='fac_acc.php' style='text-decoration: none;'><h3 style='color: #2d2d2d; margin: 30px;'><span class='glyphicon glyphicon-backward'></span> Go back</h3></a>
            </div>
        </div>
        <div class="row">    
            <div class="col-sm-12">
                <form role='form' action='update_attendance.php' method='POST'>
                    <?php
                        echo '<table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 300px; text-align: center;">Registration Id</th>
                                    <th style="width: 300px; text-align: center;">Name</th>
                                    <th style="width: 300px; text-align: center;">Present</th>
                                </tr>
                            </thead>
                            <tbody>';
                                $course_id=$_SESSION['course_id'];
                                $sql="SELECT users.regid,users.firstname,users.lastname FROM users NATURAL JOIN subjects WHERE subjects.semid=users.semid AND subjects.branchid=users.branchid AND course_id='$course_id';";
                                $result=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    echo "<tr><td style='width: 300px; text-align: center'>" . $row["regid"]. "</td><td style='width: 300px; text-align: center;'>" . $row["firstname"]. " " . $row["lastname"]. "</td><td style='width: 300px; text-align: center;'><input type='checkbox' name='attendance[]' value='".$row["regid"]."'></label></td></tr>";
                                }
                            
                        echo '</tbody>
                    </table>';
                    ?>
                    <button type='submit' name='mark' class='btn btn-success btn-block'>Mark All</button>
                </form>
            </div>
        </div>
    </div>

<?php
    include_once 'footer.php';
    include_once 'script.php';
?>