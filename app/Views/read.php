<?= $this->extend('layout') ?>

<?php

$session = \Config\Services::session();


$swal1 = "";
 $swal2 = "";
 $swal3 = "";
$swal = "";
 
if($session->getFlashdata("success") <> null){
	$swal1 = "Success";
	$swal2 = $session->getFlashdata("success");
	$swal3 = "success";
	$swal = "swal('" . $swal1 . "','" . $swal2 . "')";
}

if($session->getFlashdata("failed") <> null){
	$swal1 = "Failed";
	$swal2 = $session->getFlashdata("failed");
	$swal3 = "failed";
	$swal = "swal('" . $swal1 . "','" . $swal2 . "')";
}
?>


<!-- Header -->
<?= $this->section('header') ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('DataTables/datatables.min.css'); ?>" />
<script type="text/javascript" src="<?php echo base_url('DataTables/datatables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('sweetalert.min.js'); ?>"></script>

<?= $this->endSection() ?>

<!-- Header -->





<!-- Content -->
<?= $this->section('content') ?>
<div class="row">
	<table id="example" class="display" style="width:100%">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Age</th>
				<th>Programming</th>
			</tr>
		</thead>

		<tbody>
			<?php 
			 foreach($row->getResult() as $value){
			?>
			<tr>
				<td><?php echo $value->first_name ?></td>
				<td><?php echo $value->last_name ?></td>
				<td><?php echo $value->email ?></td>
				<td><?php echo $value->age ?></td>
				<td>
					<?php
					$loop = json_decode($value->programming);
					$programming="";
					foreach($loop as $key => $value){
						if($key == count($loop) - 1){
							$programming = $programming.$value;
						}else{
							$programming = $programming.$value.", ";
						}
					}
					echo $programming;
					?>
				</td>
			</tr>
			<?php
			}
			?>
		</tbody>

	</table>

</div>




<?= $this->endSection() ?>
<!-- Content -->





<!-- Footer -->
<?= $this->section('footer') ?>

<script type="text/javascript">
	$(document).ready(function () {
		$('#example').DataTable();
	});

	<?php echo @$swal; ?>
</script>

<?= $this->endSection() ?>

<!-- Footer -->