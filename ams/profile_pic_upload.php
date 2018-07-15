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

    if(isset($_POST['submit']))
    {
        $target_dir='/opt/lampp/htdocs/project/ams/profilephotos/';
        $target_file=$target_dir.basename($_FILES['profilePicture']['name']);
        $image=$_FILES['profilePicture']['name'];
        if($var3=='Admin') $sql="UPDATE admin SET profileimage='$image' WHERE username='$var1'";
        else if($var3=='Faculty') $sql="UPDATE faculty SET profileimg='$image' WHERE username='$var1'";
        else if($var3=='Student') $sql="UPDATE users SET profileimg='$image' WHERE regid='$var1' OR username='$var1'";

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

        header("Location: ../ams/profile_page.php");
    }

?>