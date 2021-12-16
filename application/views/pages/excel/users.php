<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<main class="col-lg-9">
	<?php $this->load->view('pages/excel/includes/nav'); ?>

	<div class="row">
		<div class="col-lg-12">


			<div class="card" style="width: 100%">

				<?php
				if ($this->session->set_flashdata('message')) {
					$this->session->set_flashdata('message');
				}
				?>
				<div class="card-body">
					<h5 class="card-title">Users</h5>




					<div class="row">

						<div class="col-lg-12">

							<table id="example" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Country</th>
										<th>Country Code</th>

									</tr>
								</thead>
								<tbody>
									<?php
									$num = 1;
									if ($users == null) {
									} else {
										foreach ($users as $item) { ?>
											<tr>
												<td><?php echo $item->name; ?></td>
												<td><?php echo $item->email; ?> </td>
												<td><?php echo $item->phone; ?></td>
												<td><?php echo $item->country; ?></td>
												<td><?php echo $item->country_code; ?></td>


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

	</div>




</main>
