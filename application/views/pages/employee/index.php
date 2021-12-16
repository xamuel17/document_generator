<main class="col-lg-9">


	<h6>Add Employee</h6>

	<?php $this->load->view('pages/excel/includes/payslip-nav'); ?>

	<br>





	<br>


	<div class="row">


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





					<br>
					<?php echo form_open('employee/add', array('onsubmit' => 'return validateEmployee()')); ?>


					<div class="row">

						<div class="col-lg-6">
							<label for="firstname" class="form-label">Employee</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter FirstName" aria-label="FirstName" aria-describedby="firstname">
							</div>
						</div>


						<div class="col-lg-6">
							<label for="department" class="form-label">LastName</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter LastName" aria-label="lastname" aria-describedby="lastname">
							</div>
						</div>



					</div>



					<div class="row">

						<div class="col-lg-6">
							<label for="department" class="form-label">Department</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="department" id="department" placeholder="Enter Department" aria-label="department" aria-describedby="department">
							</div>
						</div>


						<div class="col-lg-6">
							<label for="job_title" class="form-label">Job Title</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="job_title" id="job_title" placeholder="Enter Job" aria-label="John" aria-describedby="email">
							</div>
						</div>



					</div>


					<button type="submit" style="float: right;" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Employee</button>
					</form>






				</div>
			</div>

		</div>
	</div>
</main>
