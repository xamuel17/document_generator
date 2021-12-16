<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>

<link href="<?php echo base_url() ?>assets/css/excel.css" type="text/css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<main class="col-lg-9">
	<?php $this->load->view('pages/excel/includes/nav'); ?>

	<div class="row">
		<div class="col-lg-12">


			<div class="card" style="width: 100%">

				<?php 
				if ($this->session->set_flashdata('message')){
					$this->session->set_flashdata('message');
				}
				 ?>
				<div class="card-body">
					<h5 class="card-title">Users Easy Import</h5>
					<h6 class="card-subtitle mb-2 text-muted"> powered by PHPSpreadsheet</h6>
					<p class="card-text">Import Xls, Csv and Xlsx Microsoft Excel Spreadsheet .</p>



					<div class='upload-content'>
						<!-- Dropzone -->
						<form action="<?php base_url(); ?>excel/upload" class="dropzone" id="fileupload">
						</form>
					</div>


					<a href="<?php echo base_url();?>users" class="card-link">View Users</a>
				
				</div>
			</div>
		</div>


	</div>

	</div>




</main>


<script>
	// Add restrictions
	Dropzone.options.fileupload = {

		renameFile: function(file) {
			var dt = new Date();
			var time = dt.getTime();
			return time + file.name;
		},
		acceptedFiles: '.csv,.xlsx,.xls',
		maxFilesize: 2, // MB
		addRemoveLinks: true,
		timeout: 5000,

		success: function(file, response) {
			toastr.success('Spreadsheet imported successfully!')
		},
		error: function(file, response) {
			console.log(response);
			toastr.error('File not supported!');
		}
	};
</script>
