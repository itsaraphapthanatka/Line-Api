<?php


$access_token = 'fmgZS5qsjPSo77mc0WtKxi0E7vwp4T136BpPXugDxVUvku2LocT3TP6djzPQ2sCa1FEFHpRiuukRsHwIeTRYlMehPS0qXPXPhIOt+SzfExqP93qAJKl2Mj4fJF7TFYalFjEdElvMwND7Zr9IhYQ49wdB04t89/1O/w1cDnyilFU=';

$userId = 'U212662b1d1e42d440f05ca1714b6527f';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

