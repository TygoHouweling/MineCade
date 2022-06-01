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
	<title>Minecade</title>
	<?php

	if (!isset($_SESSION)) {
		session_start();
	}

	$result = file_get_contents('view/assets/json.json');
	$details = json_decode($result);

	?>
</head>

<body class="hero-anime">

	<?php

	if (isset($_SESSION['loggedin']) === false) { ?>
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
								foreach ($details as $key => $value) {
								?>
									<a class="nav_link" href="<?= $value->url ?>"><?= $value->name ?></a>
								<?php
								}
								?>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	<?php } elseif (isset($_SESSION['loggedin']) === true) { ?>
		<div class='navbar'>
			<a href='index.php?con=auth&op=logout'>Logout</a>
		</div>
	<?php } ?>