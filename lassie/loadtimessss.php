 <?php
	include('connect.php');
	
	// $date = $_GET['vardate'];
	$scheduled_day = $_GET['vardate'];
	$days = ['su','mo','tu','we','th','fr','sa'];
	$day = date('w',strtotime($scheduled_day));
	// $shotdays = date('d-m-Y', strtotime($scheduled_day))." ($days[$day])";
	$shotdays = $days[$day];
	// echo $days[$day];
	// // echo "<br/>";
	// // echo $_GET['vardate'];
	// // echo date('w');
	// $shotdays = strtolower(substr(date("w",$_GET['vardate']), 0, 2));
	// echo $days[$day];
	// $sql = "select	*,days.status as daysstatus from days LEFT OUTER JOIN set_time ON set_time.days = days.day_code where set_time.days = '" . $shotdays . "' and days.status = 'active' AND set_time.status = 'active'" or die("Error:" . mysqli_error($conn));
	$sql = "select * from set_time where days = '" . $shotdays . "' and status ='active'" or die("Error:" . mysqli_error($conn));
	$query = mysqli_query($conn, $sql);
	$sql2 = "select * from set_time_month where days='" . $scheduled_day . "' and status ='active'" or die("Error:" . mysqli_error($conn));
	$data = array();
	$result2 = mysqli_query($conn, $sql2);
	while (($row = mysqli_fetch_array($result2))){
	  $data[] = $row; // add the row in to the results (data) array
	}
	// return $this->response->setJSON($post);
	// echo $data[0]['limitdate'];

	$sql3 = "select * from appointments where `start` = '" . $scheduled_day."'" or die("Error:". mysqli_error($conn));
	$result3 = mysqli_query($conn,$sql3);
	
	$appoint_row = mysqli_num_rows($result3);
	while (($row = mysqli_fetch_array($result3))){
	  $data_appoint[] = $row; // add the row in to the results (data) array
	}

	// echo $data_appoint[0]['start']."<br/>";

if(mysqli_num_rows($result3) >= $data[0]['limitdate']){?>
<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
	<div class="d-flex flex-stack flex-grow-1">
		<!--begin::Content-->
		<div class="fw-semibold">
			<h1 class="text-gray-900 fw-bold">การจองนัดหมายเต็มแล้ว</h1>
		</div>
		<!--end::Content-->
	</div>
</div>
<?php }else{?>
   <?php $i=0; while ($result = mysqli_fetch_assoc($query)) {
	   $hour = 0;
	   $cerrenttime =  date("H:i");
	   $timestamp = strtotime($cerrenttime.'+'.$hour.' hour');
	   $time = date('H:i', $timestamp);
	   $datatime = date("H:i",strtotime($result['time']));
	   
	     if($time > $datatime) { ?>
			<div class="d-flex flex-stack gap-5 mb-3">
				<button type="radio" disabled="disabled" class="btn btn-light-primary w-100" disdata-kt-docs-advanced-forms="interactive"><?= $result['time']; ?> - <?= $result['etime']; ?></button>
			</div> 
		<?php }else{ ?>
			
				<h1>open</h1>
				
				<?php
				$sql4 = "select * from appointments where `start` = '" . $scheduled_day."'" or die("Error:". mysqli_error($conn));
				$result4 = mysqli_query($conn,$sql4);
				 while (($row = mysqli_fetch_assoc($result4))){?>
					<?php if ($row['booking_status'] == "booking") {
						
						echo $scheduled_day."---".$row['stime']."---".$row['booking_status'];
					}else{?>
			 		<div class="d-flex flex-stack gap-5 mb-3">
				 		<button id="timeselect<?= $i; ?>" onClick="my<?=$i;?>Function();" type="button" class="btn btn-light-primary w-100" value="<?= $result['time']; ?> - <?= $result['etime']; ?>" data-kt-docs-advanced-forms="interactive"><?= $result['time']; ?> - <?= $result['etime']; ?></button>
			   		</div>
					<?php } ?>
				<?php } ?>
		   <?php  }?>
		   <script>
				 
				 
				 function my<?=$i;?>Function() {
					 
					 console.log($("#timeselect<?= $i; ?>").val().substring(0, 5));
					 // var x = document.getElementById("timeselect").value;
					   document.getElementById("bookingtime").value = $("#timeselect<?= $i; ?>").val();
				 }
			 </script>
	  <?php $i++; }?>    
<?php } ?>
<input type="hidden" class="bookingtime form-control form-control-solid" placeholder="Enter Amount" n id="bookingtime"ame="bookingtime" value="" />
