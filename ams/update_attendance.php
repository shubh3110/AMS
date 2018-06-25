<?php
    session_start();
    //$msg="";
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
        $sql1="SELECT *FROM faculty NATURAL JOIN subjects WHERE username=uid AND username='$var1'";
        $result=mysqli_query($conn,$sql1);
        $row2=mysqli_fetch_assoc($result);
        $var4=$row2['course_id'];
    
        $sql3="SELECT regid,firstname,lastname FROM users WHERE semid='$var2'";
        $result=mysqli_query($conn,$sql3);
        while($row=mysqli_fetch_assoc($result))
        {
            if(isset($_POST['optradio']))
            {
                $sql2="UPDATE attendance SET $var4=$var4+1 WHERE semid='$var2' AND regid='".$row['regid']."'";
                $result=mysqli_query($conn,$sql2);
            }
        }
    }

?>