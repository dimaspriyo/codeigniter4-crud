<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Codeigniter 4 CRUD</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"  href="<?php echo base_url('materialize/css/materialize.min.css'); ?>"/>

	<!-- STYLES -->


	<script type="text/javascript" src="<?php echo base_url('jquery-3.5.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('materialize/js/materialize.min.js'); ?>"></script>

    <?= $this->renderSection('header') ?>
</head>
<body>

<div class="container">
	
<div class="row">
		<div class="col s12 ">
			<nav>
				<div class="nav-wrapper #3e2723 brown darken-4">
					<ul id="nav-mobile" class="left hide-on-med-and-down">
						<li><a href="<?php echo base_url("/"); ?>">
								<h5>Create</h5>
							</a>
						</li>
						<li><a href="<?php echo base_url("/list"); ?>">
								<h5>Read</h5>
							</a>
						</li>
						<li><a href="<?php echo base_url("/update"); ?>">
								<h5>Update</h5>
							</a>
						</li>
						<li><a href="<?php echo base_url("/delete"); ?>">
								<h5>Delete</h5>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
<?= $this->renderSection('content') ?>
</div>

<?= $this->renderSection('footer') ?>
</body>
</html>
