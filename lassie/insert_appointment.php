<?php
include('connect.php');
   if( $_POST["name"] || $_POST["email"] ) {
      // if (preg_match("/[^A-Za-z'-]/",$_POST['name'] )) {
      //    die ("invalid name and name should be alpha");
      // }
      $start = substr($_POST['timebook'],0,5);
      $end = substr($_POST['timebook'],8,5);
      $now = date('Y-m-d H:i:s');
        $sqlquery = "insert into appointments (title, description, mobile, start, stime, end, etime, location, color, className) VALUES ('".$_POST['fullname']."', '".$_POST['email']."', '".$_POST['mobile']."', '".$_POST['startbook']."', '". $start ."', '".$_POST['startbook']."' , '". $end ."', '".$_POST['location']."','green','fc-event-success')";
 
        if ($conn->query($sqlquery) === TRUE) {
            $cussql = "insert into customer (customer_code,customer_name,customer_address,customer_email,customer_mobile,customer_lineid,compcode,customer_status,create_date,create_user,customer_tag) value('', '".$_POST['fullname']."', '".$_POST['location']."','".$_POST['email']."','".$_POST['mobile']."','".$_POST['userid']."','demo','active', '".$now."','".$_POST['fullname']."','Line')";
            if ($conn->query($cussql) === TRUE) {
               echo "record inserted successfully";
            }else{
               echo "Error: " . $cussql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sqlquery . "<br>" . $conn->error;
        }
      echo "Welcome ". $_POST['userid']. "<br />";
      
      exit();
   }
   
  
    
?>