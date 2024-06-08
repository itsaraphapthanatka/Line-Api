<?php
$access_token = 'fmgZS5qsjPSo77mc0WtKxi0E7vwp4T136BpPXugDxVUvku2LocT3TP6djzPQ2sCa1FEFHpRiuukRsHwIeTRYlMehPS0qXPXPhIOt+SzfExqP93qAJKl2Mj4fJF7TFYalFjEdElvMwND7Zr9IhYQ49wdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

echo $result;