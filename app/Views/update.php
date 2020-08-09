<?= $this->extend('layout') ?>



<!-- Header -->

<?= $this->section('header')?>

<link rel="stylesheet" href="noUiSlider/nouislider.min.css" />
<script type="text/javascript" src="noUiSlider/nouislider.min.js"></script>
<script type="text/javascript" src="wnumb/wnumb.js"></script>


<?= $this->endSection()?>

<!-- Header -->

<!-- Content -->
<?= $this->section('content') ?>


<?php
if($isUpdate){
  $data = $row->getResult();
$programming = json_decode($data->programming,true);

$selectedPHP = in_array("php",$programming) ? "selected" : null ;
$selectedJava = in_array("java",$programming) ? "selected" : null;
$selectedPython = in_array("python",$programming) ? "selected" : null;
$selectedJavascript = in_array("javascript",$programming) ? "selected" : null;
}

?>


<div class="row">

  <div class="input-field col s4">
    <form method="GET" action="">
      <select name="id">
        <option value="" disabled selected>Choose your option</option>
      </select>
      <label>Choose Your Data</label>
    </form>
  </div>
</div>

<?php

if($isUpdate){
  ?>

<div class="row">

  <form method="POST">
    
	<div class="row" style="text-align: center;">
			<h4>Update</h4>
	</div>
	<div class="row">
		<form class="col s12" action="<?= base_url("/update") ?>" method="POST">
			<div class="row">
				<div class="input-field col s6">
					<input id="first_name" type="text" class="validate" name="first_name" value="<?php echo $data->first_name; ?>">
					<label for="first_name">First Name</label>
				</div>
				<div class="input-field col s6">
					<input id="last_name" type="text" class="validate" name="last_name" value="<?php echo $data->first_name; ?>">
					<label for="last_name">Last Name</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="email" type="email" class="validate" name="email" value="<?php echo $data->first_name; ?>">
					<label for="email">Email</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<div class="input-field col s1">Age :</div>
					<div class="input-field col s2">
						<span id="age-display"></span>
						<input type="hidden" name="age" value="<?php echo $data->age;?>">
					</div>
					<div class="input-field col s12">
						<div id="age">

						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 40px;">
					<div class="col s12" style="margin-bottom: 10px;">Programming Language :</div>
				<div class="col s2">
					<label>
						<input type="checkbox" name="programming[]" value="php" <?php echo $selectedPHP; ?>/>
						<span>PHP</span>
					</label>
				</div>
				<div class="col s2">
					<label>
						<input type="checkbox" name="programming[]" value="java" <?php echo $selectedJava; ?>/>
						<span>Java</span>
					</label>
				</div>
				<div class="col s2">
					<label>
						<input type="checkbox" name="programming[]" value="python" <?php echo $selectedPython; ?>/>
						<span>Python</span>
					</label>
				</div>
				<div class="col s2">
					<label>
						<input type="checkbox" name="programming[]" value="javascript" <?php echo $selectedJavascript; ?>/>
						<span>Javascript</span>
					</label>
				</div>
			</div>
			<div class="row">
			<button class="btn waves-effect waves-light" type="submit" name="action">
						<i class="material-icons right">Submit</i>
				 	</button>
			</div>
		</form>
	</div>
  </form>

</div>

<?php
}
?>




<?= $this->endSection() ?>
<!-- Content -->


<!--- Footer -->
<?= $this->section('content') ?>
<script type="text/javascript">



  $(document).ready(function () {
    $('select').formSelect();
  });



  function updateAgeDisplay(values, handle) {
		$("#age-display").text(values);
		document.getElementsByName("age").value = values;
	}

	var slider = document.getElementById('age');
	var myslider = noUiSlider.create(slider, {
		start: [0],
		step: 1,
		range: {
			'min': [0],
			'max': [100]
		},
		format: wNumb({
			decimals: 0
		})
	});

	myslider.on('update', updateAgeDisplay);

  <?php if($isUpdate){ ?>
  slider.noUiSlider.set(<?php echo $row->age; ?>);
  <?php } ?>
  
</script>
<?= $this->endSection() ?>
<!-- Footer -->