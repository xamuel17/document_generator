
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Certificate of Completion</title>
	
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/cert.css">
</head>
<body class="bg" >
	


<table class="cert bg">
  <tr>
		<br>
    <td align="center" class="crt_logo">
      <img src="<?php echo base_url();?>assets/img/lawsikho.jpg" alt="lawsikho" width="80">

    </td>
  </tr>
  <tr>
    <td align="center">
      <h1 class="crt_title">Certificate Of Completion </h1>
			<br>
        <h2>This Certificate is awarded to</h2>
        <h1 class="colorGreen crt_user"><?php echo $user_data['fullname'] ?></h1>
        <h3 class="afterName">For his/her completion of HSE Awareness session
        </h3>
        <h3>Awarded on <?php echo $user_data['date'] ?> </h3>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="<?php echo base_url();?>assets/img/signature.png" class="certSign" alt="sign">
      <h4 class="afterName">Endorsed By : &nbsp;<?php echo $user_data['officer_name'] ?> </h4>
      <h4 class="afterName">Department: &nbsp;<?php echo $user_data['department'] ?></h4>
    
    </td>
  </tr>
</table>

</body>
</html>
