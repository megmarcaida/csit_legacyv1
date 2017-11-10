<?php 
// Connects to your Database 
include '../connect.php';

//checks cookies to make sure they are logged in 
if(isset($_COOKIE['ID_my_site'])) 
{ 
$rfid = $_COOKIE['ID_my_site']; 
$pass = $_COOKIE['Key_my_site']; 
$check = mysql_query("SELECT * FROM students WHERE rfid = '$rfid'")or die(mysql_error());
//$info2 = mysql_fetch_array($check);
//$name=$info2['firstname'];
$info = mysql_fetch_array( $check );

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

} 
}

else 
//if the cookie does not exist, they are taken to the login screen 
{ 
	//header('location:home.php');
	print "<script type='text/javascript'>window.location.href='../home.php';</script>";
} 
?>


<html>
<head>
<title>CSIT LEGACY</title>
<link rel="shortcut icon" href="../icon/logo.png">
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="scripts/jquery.localscroll-1.2.7-min.js"></script>
<script type="text/javascript" src="scripts/jquery.scrollTo-1.4.2-min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#nav').localScroll(800);
	$('#intro').parallax("50%", 0.1);
	$('#second').parallax("50%", 0.1);
	$('.bg').parallax("50%", 0.4);
	$('#third').parallax("50%", 0.3);

})


</script>

</head>

<body>
	<ul id="nav">
		<li><a href="#intro" title="Next Section"><img src="icons/quiz.png" alt="Link" /></a></li>
	    <li><a href="#third" title="Next Section"><img src="icons/game.png" alt="Link" /></a></li>
	    <li><a href="#second" title="Next Section"><img src="icons/tutorial.png" alt="Link" /></a></li>
	</ul>
	
	<div id="intro">
		<div class="header">
		<div class="nav">
			<nav class="cl-effect-14">
				<img src="../bg/csit.png">
					<a href="logout1.php"><span data-hover="LOG OUT">LOG OUT</span></a>
					<a href="services.php"><span data-hover="SERVICES">SERVICES</span></a>
					<a href="../about/about.php"><span data-hover="ABOUT">ABOUT</span></a>
                    <a href="../login.php"><span data-hover="HOME">HOME</span></a>

				
			</nav>
		</div>
		</div>
		<div class="contain">
			<center>
			<div class="wrapper">
				<div class="quiz">
					<fieldset>
					<h1>QUIZZES</h1>
					<p>Quiz is the best way to test your <i>KNOWLEDGE</i></p>
					<p>CSIT LEGACY system provide quizzes for CS and IT students of Access Computer College to enhance their knowlegde and programming skills</p>
					</fieldset>

					<fieldset>

							<img src="images/announcement.png">
							<br>
							<?php

							include("../connect.php");

							$sql="SELECT * FROM announcement order by id desc";
							$qwer=mysql_query($sql);
							$row=mysql_fetch_array($qwer);

							echo '<center>'.$row['news'].'</center>';
							echo '<img style="width:100%; height:300px;margin-top:10px;float:left;"src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
							echo $row['date'];

							?>
					</fieldset>
				</div>

					<div class="an">
					<fieldset style="color:red;">
						<img src="images/rankings.png" style="width:100%;">
						<br><br>
						<center>
						<table cellpadding="1" cellspacing="1" id="resultTable">
				           <thead> 
								<th style="color:white;font-family:arial bold;background:#708090;font-size:30px"> Full Name</th>
								
								<th style="color:white;font-family:arial bold;text-align:center;background:#708090;font-size:30px"> Score </th>
								<th style="color:white;font-family:arial bold;background:#708090;font-size:30px"> Title</th>	
								
							</thead>
			
						
						<?php

							include("../connect.php");

							$sql="SELECT * FROM leaderboard_advanced INNER JOIN students ON students.rfid = leaderboard_advanced.rfid order by leaderboard_advanced.quiz_scoreadvanced desc limit 10";
							$qwer=mysql_query($sql);
							while($row=mysql_fetch_array($qwer))
								{
									echo'<tbody>';
									echo '<tr class="record">';
									echo '<td style="color:black;font-family:arial bold;font-size:25px;">'.$row['firstname'].' ';
									echo $row['middlename'].' ';
									echo $row['lastname'].' '.'</td>'; 
									echo '<td style="color:black;text-align:center;font-family:arial bold;font-size:25px;">'.$row['quiz_scoreadvanced'].'</td>';
									echo '<td style="color:black;font-family:arial bold;font-size:25px">'.$row['titleadvanced'].'</td>';
									echo '</tr>';
									echo'</tbody>';
									
								}
							?>
						</table>
					</center>
					</fieldset>


					</div>
			</div>
			</center>
		</div>
	</div> <!--#intro-->
	
	<div id="third">
		<div class="story">
	    	<div class="kaliwa2">
	    		<ul>
	        	<li><img src="images/games.png"></li>
	        	</ul>
	        </div>
	        <div class="kanan2">
	        	<fieldset>
	            <p>Games created by the CSIT Admin is available in CSIT System</p>
	        	</fieldset>
	        </div>

	        <div class="games">
	        	<a href=""><img src="images/folder design/cwp.png"></a>
	        	<a href=""><img src="images/folder design/icon folder.png"></a>
	        	<a href=""><img src="images/folder design/pentomino.png"></a>
	        	<a href=""><img src="images/folder design/pingpong.png"></a>
	        	<a href=""><img src="images/folder design/tictactoe.png"></a>
	        </div>
	    </div> <!--.story-->
	</div> <!--#third-->


	<div id="second">
		<div class="story">
			<div class="kaliwa">
				<ul>
	            <li><img src="images/pdf.png"></li><br><br>
	            <li><img src="images/video tuts.png" style="height:20%;"></li>
	            </ul>
	        </div>
	            <div class="kanan">
	            <fieldset>
	           	 <p>The CSIT System provides free tutorials and referrence manuals in different programming languages</p>
	    		</fieldset>
	    		<br><br><br><br><br>
	    		<fieldset>
	           	 <p>Video tutorials are available for more informational referrence, from basic to advance programming</p>
	    		</fieldset>
	    		</div>
				
				<div class="list">
	    		<img src="images/MIL.gif">
		    	</div>
	    </div> <!--.story-->
	    
	</div> <!--#second-->
	

<div class="footer">
        	<fieldset>
        		<center><p>CSIT ORG @ 2014</p></center>
        	</fieldset>
</div>
</body>
</html>
