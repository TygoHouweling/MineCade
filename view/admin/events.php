<?php
require 'view/components/header.php';
require 'view/components/sidebar.php';
?>

<a href="?con=admin&op=createEvent">Create new event</a>
<?php
echo $events;
echo $pagination;

require 'view/components/footer.php';
?>