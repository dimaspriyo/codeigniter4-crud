<?= $this->extend('layout') ?>



<!-- Header -->
<?= $this->section('header') ?>

<link rel="stylesheet" href="noUiSlider/nouislider.min.css" />
<script type="text/javascript" src="noUiSlider/nouislider.min.js"></script>
<script type="text/javascript" src="wnumb/wnumb.js"></script>

<?= $this->endSection() ?>

<!-- Header -->





<!-- Content -->
<?= $this->section('content') ?>


	<div class="row" style="text-align: center;">
			<h4>Create</h4>
	</div>
	<div class="row">
		<form class="col s12" action="<?= base_url("/create") ?>" method="POST">
			<div class="row">
				<div class="input-field col s6">
					<input id="first_name" type="text" class="validate" name="first_name">
					<label for="first_name">First Name</label>
				</div>
				<div class="input-field col s6">
					<input id="last_name" type="text" class="validate" name="last_name">
					<label for="last_name">Last Name</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="email" type="email" class="validate" name="email">
					<label for="email">Email</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<div class="input-field col s1">Age :</div>
					<div class="input-field col s2">
						<span id="age-display"></span>
						<input type="hidden" name="age" id="hiddenAge">
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
						<input type="checkbox" name="programming[]" value="php"/>
						<span>PHP</span>
					</label>
				</div>
				<div class="col s2">
					<label>
						<input type="checkbox" name="programming[]" value="java"/>
						<span>Java</span>
					</label>
				</div>
				<div class="col s2">
					<label>
						<input type="checkbox" name="programming[]" value="python"/>
						<span>Python</span>
					</label>
				</div>
				<div class="col s2">
					<label>
						<input type="checkbox" name="programming[]" value="javascript"/>
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






<?= $this->endSection() ?>
<!-- Content -->




<!-- Footer -->
<?= $this->section('footer') ?>

<script type="text/javascript">
	function updateAgeDisplay(values, handle) {
		$("#age-display").text(values);
		document.getElementById('hiddenAge').value = values;
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
</script>

<?= $this->endSection() ?>

<!-- Footer -->