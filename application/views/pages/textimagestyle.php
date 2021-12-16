<main class="col-lg-9 animate__animated animate__backInDown animate__delay-2 ">


	<h6>Generate Certificate PDF. </h6>
	<p>This generates portable document certificates. <br></p>


		 <?php
if ($this->session->flashdata('errors')){
	echo '<div class="alert alert-danger">';
	echo $this->session->flashdata('errors');
	echo "</div>";
	unset($_SESSION['errors']);
}
?>

	


	<br>
	<?php echo form_open('pdf/textstyle/add', array('onsubmit' => 'return validateTextImageStyleContent()', 'target' =>'_blank')); ?>

	<div class="row">

		<div class="col-lg-6">
		<label for="fullname" class="form-label">FullName</label>
			<div class="input-group mb-3">
				<input type="text" class="form-control"  name="fullname" id="fullname" placeholder="Enter Fullname" aria-label="Fullname" aria-describedby="fullname">
			</div>
		</div>


		<div class="col-lg-6">
		<label for="department" class="form-label">Department</label>
			<div class="input-group mb-3">
				<input type="text" class="form-control" name="department" id="department" placeholder="Enter Department" aria-label="department" aria-describedby="department">
			</div>
		</div>



	</div>



	<div class="row">

		<div class="col-lg-6">
			<label for="Occupation" class="form-label">Date</label>
			<div class="input-group mb-3">
				<input type="date" class="form-control" name="date" id="date" placeholder="Enter Date" aria-label="Date" aria-describedby="date">
			</div>
		</div>


		<div class="col-lg-6">
			<label for="Company" class="form-label">Email</label>
			<div class="input-group mb-3">
				<input type="email" class="form-control"  name="email" id="email" placeholder="Enter Email Address" aria-label="Email Address" aria-describedby="email">
			</div>
		</div>



	</div>





	<div class="row">

<div class="col-lg-6">
<label for="officerName" class="form-label">Initiating Officer Name</label>
	<div class="input-group mb-3">
		<input type="text" class="form-control"  name="officerName" id="officerName" placeholder="Enter Officer Name" aria-label="officerName" aria-describedby="officerName">
	</div>
</div>


<div class="col-lg-6">
<label for="officerjob" class="form-label">initiating Officer Job Role</label>
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="officerJob" id="officerjob" placeholder="Enter Job Role" aria-label="officerjob" aria-describedby="officerjob">
	</div>
</div>



</div>







	<button type="submit"  style="float: right;" class="btn btn-success">Generate Certificate</button>
	</form>



</main>
