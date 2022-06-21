<?php
include "components/header.php";
?>

<h3>Are you sure you want to go?</h3><br>

	<button><a href="?op=signedUp&confirm=true&event_id=<?= $_REQUEST['event_id'] ?>">Yes</a></button>

	<button><a href="?con=home">No</a></button>

<?php
include 'components/footer.php';
?>