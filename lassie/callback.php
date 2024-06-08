<?php
session_start();
require_once('LineLogin.php');

$line = new LineLogin();
$get = $_GET;

$code = $get['code'];
$state = $get['state'];
$token = $line->token($code, $state);

if (property_exists($token, 'error'))
    header('location: index.php');

if ($token->id_token) {
    $profile = $line->profileFormIdToken($token);
    $customer = "LASSIE";
    $message = $profile->name." UserID: ".$profile->sub." Email: ".$profile->email." Picture: ".$profile->picture." Customer Login:".$customer;
    $url = $profile->picture;
    $imageFile = new CURLFILE($url);
    $data = array(
      'message' => $message,
      'imageFile' => $imageFile
    );
    sendLineNotify($data);
    $_SESSION['profile'] = $profile;
    header('location: index.php');
}
function sendLineNotify($data){
    
     // $token = "bQPVcUcwtNxr3gZJYZZtYuSPmBDFfrOkPSjRPWgeLcE"; // ใส่ Token ที่สร้างไว้ BIG
     $token = "FruM0XKAjGpdBDGyc4c0bDT9VOoRYIdImoW6KCvflQc"; // ใส่ Token ที่สร้างไว้ TOP
     // $token = "aMwvyw0qEzjc8D2Zak2t5Y3wEvgjFWVc5RPt1mdSkl2"; // ใส่ Token ที่สร้างไว้ AOF

     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     curl_setopt($ch, CURLOPT_POST, 1);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
     $headers = array('Content-type: multipart/form-data', 'Authorization: Bearer ' . $token . '',);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     $result = curl_exec($ch);

     if (curl_error($ch)) {
         echo 'error:' . curl_error($ch);
     } else {
         $res = json_decode($result, true);
         echo "status : " . $res['status'];
         echo "message : " . $res['message'];
        $date = date("Y-m-d H:i:s");
        file_put_contents("line.log", "{$date} :[Login]: Line Login to ".$message."\n",FILE_APPEND | LOCK_EX);
     }
     curl_close($ch);
 }
?>