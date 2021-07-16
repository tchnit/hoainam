<?php
set_time_limit(0);
echo '
<meta charset="UTF-8">
<meta http-equiv=refresh content="0">';
$me = json_decode(auto('https://graph.facebook.com/me?access_token='.$token.'&fields=id'),true);
$stat=json_decode(auto('https://graph.facebook.com/'.$idcmt.'/feed?access_token='.$token.''),true);
$mgs = $stat[data][0][message];

if(!isset($mgs))
{
	echo 'Token đã chết:<br />Hãy thay token mới.<br />';
	exit;
}
$stat2=json_decode(auto('https://graph.facebook.com/'.$stat[data][0][id].'/comments?limit=3000&access_token='.$token.''),true);

if(getLog($me[id],$stat2[data][count($stat2[data])-1]) && !isMy($stat2[data][count($stat2[data])-1],$me[id])){
	
$tags = $stat2[data][count($stat2[data])-1][from][name];
$tags = preg_replace('/\s/','_',$tags);

include './load.php';
$response= str_replace('\n', '
', $response);

$message= '#'.$tags.': '.$response;

$url = 'https://graph.facebook.com/'.$stat[data][0][id].'/comments?message='.urlencode($message).'&access_token='.$token.'&method=post';
auto($url);
}

function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
function getLog($x,$y){
if(!is_dir('log')){
   mkdir('log');
   }
   if(file_exists('log/cm_'.$x)){
       $log=file_get_contents('log/cm_'.$x);
       }else{
       $log=' ';
       }

  if(ereg($y[id],$log)){
       return false;
       }else{
if(strlen($log) > 2000){
   $n = strlen($log) - 2000;
   }else{
  $n= 0;
   }
       saveFile('log/cm_'.$x,substr($log,$n).' '.$y[id]);
       return true;
      }
 }
 function isMy($post,$me){
  if($post[from][id] == $me){
     return true;
     }else{
     return false;
    }
}
 function saveFile($x,$y){
   $f = fopen($x,'w');
             fwrite($f,$y);
             fclose($f);
   }
?>