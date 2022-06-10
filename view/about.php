<?php
include "components/header.php";

?>

<body class="d-flex flex-column min-vh-100">


  <section>
    <div>


      <div class="m-2">
        <div class="card container rounded shadow">
          <?= $about['header'] ?>
        </div>
      </div>



      <div class="m-2">
        <div class="container rounded-lg shadow card">
          <?= $about['main'] ?>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="m-2">
      <div class="container rounded-lg shadow card">
        <div class="d-flex">
          <div class="mapouter">
            <div class="gmap_canvas"><iframe width="400" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=harmonielaan%201&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2piratebay.org"></a><br>
              <style>
                .mapouter {
                  position: relative;
                  text-align: right;
                  height: 400px;
                  width: 400px;
                }
              </style><a href="https://www.embedgooglemap.net">google maps embed wordpress</a>
              <style>
                .gmap_canvas {
                  overflow: hidden;
                  background: none !important;
                  height: 400px;
                  width: 400px;
                }
              </style>
            </div>
          </div>
          <div>
            <?= $about['footer'] ?>
          </div>
        </div>
  </section>




  <?php include 'components/footer.php'; ?>

</body>

</html>