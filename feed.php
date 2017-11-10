		<?php

		$db_username = 'root';
		$db_password = '';
		$db_name = 'csit legacy';
		$db_host = 'localhost';	
		$sql_con = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
		
	
		$results = mysqli_query($sql_con,"SELECT * from feed order by id desc");
		while($row = mysqli_fetch_array($results))
		{
			$msg_time = date('h:i A M d',strtotime($row["date_time"])); //message posted time
			echo '<div class="shout_msg"><time>'.$msg_time.'</time><span class="username">'.$row["user"].'</span> <span class="message">'.$row["message"].'</span></div>';
		}

		?>