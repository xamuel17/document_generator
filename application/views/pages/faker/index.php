<main class="col-lg-9 animate__animated animate__backInDown animate__delay-2 ">


<h6>Faker Data.  </h6>
<p>This generates dummy data for test purpose </p>



<?php
if ($this->session->flashdata('errors')){
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


<div class="card">
  <div class="card-body">
  
<div class="row">

<div class="col-lg-4">
	<a href="<?php echo base_url();?>faker/users" class="btn btn-outline-primary"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Generate Users</a>
</div>
<div class="col-lg-4">
	<a href="<?php echo base_url();?>faker/employees" class="btn btn-outline-danger"><i class="fa fa-male" aria-hidden="true"></i>&nbsp;Generate Employees</a>
</div>

</div>

  </div>
</div>



</main>
