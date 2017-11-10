<?php 
// Connects to your Database 
@mysql_connect("localhost", "root", "") or die(mysql_error()); 
@mysql_select_db("csit legacy") or die(mysql_error()); 
?>