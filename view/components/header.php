<?php
require_once 'controller/MainController.php';
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="jquery-3.6.0.min.js"></script>
	<link rel="icon" type="image/png" href="/view/assets/images/logo.png" sizes="32x32">
	<link rel="stylesheet" href="view/assets/style/main_style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<title>Minecade</title>
	<?php

	if (!isset($_SESSION)) {
		session_start();
	}

	//if there is a navigation, put it in a json file and call here
	$mainController = new MainController();
	$navbar = $mainController->collectReadJSON('view/assets/json/navbar.json');
	$dropdown = $mainController->collectReadJSON('view/assets/json/dropdown.json');

	?>
</head>

<body class="hero-anime">

	<?php

	if (isset($_SESSION['msg'])) {
		echo '<div class="alert alert-primary" role="alert">' . $_SESSION['msg'] . '</div>';
		unset($_SESSION['msg']);
	}

	if (isset($_SESSION['loggedin']) === false) { ?>
		<div class="navigation-wrap bg-light start-header start-style">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="navbar navbar-light bg-light">
							<a class="logo_header" href="?con=home">
								<img src="view/assets/images/logo.png" width="100%" height="100%" alt="">
							</a>

							<div class="nav_links_div">
								<?php
								foreach ($navbar as $key => $value) {
								?>
									<a class="nav_link" href="<?= $value->url ?>"><?= $value->name ?></a>
								<?php
								}
								?>
								<a class="nav_link" href="?con=auth&op=showlogin">Login</a>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	<?php } elseif (isset($_SESSION['loggedin']) === true) { ?>
		<div class="navigation-wrap bg-light start-header start-style">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="navbar navbar-light bg-light">
							<a class="logo_header" href="?con=home">
								<img src="view/assets/images/logo.png" width="100%" height="100%" class="d-inline-block align-top" alt="">
							</a>

							<div class="nav_links_div">
								<?php
								foreach ($navbar as $key => $value) {
								?>
									<a class="nav_link" href="<?= $value->url ?>"><?= $value->name ?></a>
								<?php
								}
								?>
								<?php if (isset($_SESSION['user_admin']) == 1) { ?>
									<div class="dropdown">
										<button onclick="dropdownClick()" class="dropbtn"><i class="fa fa-user" aria-hidden="true"></i></button>
										<div id="myDropdown" class="dropdown-content">
											<?php
											foreach ($dropdown as $key => $value) {
											?>
												<a class="nav_link" href="<?= $value->url ?>"><?= $value->name ?></a>
											<?php
											}
											?>
										</div>
									</div>

								<?php } else { ?>
									<div class="dropdown">
										<button onclick="dropdownClick()" class="dropbtn"><i class="fa fa-user" aria-hidden="true"></i></button>
										<div id="myDropdown" class="dropdown-content">
											<a href='index.php?con=auth&op=logout'>Logout</a>
										</div>
									</div>

								<?php } ?>

							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>