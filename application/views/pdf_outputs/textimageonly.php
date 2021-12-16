<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
 <style>
	 ul {
  list-style-type: none;
}
 </style>
</head>

<body>
	<div id="body">
		<div id="container">

			<div class="card text-center">
				<div class="card-header">
					Text & Image Content
				</div>
				<div class="card-body">

					<div class="row">

						<div class="col-lg-6">
							<h1 class="card-title" style="font-size: 30px;"> <?php echo ucfirst($user_data['firstname']) . ' ' . ucfirst($user_data['lastname']); ?></h1>


						</div>
						<div class="col-lg-4">
							<img src="<?php echo base_url() . 'upload/' . $user_data['photo'] ?>" class="card-img-top" style="width:200px;" alt="<?php echo ucfirst($user_data['firstname']); ?>">

						</div>
					</div>

					<br>

					<div class="card" style="width: 100%;">
						<div class="card-header" style="background-color: darkcyan;">
							<h3 style="color:white;">About <?php echo ' ' . ucfirst($user_data['firstname']); ?></h3>
						</div>
						<ul class="list-group list-group-flush">
							<li>Occupation: <strong><?php echo ucfirst($user_data['occupation']); ?></strong></li>
							<li class="list-group-item">Company: <strong><?php echo ucfirst($user_data['company']); ?></strong></li>


							<li class="list-group-item">Date: <strong><?php echo ucfirst($user_data['date']); ?></strong></li>

						</ul>
					</div>


					
				</div>
		
			</div>











		</div>

	</div>

</body>

</html>
