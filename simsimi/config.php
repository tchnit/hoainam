<?php
session_start();
$host = "mysql.hostinger.vn";
$username = "u333200014_hack";
$password = "thinghiem";	
$dbname = "u333200014_hack";
$connection = mysql_connect($host,$username,$password);
if (!$connection){
die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbname) or die(mysql_error());
mysql_query("SET NAMES utf8");
?>