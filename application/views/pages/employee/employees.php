<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<main class="col-lg-9 ">


	<h6>Employees </h6>
	<p>This is a collection of registered employees </p>


	
	<?php $this->load->view('pages/excel/includes/payslip-nav'); ?>

	<br>





	<br>
	<?php
	if ($this->session->flashdata('errors')) {
		echo '<div class="alert alert-danger">';
		echo $this->session->flashdata('errors');
		echo "</div>";
		unset($_SESSION['errors']);
	}
	?>

<?php
		if ($this->session->flashdata('success')) {
			echo '<div class="alert alert-success">';
			echo $this->session->flashdata('success');
			echo "</div>";
			unset($_SESSION['success']);
		}
		?>

		
<div class="col-lg-12">
			<div class="card">
				<div class="card-body">


	<div class="row">

		<div class="col-lg-12">

			<table id="example" class="table table-striped" style="width:100%">
				<thead>
					<tr>
					<th>Staff No</th>
						<th>Full Name</th>
						<th>Department</th>
						<th>Job Title</th>
						
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$num = 1;
					if ($employees == null) {
					} else {
						foreach ($employees as $item) { ?>
							<tr>
							<td><?php echo $item->staff_no; ?> </td>
								<td><?php echo $item->firstname. ' '.$item->lastname ; ?></td>
								<td><?php echo $item->department; ?> </td>
								<td><?php echo $item->job_title; ?></td>
						
						
								<td>
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Delete Certificate">
										<a href="<?php echo base_url(); ?>employee/delete/<?php echo $item->staff_no; ?>" class="btn btn-danger"> <i class="fa fa-trash-o"></i></a>
									</span>


								</td>
							</tr>
							<?php $num++; ?>
						

						<?php } ?>
					<?php } ?>


				</tbody>

			</table>
		</div>
	</div>

				</div>
			</div>
</div>


</main>


<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
