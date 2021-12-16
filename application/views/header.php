<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="htmlcss bootstrap aside menu, vertical, sidebar nav menu CSS examples" />
	<meta name="description" content="Bootstrap 5 sidebar navigation menu example" />

	<title>PDF Generator </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

	<link href="<?php echo base_url(); ?>assets/css/style.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

</head>

<body class="bg-light">

	<header class="section-header py-3">
		<div class="container">
			<h2>Document Generator </h2>
		</div>
	</header> <!-- section-header.// -->

	<div class="container">

		<section class="section-content py-3">
			<div class="row">
				<aside class="col-lg-3">
					<!-- ============= COMPONENT ============== -->
					<nav class="sidebar card py-2">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>pdf/text"> Text Only PDF </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>pdf/text-and-image"> Text & Images PDF </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>pdf/text-and-image-style"> Text ,Images & Styling PDF </a>
							</li>


							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>certificates"> Certificates </a>
							</li>


							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>excel"> Excel </a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>faker"> Faker</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>employee"> Employee Payslip </a>
							</li>

						</ul>
					</nav>
					<!-- ============= COMPONENT END// ============== -->
				</aside>
