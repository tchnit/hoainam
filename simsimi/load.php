<?php

include './config.php';
if($hoi == 'sim học được gì rồi')
 {
$data = mysql_query("SELECT * FROM simi ");
$tong = mysql_num_rows($data);

$dap = 'Em đã học được: '.$tong.' từ rồi ạ.
mọi người dạy em thêm đi';
 }
 else{
$data = mysql_query("SELECT * FROM simi WHERE `ask` ='".$hoi."' ");
$tong = mysql_num_rows($data);
$dulieu = array();
$i = 0;
while ($load = mysql_fetch_array($data))
{	
	$dulieu[$i] = $load[ans];
	$i++;
}

$random = rand(0,count($dulieu)-1);
$dap = $dulieu[$random];

//include '../search_arr/search.php';
 
if($i <1)
{
	$bot= json_decode(auto("http://api.simsimi.com/request.p?key=your_paid_key&lc=vn&ft=1.0&text=".urlencode($hoi)),true);
	$bot = $bot[response];
	
	//$dap = 'Câu này em chưa được DS dạy! bạn dạy tui được hơm :). Trả lời láo thì là: '.$bot;
	$dap = '<font color="#00FF00">'.$bot.'</font>';
	
	//exit;
}
}
$response = $dap;//khoi tao sim cmt

function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
?>