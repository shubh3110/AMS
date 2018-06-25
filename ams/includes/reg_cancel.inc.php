<?php
	
	include_once 'dbh.inc.php';
	//Admin registration
	if(isset($_POST['reg_cancel_submit']))
	{
		$branch_id=mysqli_real_escape_string($conn,$_POST['branch_id']);
		$reg_id=mysqli_real_escape_string($conn,$_POST['reg_id']);

		//Error handlers
		//check for empty fields
		if(empty($branch_id)||empty($reg_id))
		{
			header("Location: ../reg_cancel.php?fill_up_the_entries");
			exit();
		}
		else
		{
			//check if entry exist in table
			$sql="SELECT *FROM users WHERE regid='$reg_id' AND branchid='$branch_id'";
			$result=mysqli_query($conn,$sql);
			$resultCheck=mysqli_num_rows($result);

			if($resultCheck<0)
			{
				header("Location: ../index.php?Registration_already_canceled");
				exit();
			}
			else
			{
				$sql="DELETE FROM users WHERE regid='$reg_id' AND branchid='$branch_id'";
				mysqli_query($conn,$sql);
				session_start();
				
                header("Location: ../reg_cancel.php?registration_cancellation=success");
				exit();
			}
		}
	}
	/*else
	{
		header("Location: ../index.php");
		exit();
	}*/

?>