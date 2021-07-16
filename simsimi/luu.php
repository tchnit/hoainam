<?php
include'./config.php';
   mysql_query("CREATE TABLE IF NOT EXISTS `simi` (
      `stt` int(32) NOT NULL AUTO_INCREMENT,
      `ask` varchar(5000) NOT NULL,
      `ans` varchar(5000) NOT NULL,
	  `by` varchar(50) NOT NULL,
      `time` varchar(32) NOT NULL,
      PRIMARY KEY (`stt`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
if(isset($_GET['hoi']) && isset($_GET['dap']))
{
	$hoi = $_GET['hoi'];
	$dap = $_GET['dap'];
}

if(isset($hoi) && isset($dap))
{	
$check = mysql_result(mysql_query("SELECT count(*) from simi WHERE `ask` = '".$hoi."' AND `ans` = '".$dap."' "),0);
if($check == "0")
	{
 mysql_query(
         "INSERT INTO
         simi
         SET
         `ask` = '".addslashes($hoi)."',
         `ans` = '".addslashes($dap)."',
		 `by` = '".addslashes($by)."',
         `time` = '".date('H:i')."' ");
	}
}		 
?>