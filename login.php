<html>
<head>
	<title>CSIT LEGACY</title>
	<link rel="shortcut icon" href="icon/logo.png">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<script src="js/jquery1.min.js"></script>
	<style type="text/css">
<!--
.shout_box {
	background: yellow;
	width: 300px;
	overflow: hidden;
	position: fixed;
	bottom: 0;
	right: 0%;
	z-index:9;
	border-radius: 10px;
}
.shout_box .header1 .close_btn {
	background: url(images/close_btn.png) no-repeat 0px 0px;
	float: right;
	width: 15px;
	height: 15px;

}
.shout_box .header1 .close_btn:hover {
	background: url(images/close_btn.png) no-repeat 0px -16px;
}

.shout_box .header1 .open_btn {
	background: url(images/close_btn.png) no-repeat 0px -32px;
	float: right;
	width: 15px;
	height: 15px;
}
.shout_box .header1 .open_btn:hover {
	background: url(images/close_btn.png) no-repeat 0px -48px;
}
.shout_box .header1{
	padding: 5px 3px 5px 5px;
	font: 14px 'lucida grande', tahoma, verdana, arial, sans-serif;
	font-weight: bold;
	color:#000;
	border: 1px solid rgba(0, 39, 121, .76);
	border-bottom:none;
	cursor: pointer;
}
.shout_box .header1:hover{
	background-color: #627BAE;
}
.shout_box .message_box {
	background: #FFFFFF;
	height: 100%;
	overflow:auto;
	border: 1px solid #CCC;
}
.shout_msg{
	margin-bottom: 10px;
	display: block;
	border-bottom: 1px solid #F3F3F3;
	padding: 0px 5px 5px 5px;
	font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
	color:#7C7C7C;
}
.message_box:last-child {
	border-bottom:none;
}
time{
	font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
	font-weight: normal;
	float:right;
	color: black;
}
.shout_msg .username{
	margin-bottom: 10px;
	margin-top: 10px;
}
.user_info input {
	width: 98%;
	height: 25px;
	border: 1px solid #CCC;
	border-top: none;
	padding: 3px 0px 0px 3px;
	font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
}
.shout_msg .username{
	font-weight: bold;
	display: block;
}
-->
</style>

<script type="text/javascript" src="jsfb/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	// load messages every 1000 milliseconds from server.
	load_data = {'fetch':1};
	window.setInterval(function(){
	 $.post('shout.php', load_data,  function(data) {
		$('.message_box').html(data);
		var scrolltoh = $('.message_box')[0].scrollHeight;
		$('.message_box').scrollTop(scrolltoh);
	 });
	}, 1000);

		load_data = {'fetch':1};
	window.setInterval(function(){
	 $.post('feed.php', load_data,  function(data) {
		$('.feed').html(data);
		var scrolltoh = $('.feed')[0].scrollHeight;
		$('.feed').scrollTop(scrolltoh);
	 });
	}, 1000);

	
	//method to trigger when user hits enter key
	$("#shout_message").keypress(function(evt) {
		if(evt.which == 13) {
				var iusername = $('#shout_username').val();
				var imessage = $('#shout_message').val();
				post_data = {'username':iusername, 'message':imessage};
			 	
				//send data to "shout.php" using jQuery $.post()
				$.post('shout.php', post_data, function(data) {
					
					//append data into messagebox with jQuery fade effect!
					$(data).hide().appendTo('.message_box').fadeIn();
	
					//keep scrolled to bottom of chat!
					var scrolltoh = $('.message_box')[0].scrollHeight;
					$('.message_box').scrollTop(scrolltoh);
					
					//reset value of message box
					$('#shout_message').val('');
					
				}).fail(function(err) { 
				
				//alert HTTP server error
				alert(err.statusText); 
				});
			}
	});
	
	//toggle hide/show shout box
	$(".close_btn").click(function (e) {
		//get CSS display state of .toggle_chat element
		var toggleState = $('.toggle_chat').css('display');
		
		//toggle show/hide chat box
		$('.toggle_chat').slideToggle();
		
		//use toggleState var to change close/open icon image
		if(toggleState == 'block')
		{
			$(".header1 div").attr('class', 'open_btn');
		}else{
			$(".header1 div").attr('class', 'close_btn');
		}
		 
		 
	});
});

</script>
</head>
<body style="background-color:#ccc;">
	<div id="wrapper">
	<div class="header">
		<div class="row">
		<div class="col-xs-12 md-12">
		<div class="nav">
			<nav class="cl-effect-14">
			
				<img src="bg/csit.png">
			
			
					<a href="logout.php"><span data-hover="LOG OUT">LOG OUT</span></a>
					<a href="services/services.php"><span data-hover="SERVICES">SERVICES</span></a>
					<a href="about/about.php"><span data-hover="ABOUT">ABOUT</span></a>
                    <a href="login.php"><span data-hover="HOME">HOME</span></a>
                    <input type="text" name="search" class="search" placeholder="SEARCH">
				


			</nav>
		</div>
	</div>
	</div>


	<div class="left">

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

echo '<a href="login.php"><img width="100px" style="margin-top:10%;margin-left:10%;float:left;"src="data:image/jpeg;base64,'.base64_encode( $info['imgurl'] ).'"/></a>';
echo "<a style='float:left;margin-top:1%;color:black;margin-left:10%;font-weight:bold;' href='profile.php?$fullname'>". $fullname.'</a>';




} 
}

else 
//if the cookie does not exist, they are taken to the login screen 
{ 
	//header('location:home.php');
	print "<script type='text/javascript'>window.location.href='home.php';</script>";
} 
?>

<a style='float:left;margin-top:20%;margin-left:-35%;color:blue;font-weight:bold;' href="">News Feed</a>
	</div>


	<div class="mid">
		<script> 
		$(document).ready(function(){
		  $("#focus").focus(function(){
		    $("#show").slideToggle("slow");
		  });
		});
		</script>
 
			

		<form action="" method="POST">
			<b style="color:red;margin:2%;">Update Status</b>
			<br>
			<textarea required id="focus" maxlength='500' style="color:red;margin:2%;width:90%;" name="message" type="text"></textarea>
			<input id="show" type="submit" style="color:black;margin-left:85%;display:none;border-radius:5px;" name="post" value="POST">
		</form>
	</div>
	


	<div class="right">
	</div>
	<div class="mid1">
		<div class="feed">
		</div>
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

 
			
	</div>
	
<div class="shout_box">
<div class="header1">CSIT LEGACY MESSAGE BOX <div class="close_btn">&nbsp;</div></div>
  <div class="toggle_chat">
  <div class="message_box">
    </div>
    <div class="user_info">
    <input id="shout_username" type="text" readonly value="<?php echo $fname . ' ' . $mname . ' ' . $lname ?>"/>
    <input name="shout_username" id="shout_username" type="hidden" value="<?php echo $fname . ' ' . $mname . ' ' . $lname ?>"/>
   <input name="shout_message" id="shout_message" type="text" placeholder="Type your message here... and hit enter" maxlength="100" /> 
    </div>
    </div>
</div>




			
    	

</body>

</html>