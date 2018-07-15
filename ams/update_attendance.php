<?php

    session_start();
    include_once 'includes/dbh.inc.php';
    $var1=$_SESSION['uid'];
    $var2=$_SESSION['sem_id'];
    $var3=$_SESSION['roleid'];

    /*if($var3=='Faculty')
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
    }*/

    /*if(isset($_POST['present']))
    {
        $roleid=mysqli_real_escape_string($conn,$_POST['role_id']);
        $uid=mysqli_real_escape_string($conn,$_POST['uid']);
        $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
        $_SESSION['uid']=$uid;
        $_SESSION['roleid']=$roleid;
        //$email=mysqli_real_escape_string($conn,$_POST['email']);

        //Error handlers
        //check if inputs are empty
        if(empty($roleid)||empty($uid)||empty($pwd))
        {
            header("Location: ../index.php?fill_up_the_entries");
            exit();
        }
        else
        {
            if($roleid=="Admin")
            {
                $check="SELECT *FROM admin WHERE username='$uid';";
                $present=mysqli_query($conn,$result);
                $cnt=mysqli_num_rows($present);
                if(!$cnt) if($uid=='admin'&&$pwd=='admin_1234') header("Location: ../adm_acc.php?login=success");
                else
                {
                    $sql="SELECT *FROM admin WHERE username='$uid'";
                    $result=mysqli_query($conn,$sql);
                    $resultCheck=mysqli_num_rows($result);
                    if(!$resultCheck)
                    {
                        header("Location: ../index.php?admin_not_present");
                        exit();
                    }
                    else
                    {
                        $row=mysqli_fetch_assoc($result);
                        $pwd=md5($pwd);
                        if(!strcmp($row['pwd'],$pwd))
                        {
                            header("Location: ../adm_acc.php?login=success");
                            exit();
                        }
                        else
                        {
                            header("Location: ../index.php?username or password_wrong");
                            exit();
                        }
                    }
                }
                
            }

            else if($roleid=="Faculty")
            {
                $sql="SELECT *FROM faculty WHERE username='$uid'";
                $result=mysqli_query($conn,$sql);
                $resultCheck=mysqli_num_rows($result);
                if($resultCheck<1)
                {
                    header("Location: ../index.php?You_are_not_registered");
                    exit();
                }
                else
                {
                    $row=mysqli_fetch_assoc($result);
                    $pwd=md5($pwd);
                    if(!strcmp($row['fac_pwd'],$pwd))
                    {
                        header("Location: ../fac_acc.php?login=success");
                        exit();
                    }
                    else
                    {
                        header("Location: ../index.php?password_wrong");
                        exit();
                    }
                }
            }

            else if($roleid=="Student")
            {
                $sql="SELECT *FROM users WHERE regid='$uid' OR username='$uid'";
                $result=mysqli_query($conn,$sql);
                $resultCheck=mysqli_num_rows($result);
                if($resultCheck<1)
                {
                    header("Location: ../index.php?You_are_not_registered");
                    exit();
                }
                else
                {
                    $row=mysqli_fetch_assoc($result);
                    $pwd=md5($pwd);
                    if(!strcmp($row['user_pwd'],$pwd))
                    {
                        header("Location: ../user_acc.php?");
                        exit();
                    }
                    else
                    {
                        header("Location: ../index.php?password_wrong");
                        exit();
                    }
                }
            }
        }
    }
    
    if(isset($_POST['absent']))
    {
        $roleid=mysqli_real_escape_string($conn,$_POST['role_id']);
        $uid=mysqli_real_escape_string($conn,$_POST['uid']);
        $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
        $_SESSION['uid']=$uid;
        $_SESSION['roleid']=$roleid;
        //$email=mysqli_real_escape_string($conn,$_POST['email']);

        //Error handlers
        //check if inputs are empty
        if(empty($roleid)||empty($uid)||empty($pwd))
        {
            header("Location: ../index.php?fill_up_the_entries");
            exit();
        }
        else
        {
            if($roleid=="Admin")
            {
                $check="SELECT *FROM admin WHERE username='$uid';";
                $present=mysqli_query($conn,$result);
                $cnt=mysqli_num_rows($present);
                if(!$cnt) if($uid=='admin'&&$pwd=='admin_1234') header("Location: ../adm_acc.php?login=success");
                else
                {
                    $sql="SELECT *FROM admin WHERE username='$uid'";
                    $result=mysqli_query($conn,$sql);
                    $resultCheck=mysqli_num_rows($result);
                    if(!$resultCheck)
                    {
                        header("Location: ../index.php?admin_not_present");
                        exit();
                    }
                    else
                    {
                        $row=mysqli_fetch_assoc($result);
                        $pwd=md5($pwd);
                        if(!strcmp($row['pwd'],$pwd))
                        {
                            header("Location: ../adm_acc.php?login=success");
                            exit();
                        }
                        else
                        {
                            header("Location: ../index.php?username or password_wrong");
                            exit();
                        }
                    }
                }
                
            }

            else if($roleid=="Faculty")
            {
                $sql="SELECT *FROM faculty WHERE username='$uid'";
                $result=mysqli_query($conn,$sql);
                $resultCheck=mysqli_num_rows($result);
                if($resultCheck<1)
                {
                    header("Location: ../index.php?You_are_not_registered");
                    exit();
                }
                else
                {
                    $row=mysqli_fetch_assoc($result);
                    $pwd=md5($pwd);
                    if(!strcmp($row['fac_pwd'],$pwd))
                    {
                        header("Location: ../fac_acc.php?login=success");
                        exit();
                    }
                    else
                    {
                        header("Location: ../index.php?password_wrong");
                        exit();
                    }
                }
            }

            else if($roleid=="Student")
            {
                $sql="SELECT *FROM users WHERE regid='$uid' OR username='$uid'";
                $result=mysqli_query($conn,$sql);
                $resultCheck=mysqli_num_rows($result);
                if($resultCheck<1)
                {
                    header("Location: ../index.php?You_are_not_registered");
                    exit();
                }
                else
                {
                    $row=mysqli_fetch_assoc($result);
                    $pwd=md5($pwd);
                    if(!strcmp($row['user_pwd'],$pwd))
                    {
                        header("Location: ../user_acc.php?");
                        exit();
                    }
                    else
                    {
                        header("Location: ../index.php?password_wrong");
                        exit();
                    }
                }
            }
        }
    }*/

?>