

<body class="hero-anime">
<?php

require_once('components/header.php');

?>
   
    <div class="section full-height">
        <div class="absolute-center">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1>Bootstrap 4<br>
                                menu</h1>
                            <p>scroll for nav animation</p>
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
            </svg><input id="inp" type="text"></input></a>
    </div>
<script>
    function inputhover(){
        // let inp = document.querySelector('#inp');
        // inp.style.display = "block";
        console.log('test');
    }
</script>

	<section style="background-color: #eee;">
		<div class="container py-5">
		  <div class="row">
			<div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
			  <div class="card text-black">
				<img src="view/assets/images/blog.jpg"
				  class="card-img-top" alt="blog" />
				<div class="card-body">
				  <div class="text-center mt-1">
					<h4 class="card-title">Name blog</h4>
					<h6 class="text-primary mb-1 pb-3">Desc</h6>
				  </div>
	  
				  <div class="text-center">
					<div class="p-3 mx-n3 mb-4" style="background-color: #eff1f2;">
					  <h5 class="mb-0">Quick Look</h5>
					</div>
	
	  
					<div class="d-flex flex-column mb-4">
					  <span class="h1 mb-0">2x</span>
					  <span>Optical zoom range</span>
					</div>
	  

				  </div>
	  
				  <div class="d-flex flex-row">
					<button type="button" class="btn btn-primary flex-fill me-1" data-mdb-ripple-color="dark">
					  Learn more
					</button>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-md-6 col-lg-4 mb-4 mb-md-0">
			  <div class="card text-black">
				<img src="view/assets/images/blog.jpg"
				  class="card-img-top" alt="blog" />
				<div class="card-body">
				  <div class="text-center mt-1">
					<h4 class="card-title">Name blog</h4>
					<h6 class="text-primary mb-1 pb-3">Desc</h6>
				  </div>
	  
				  <div class="text-center">
					<div class="p-3 mx-n3 mb-4" style="background-color: #eff1f2;">
					  <h5 class="mb-0">Quick Look</h5>
					</div>

	  
					<div class="d-flex flex-column mb-4">
					  <span class="h1 mb-0">2x</span>
					  <span>Optical zoom range</span>
					</div>
	  
				  </div>
	  
				  <div class="d-flex flex-row">
					<button type="button" class="btn btn-primary flex-fill me-1" data-mdb-ripple-color="dark">
					  Learn more
					</button>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-md-6 col-lg-4 mb-4 mb-md-0">
			  <div class="card text-black">
				<img src="view/assets/images/blog.jpg"
				  class="card-img-top" alt="blog" />
				<div class="card-body">
				  <div class="text-center mt-1">
					<h4 class="card-title">Name blog</h4>
					<h6 class="text-primary mb-1 pb-3">Desc</h6>
				  </div>
	  
				  <div class="text-center">
					<div class="p-3 mx-n3 mb-4" style="background-color: #eff1f2;">
					  <h5 class="mb-0">Quick Look</h5>
					</div>
	  

	  
					<div class="d-flex flex-column mb-4">
					  <span class="h1 mb-0">4x</span>
					  <span>Optical zoom range</span>
					</div>
	  
				  </div>
	  
				  <div class="d-flex flex-row">
					<button type="button" class="btn btn-primary flex-fill me-1" data-mdb-ripple-color="dark">
					  Learn more
					</button>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </section>
    <?php
    include('components/footer.php');
