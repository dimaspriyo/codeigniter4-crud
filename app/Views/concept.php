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




<div class="container">
	<div class="row">
		<div class="col s12 ">
			<nav>
				<div class="nav-wrapper #3e2723 brown darken-4">
					<ul id="nav-mobile" class="left hide-on-med-and-down">
						<li><a href="sass.html">
								<h5>Create</h5>
							</a></li>
						<li><a href="badges.html">
								<h5>Read</h5>
							</a></li>
						<li><a href="collapsible.html">
								<h5>Update</h5>
							</a></li>
						<li><a href="collapsible.html">
								<h5>Delete</h5>
							</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class="row">
		<form class="col s12">
			<div class="row">
				<div class="input-field col s6">
					<input placeholder="Placeholder" id="first_name" type="text" class="validate">
					<label for="first_name">First Name</label>
				</div>
				<div class="input-field col s6">
					<input id="last_name" type="text" class="validate">
					<label for="last_name">Last Name</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="email" type="email" class="validate">
					<label for="email">Email</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<div class="input-field col s1">Age :</div>
					<div class="input-field col s2">
						<span id="age-display"></span>
						<input type="hidden" name="age">
					</div>
					<div class="input-field col s12">
						<div id="age">

						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

</div>




<?= $this->endSection() ?>
<!-- Content -->




<!-- Footer -->
<?= $this->section('footer') ?>

<script type="text/javascript">

function updateAgeDisplay(values, handle){
	$("#age-display").text(values);
	$('age').val('1');
}

var slider = document.getElementById('age');
var myslider = noUiSlider.create(slider,{
	start: [0],
	step: 1,
	range: {
		'min': [0],
		'max': [100]
	},
	format: wNumb({
        decimals: 0,
        suffix: ' Tahun'
    })
});

myslider.on('update',updateAgeDisplay);
</script>

<?= $this->endSection() ?>

<!-- Footer -->