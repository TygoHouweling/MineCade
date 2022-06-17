<?php
require 'view/components/header.php';
require 'view/components/sidebar.php';
?>

<form class="filterForm" method="POST" action="?con=participants&op=readall">
    <input type="text" placeholder="Event name" name="name">
    <input type="submit" name='submit'>
</form>

<?php
if(isset($_REQUEST['name'])&&$_REQUEST!=''){
    ?>
<a href="?con=participants&op=readall">Remove search filter</a>
    <p> Search for <?=$_REQUEST['name']?></p>
    <?php
}
echo $participants;
echo $pagination;

require 'view/components/footer.php';
?>