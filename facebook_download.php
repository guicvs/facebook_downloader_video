<?php
//script by @thequeen-guicvs
//https://github.com/guicvs/



$video_url = $_GET["url_video"];

$random = rand(0, 998998956);
$passagem = false;

if(strlen($video_url) > 0){
	
	$passagem = true;
	
}


function getStr($dado, $string, $string2){

	preg_match_all("($string(.*)$string2)siU", $dado, $match1);
	return $match1[1][0];

}

function detectar_url($urlorid){
	
	if(strpos($urlorid, "facebook.com") !== false){
		
		return true;
		
	}
	
	return false;
	
}
if($passagem == true){
	
	
	if(detectar_url($video_url) == true){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $video_url);
		curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/Cookie'.$random.'.txt');
		curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/Cookie'.$random.'.txt');
		curl_setopt($ch, CURLOPT_PROXY, "192.168.49.1:8282");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$data = curl_exec($ch );
		
		$data_download = getStr($data, 'video&quot;,&quot;src&quot;:&quot;', '&quot;,&quot;wi');
		$data_download = urldecode($data_download);
		$data_download = str_replace('\\', '', $data_download);
		$data_download = str_replace('amp;', '', $data_download);
		$filename = getStr($data, ';"><p>', '</p>').'.mp4';
		
		if(strlen($filename) > 5){}else{$filename="download.mp4";}
		
		header("Content-disposition: attachment;filename=$filename");
		
		//echo $data_download;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, utf8_decode($data_download));
		curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/Cookie'.$random.'.txt');
		curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/Cookie'.$random.'.txt');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8", "Host: video-gig2-1.xx.fbcdn.net", "Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7"));
		curl_setopt($ch, CURLOPT_PROXY, "192.168.49.1:8282");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$data = curl_exec($ch );
		
		echo $data;

	}else{
		
		
		
	}
	
	
	
	
}else{
	
	echo "usage:<br>insert ?url_video.php=<br>in url and add the facebook post url.<br>example: http://127.0.0.1/facebook_download.php?url_video=https://m.facebook.com/humor4000/posts/1940355735997131";
	
	echo "<br><br>by @thequeen-guicvs";
	echo "<br><p><a href=\"https://github.com/guicvs/facebook_downloader_video\">GitHub</a></p>";
	
}