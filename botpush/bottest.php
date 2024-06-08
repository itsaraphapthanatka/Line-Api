<?php

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$idMessage = $arrJson['events'][0]['message']['id']; 

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('5R/AzsePGmZ2a1wZ62POIDPSh84iS9CZ00qkpJazrK1EBOGVIG4YNDsQhppWNlgV+wXXIYvSOFxBCD0siscs6WVCWb8JppilabkPXo9dEuCBPoVx/UfxsopcCO6SsaHBy13PESm5/h62cZBZm8Cd2wdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '1d950771510b5a7a26eb546a98d56434']);
$response = $bot->getMessageContent($idMessage);
if ($response->isSucceeded()) {
	$tempfile = tmpfile();
	fwrite($tempfile, $response->getRawBody());
} else {
	error_log($response->getHTTPStatus() . ' ' . $response->getRawBody());
}

