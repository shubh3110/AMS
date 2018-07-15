<?php

	session_start();
	$dbServername="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="ams";
    $conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
	//session_start();

	$var1=$_SESSION['uid'];
    //$var2=$_SESSION['sem_id'];
    $var3=$_SESSION['roleid'];

	if(isset($_POST['update1']))
    {
        $user_id=mysqli_real_escape_string($conn,$_POST['user_id']);
        $old_pwd=mysqli_real_escape_string($conn,$_POST['old_pwd']);
        $new_pwd=mysqli_real_escape_string($conn,$_POST['new_pwd']);
        $old_pwd=md5($old_pwd);
        $new_pwd=md5($new_pwd);

        if($var3=='Admin')
        {
            $sql="SELECT *FROM admin WHERE username='$var1'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            if(!strcmp($old_pwd,$row['pwd']))
            {
                $sql1="UPDATE admin SET pwd='$new_pwd' WHERE username='$var1'";
                mysqli_query($conn,$sql1);
            }
            $sql2="UPDATE admin SET username='$user_id' WHERE username='$var1'";
            mysqli_query($conn,$sql2);
        }
        else if($var3=='Faculty')
        {
            $sql="SELECT *FROM faculty WHERE username='$var1'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            if(!strcmp($old_pwd,$row['fac_pwd']))
            {
                $sql1="UPDATE faculty SET fac_pwd='$new_pwd' WHERE username='$var1'";
                mysqli_query($conn,$sql1);
            }
            $sql2="UPDATE faculty SET username='$user_id' WHERE username='$var1'";
            mysqli_query($conn,$sql2);
        }

        else if($var3=='Student')
        {
            $sql="SELECT *FROM users WHERE regid='$var1' OR username='$var1'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            if(!strcmp($old_pwd,$row['user_pwd']))
            {
                $sql1="UPDATE users SET user_pwd='$new_pwd' WHERE regid='$var1' OR username='$var1'";
                mysqli_query($conn,$sql1);
            }
            $sql2="UPDATE users SET username='$user_id' WHERE regid='$var1' OR username='$var1'";
            mysqli_query($conn,$sql2);
        }

        $_SESSION['uid']=$user_id;
        //$var1=$_SESSION['uid'];

        header("Location: ../ams/update_acc.php");

    }

    if(isset($_POST['update2']))
    {
        $target_dir='/opt/lampp/htdocs/project/ams/profilephotos/';
        $target_file=$target_dir.basename($_FILES['profilePicture']['name']);
        $image=$_FILES['profilePicture']['name'];

        if($var3=='Admin')
        {
            $sql="UPDATE admin SET profileimage='$image' WHERE username='$var1'";
        }

        if($var3=='Faculty')
        {
            $sql="UPDATE faculty SET profileimg='$image' WHERE username='$var1'";
        }

        else if($var3=='Student')
        {
            $sql="UPDATE users SET profileimg='$image' WHERE regid='$var1' OR username='$var1'";
        }

        mysqli_query($conn,$sql);

        if(copy($_FILES['profilePicture']['tmp_name'], $target_file))
        {
            $msg="Image uploaded successfully";
            echo $msg;
        }
        else
        {
            $msg="There was some error in uploading image";
            echo $msg;
        }

        header("Location: ../ams/update_acc.php");
    }

?>