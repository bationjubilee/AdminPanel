<?php
$res_id = $residentInfo->res_id;
$res_Fname = $residentInfo->res_Fname;
$res_Lname = $residentInfo->res_Lname;
$age = $residentInfo->age;
$gender = $residentInfo->gender;
$status = $residentInfo->status;
$mobile_no = $residentInfo->mobile_no;
$add_id = $residentInfo->add_id;
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Resident Management
        <small>Add / Edit Resident</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Resident Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>editResident" method="post" id="editResident" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="res_Fname">First Name</label>
                                        <input type="text" class="form-control" id="res_Fname" placeholder="Full Name" name="res_Fname" value="<?php echo $res_Fname; ?>" maxlength="128">  
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="res_Lname">Last Name</label>
                                        <input type="text" class="form-control" id="res_Lname" placeholder="Full Name" name="res_Lname" value="<?php echo $res_Lname; ?>" maxlength="128">
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" id="age" placeholder="Age" name="age" value="<?php echo $age; ?>" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="gender">Gender</label>                                
                                    <div class="form-group">
                                        <select name="gender" id="gender">
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="status">Status</label>                                
                                    <div class="form-group">
                                        <select name="status" id="status">
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="widowed">Widowed</option>
                                            <option value="separated">Separated</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile_no">Mobile Number</label>
                                        <input type="number" class="form-control" id="mobile_no" placeholder="Mobile Number" name="mobile_no" value="<?php echo $mobile_no; ?>" maxlength="15">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="add_desc">Address</label>
                                        <select class="form-control" id="add_desc" name="add_desc">
                                            <option value="0">Select Address</option>
                                            <?php
                                            if(!empty($address))
                                            {
                                                foreach ($address as $add)
                                                {
                                                    ?>
                                                    <option value="<?php echo $add->add_id; ?>" <?php if($add->add_id == $add_id) {echo "selected=selected";} ?>><?php echo $add->add_desc ?></option>
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
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <?php
                    //$this->load->helper('form');
                    //$error = $this->session->flashdata('error');
                    //if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php //echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    //$success = $this->session->flashdata('success');
                    //if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php //echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php //echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div> -->
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editResident.js" type="text/javascript"></script>

<script type="text/javascript">
  document.getElementById('gender').value = "<?php echo $_GET['gender'];?>";
  document.getElementById('status').value = "<?php echo $_GET['status'];?>";

</script>