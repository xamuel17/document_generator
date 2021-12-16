<main class="col-lg-9">


	<h6>Generate Payslip</h6>

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
					<?php echo form_open('payslip/generate', array('onsubmit' => 'return validatePayslip()')); ?>


					<div class="row">

						<div class="col-lg-6">
							<label for="employee" class="form-label">Employee</label>

							<select name="staff_no" id="staff_no" class="form-select" aria-label="Default select example">
								<?php
								echo '<option selected>Choose Employee</option>';
								foreach ($employee_data as $row) {

									echo '<option value="' . $row->staff_no . '">' . ucfirst($row->firstname) . ' ' . ucfirst($row->lastname) . '</option>';
								}
								?>
							</select>


						</div>


						<div class="col-lg-6">
							<label for="allowance" class="form-label">Allowance</label>
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1">$</span>
								<input type="number" class="form-control" name="allowance" id="allowance" placeholder="Enter Allowance" aria-label="allowance" aria-describedby="allowance">
							</div>
						</div>



					</div>



					<div class="row">




						<div class="col-lg-6">
							<label for="deductionn" class="form-label">Deductions</label>
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1">$</span>
								<input type="number" class="form-control" name="deduction" id="deduction" placeholder="Enter Deduction" aria-label="deduction" aria-describedby="deduction">
							</div>
						</div>


						<div class="col-lg-6">
							<label for="salary" class="form-label">Basic Salary</label>
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1">$</span>
								<input type="number" class="form-control" name="salary" id="salary" placeholder="Enter Salary" aria-label="John" aria-describedby="salary">
							</div>
						</div>



					</div>


					<button type="submit" style="float: right;" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Generate</button>
					</form>






				</div>
			</div>

		</div>
	</div>
</main>
