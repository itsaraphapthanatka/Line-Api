<?php

   // if( $_GET["name"]) {
	//   if (preg_match("/[^A-Za-z'-]/",$_GET['name'] )) {
	// 	 die ("invalid name and name should be alpha");
	//   }
	session_start();
	require_once('LineLogin.php');
	$url = $_SESSION['profile']->picture;
	  $week = ['su','mo','tu','we','th','fr','sa'];
	  $start = $_POST['startbook'];
	  $shotday = date('w',strtotime($start));
	  $shotdays = $week[$shotday];
	  $customer = 'BookOK';
	  // $amount =  number_format(substr($_POST['amount'],0, -2)).".".substr($_POST['amount'], -2);
	  $amount =  $_POST['amount'];
	  
	  // $message = 'แจ้งเตือนรายการสั่งซื้อ จาก '.$_POST['fullname'].' จองมัดจำ BookOK Optical Shop วันที่ '.date('d/m/Y',strtotime($_POST['startbook']))." เวลา ".$_POST['timebook']." ยอดเงิน ".$amount." บาท";
	  // $messagepush = "ขอขอบ คุณ ".$_POST['name']." \nสำหรับการจองนัดหมายครับ\nระบบอัตโนมัติขอยืนยันขอมูลการหนัดมาย \n- วันที่ ".date('d/m/Y',strtotime($_POST['startbook']))."\n- สถานที่ ".$_POST['location']."\n- ขอมูลติดต่อ ".$_POST['mobile']."";
	  
	  // มัดจำจอง Spa วันที่ '.date('d/m/Y',strtotime($_POST['startbook']))." เวลา ".$_POST['timebook']." ยอดเงิน 500 บาท";
	  $userid = $_POST['userid'];
	  echo $userid;
	  echo $messagepush;
	  $name = $_POST['name'];
	  $date = date('d/m/Y',strtotime($_POST['startbook']));
	  $datePost = $_POST['startbook'];
	  $starttime = substr($_POST['timebook'],0,5);
	  $endtime = substr($_POST['timebook'],8,5);
	  $time = $_POST['timebook'];
	  $location = $_POST['location'];
	  $mobile = $_POST['mobile'];
	  $email = $_POST['email'];
	  $fullname = $_POST['fullname'];
	  $package = $_POST['packagecode'];
	  $packagename = $_POST['packagename'];
	  echo $package;
	  echo $packagename;
	  $message = "แจ้งเตือนการจองนัดหมายจาก ".$_POST['fullname']." \nอีเมล์ : ".$_POST['email']." \nเบอร์โทร : ". $_POST['mobile'] ." \nจองนัดหมาย วันที่ ".date('d/m/Y',strtotime($_POST['startbook']))." \nเวลา ".$_POST['timebook'];
	  $messageTOPs = "แจ้งเตือนการจองนัดหมายจาก ".$_POST['fullname']." \nอีเมล์ : ".$_POST['email']." \nเบอร์โทร : ". $_POST['mobile'] ." \nจองนัดหมาย วันที่ ".date('d/m/Y',strtotime($_POST['startbook']))." \nเวลา ".$_POST['timebook']." \nCompany Login:". $customer;
	  $imageFile = new CURLFILE($url);
	  $data = array(
		'message' => $messageTOPs,
		'imageFile' => $imageFile
	  );
	  
	 
	  // die();
	  addappointment($name,$email,$start,$starttime,$endtime,$fullname,$mobile,$userid,$location,$shotdays,$package);
	  addCustomer($name,$email,$start,$starttime,$endtime,$fullname,$mobile,$userid,$location);
	  sendLineMessage($userid,$name,$date,$time,$location,$mobile,$fullname,$packagename,$email); 
	  sendLineMessage('Uab21834db3808efbbe30c30ea954c231',$name,$date,$time,$location,$mobile,$fullname,$packagename,$email); 
	//   sendLineNotify($message,$fullname,$name,$userid,$date,$time,$mobile,$email);
	  sendLineNotify_top($data,$fullname,$name,$userid,$date,$time,$mobile,$email);
	 header('location: pageload.php');
	  
	  exit();
   // }

 function sendLineMessage($userid,$name,$date,$time,$location,$mobile,$fullname,$packagename,$email){
	  $curl = curl_init();
	  
	  curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://lineoa-appoint.lumpsum.cloud/botpush/pushmessage.php',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		  "id": "'.$userid.'",
		  "type": "text",
		  "name": "'.$fullname.'",
		  "date": "'.$date.'",
		  "time": "'.$time.'",
		  "price": "'.$location.'",
		  "mobile": "'.$mobile.'",
		  "packagename": "'.$packagename.'",
		  "email": "'.$email.'"
	  }',
		CURLOPT_HTTPHEADER => array(
		  'Authorization: fmgZS5qsjPSo77mc0WtKxi0E7vwp4T136BpPXugDxVUvku2LocT3TP6djzPQ2sCa1FEFHpRiuukRsHwIeTRYlMehPS0qXPXPhIOt+SzfExqP93qAJKl2Mj4fJF7TFYalFjEdElvMwND7Zr9IhYQ49wdB04t89/1O/w1cDnyilFU=',
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
 function sendLineNotify($message,$fullname,$name,$userid,$date,$time,$mobile,$email){
	
	 $token = "ZB9MlCNfFGtLHS0fNZN5J9jc6AAHMLqkk2UrVBa3Obm"; // ใส่ Token ที่สร้างไว้ lassie
	 // $token = "bQPVcUcwtNxr3gZJYZZtYuSPmBDFfrOkPSjRPWgeLcE"; // ใส่ Token ที่สร้างไว้ BIG
	 // $token = "FruM0XKAjGpdBDGyc4c0bDT9VOoRYIdImoW6KCvflQc"; // ใส่ Token ที่สร้างไว้ TOP
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
		   file_put_contents("line.log", "{$date} :[ERROR]: send message to ".$fullname." : ".$name." : ".$userid." : ".$date." : ".$time." : ".$mobile." line Notify Unsuccessfully\n",FILE_APPEND | LOCK_EX);
	 } else {
		 $res = json_decode($result, true);
		 echo "status : " . $res['status'];
		 echo "message : " . $res['message'];
		   file_put_contents("line.log", "{$date} :[PASS]: send message to ".$fullname." : ".$name." : ".$userid." : ".$date." : ".$time." : ".$mobile." line Notify Successfully\n",FILE_APPEND | LOCK_EX);
	 }
	 curl_close($ch);
 }
 function sendLineNotify_top($data,$fullname,$name,$userid,$date,$time,$mobile,$email){
	
	 // $token = "bQPVcUcwtNxr3gZJYZZtYuSPmBDFfrOkPSjRPWgeLcE"; // ใส่ Token ที่สร้างไว้ BIG
	 $token = "FruM0XKAjGpdBDGyc4c0bDT9VOoRYIdImoW6KCvflQc"; // ใส่ Token ที่สร้างไว้ TOP
	 // $token = "aMwvyw0qEzjc8D2Zak2t5Y3wEvgjFWVc5RPt1mdSkl2"; // ใส่ Token ที่สร้างไว้ AOF
	$date = date("Y-m-d H:i:s");
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
		 
			file_put_contents("line_top.log", "{$date} :[ERROR]: send message to ".$fullname." : ".$name." : ".$userid." : ".$date." : ".$time." : ".$mobile." line Notify Unsuccessfully\n",FILE_APPEND | LOCK_EX);
	 } else {
		 $res = json_decode($result, true);
		 echo "status : " . $res['status'];
		 echo "message : " . $res['message'];
			 file_put_contents("line_top.log", "{$date} :[PASS]: send message to ".$fullname." : ".$name." : ".$userid." : ".$date." : ".$time." : ".$mobile." line Notify Successfully\n",FILE_APPEND | LOCK_EX);
	 }
	 curl_close($ch);
 }
 function addappointment($name,$email,$start,$starttime,$endtime,$fullname,$mobile,$userid,$location,$shotdays,$package){
	 session_start();
	  require_once('LineLogin.php');
	  $url = $_SESSION['profile']->picture;
	 include('connect.php');
	 $date = date("Y-m-d H:i:s");
	 $cussql = "insert into appointments (title, description, mobile, start, stime, end, etime, location, color, className,url_img,compcode,booking_status,shotday,package) VALUES ('".$fullname."', '".$email."', '".$mobile."', '".$start."', '". $starttime ."', '".$start."' , '". $endtime ."', '".$location."','green','fc-event-success','".$url."','demo','booking','".$shotdays."','".$package."')";
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