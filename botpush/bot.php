<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'fmgZS5qsjPSo77mc0WtKxi0E7vwp4T136BpPXugDxVUvku2LocT3TP6djzPQ2sCa1FEFHpRiuukRsHwIeTRYlMehPS0qXPXPhIOt+SzfExqP93qAJKl2Mj4fJF7TFYalFjEdElvMwND7Zr9IhYQ49wdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '6405f946a2fffc5af226887250330b87';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);


echo "OK";




function send_reply_message($url, $post_header, $post_body)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);

	return $result;
}

?>