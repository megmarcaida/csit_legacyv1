<html>
<head>
	<title>CSIT LEGACY</title>
	<link rel="shortcut icon" href="icon/logo.png">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<script type="text/javascript" src="jsfb/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	// load messages every 1000 milliseconds from server.
	load_data = {'fetch':1};
	window.setInterval(function(){
	 $.post('status1.php', load_data,  function(data) {
		$('.status1').html(data);
		var scrolltoh = $('.status1')[0].scrollHeight;
		$('.status1').scrollTop(scrolltoh);
	 });
	}, 1000);
	});
	

</script>
</head>
<body>
	<div id="wrapper">
	<div class="header">
		<div class="nav">
			<nav class="cl-effect-14">
				<img src="bg/csit.png">
					<a href="logout1.php"><span data-hover="LOG OUT">LOG OUT</span></a>
					<a href="services/services.php"><span data-hover="SERVICES">SERVICES</span></a>
					<a href="about/about.php"><span data-hover="ABOUT">ABOUT</span></a>
                    <a href="login.php"><span data-hover="HOME">HOME</span></a>

                    <input type="text" name="search" class="search" placeholder="SEARCH">
				
			</nav>
		</div>
	</div>


	<div class="mid-profile">
		<div class="picture">
<?php 
// Connects to your Database 
include 'connect.php';

//checks cookies to make sure they are logged in 
if(isset($_COOKIE['ID_my_site'])) 
{ 
$rfid = $_COOKIE['ID_my_site']; 
$pass = $_COOKIE['Key_my_site']; 
$check = mysql_query("SELECT * FROM students WHERE rfid = '$rfid'")or die(mysql_error());
//$info2 = mysql_fetch_array($check);
//$name=$info2['firstname'];
$info = mysql_fetch_array( $check );
$fname=$info['firstname'];
$mname=$info['middlename'];
$lname=$info['lastname'];
$fullname = $fname . ' '. $mname .' ' .$lname;
$course=$info['course'];
$section=$info['section'];
$year=$info['year'];
$image=$info['imgurl'];
$email=$info['email'];
$status=$info['status'];




//if the cookie has the wrong password, they are taken to the login page 
if ($pass != $info['password']) 
{

 header("Location: home.php"); 
exit(); 

} 

//otherwise they are shown the admin area 
else 
{ 
@session_start();
include_once ("config.php");

echo '<a href="login.php"><img width="100px" style="margin-top:10%;float:left;"src="data:image/jpeg;base64,'.base64_encode( $info['imgurl'] ).'"/></a>';
echo "<a style='float:left;margin-top:1%;color:black;margin-left:10%;font-weight:bold;' href='login.php?$fullname'>". $fullname.'</a>';
echo "<b style='float:left;margin-top:1%;color:black;margin-left:10%;font-weight:bold;'>". $course. " ". "</b>";
echo "<b style='float:left;margin-top:1%;color:black;margin-left:1%;font-weight:bold;'>". $section.'</b>';
echo "<b style='float:left;margin-top:9%;margin-left:-23.5%;color:black;font-weight:bold;'>". $year.'</b>';
echo "<b style='float:left;margin-top:18%;margin-left:-23.5%;color:black;font-weight:bold;'>". $email.'</b>';
echo "<b style='float:left;margin-top:2%;margin-left:10%;color:black;font-weight:bold;'>Status: ". $status.'</b>';



} 
}

else 
//if the cookie does not exist, they are taken to the login screen 
{ 
	//header('location:home.php');
	print "<script type='text/javascript'>window.location.href='home.php';</script>";
} 
?>
			<img src="images/1.gif" class="gif">
		</div>

		<div class="lamang-loob">
			<fieldset>
				<img src="images/ban.jpg" class="banner">
			</fieldset>

			<fieldset>
				<form action="" method="POST">
				<textarea placeholder="Share your ideas..." type="textbox" name="message"class="post"></textarea>
				<input type="submit" value="POST" name="post" class="submit-post">
				
				</form>
		<?php

		$db_username = 'root';
		$db_password = '';
		$db_name = 'csit legacy';
		$db_host = 'localhost';	
		$sql_con = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
		
		if (isset($_POST['post']))
		{
			$username = filter_var(trim($fullname),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
			$message = filter_var(trim($_POST["message"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
			$user_ip = $_SERVER['REMOTE_ADDR'];

			$post = mysqli_query($sql_con,"INSERT INTO feed(user, message, ip_address,rfid) value('$username','$message','$user_ip','$rfid')");
			if ($post)
			{
				echo "Status has been posted";
			}

		}

		?>

			</fieldset>

			
					<?php

		$db_username = 'root';
		$db_password = '';
		$db_name = 'csit legacy';
		$db_host = 'localhost';	
		$sql_con = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
		
	
		$results = mysqli_query($sql_con,"SELECT * from feed where rfid = '$rfid' order by id desc");
		while($row = mysqli_fetch_array($results))
		{
			$msg_time = date('h:i A M d',strtotime($row["date_time"])); //message posted time
			echo '<fieldset><div class="shout_msg"><span class="username">'.$row["user"].'</span> </div>';
			echo '<br><span class="message" style=" width:300px;padding:10px;">'.$row["message"].'</span> <time style="float:right;color:gray;"> '.$msg_time.'</time><br></fieldset>	';
		}

		?>
			
		</div>

	</div>
	



			
    	<div class="footer">
	        	<fieldset>
	        		<center><p>CSIT ORG @ 2014</p></center>
	        	</fieldset>
		</div>
		

</body>

</html>