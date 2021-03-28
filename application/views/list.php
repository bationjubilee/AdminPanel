

<div class="container table-responsive">
	<div class="row">
	<div class="col-lg-12">
		<h2>Resident Registration</h2>
		<div class="pull-right">
			<a class="btn btn-primary" href="<?php echo base_url('registerResidents'); ?>">Create</a>
		</div>
	</div>
</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Resident ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Age</th>
				<th>Gender</th>
				<th>Status</th>
				<th>Mobile Number</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $d) { ?>
				<tr>
					<td><?php echo $d->res_id; ?></td>
					<td><?php echo $d->res_Fname; ?></td>
					<td><?php echo $d->res_Lname; ?></td>
					<td><?php echo $d->age; ?></td>
					<td><?php echo $d->gender; ?></td>
					<td><?php echo $d->status; ?></td>
					<td><?php echo $d->mobile_no; ?></td>
					<td><?php echo $d->add_desc; ?></td>
					<td>
						<form method="DELETE" action="<?php echo base_url('resident/delete/'.$d->res_id); ?>">
							<a href="<?php echo base_url('edit/'.$d->res_id); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
							<button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
						</form>

					</td>
				</tr>
				
			<?php } ?>
		</tbody>
	</table>
</div>