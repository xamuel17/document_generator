<main class="col-lg-9 animate__animated animate__backInDown animate__delay-2 ">


<h6>Text Only PDF.  </h6>
<p>This generates portable documents for text content </p>



<?php
if ($this->session->flashdata('errors')){
	echo '<div class="alert alert-danger">';
	echo $this->session->flashdata('errors');
	echo "</div>";
	unset($_SESSION['errors']);
}
?>

	<?php echo form_open('pdf/text/add' , array('onsubmit' => 'return validateTextContent()', 'target'=>'_blank')); ?>

	<div class="mb-3">
		<label for="exampleFormControlTextarea1" class="form-label">Enter Text Content</label>
		<textarea class="form-control" id="content" name="content" rows="6" ></textarea>
	</div>

	<button type="submit"   class="btn btn-success">Generate PDF</button>
	</form>



</main>
