<style type="text/css">
	label {
		font-size: 150%;
		color: #4E4E4E;
	}

	#button {
		background-color: #ADD8E6;
		font-size: 25px;
		width: 12%;
		padding: 5px;
		margin-right: 20px;
		color: black;

	}
</style>

<?php
$MobileNo = $messageData->originator;
$Message = $messageData->message;
$SMS_Date = $messageData->timestamp;
$res_Fname = $messageData->res_Fname;
$res_Lname = $messageData->res_Lname;
$Keyword_desc = $messageData->Keyword_desc;
$SMS_ID = $messageData->SMS_ID;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bullhorn" aria-hidden="true"></i>Messages
      </h1>
    </section>
  
    
    <section>
	    <div class="container " style='margin: 5% 0 0 10%;'>
			<div class="col-md-10">
				<div class="panel panel-default">
					<div class="panel-body message">
						<!--<br><b><p class="text-left"><style type="text/css"></style>Compose Message</p></b>-->
						<div class="col-sm-12">
							<br>					
							<form role="form" method="post" role="form">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label style="margin-left: 10%;" for="resName"><?php echo $res_Fname;?> <?php echo $res_Lname;?></label><br>
											<label style="margin-left: 10%;"  for="mobileNo"><?php echo $MobileNo;?></label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group text-right">
											<label style="margin-right: 10%;" for="SMS_Date"><?php echo $SMS_Date;?></label>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group text-center">
											<label for="keyword">- <?php echo $Keyword_desc;?> -</label>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group text-center">
											<label for="message" style="text-align: justify; border-width: 2px; border-style: solid; padding: 10px;"><?php echo $Message;?></label>
										</div>
									</div>
									<div class="col-md-12" >
										<div class="form-group">
											<input type="hidden" class="form-control" name="settle_date" style="width: 220px; height: 30px; margin-left: 20px; outline: none; border: 0;" id="set_date">
											<input type="hidden" id="days_display" name="days_display">
										</div>	
									</div>	
									<div class="col-md-12">
										<div class="form-group text-right">
											<a class="btn btn-primary" id="button" title="Process" href="<?php echo base_url().'form/'.$SMS_ID; ?>">Process</a>
											<!--<button type="submit" value="process">Process</button>
											<button type="submit" value="compose">Reply</button>-->
										</div>
									</div>

								</div>			
							</form>
						</div>	
					</div>	
				</div>	
		    </div>
		</div>
  	</section>
  	<br><br>
  
	
</div>


<script type='text/javascript'>
var dn = new Date();
var weekday = new Array(7);
  weekday[0] = "Sunday";
  weekday[1] = "Monday";
  weekday[2] = "Tuesday";
  weekday[3] = "Wednesday";
  weekday[4] = "Thursday";
  weekday[5] = "Friday";
  weekday[6] = "Saturday";
  
var day_count = 3;
dns = dn.getDate() + day_count;

function get_dateFormat(dns) {
	var dn = new Date();
	dn.setDate(dns); 
	var month = "0"+(dn.getMonth()+1);
	var date = "0"+dn.getDate(); 
	month = month.slice(-2); 
	date = date.slice(-2);
	//var get_day = weekday[dn.getDay()];
	var date = dn.getFullYear() + "/" + month + "/" + date;
	//var day_disp = get_dayFormat(dns);
	return date;
}

function get_dayFormat(dns) {
	var dn = new Date();
	dn.setDate(dns); 
	var get_day = weekday[dn.getDay()];
	return get_day;
} 

if(get_dayFormat(dns) == "Saturday") {
	dns = dn.getDate() + (day_count+2);
	document.getElementById("set_date").value = get_dateFormat(dns);
	document.getElementById("days_display").value = get_dayFormat(dns);
}
else if(get_dayFormat(dns) == "Sunday") {
	dns = dn.getDate() + (day_count+1);
	document.getElementById("set_date").value = get_dateFormat(dns);
	document.getElementById("days_display").value = get_dayFormat(dns);
}
else{
	document.getElementById("set_date").value = get_dateFormat(dns);
	document.getElementById("days_display").value = get_dayFormat(dns);
}
 
</script>

<?php 
function getsched()
{
	$a = $datas->incharge_person;
	return $a;
}

?>
