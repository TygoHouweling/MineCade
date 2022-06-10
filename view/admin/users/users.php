<?php

if (!isset($_SESSION)) {
    session_start();
  }

  if(empty($_SESSION['loggedin']) || $_SESSION['loggedin'] === false){

    $_SESSION['danger'] = "U heeft geen toegang";
    header('Location: index.php');
}

?>

    <div id="wrapper">

        <?php include 'view/components/sidebar.php'; ?>

        <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Gebruikers Overzicht</h1>
    </div>
    <div class="m-3">
    <?= $user ?>
    </div>     

</div>
</div>
        
    </div>

    <script src="view/assets/sidebar.js"></script>

    <script>
<?php if(isset($_SESSION['success'])): ?>
  toastr.success("<?= $_SESSION['success'] ?>");
  <?php unset($_SESSION['success']); endif ?>


  <?php if(isset($_SESSION['danger'])): ?>
  toastr.error("<?= $_SESSION['danger'] ?>");
  <?php unset($_SESSION['danger']); endif ?>

</script>
</body>
</html>