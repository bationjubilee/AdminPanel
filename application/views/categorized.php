<div class="content-wrapper">
    <section class="content">
	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                	<br>
                    <center><h2><b>Categorized Inbox</b></h2></center>
                </div><br><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th><h3>Inbox Messages</h3></th>
                        <th><h3>Date</h3></th>
                        <th class="text-center" style="color: white;"><h3>Actions</h3></th>
                        <th class="text-center" style="color: white;">______</th>
                    </tr>
                    <?php
                    if(!empty($data))
                    {
                        foreach($data as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo $record->Message; ?></td>
                        <td><?php echo $record->SMS_Date; ?></td>
                        <?php  
                        if($role == ROLE_ADMIN)
                        {
                        ?>
                        <div class="col-md-2"><td class="text-center">
                            <a class="btn btn-default" href="<?php echo base_url().'DisplayMessage/'.$record->SMS_ID; ?>" title="Edit"><i class="fa fa-view">VIEW</i></a>
                            <!-- <a class="btn btn-sm btn-danger" href="#" title="Delete"><i class="fa fa-trash"></i></a> -->
                        </td></div>
                    
                            
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
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>