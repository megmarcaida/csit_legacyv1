<?php
				  if (isset($_POST['yes']))
	{
			$con = mysql_connect("localhost","root","");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			mysql_select_db("manisys_db", $con);
			$messages_id = $_POST['id'];
			//$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			mysql_query("DELETE FROM area5_tbl WHERE id='$messages_id'");
			header("location: ../admin_index.php");
			exit();
			
			mysql_close($con);
			}
			 if (isset($_POST['no']))
	{
			
			header("location: ../admin_index.php");
			exit();
		
			}
			?>