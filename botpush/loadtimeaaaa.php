 <?php
	include('connect.php');
	
	// $date = $_GET['vardate'];
	$scheduled_day = $_GET['vardate'];
	// echo $scheduled_day;
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

	$sql2 = "select * from set_time_month where days='" . $scheduled_day . "' and status ='active'" or die("Error:" . mysqli_error($conn));
	$data = array();
	$result2 = mysqli_query($conn, $sql2);
	while (($row = mysqli_fetch_array($result2))){
	  $data[] = $row; // add the row in to the results (data) array
	}

	$sql3 = "select * from appointments where start = '" . $scheduled_day."'" or die("Error:". mysqli_error($conn));
	$result3 = mysqli_query($conn,$sql3);
	
	$appoint_row = mysqli_num_rows($result3);
	while (($row = mysqli_fetch_array($result3))){
	  $data_appoint[] = $row; // add the row in to the results (data) array
	}

	$sql_time_delay = "select time_deley from company limit 1" or die("Error:". mysqli_error($conn));
	$result_time_delay = mysqli_query($conn,$sql_time_delay);
	while (($rowdelay = mysqli_fetch_array($result_time_delay))){
	  $data_delay[] = $rowdelay; // add the row in to the results (data) array
	}
	// echo $data_delay[0]['time_deley']."<br/>";
	// echo mysqli_num_rows($result2);
if (mysqli_num_rows($result2) == 0){?>
	<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
		<div class="d-flex flex-stack flex-grow-1">
			<!--begin::Content-->
			<div class="fw-semibold">
				<h1 class="text-gray-900 fw-bold">ขออภัย วันที่ค้นหา ยังไม่เปิดรับจอง</h1>
			</div>
			<!--end::Content-->
		</div>
	</div>
	<?php }elseif(mysqli_num_rows($result3) >= $data[0]['limitdate']){?>
<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
	<div class="d-flex flex-stack flex-grow-1">
		<!--begin::Content-->
		<div class="fw-semibold">
			<h1 class="text-gray-900 fw-bold">การจองนัดหมายเต็มแล้ว</h1>
		</div>
		<!--end::Content-->
	</div>
</div>
<?php }else{
   $sql = "
   			SELECT
	   			*,
				appointments.etime as app_etime,
				set_time.etime as set_etime
   			FROM
	   			set_time
	   			LEFT JOIN
	   			appointments
	   			ON 
		   			set_time.days = appointments.`start` AND
		   			set_time.time = appointments.stime
   			WHERE
	   			set_time.days = '" . $days[$day] . "' AND 
				status ='active' order by time ASC
	   " or die("Error:" . mysqli_error($conn));
   $query = mysqli_query($conn, $sql);
    $i=0; while ($result = mysqli_fetch_assoc($query)) {
	   $hour = $data_delay[0]['time_deley'];
	   $cerrenttime =  date("H:i");
	   $timestamp = strtotime($cerrenttime.'+'.$hour.' hour');
	   $time = date('H:i', $timestamp);
	   $datatime = date("H:i",strtotime($result['time']));
	   // echo  $datatime;
	  if($scheduled_day == date('Y-m-d')){
	   // echo $scheduled_day ." - ". date('Y-m-d');
		  if($time > $datatime) { ?>
			  <!-- <div class="d-flex flex-stack gap-5 mb-3">
				  <button type="radio" disabled="disabled" class="btn btn-light-primary w-100" disdata-kt-docs-advanced-forms="interactive"><?= date('H:i',strtotime($result['time'])); ?> - <?= date('H:i',strtotime($result['set_etime'])); ?></button>
			  </div>  -->
			  
		  <?php }elseif ($result['start']=="") {?>
				  <div class="d-flex flex-stack gap-5 mb-3">
						<button id="timeselect<?= $i; ?>" onClick="my<?=$i;?>Function();" type="button" class="btn btn-light-primary w-100" value="<?= date('H:i',strtotime($result['time'])); ?> - <?= date('H:i',strtotime($result['set_etime'])); ?>" data-kt-docs-advanced-forms="interactive"><?= date('H:i',strtotime($result['time'])); ?> - <?= date('H:i',strtotime($result['set_etime'])); ?></button>
				   </div>
			   <?php }else { ?>
				  
				   <!-- <div class="d-flex flex-stack gap-5 mb-3">
						<button type="radio" disabled="disabled" class="btn btn-light-primary w-100" disdata-kt-docs-advanced-forms="interactive"><?= date('H:i',strtotime($result['time'])); ?> - <?= date('H:i',strtotime($result['set_etime'])); ?></button>
					</div>  -->
			 <?php  }
	  }else{?>
	  
		<?php if ($result['start']=="") {?>
			  <div class="d-flex flex-stack gap-5 mb-3">
					<button id="timeselect<?= $i; ?>" onClick="my<?=$i;?>Function();" type="button" class="btn btn-light-primary w-100" value="<?= date('H:i',strtotime($result['time'])); ?> - <?= date('H:i',strtotime($result['set_etime'])); ?>" data-kt-docs-advanced-forms="interactive"><?= date('H:i',strtotime($result['time'])); ?> - <?= date('H:i',strtotime($result['set_etime'])); ?></button>
			   </div>
		   <?php }else { ?>
			  
			   <!-- <div class="d-flex flex-stack gap-5 mb-3">
					<button type="radio" disabled="disabled" class="btn btn-light-primary w-100" disdata-kt-docs-advanced-forms="interactive"><?= date('H:i',strtotime($result['time'])); ?> - <?= date('H:i',strtotime($result['set_etime'])); ?></button>
				</div>  -->
		 <?php  }?>
	  <?php }
	    ?>
		   <script>
				 
				 
				 function my<?=$i;?>Function() {
					 
					 console.log($("#timeselect<?= $i; ?>").val().substring(0, 5));
					 // var x = document.getElementById("timeselect").value;
					   document.getElementById("bookingtime").value = $("#timeselect<?= $i; ?>").val();
				 }
			 </script>
	  <?php $i++; }?>
	<?php }?>
<input type="hidden" class="bookingtime form-control form-control-solid" placeholder="Enter Time" id="bookingtime" name="timebook" value="" />
