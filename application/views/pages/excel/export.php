
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
					<h5 class="card-title">Easy Export</h5>
					<h6 class="card-subtitle mb-2 text-muted"> powered by PHPSpreadsheet</h6>
					<p class="card-text">Export Xls, Csv and Xlsx Microsoft Excel Spreadsheet .</p>



				<div class="row">
					<div class="col-lg-6">
						<a  href="<?php echo base_url()?>excel/download"  target="_blank" class="btn btn-success"> Export Users Spreadsheet</a>
					</div>
				</div>


					
				
				</div>
			</div>
		</div>


	</div>

	</div>




</main>



