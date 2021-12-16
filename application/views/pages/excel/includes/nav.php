<?php
$action1 = null;
$action2 = null;
$action3 = null;
if($active == 'import'){
$action1 = 'active';
}else if($active == 'export'){
	$action2 = 'active';	
}else if ($active == 'users'){
	$action3 = 'active';
}
 ?>
<div class="row">
	<div class="col-lg-12">
		<ul class="nav nav-tabs">
			
			<li class="nav-item">
				<a class="nav-link <?php echo $action1;?>" aria-current="page" href="<?php echo base_url();?>excel">Import SpreadSheet</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php echo $action2;?>" href="<?php echo base_url();?>excel/export">Export SpreadSheet</a>
			</li>
	
			<li class="nav-item">
				<a class="nav-link <?php echo $action3;?>" aria-current="page" href="<?php echo base_url();?>users">Users</a>
			</li>

		</ul>
	</div>
</div>
