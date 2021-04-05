
<?php
$SMS_ID = $complaintData->SMS_ID;
$res_id = $complaintData->res_id;
$res_Fname = $complaintData->res_Fname;
$res_Lname = $complaintData->res_Lname;
$Keyword_desc = $complaintData->Keyword_desc;
$Message = $complaintData->Message;
$day_time = $time_data->day_time;
$time_id = $time_data->time_id;
//$incharge_person = $datas->incharge_person;
// $schedule_ID = $complaintData->schedule_ID;
// $status = $complaintData->Status_desc;
//$settle_date = $complaintData->settle_date;

?>
<div class="content-wrapper">

	<section class="content-header">
        <i class="fa fa-file-text" aria-hidden="true"></i> Complaint Form
    </section>
  
	<section class="content">	
		<div class="row">		
				<form role="form" id="form" action="<?php echo base_url() ?>sms/addComplaint" method="post" role="form">	
					<div class="row">
						<div class="col-md-8" >
							<div class="row" style="float:right; margin-top:4%;">
								<div class="col-md-5">
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" style="margin-top:15px;">Add Complainant</button>
									<div class="modal fade" id="myModal" role="dialog">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="form-group">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h5 class="modal-title">Complainant Resident</h5>
													</div>
													<div class="modal-body">
														<input type="text" class="form-control required" class="autouser" placeholder="enter resident">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-info" data-dismiss="modal">add</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-5">
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2" style="margin-top:15px;">+Add Respondent</button>
									<div class="modal fade" id="myModal2" role="dialog">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="form-group">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h5 class="modal-title">Complainant Resident</h5>
													</div>
													<div class="modal-body">
														<input type="text" class="form-control required" placeholder="enter respondent">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-info" data-dismiss="modal">add</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">	
						<div class="col-md-7">
							<div class="row">
								<div class="box box-primary" style=" margin-left:8%">					
									<div class="box-body" >
										<div class="row">	
												<div class="col-md-6" >
													<label for="date filed" >Made this day of:</label>
													<div class="form-group">
														<input type="text" class="form-control" name="date_process" id="demo" style="margin-top:15px; outline: none; border: 0; font-size: 20px;">
													</div>
												</div>											
										</div>
										<br>
										<br>
										<div class="row">
											<div class="col-md-3">
												<label for="complaint">SMS ID No.</label>
												<div class="form-group">
													<input type="text" name="SMS_ID" class="form-control"  style="width: 70px; height: 40px;" value="<?php echo $SMS_ID; ?>">
												</div>
											</div>
											<div class="col-md-3">
												
												<div class="form-group">
													<input type="hidden" name="res_id" type="hidden" class="form-control" style="width: 70px; height: 40px;" value="<?php echo $res_id; ?>">
												</div>
											</div>	
											<div class="col-md-6">
												<label for="Status_desc">Select for Settlement status</label>
												<div class="form-group">
													<select class="form-control required" id="Status_ID" name="Status_desc">
														<?php
														if(!empty($status))
														{
															foreach ($status as $the_status)
															{
																?>
																<option value="<?php echo $the_status->Status_ID; ?>" 
																<?php if($the_status->Status_ID == set_value('Status_desc')) {echo "selected=selected";} ?>>
																<?php echo $the_status->Status_desc;?>
																</option>

																<?php
															}
														}
														?>
													</select>
												</div>	
											</div> 
										</div> 	
																		
										</div>
										<br>
										<br>
										<div class="row">
											<div class="col-md-6">
												<label for="complaint" style="margin-left: 10px;">Complainant's Name</label>
												<div class="form-group">
													<input type="text" class="form-control" name="res_name"
													 style="width: 220px; height: 30px; margin-left: 10px;" value="<?php echo $res_Fname; ?> <?php echo $res_Lname ?>">
												</div>
											</div>
											<div class="col-md-6">
												<label for="rights">Category Description</label>
												<div class="form-group">
													<input type="text" class="form-control" name="Keyword_desc" style="width: 220px; height: 30px;" value="<?php echo $Keyword_desc; ?>">
												</div>
											</div>								
										</div>
										<br>
										<br>
										<div class="row">
											<label for="complaint" style="margin-left: 20px;">Complaint Content</label>
											<div class="form-group" align="center">
												<textarea class="form-control" name="Message" rows="5" style="border-radius: 10px; width: 600px;"><?php echo $Message ?></textarea>
											</div>								
										</div>
										<br><br>
										<div class="row">
											<div class="col-md-5" >
												<label for="schedules" style="margin-left: 20px;">Settlement Schedule</label>
												<div class="form-group">
													<input type="text" class="form-control" name="settle_date" style="width: 220px; height: 30px; margin-left: 20px; outline: none; border: 0;" id="set_date">
													<p id="day"></p>
												</div>	
											</div>										
											<div class="col-md-6">
												<label for="inCharge_person">Select for Settlement Incharge</label>
												<div class="form-group">
													<select class="form-control required" id="inCharge_ID" name="incharge_person" >
														<option value="0">Select incharge</option>
														<?php
														if(!empty($sched_data))
														{
															foreach ($sched_data as $the_incharge)
															{
																?>
																<option value="<?php echo $the_incharge->schedules_id; ?>" 
																<?php if($the_incharge->schedules_id == set_value('incharge_person')) {echo "selected=selected";} ?>>
																<?php echo $the_incharge->incharge_person;?>
																</option>

																<?php
															}
														}
														?>
													</select>
												</div>	
											</div>
											<div class="row">
												<div class="col-md-5" >
												<label for="time" style="margin-left: 40px;">Time:  </label>
												<div class="form-group">
													<input type="text" class="form-control" name="settle_date" style="width: 220px; height: 30px; margin-left: 40px; outline: none; border: 0;" id="set_date" value="<?php echo $day_time; ?>">
												</div>
												<div class="form-group">
													<input type="hidden" name="time_id" class="form-control" style="width: 70px; height: 40px;" value="<?php echo $time_id; ?>">
												</div>	
											</div>
											</div> 
											<div class="row" style="float:right; margin:2%">
											<div class="form-group">
												<div class="col-md-5" >
													<input type="reset" name="cancel" class="btn btn-default btn-sm" value="Cancel"/>
												</div>
												<div class="col-md-5" >
													<input type="submit" name="save" class="btn btn-success btn-sm" value="Save"/>
												</div>
											</div>	
																					
										</div>	
										</div> 	
										
										
									<!-- box-body -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>		
	</section>
</div>



<script type='text/javascript'>
var d = new Date();
var dn = new Date();
var weekday = new Array(7);
  weekday[0] = "Sunday";
  weekday[1] = "Monday";
  weekday[2] = "Tuesday";
  weekday[3] = "Wednesday";
  weekday[4] = "Thursday";
  weekday[5] = "Friday";
  weekday[6] = "Saturday";
  
d = d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate();
//document.getElementById("demo").innerHTML = d;
//var b = <?php //echo getsched(); ?>;
document.getElementById("demo").value = d;

dns = dn.getDate() + 3;
function get_dateFormat(dns) {
	var dn = new Date();
	dn.setDate(dns); 
	var month = "0"+(dn.getMonth()+1);
	var date = "0"+dn.getDate(); 
	month = month.slice(-2); 
	date = date.slice(-2);
	//var get_day = weekday[dn.getDay()];
	var date = dn.getFullYear() + "/" + month + "/" + date + "    " + get_dayFormat(dns);
	return date;
}

function get_dayFormat(dns) {
	var dn = new Date();
	dn.setDate(dns); 
	var get_day = weekday[dn.getDay()];
	return get_day;
} 

if(get_dayFormat(dns) == "Saturday") {
	dns = dn.getDate() + 5;
	document.getElementById("set_date").value = get_dateFormat(dns);
}
else if(get_dayFormat(dns) == "Sunday") {
	dns = dn.getDate() + 4;
	document.getElementById("set_date").value = get_dateFormat(dns);
}
else{
	document.getElementById("set_date").value = get_dateFormat(dns);
}
 
</script>

<?php 
function getsched()
{
	$a = $datas->incharge_person;
	return $a;
}

?>
