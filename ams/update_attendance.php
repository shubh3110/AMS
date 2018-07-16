<?php

    session_start();
    include_once 'includes/dbh.inc.php';
    $course=$_SESSION['course_id'];
    $date=$_SESSION['date'];
    $sql="SELECT *FROM attendance WHERE course_id='$course' AND pres_date='$date'";
    $result=mysqli_query($conn,$sql);
    if($result) header("Location: ../ams/take_attendance.php?Attendance_already_marked");
    else
    {
        if(isset($_POST['mark']))
        {
            if(!empty($_POST['attendance']))
            {
                $cnt1=0;
                $cnt2=0;
                foreach($_POST['attendance'] as $id)
                {
                    $cnt1++;
                    $regid=$id;
                    $sql = "INSERT INTO attendance (regid,course_id,pres_date) VALUES ('$regid','$course','$date');";
                    if(mysqli_query($conn,$sql)) $cnt2++;
                }
            }
            else header("Location: ../ams/take_attendance.php?Mark_attendance_before_submit");
            if($cnt1==$cnt2) header("Location: ../ams/take_attendance.php?Attendance_marked");
            else header("Location: ../ams/take_attendance.php?Attendance_not_marked_some_error_occured");
        }
    }

?>