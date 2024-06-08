<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'cyhk4oo4d9/u6W3tYZlF5DDR0p3cMOe9aOJb91SbpyBB2LBQ4vqdJrE0CKoAlCHJZvdPtVSaE3PqFhoGT+m79r8JAQ2T7jNUCSqELXoUb9OPZNmQO9afNURfbhavK9lij4ue+Wfpp9mBnVgxlc0OkQdB04t89/1O/w1cDnyilFU='; 
$channelSecret = 'f2c13425c9ee4f90d8728b996c2a1a92';


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