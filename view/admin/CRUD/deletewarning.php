<?php require 'view/components/header.php'; ?>

<a class="btn btn-success px-4" onclick="history.back()" href="index.php?con=<?=$_GET['con'] ?>">Nee</a>
<a href="?con=<?=$_GET['con'] ?>&op=delete&id=<?=$_GET['id']?>" class="btn btn-danger px-4">Ja</a>

<?php require 'view/components/footer.php'; ?>
