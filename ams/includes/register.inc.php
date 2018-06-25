<?php
	
	include_once 'dbh.inc.php';
	session_start();
	
	//Admin registration
	if(isset($_POST['Admin_submit']))
	{
		$first=mysqli_real_escape_string($conn,$_POST['first']);
		$last=mysqli_real_escape_string($conn,$_POST['last']);
		$branch_id=mysqli_real_escape_string($conn,$_POST['branch_id']);
		$sem_id=mysqli_real_escape_string($conn,$_POST['sem_id']);
		$email_id=mysqli_real_escape_string($conn,$_POST['email_id']);
		$uid=mysqli_real_escape_string($conn,$_POST['uid']);
		$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

		//Error handlers
		//check for empty fields
		if(empty($first)||empty($last)||empty($branch_id)||empty($sem_id)||empty($email_id)||empty($uid)||empty($pwd))
		{
			header("Location: ../reg_adm.php?fill_up_the_entries");
			exit();
		}
		else
		{
			//check if input characters are valid
			if(!preg_match("/^[a-zA-Z]*$/",$first)||!preg_match("/^[a-zA-Z]*$/",$last))
			{
				header("Location: ../reg_adm.php?invalid_firstname_and_lastname");
				exit();
			}
			else
			{
				//check if email is valid
				if(filter_var($email_id,FILTER_VAIDATE_EMAIL))
				{
					header("Location: ../reg_adm.php?invalid_email_id");
					exit();
				}
				else
				{
					$sql="SELECT *FROM faculty WHERE username='$uid'";
					$result=mysqli_query($conn,$sql);
					$resultCheck=mysqli_num_rows($result);

					if($resultCheck>0)
					{
						$row=mysqli_fetch_assoc($result);
						$pwd=md5($pwd);
						if($row['admin']&&($row['pwd']==$pwd))
						{
							header("Location: ../reg_adm.php?Already_registered");
							exit();
						} 
						else 
						{
							$sql="UPDATE faculty SET admin='1' WHERE username='$uid' AND fac_pwd='$pwd'";
							mysqli_query($conn,$sql);
							header("Location: ../reg_adm.php?registration=success");
							exit();
						}
					}
					else
					{
						//hashing the password
						//$hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
						//Insert the user into the database
						$pwd=md5($pwd);
						$sql="INSERT INTO faculty (firstname,lastname,branchid,emailid,username,fac_pwd,profieimg,admin) VALUES ('$first','$last','$branch_id','$email_id','$uid','$pwd','NULL','1');";
						mysqli_query($conn,$sql);
						session_start();
						/*$_SESSION['u_first']=$first;
						$_SESSION['u_last']=$last;
						$_SESSION['u_email']=$email;
						$_SESSION['u_name']=$uid;

						$userid=$_SESSION['u_email'];
						$sql="INSERT INTO profileimg (userid,status) VALUES ('$userid',0)";
						mysqli_query($conn, $sql);*/
                        header("Location: ../reg_adm.php?registration=success");
						exit();
					}
				}
			}
		}
	}
	
	//Faculty registration
	if(isset($_POST['Faculty_submit']))
	{
		$first=mysqli_real_escape_string($conn,$_POST['first']);
		$last=mysqli_real_escape_string($conn,$_POST['last']);
		$branch_id=mysqli_real_escape_string($conn,$_POST['branch_id']);
		$email_id=mysqli_real_escape_string($conn,$_POST['email_id']);
		$uid=mysqli_real_escape_string($conn,$_POST['uid']);
		$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

		//Error handlers
		//check for empty fields
		if(empty($first)||empty($last)||empty($branch_id)||empty($email_id)||empty($uid)||empty($pwd))
		{
			header("Location: ../index.php?fill_up_the_entries");
			exit();
		}
		else
		{
			//check if input characters are valid
			if(!preg_match("/^[a-zA-Z]*$/",$first)||!preg_match("/^[a-zA-Z]*$/",$last))
			{
				header("Location: ../index.php?invalid_firstname_and_lastname");
				exit();
			}
			else
			{
				//check if email is valid
				if(filter_var($email_id,FILTER_VAIDATE_EMAIL))
				{
					header("Location: ../reg_adm.php?invalid_email_id");
					exit();
				}
				else
				{
					$sql="SELECT *FROM faculty WHERE username='$uid'";
					$result=mysqli_query($conn,$sql);
					$resultCheck=mysqli_num_rows($result);

					if($resultCheck>0)
					{
						header("Location: ../reg_adm.php?Already_registered");
						exit();
					}
					else
					{
						//hashing the password
						//$hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
						//Insert the user into the database
						$pwd=md5($pwd);
						$sql="INSERT INTO faculty (firstname,lastname,branchid,emailid,username,fac_pwd) VALUES ('$first','$last','$branch_id','$email_id','$uid','$pwd');";
						mysqli_query($conn,$sql);
						session_start();
						/*$_SESSION['u_first']=$first;
						$_SESSION['u_last']=$last;
						$_SESSION['u_email']=$email;
						$_SESSION['u_name']=$uid;

						$userid=$_SESSION['u_email'];
						$sql="INSERT INTO profileimg (userid,status) VALUES ('$userid',0)";
						mysqli_query($conn, $sql);*/
                        header("Location: ../fac_acc.php?registration=success");
						exit();
					}
				}
			}
		}
	}

	//Students registration
	else if(isset($_POST['User_submit']))
	{
		$first=mysqli_real_escape_string($conn,$_POST['first']);
		$last=mysqli_real_escape_string($conn,$_POST['last']);
		$branch_id=mysqli_real_escape_string($conn,$_POST['branch_id']);
		$sem_id=mysqli_real_escape_string($conn,$_POST['sem_id']);
		$email_id=mysqli_real_escape_string($conn,$_POST['email_id']);
		$reg_id=mysqli_real_escape_string($conn,$_POST['reg_id']);
		$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

		//Error handlers
		//check for empty fields
		if(empty($first)||empty($last)||empty($branch_id)||empty($sem_id)||empty($email_id)||empty($reg_id)||empty($pwd))
		{
			header("Location: ../reg_user.php?fill_up_the_entries");
			exit();
		}
		else
		{
			//check if input characters are valid
			if(!preg_match("/^[a-zA-Z]*$/",$first)||!preg_match("/^[a-zA-Z]*$/",$last))
			{
				header("Location: ../reg_user.php?invalid_firstname_and_lastname");
				exit();
			}
			else
			{
				//check if email is valid
				if(filter_var($email_id,FILTER_VAIDATE_EMAIL))
				{
					header("Location: ../reg_user.php?invalid_email_id");
					exit();
				}
				else
				{
					$sql="SELECT *FROM users WHERE regid='$reg_id'";
					$result=mysqli_query($conn,$sql);
					$resultCheck=mysqli_num_rows($result);

					if($resultCheck>0)
					{
						header("Location: ../reg_user.php?Already_registered");
						exit();
					}
					else
					{
						//hashing the password
						//$hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
						//Insert the user into the database
						$pwd=md5($pwd);
						$sql="INSERT INTO users (firstname,lastname,branchid,semid,emailid,regid,user_pwd) VALUES ('$first','$last','$branch_id','$sem_id','$email_id','$reg_id','$pwd');";
						$sql1="INSERT INTO attendance (semid,CS601,CS602,CS603,CS604,CS605,CS606,CS501,regid) VALUES ('$sem_id',0,0,0,0,0,0,0,'$reg_id');";
						mysqli_query($conn,$sql1);
						mysqli_query($conn,$sql);
						session_start();
						/*$_SESSION['u_first']=$first;
						$_SESSION['u_last']=$last;
						$_SESSION['u_email']=$email;
						$_SESSION['u_name']=$uid;

						$userid=$_SESSION['u_email'];
						$sql="INSERT INTO profileimg (userid,status) VALUES ('$userid',0)";
						mysqli_query($conn, $sql);*/
                        header("Location: ../reg_user.php?registration=success");
						exit();
					}
				}
			}
		}
	}
	
	//Introduce new courses
	else if(isset($_POST['include_new_subjects']))
	{
		$branch_id=mysqli_real_escape_string($conn,$_POST['branch_id']);
		$sem_id=mysqli_real_escape_string($conn,$_POST['sem_id']);
		$sub_name=mysqli_real_escape_string($conn,$_POST['sub_name']);
		$course_id=mysqli_real_escape_string($conn,$_POST['course_id']);
		$uid=mysqli_real_escape_string($conn,$_POST['uid']);

		//Error handlers
		//check for empty fields
		if(empty($branch_id)||empty($sem_id)||empty($sub_name)||empty($uid))
		{
			header("Location: ../new_subjects.php?fill_up_the_entries");
			exit();
		}
		else
		{
			$sql="SELECT *FROM subjects WHERE subname='$sub_name'";
			$result=mysqli_query($conn,$sql);
			$resultCheck=mysqli_num_rows($result);

			if($resultCheck>0)
			{
				header("Location: ../new_subjects.php?Already_included");
				exit();
			}
			else
			{
				$sql="INSERT INTO subjects (subname,uid,semid,branchid,course_id) VALUES ('$sub_name','$uid','$sem_id','$branch_id','$course_id');";
				mysqli_query($conn,$sql);
				session_start();
				
                header("Location: ../new_subjects.php?Include=success");
				exit();
			}
		}
	}

?>