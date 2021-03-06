<body class="hero-anime">
	<?php

	require_once('components/header.php');
	?>

	</div>
	</div>
	</div>
	</div>
	<div class="section home-banner">
		<div class="absolute-center">
			<div class="section">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h1>Minecade</h1>
							<p>Scroll down to see our upcoming events</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="my-5 py-5">
	</div>

	<!-- searhbar -->
	<div onmouseover="inputhover();" style="" id="mySidenav" class="sidenav">
		<a href="#" id="about"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
				<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
			</svg><input id="text"></a>
	</div>
	<script>
		function inputhover() {
			// let inp = document.querySelector('#inp');
			// inp.style.display = "block";
			console.log('test');
		}
	</script>

	<section style="background-color: #eee;">

	<h1>
		Our upcoming events!
	</h1>
		<div class="container py-5">
			<div class="row">
				<?php
				foreach ($result as $key => $result) {
				?>
					<div class="col-lg-4 mb-4 col-md-6">
						<div class="card text-black">
							<div class="imgbox">
								<img width="100%" height="100%" src="view/assets/images/uploaded_images/<?= $result['event_image'] ?>" class="card-img-top" alt="blog" />
							</div>
							<div class="card-body">
								<div class="text-center mt-1">
									<h4 class="card-title"><?= $result['event_name'] ?></h4>
									<h6 class="text-primary mb-1 pb-3"><?= $result['event_shortdesc'] ?></h6>
								</div>
								<div class="d-flex flex-row link_button">
									<a href="?op=signUp&event_id=<?= $result['event_id'] ?>">Sign up for event</a>
								</div>
							</div>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</section>
	<?php
	include('components/footer.php');
