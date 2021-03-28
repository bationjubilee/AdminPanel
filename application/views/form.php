
<?php
$SMS_ID = $complaintData->SMS_ID;
$res_id = $complaintData->res_id;
$res_Fname = $complaintData->res_Fname;
$res_Lname = $complaintData->res_Lname;
$Keyword_desc = $complaintData->Keyword_desc;
$Message = $complaintData->Message;
$settle_date = $complaintData->settle_date;

?>

<div class="content-wrapper">

	<section class="content-header">
        <i class="fa fa-file-text" aria-hidden="true"></i> Complaint Form
    </section>
  
	<section class="content">	
		<div class="row">		
				<form role="form"  action="<?php echo base_url() ?>" method="post" role="form">	
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
														<input type="text" name="date_process" id="demo" style="margin-top:15px; outline: none; border: 0; font-size: 20px;" disabled="disabled">
															<!--<p id="demo" style="margin-top:15x;"></p>-->
													</div>
												</div>											
										</div>
										<br>
										<br>
										<div class="row">
											<div class="col-md-6">
												<label for="complaint">SMS ID No.</label>
												<div class="form-group">
													<input type="text" name="SMS_ID" disabled="disabled" style="width: 70px; height: 40px;" value="<?php echo $SMS_ID; ?>">
												</div>
											</div>
											<div class="col-md-6">
												<label for="rights">Resident ID No.</label>
												<div class="form-group">
													<input type="text" name="res_id" disabled="disabled" style="width: 70px; height: 40px;" value="<?php echo $res_id; ?>">
												</div>
											</div>								
										</div>
										<br>
										<br>
										<div class="row">
											<div class="col-md-6">
												<label for="complaint">Complainant's Name</label>
												<div class="form-group">
													<input type="text" name="res_name" disabled="disabled" style="width: 220px; height: 30px;" value="<?php echo $res_Fname; ?><?php echo $res_Lname ?>">
												</div>
											</div>
											<div class="col-md-6">
												<label for="rights">Category Description</label>
												<div class="form-group">
													<input type="text" name="Keyword_desc" disabled="disabled" style="width: 220px; height: 30px;" value="<?php echo $Keyword_desc; ?>">
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
											<div class="col-md-6" >
												<label for="Keyword)desc">Settlement Schedule</label>
												<div class="form-group">
													<input type="text" name="settle_date" disabled="disabled" style="width: 220px; height: 30px;" value="<?php echo $settle_date; ?>">
												</div>	
											</div>										
											<div class="col-md-6">
												<label for="inCharge_person">Select for Settlement Incharge</label>
												<div class="form-group">
													<select class="form-control required" id="inCharge_ID" name="inCharge_person"  style="border-radius: 10px;margin-top:15px;">
														<option value="0">Select incharge</option>
														<?php
														if(!empty($incharge))
														{
															foreach ($incharge as $the_incharge)
															{
																?>
																<option value="<?php echo $the_incharge->inCharge_ID; ?>" 
																<?php if($the_incharge->inCharge_ID == set_value('inCharge_person')) {echo "selected=selected";} ?>>
																<?php echo $the_incharge->inCharge_person;?>
																</option>

																<?php
															}
														}
														?>
													</select>
												</div>	
											</div> 
										</div> 	
										<div class="row" style="float:right">
											<div class="form-group">
												<div class="col-md-5" >
													<button name="cancel" type="button" class="btn btn-default btn-sm" >Cancel</button>
												</div>
												<div class="col-md-5" >
													<button name="submit" type="button" class="btn btn-success btn-sm" >Submit</button>
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
d = d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate();
//document.getElementById("demo").innerHTML = d;
document.getElementById("demo").value = d;
</script>

<script type='text/javascript'>
	var x = Date()
    $(document).ready(function(){

     // Initialize 
     $( "#autouser" ).autocomplete({

        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?=base_url()?>index.php/Sms/residentlist",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });																																																																																																																																																																																																								
        },

		
        select: function (event, ui) {
          // Set selection
          $('.autouser').val(ui.item.label); 
		//   $('#userid').val(ui.item.address);// display the selected text
          return false;
        }
		
      });
	  

    });
    </script>