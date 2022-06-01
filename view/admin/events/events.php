<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/assets/style.css">
    <title>Document</title>
</head>
<body>
    <?php //require 'components/header.php';?>

    <h1>
        Create Form
    </h1>
    <form action="index.php?con=admin&op=events" method="POST" enctype="multipart/form-data">
    <div>
        <label>Event name:</label>
        <input type="text" name="event_name" placeholder="event_name" required>
    </div>
    <div>
        <label>Event description:</label>
        <input type="textarea" name="event_desc" placeholder="event_desc" required>
    </div>
    <div>
        <label>Event date:</label>
        <input type="datetime-local" name="event_date" placeholder="event_date" required>
    </div>
    <div>
        <label>Event location:</label>
        <input type="text" name="event_location" placeholder="event_location" required>
    </div>
    <div>
        <label>Event zipcode:</label>
        <input type="text" name="event_zipcode" placeholder="event_zipcode" required>
    </div>


    <div>
        <input type="reset">
        <input type="submit" name="submit" value="Submit">
    </div>
  </form>


    </div>
</div>
<?php //require 'components/footer.php';?>
    
</body>
</html>