<?php
include('config.php');
if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image'][	'tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"../slider/slider1/" . $_FILES["image"]["name"]);
			
			$location="slider/slider1/" . $_FILES["image"]["name"];
			
			$save=mysql_query("INSERT INTO area1_tbl (name) VALUES ('$location')");
			header("location: ../admin_index.php");
			exit();					
	}
?>
