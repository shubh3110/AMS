<?php

	//session_start();
	include 'dbh.inc.php';
	session_start();

	//Admin login
	if(isset($_POST['submit']))
	{
		$roleid=mysqli_real_escape_string($conn,$_POST['role_id']);
		$uid=mysqli_real_escape_string($conn,$_POST['uid']);
		$sem_id=mysqli_real_escape_string($conn,$_POST['sem_id']);
		$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
		$_SESSION['sem_id']=$sem_id;
		$_SESSION['uid']=$uid;
		$_SESSION['roleid']=$roleid;
		//$email=mysqli_real_escape_string($conn,$_POST['email']);

		//Error handlers
		//check if inputs are empty
		if(empty($roleid)||empty($uid)||empty($sem_id)||empty($pwd))
		{
			header("Location: ../index.php?fill_up_the_entries");
			exit();
		}
		else
		{
			if($roleid=="Admin")
			{
				$sql="SELECT *FROM faculty WHERE username='$uid'";
				$result=mysqli_query($conn,$sql);
				$resultCheck=mysqli_num_rows($result);
				if($resultCheck<1)
				{
					header("Location: ../index.php?admin_not_present");
					exit();
				}
				else
				{
					$row=mysqli_fetch_assoc($result);
					$pwd=md5($pwd);
					if(!strcmp($row['fac_pwd'],$pwd))
					{
						if($row['admin']) 
						{	
							header("Location: ../adm_acc.php?login=success");
							exit();
						}
						else
						{
							header("Location: ../index.php?not_assigned_as_admin");
							exit();
						}
					}
					else
					{
						header("Location: ../index.php?password_wrong");
						exit();
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
	/*else
	{
		header("Location: ../index.php?login_error");
		exit();
	}*/

?>