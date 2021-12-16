<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<main class="col-lg-9 animate__animated animate__backInDown animate__delay-2 ">


	<h6>Certificates </h6>
	<p>This is a collection of generated certificates </p>


	<?php
	if ($this->session->flashdata('errors')) {
		echo '<div class="alert alert-danger">';
		echo $this->session->flashdata('errors');
		echo "</div>";
		unset($_SESSION['errors']);
	}
	?>


	<div class="row">

		<div class="col-lg-12">

			<table id="example" class="table table-striped" style="width:100%">
				<thead>
					<tr>
						<th>Full Name</th>
						<th>Department</th>
						<th>Email</th>
						<th>Date</th>
						<th>Officer Name</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$num = 1;
					if ($certs == null) {
					} else {
						foreach ($certs as $item) { ?>
							<tr>
								<td><?php echo $item->fullname; ?></td>
								<td><?php echo $item->department; ?> </td>
								<td><?php echo $item->email; ?></td>
								<td><?php echo $item->date; ?></td>
								<td><?php echo $item->officer_name; ?></td>
								<td>

									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="View Certificate">
										<a onclick="openPdf(event,<?php echo $num; ?>);" class="btn btn-light" target="__blank"> <i class="fa fa-eye"></i></a>
									</span>
								</td>
								<td>
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Delete Certificate">
										<a href="<?php echo base_url(); ?>certificate/<?php echo $item->id; ?>" class="btn btn-danger"> <i class="fa fa-trash-o"></i></a>
									</span>
									<input type="hidden" name="url" id="url<?php echo $num; ?>" value="<?php echo base_url(); ?>pdf_upload/<?php echo $item->file; ?>">

								</td>
							</tr>
							<?php $num++; ?>
							<script>
								function openPdf(e, num) {
									e.preventDefault();

									var ur = 'url' + num;
									var doc = document.getElementById(ur).value;

									var pdf = encodeURI(doc);
									var encodedpdf = btoa(pdf);
									window.open("<?php echo base_url(); ?>doc.html?file=" + encodedpdf, "", "width=1000,height=700,top=300,left=300");

								}
							</script>

						<?php } ?>
					<?php } ?>


				</tbody>

			</table>
		</div>
	</div>


</main>


<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
