
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bullhorn" aria-hidden="true"></i> Compose
        <small>Control panel</small>
      </h1>
    </section>
  
    
    <div class="container " style='padding-top:30pxS;'>
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-body message">
				<b><p class="text-center">Compose Message</p></b>
				<div class="col-sm-12">
					<br>					
					<form role="form" action="<?php echo base_url('Sms/sending') ?>" method="post" role="form">
						<div class="form-group">
							<label for="mobileNo">mobile number</label>
							<input class="form-control" name="mobileNo" rows="12" ></input>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="Message" rows="12" placeholder="Type here" onkeyup="countChar(this)"></textarea>
							
						</div>	
						
						<div class="form-group" style="padding-left:93%">	
							<p class="text-right" id="charNum" >99</p>
							<button type="submit" value="Save Data" class="btn btn-success" >Send</button>
						</div>					                                                                                                                                                           -	
				</div>	
				</form>
				</div>	
			</div>	
		</div>	
    </div>
	</div>
  </section>
  
	
</div>


