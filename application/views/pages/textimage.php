<main class="col-lg-9 animate__animated animate__backInDown animate__delay-2 ">


	<h6>Text Image PDF. </h6>
	<p>This generates portable documents for text image content </p>



	<?php
if ($this->session->flashdata('errors')){
	echo '<div class="alert alert-danger">';
	echo $this->session->flashdata('errors');
	echo "</div>";
	unset($_SESSION['errors']);
}
?>
	


	<br>
	<?php echo form_open_multipart('pdf/textimage/add', array('onsubmit' => 'return validateTextImageContent()', 'target' => '_blank')); ?>

	<div class="row">

		<div class="col-lg-6">
		<label for="Firstname" class="form-label">Firstname</label>
			<div class="input-group mb-3">
				<input type="text" class="form-control"  name="firstname" id="firstname" placeholder="Enter Firstname" aria-label="Firstname" aria-describedby="basic-addon1">
			</div>
		</div>


		<div class="col-lg-6">
		<label for="Lastname" class="form-label">Lastname</label>
			<div class="input-group mb-3">
				<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Lastname" aria-label="Lastname" aria-describedby="basic-addon2">
			</div>
		</div>



	</div>



	<div class="row">

		<div class="col-lg-6">
			<label for="Occupation" class="form-label">Occupation</label>
			<div class="input-group mb-3">
				<input type="text" class="form-control" name="occupation" id="occupation" placeholder="Enter Occupation" aria-label="Occupation" aria-describedby="basic-addon3">
			</div>
		</div>


		<div class="col-lg-6">
			<label for="Company" class="form-label">Company</label>
			<div class="input-group mb-3">
				<input type="text" class="form-control"  name="company"id="company" placeholder="Enter Company Name" aria-label="Company" aria-describedby="basic-addon4">
			</div>
		</div>



	</div>



	<div class="row">

		<div class="col-lg-12">
		<label for="Occupation" class="form-label" style="color:brown;">Add your passport photograph</label>
			<div class="input-group mb-3">
				<input type="file" class="form-control" name="profile_pic" id="file" onchange="readURL(this);" accept=".png, .jpg, .jpeg">
			</div>
		</div>


		<div class="form-group col-md-6">
			<img id="blah" src="<?php echo base_url(); ?>assets/img/no-image.png" class="" width="100" height="100" />
		</div>

	</div>





	<button type="submit" style="float: right;" class="btn btn-success">Generate PDF</button>
	</form>



</main>
