
<div class="content-wrapper"> 
 <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-users"></i> Resident Registration Management
      <small>Add / Edit Resident</small>
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Enter Resident Details</h3>
          </div><!-- /.box-header -->
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form role="form" id="addResident" action="<?php echo base_url() ?>addNewResident" method="post" role="form">
          <div class="box-body"> 
            <div class="row">
              <div class="col-md-6">                                
                <div class="form-group">
                  <label for="res_Fname">First Name</label>
                  <input type="text" class="form-control required" value="<?php echo set_value('res_Fname'); ?>" id="res_Fname" name="res_Fname" maxlength="128">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="res_Lname">Last Name</label>
                  <input type="text" class="form-control required" value="<?php echo set_value('res_Lname'); ?>" id="res_Lname" name="res_Lname" maxlength="128">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="age">Age</label>
                  <input type="number" class="form-control required digits" id="age" value="<?php echo set_value('age'); ?>" name="age" maxlength="15">
                </div>
              </div>
              <div class="col-md-6" >                      
                <label for="gender">Gender</label>                                
                <div class="form-group">
                  <select class="form-control required" name="gender" id="gender">
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                  </select>
                </div>
              </div>                   
            </div> <!--row-->
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mobile_no">Mobile Number</label>
                    <input type="number" class="form-control required digits" id="mobile_no" value="<?php echo set_value('mobile_no'); ?>" name="mobile_no" maxlength="15">
                  </div>
                </div>
                <div class="col-md-6" >
                <label for="status">Status</label>                                
                  <div class="form-group">
                    <select class="form-control required" name="status" id="status">
                      <option value="single">Single</option>
                      <option value="married">Married</option>
                      <option value="widowed">Widowed</option>
                      <option value="separated">Separated</option>
                    </select>                 
                  </div>
                </div> 
              
              <!--row-->
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="add_desc">Address</label>
                  <select class="form-control required" id="add_id" name="add_desc">
                      <option value="0">Select Address</option>
                      <?php
                      if(!empty($address))
                      {
                          foreach ($address as $add)
                          {
                          ?>
                          <option value="<?php echo $add->add_id ?>" <?php if($add->add_id == set_value('add_desc')) {echo "selected=selected";} ?>><?php echo $add->add_desc ?></option>
                          <?php
                          }
                      }
                      ?>
                  </select>
                </div>               
              </div> 
              
            </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
              <div style="float:right">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <input type="reset" class="btn btn-default" value="Reset" />
              </div>
            </div>
        </form>
        </div>
        </div>
         <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/addResident.js" type="text/javascript"></script>

<script type="text/javascript">
  document.getElementById('gender').value = "<?php echo $_GET['gender'];?>";

  document.getElementById('status').value = "<?php echo $_GET['status'];?>";

</script>

           <div>
          </div>
        </div>
      </div>
    </div>
  </section>



</div>