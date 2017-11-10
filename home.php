<?php
include 'cookie.php';
?>
<html>
<head>
	<title>CSIT LEGACY</title>
	<link rel="shortcut icon" href="icon/logo.png">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>

<div id="wrapper">
	<div class="row">
	<div class="col-xs-12 col-md-1"></div>
	<div class="col-xs-12 col-md-5">
	<div class="header">
		<img style="width:100%; height:60%;" src="images/CSIT.png">
	</div>
	</div>
	<div class="col-xs-12 col-md-5">
		<center>
	<div style="width:50%; height:60%" class="kaliwa">
	
		<img style="width:80%; height:100%;" src="images/newlogin.png">
		
		<div style="width:100%; height:60%" class="image">
			<img style="width:100%;margin-left:20px; height:50%; top:35%; right:-15%;"src="background/frame.png">
		</div>
		
		<form style="float:left;" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
			<input style="width:50%; margin-bottom:30px; height:25px; top:50%; right:10%;" type="text" name="rfid" placeholder="ID NUMBER" class="input"> <br><br>
			<input style="width:50%; margin-bottom:20px; height:25px; top:57%;right:10%;" type="password" name="password" placeholder="PASSWORD" class="input1"> <br><br>
			<input style="width:50%; margin-bottom:20px; height:25px; top:65%;right:10%;" type="submit" name="login" value="LOG IN" class="input2"> 
		</form>
	</div>
</center>
	</div>
</div>
</div>
	
	<center>
	<div class="row">
		<div class="col-xs-12 md-12">
	
	<div style="margin-left:10%;width:92%; height:100%;" class="footer">
		
			<br><br>
			<h1 style="margin-right:10%;">CSIT ORG @ 2014</h1>
			<div style="width:30%; height:100%;" class="fl">
			<h2>WEB/SYSTEM DEVELOPERS</h2>
			<p><a href="">Meg Marcaida</a> | <a href="">Mary Joyce Chacon</a> | <br><a href="">Charlie Dela Rosa</a> | <a href="">Kenneth Yabut</a> | <a href="">Jonathan Panogalinga</a> |
			 <a href="">Ryan Laguisma</a> | <a href="">Hazel Magadan</a></p> | <a href="">Arnel Molina</a></p>
			</div>

			<div style="width:30%; height:100%;"class="fl1">
			<h2>GAME DEVELOPER</h2>
			<p><a href="">Angelica Abrigo</a> | <a href="">Jhonny Balderama</a> | <br><a href="">Denice Anne Pineda</a> | <a href="">Sarah Mae Caras</a> | 
			 <a href="">Gwen Aroa</a> | <br><a href="">Jason Bonifacio</a></p>
			</div>

			<div style="width:30%; height:100%;"class="fl2">
			<h2>WEB DESIGNER</h2>
			<p><a href="">Jerome Joshua Ranola</a> | <a href="">Renz Joren</a> | <br><a href="">Meljhan Bandagosa</a> | <a href="">Camelle Redrendo</a> |<a href="">Camelle Colinayo</a> |
			
			</div>
		
	</div>

</div>
</div>
</center>
</body>
</html>