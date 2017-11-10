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



} 
}

else 
//if the cookie does not exist, they are taken to the login screen 
{ 
    //header('location:home.php');
    print "<script type='text/javascript'>window.location.href='../home.php';</script>";
} 
?>

<html lang="en">
    <head>
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="shortcut icon" href="../icon/logo.png">
        <link rel="stylesheet" type="text/css" href="css/style3.css" />


	</head>
    <body>
    
    <div class="container">
			<!-- Codrops top bar -->
        
        <div class="header">
        <div class="nav">
            <nav class="cl-effect-14">
                <img src="../bg/csit.png">
                    <a href="logout1.php"><span data-hover="LOG OUT">LOG OUT</span></a>
                    <a href="../services/services.php"><span data-hover="SERVICES">SERVICES</span></a>
                    <a href="about.php"><span data-hover="ABOUT">ABOUT</span></a>
                    <a href="../login.php"><span data-hover="HOME">HOME</span></a>

                    <input type="text" name="search" class="search" placeholder="SEARCH">
                
            </nav>
        </div>
        </div>

        <header>
            <h1> CSIT OFFICERS</h1>
        </header>

        <div class="wrapper">
			<div class="kaliwa">
			<ul class="mh-menu">
				<li><a href="#"><span>President</span> <span>Mary Joyce Ann Chacon</span></a><img src="it/1.jpg" alt="image01"/></li>
				<li><a href="#"><span>Vice-President [Internal Affairs]</span> <span>El Miguel Marcaida</span></a><img src="csit/1.jpg" alt="image02"/></li>
				<li><a href="#"><span>Vice-President [External Affairs]</span> <span>Renz Joren</span></a><img src="images/3.jpg" alt="image03"/></li>
				<li><a href="#"><span>Secretary</span> <span>Sarah Mae Caras</span></a><img src="csit/2.jpg" alt="image04"/></li>
                <li><a href="#"><span>P.R.O 1</span> <span>Denice Anne Pineda</span></a><img src="it/12.jpg" alt="image05"/></li>
                <li><a href="#"><span>P.R.O 2</span> <span>Ronnel Aguro</span></a><img src="images/4.jpg" alt="image06"/></li>
                <li><a href="#"><span>Treasurer</span> <span>Angelica Abrigo</span></a><img src="csit/3.jpg" alt="image07"/></li>
                <li><a href="#"><span>Auditor</span> <span>Louie Sarte</span></a><img src="it/5.jpg" alt="image08"/></li>
			</ul>
			</div>

			<div class="kanan">
			<ul class="mh-menu">	
                <li><a href="#"><span>4th Yr. Representative [BSIT]</span> <span>Meljhan Bandagosa</span></a><img src="it/16.jpg" alt="image09"/></li>
                <li><a href="#"><span>4th Yr. Representative [BSIT]</span> <span>Mark Dale Gomito</span></a><img src="it/3.jpg" alt="image10"/></li>
                <li><a href="#"><span>4th Yr. Representative [BSIT]</span> <span>Ranola Jerome Joshua</span></a><img src="it/resume.jpg" alt="image11"/></li>
                <li><a href="#"><span>3rd Yr. Representative [BSIT]</span> <span>John David Lozano</span></a><img src="it/6.jpg" alt="image12"/></li>
                <li><a href="#"><span>3rd Yr. Representative [BSIT]</span> <span>Jennilyn Dacallos</span></a><img src="it/2.jpg" alt="image13"/></li>
                <li><a href="#"><span>3rd Yr. Representative [BSIT]</span> <span>Angelica Meguillo</span></a><img src="it/8.jpg" alt="image14"/></li>
                <li><a href="#"><span>2nd Yr. Representative [BSIT]</span> <span>Ma. Leahlyn Taupa</span></a><img src="it/11.jpg" alt="image15"/></li>
                <li><a href="#"><span>2nd Yr. Representative [BSIT]</span> <span>Dennise Ramirez</span></a><img src="it/10.jpg" alt="image16"/></li>
                <li><a href="#"><span>2nd Yr. Representative [CS]</span> <span>Jinky Ramos</span></a><img src="it/7.jpg" alt="image17"/></li>
                <li><a href="#"><span>1st Yr. Representative [BSIT]</span> <span>Aldrin Magayaga</span></a><img src="it/9.jpg" alt="image18"/></li>
                <li><a href="#"><span>1st Yr. Representative [BSIT]</span> <span>Krisha Mae Mendoza</span></a><img src="images/4.jpg" alt="image19"/></li>
                <li><a href="#"><span>1st Yr. Representative [BSIT]</span> <span>Joyce Salamat</span></a><img src="images/4.jpg" alt="image20"/></li>
			</ul>
			</div>
			<br>
			<div class="bago">
				<p>CSIT Society provide expertise and insights to help student become more accomplished professionals contributing to the management and development of new advance methods and technoligies;</p>
                <br><br>

                <h4>PHILOSOPHY</h4><br>
                <p><i>"Our people, Our strength."</i> The fusion of the diverse talents and the ideas of our people drives our teams. We nurture an intellectually vibrant community, where everyone can develop and make a difference. The only real failure is the refusal to try.</p>
                <br>
                <p>CSIT program is committed to build a comprehensive program that provides excellent educational opportunities to the students through high activities, seminars and tutorials, </p>
			</div>

            <div class="bago1">
                <center><h3>CORE VALUES</h3></center> <br>
                <h4>Innovation</h4> <br>
                    <p>Innovation is the key to our success. We pursue opportunities to deliver creative solutions. We welcome change. We are confident of our ability to shape the future.</p> <br>
                <h4>Professionalism</h4> <br>
                    <p>We are committed to performing at the highest level of competencies and skills. Training and education empower us in our roles.</p><br>
                <h4>Excellence</h4><br> 
                    <p>We serve to the highest standards.</p><br>
                <h4>Teamwork </h4><br>
                    <p>We value the synergy of individuals working together effectively towards a shared purpose.</p>
            </div>
		</div>
    </div>

    <div class="footer">
        	<fieldset>
        		<center><p>CSIT ORG @ 2014</p></center>
        	</fieldset>
	</div>
    </body>
</html>