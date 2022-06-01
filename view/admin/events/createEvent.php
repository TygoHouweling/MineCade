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
    <?php require 'view/components/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    Create Form
                </h1>
                <form action="?con=admin&op=events" method="POST" enctype="multipart/form-data">

                    <table class="form_styling">
                        <tr>
                            <td>
                                <label>Event name:</label>
                            </td>
                            <td>
                                <input type="text" name="event_name" placeholder="event_name" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Event description:</label>
                            </td>
                            <td>
                                <input type="textarea" name="event_desc" placeholder="event_desc" required>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Event date:</label>
                            </td>
                            <td>
                                <input type="datetime-local" name="event_date" placeholder="event_date" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Event location:</label>
                            </td>
                            <td>
                                <input type="text" name="event_location" placeholder="event_location" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Event zipcode:</label>

                            </td>
                            <td>
                                <input type="text" name="event_zipcode" placeholder="event_zipcode" required>

                            </td>   
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" value="Submit">
                            </td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>
    </div>
    <?php require 'view/components/footer.php'; ?>

</body>

</html>