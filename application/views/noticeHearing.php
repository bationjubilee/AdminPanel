

<style>
#name {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
    outline:none;
    box-shadow:none;	
}



</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bullhorn" aria-hidden="true"></i> form
        <small>Control panel</small>
      </h1>
    </section>
  
	<section>
	<div class="row">
		<div class="col-md-6" style="margin-left:50px; margin-top:20px">
			<div class="box box-primary">
		<center>
		<h3 class="box-title">NOTICE OF HEARING
		 <br>(MEDIATION PROCEEDINGS)</h3></center>
			<!-- form start -->
			<?php $this->load->helper("form"); ?>
			<form role="form"  action="<?php echo base_url() ?>" method="post" role="form">
				<div class="box-body">
					<div class="row">
						<div class="col-md-12" style="margin-left:-15px">  
						<div class="col-md-6">                           
							<div class="form-group">
								<label for="res_Fname">Complainants</label>
								<input type="text" class="form-control required" value="<?php echo set_value('res_Fname'); ?>" id="res_Fname" name="res_Fname" maxlength="128">
							</div>
							</div>   
						</div>	
									
						<div class="col-md-3" style="padding-top:30px;">
                			<label for="name" class="control-label">date required to appear:</label>
            			</div>
						<div class="col-md-2" style="padding-top:29px;">
						<input type="date" id="myDate" value="2014-02-09">
            			</div>
						<div class="col-md-12" style="padding-top:30px;">
							<label for="appt">Time of hearing:</label>
  							<input type="time" id="appt" name="appt">
            			</div>
						<div class="col-md-12" style="padding-top:30px;">
							<label for="cur">Date Notified</label>
							<input type="date" id="demo" name="cur">
            			</div>
						
					</div>	
					</div>
					<div class="row">

					
					</div>														
				</div><!-- /.box-body -->
				<div class="box-footer">
					<input type="submit" class="btn btn-primary" value="Submit" />
					<input type="reset" class="btn btn-default" value="Reset" />
				</div>
			</form>
		</div>
		<div class="col-md-3" style="margin-left:10px; margin-top:20px"> 
			<div class="box box-primary">
		<center><h3 class="box-title">Forms</h3></center>
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<center><a style="margin-top:20px" class="btn btn-primary" href="form" role="button">Appointment Form</a></center>
						
						</div>
						<div class="col-md-12">
							<center><a  style="margin-top:20px" class="btn btn-danger" href="#" role="button">Notice of Hearing</a></center>
						
						</div>
						<div class="col-md-12">
							<center><a  style="margin-top:20px" class="btn btn-danger" href="#" role="button">Summon</a></center>
						
						</div>
						<div class="col-md-12">
							<center><a  style="margin-top:20px" class="btn btn-danger" href="#" role="button">Summon</a></center>
						
						</div>
						<div class="col-md-12">
							<center><a  style="margin-top:20px" class="btn btn-danger" href="#" role="button">Summon</a></center>
						
						</div>
						<div class="col-md-12">
							<center><a  style="margin-top:20px" class="btn btn-danger" href="#" role="button">Summon</a></center>
						
						</div>

						
					</div>
				</div>
			<!-- form start -->
			</div>
		</div>

		</div>
	
    </section> 
  
	
</div>

<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script>
document.getElementById("demo").innerHTML = Date();
</script>
