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
$MobileNo = $messageData->MobileNo;
$Message = $messageData->Message;
$SMS_Date = $messageData->SMS_Date;
$res_Fname = $messageData->res_Fname;
$res_Lname = $messageData->res_Lname;
$Keyword_desc = $messageData->Keyword_desc;
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
											<label for="SMS_Date">- <?php echo $Keyword_desc;?> -</label>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group text-center">
											<label for="SMS_Date" style="text-align: justify; border-width: 2px; border-style: solid; padding: 10px;"><?php echo $Message;?></label>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group text-right">
											<a class="btn btn-primary" id="button" title="Process" href="<?php echo base_url(); ?>form">Process</a>
											<a class="btn btn-primary" id="button" title="Reply" href="<?php echo base_url(); ?>compose">Reply</a>
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


