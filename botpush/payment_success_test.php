<?php

   // if( $_GET["name"]) {
	//   if (preg_match("/[^A-Za-z'-]/",$_GET['name'] )) {
	// 	 die ("invalid name and name should be alpha");
	//   }
	
	  $start = $_GET['startbook'];
	  $amount =  number_format(substr($_GET['amount'],0, -2)).".".substr($_GET['amount'], -2);
	  $message = 'แจ้งเตือนรายการสั่งซื้อ จาก '.$_GET['fullname'].' จองมัดจำ The Therapist วันที่ '.date('d/m/Y',strtotime($_GET['startbook']))." เวลา ".$_GET['timebook']." ยอดเงิน ".$amount." บาท";
	  // $messagepush = "ขอขอบ คุณ ".$_GET['name']." \nสำหรับการจองนัดหมายครับ\nระบบอัตโนมัติขอยืนยันขอมูลการหนัดมาย \n- วันที่ ".date('d/m/Y',strtotime($_GET['startbook']))."\n- สถานที่ ".$_GET['location']."\n- ขอมูลติดต่อ ".$_GET['mobile']."";
	  
	  // มัดจำจอง Spa วันที่ '.date('d/m/Y',strtotime($_GET['startbook']))." เวลา ".$_GET['timebook']." ยอดเงิน 500 บาท";
	  $userid = $_GET['userid'];
	  echo $userid;
	  echo $messagepush;
	  $name = $_GET['name'];
	  $date = date('d/m/Y',strtotime($_GET['startbook']));
	  $datePost = $_GET['startbook'];
	  $starttime = substr($_GET['timebook'],0,5);
	  $endtime = substr($_GET['timebook'],8,5);
	  $time = $_GET['timebook'];
	  $location = $_GET['location'];
	  $mobile = $_GET['mobile'];
	  $email = $_GET['email'];
	  $fullname = $_GET['fullname'];
	  echo $datePost;
	  die();
	  addappointment($name,$email,$start,$starttime,$endtime,$fullname,$mobile,$userid,$location);
	  // addCustomer($name,$email,$start,$starttime,$endtime,$fullname,$mobile,$userid,$location);
	  sendLineMessage($userid,$name,$date,$time,$location,$mobile,$fullname); 
	  // sendLineMessage('Uff4cabbb1001a9c179039898c6895d0f',$name,$date,$time,$location,$mobile,$fullname); 
	  // sendLineNotify($message,$fullname,$name,$userid,$date,$time,$mobile);
	  sendLineNotify_top($message,$fullname,$name,$userid,$date,$time,$mobile);
	 header('location: pageload.php');
	  
	  exit();
   // }

 function sendLineMessage($userid,$name,$date,$time,$location,$mobile,$fullname){
	  $curl = curl_init();
	  
	  curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://lineoa-appoint.appreview.co.th/pushmessage.php',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		  "id": "'.$userid.'",
		  "type": "flex",
		  "name": "'.$fullname.'",
		  "date": "'.$date.'",
		  "time": "'.$time.'",
		  "price": "'.$location.'",
		  "mobile": "'.$mobile.'"
	  }',
		CURLOPT_HTTPHEADER => array(
		  'Authorization: 5R/AzsePGmZ2a1wZ62POIDPSh84iS9CZ00qkpJazrK1EBOGVIG4YNDsQhppWNlgV+wXXIYvSOFxBCD0siscs6WVCWb8JppilabkPXo9dEuCBPoVx/UfxsopcCO6SsaHBy13PESm5/h62cZBZm8Cd2wdB04t89/1O/w1cDnyilFU=',
		  'Content-Type: application/json'
		),
	  ));
	  
		  if(curl_exec($curl) === false)
		  {
			  // echo 'Curl error: ' . curl_error($ch);
			  $date = date("Y-m-d H:i:s");
			  file_put_contents("line.log", "{$date} :[ERROR]: send message to ".$fullname." : ".$name." : ".$userid." : ".$date." : ".$time." : ".$mobile." line OA Unsuccessfully\n",FILE_APPEND | LOCK_EX);
		  }
		  else
		  {
			  // echo 'Operation completed without any errors';
			  $date = date("Y-m-d H:i:s");
			  file_put_contents("line.log", "{$date} :[PASS]: send message to ".$fullname." : ".$name." : ".$userid." : ".$date." : ".$time." : ".$mobile." line OA Successfully\n",FILE_APPEND | LOCK_EX);
		  }
	  curl_close($curl);

   }
 function sendLineNotify($message,$fullname,$name,$userid,$date,$time,$mobile){
	
	 // $token = "bQPVcUcwtNxr3gZJYZZtYuSPmBDFfrOkPSjRPWgeLcE"; // ใส่ Token ที่สร้างไว้ BIG
	 // $token = "FruM0XKAjGpdBDGyc4c0bDT9VOoRYIdImoW6KCvflQc"; // ใส่ Token ที่สร้างไว้ TOP
	 $token = "aMwvyw0qEzjc8D2Zak2t5Y3wEvgjFWVc5RPt1mdSkl2"; // ใส่ Token ที่สร้างไว้ AOF
	 $date = date("Y-m-d H:i:s");
	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
	 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	 curl_setopt($ch, CURLOPT_POST, 1);
	 curl_setopt($ch, CURLOPT_POSTFIELDS, "message=" . $message);
	 $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $token . '',);
	 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 $result = curl_exec($ch);

	 if (curl_error($ch)) {
		 echo 'error:' . curl_error($ch);
		   file_put_contents("line.log", "{$date} :[ERROR]: send message to ".$fullname." : ".$name." : ".$userid." : ".$date." : ".$time." : ".$mobile." line Notify Unsuccessfully\n",FILE_APPEND | LOCK_EX);
	 } else {
		 $res = json_decode($result, true);
		 echo "status : " . $res['status'];
		 echo "message : " . $res['message'];
		   file_put_contents("line.log", "{$date} :[PASS]: send message to ".$fullname." : ".$name." : ".$userid." : ".$date." : ".$time." : ".$mobile." line Notify Successfully\n",FILE_APPEND | LOCK_EX);
	 }
	 curl_close($ch);
 }
 function sendLineNotify_top($message,$fullname,$name,$userid,$date,$time,$mobile){
	
	 // $token = "bQPVcUcwtNxr3gZJYZZtYuSPmBDFfrOkPSjRPWgeLcE"; // ใส่ Token ที่สร้างไว้ BIG
	 $token = "FruM0XKAjGpdBDGyc4c0bDT9VOoRYIdImoW6KCvflQc"; // ใส่ Token ที่สร้างไว้ TOP
	 // $token = "aMwvyw0qEzjc8D2Zak2t5Y3wEvgjFWVc5RPt1mdSkl2"; // ใส่ Token ที่สร้างไว้ AOF
$date = date("Y-m-d H:i:s");
	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
	 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	 curl_setopt($ch, CURLOPT_POST, 1);
	 curl_setopt($ch, CURLOPT_POSTFIELDS, "message=" . $message);
	 $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $token . '',);
	 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 $result = curl_exec($ch);

	 if (curl_error($ch)) {
		 echo 'error:' . curl_error($ch);
		 
			file_put_contents("line_top.log", "{$date} :[ERROR]: send message to ".$fullname." : ".$name." : ".$userid." : ".$date." : ".$time." : ".$mobile." line Notify Unsuccessfully\n",FILE_APPEND | LOCK_EX);
	 } else {
		 $res = json_decode($result, true);
		 echo "status : " . $res['status'];
		 echo "message : " . $res['message'];
			 file_put_contents("line_top.log", "{$date} :[PASS]: send message to ".$fullname." : ".$name." : ".$userid." : ".$date." : ".$time." : ".$mobile." line Notify Successfully\n",FILE_APPEND | LOCK_EX);
	 }
	 curl_close($ch);
 }
 function addappointment($name,$email,$start,$starttime,$endtime,$fullname,$mobile,$userid,$location){
	 session_start();
	  require_once('LineLogin.php');
	  $url = $_SESSION['profile']->picture;
	 include('connect.php');
	 $date = date("Y-m-d H:i:s");
	 $cussql = "insert into appointments (title, description, mobile, start, stime, end, etime, location, color, className,url_img) VALUES ('".$fullname."', '".$email."', '".$mobile."', '".$start."', '". $starttime ."', '".$start."' , '". $endtime ."', '".$location."','green','fc-event-success','".$url."')";
	 if ($conn->query($cussql) === TRUE) {
		 file_put_contents("line.log", "{$date} :[PASS]: insert appointments to ".$fullname." : ".$name." : ".$userid." : ".$start." : ".$starttime." : ".$endtime." : ".$mobile." Successfully\n",FILE_APPEND | LOCK_EX);
		echo "record inserted successfully";
	 }else{
		 file_put_contents("line.log", "{$date} :[ERROR]: insert appointments to ".$cussql." ".$conn->error." Unsuccessfully\n",FILE_APPEND | LOCK_EX);
		echo "Error: " . $cussql . "<br>" . $conn->error;
	 }
 }
 function addCustomer($name,$email,$start,$starttime,$endtime,$fullname,$mobile,$userid,$location){
	 session_start();
	 require_once('LineLogin.php');
	 $url = $_SESSION['profile']->picture;
	 // Image path
	 $line_img = './images/'.$_SESSION['profile']->sub.'.jpg';
	  
	 // Save image
	 $ch = curl_init($url);
	 $fp = fopen($line_img, 'wb');
	 curl_setopt($ch, CURLOPT_FILE, $fp);
	 curl_setopt($ch, CURLOPT_HEADER, 0);
	 curl_exec($ch);
	 curl_close($ch);
	 fclose($fp);
	 $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]"."/images/".$_SESSION['profile']->sub.".jpg";
	 include('connect.php');
	 $now = date('Y-m-d H:i:s');
	 $cussql = "insert into customer (customer_code,customer_name,customer_address,customer_email,customer_mobile,customer_lineid,compcode,customer_status,create_date,create_user,customer_tag,customer_line_picture,url_img) value('', '".$fullname."', '".$location."','".$email."','".$mobile."','".$userid."','demo','active', '".$now."','".$fullname."','Line','".$actual_link."','".$url."')";
	 if ($conn->query($cussql) === TRUE) {
		 file_put_contents("customer.log", "{$date} :[PASS]: record inserted to ".$fullname." : ".$name." : ".$userid." Successfully\n",FILE_APPEND | LOCK_EX);
		echo "record inserted successfully";
	 }else{
		 file_put_contents("customer.log", "{$date} :[ERROR]: record inserted to ".$cussql." ".$conn->error." Unsuccessfully\n",FILE_APPEND | LOCK_EX);
		echo "Error: " . $cussql . "<br>" . $conn->error;
	 }
	 // echo $actual_link;
	 // die();
 }
?>