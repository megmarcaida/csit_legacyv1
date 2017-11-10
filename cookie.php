<?php
include 'connect.php';
//Checks if there is a login cookie
if(isset($_COOKIE['ID_my_site']))

//if there is, it logs you in and directes you to the members page
{ 
$rfid = $_COOKIE['ID_my_site']; 
$pass = $_COOKIE['Key_my_site'];
$check = mysql_query("SELECT * FROM students WHERE rfid = '$rfid'")or die(mysql_error());
while($info = mysql_fetch_array( $check )) 
{
if ($pass != $info['password']) 
{
//	echo "<script type='text/javascript'>alert('Incorrect Password')</script>";
}
else
{
header("Location: login.php");
exit();
}
}
}

//if the login form is submitted
if (isset($_POST['login'])) { // if form has been submitted

// makes sure they filled it in
if(!$_POST['rfid'] | !$_POST['password']) {
echo "<script type='text/javascript'>alert('Please enter RFID Number and Password')</script>";
}
// checks it against the database

if (!get_magic_quotes_gpc()) {
$_POST['rfid'] = addslashes($_POST['rfid']);
}
$check = mysql_query("SELECT * FROM students WHERE rfid = '".$_POST['rfid']."'")or die(mysql_error());

//Gives error if user dosen't exist
$check2 = mysql_num_rows($check);
if ($check2 == 0) {
//die('That user does not exist in our database. <a href=registration.php>Click Here to Register</a>');
}
while($info = mysql_fetch_array( $check )) 
{
$_POST['password'] = stripslashes($_POST['password']);
$info['password'] = stripslashes($info['password']);

//gives error if the password is wrong
if ($_POST['password'] != $info['password']) {
echo "<script type='text/javascript'>alert('Incorrect Password')</script>";
}
else 
{ 

// if login is ok then we add a cookie 
$_POST['rfid'] = stripslashes($_POST['rfid']); 
$hour = time() + 3600; 
setcookie(ID_my_site, $_POST['rfid'], $hour); 
setcookie(Key_my_site, $_POST['password'], $hour); 

//then redirect them to the members area 
header("Location: login.php"); 
exit();
} 
} 
} 
else 
{ 

// if they are not logged in 
?> 

<?php 
} 

?>
