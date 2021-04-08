<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Resident Registration Management
        <!--     -->
      </h1>
    </section>
    <section class="content">
          
			<div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addResident"><i class="fa fa-plus"></i> Add Resident</a>
                </div>
            </div>
        </div>
             
        <!-- <div class="row">
            <div class="col-md-12">
                <?php
                   // $this->load->helper('form');
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
            </div>
        </div> -->
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>Registered Resident List</b></h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>residentListing" method="POST" id="searchList">-->
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>Resident ID</th>
						<th>Full Name</th>
						<th>Age</th>
						<th>Gender</th>
						<th>Status</th>
						<th>Mobile Number</th>
						<th>Address</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($residentRecords))
                    {
                        foreach($residentRecords as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo $record->res_id; ?></td>
						<td><?php echo $record->res_Fname; ?> <?php echo $record->res_Lname; ?></td>
						<td><?php echo $record->age; ?></td>
						<td><?php echo $record->gender; ?></td>
						<td><?php echo $record->status; ?></td>
						<td><?php echo $record->mobile_no; ?></td>
						<td><?php echo $record->add_desc; ?></td>
                        <?php  
                        if($role == ROLE_ADMIN)
                        {
                        ?>
                        <td class="text-center"> 
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'editOldResident/'.$record->res_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-sm btn-danger deleteResident" href="#" data-res_id="<?php echo $record->res_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    
                            
                        <?php
                        }
                        ?>
            
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "residentListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
