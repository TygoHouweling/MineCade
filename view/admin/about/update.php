<?php
require 'view/components/header.php';
require 'view/components/sidebar.php';

?>

<h1>
        update Form
    </h1>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">

                <form action="?con=admin&op=about" method="POST" enctype="multipart/form-data">

                    <table class="form_styling">
                        <tr>
                            <td>
                                <label>About us header:</label><br>

                            </td>
                        <tr>
                            <td>
                                <!-- <input type="text" name="event_desc" placeholder="event_desc" required> -->
                                <textarea class="tinymce" id="mceDEMO" name="about_header"><?= $about[0]['header'] ?></textarea>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js" integrity="sha512-XQOOk3AOZDpVgRcau6q9Nx/1eL0ATVVQ+3FQMn3uhMqfIwphM9rY6twWuCo7M69rZPdowOwuYXXT+uOU91ktLw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                <script>
                                    tinymce.init({
                                        selector: "#mceDEMO",
                                        plugins: "save",
                                        menubar: false,
                                        toolbar: "save | styleselect | bold italic | alignleft aligncenter alignright alignjustify"
                                    });
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>About us main:</label><br>

                            </td>
                        <tr>
                            <td>
                                <!-- <input type="text" name="event_desc" placeholder="event_desc" required> -->
                                <textarea class="tinymce" id="mceDEMO" name="about_main"><?= $about[0]['main'] ?></textarea>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js" integrity="sha512-XQOOk3AOZDpVgRcau6q9Nx/1eL0ATVVQ+3FQMn3uhMqfIwphM9rY6twWuCo7M69rZPdowOwuYXXT+uOU91ktLw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                <script>
                                    tinymce.init({
                                        selector: "#mceDEMO",
                                        plugins: "save",
                                        menubar: false,
                                        toolbar: "save | styleselect | bold italic | alignleft aligncenter alignright alignjustify"
                                    });
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>About us footer:</label><br>

                            </td>
                        <tr>
                            <td>
                                <!-- <input type="text" name="event_desc" placeholder="event_desc" required> -->
                                <textarea class="tinymce" id="mceDEMO" name="about_footer"><?= $about[0]['contact'] ?></textarea>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js" integrity="sha512-XQOOk3AOZDpVgRcau6q9Nx/1eL0ATVVQ+3FQMn3uhMqfIwphM9rY6twWuCo7M69rZPdowOwuYXXT+uOU91ktLw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                <script>
                                    tinymce.init({
                                        selector: "#mceDEMO",
                                        plugins: "save",
                                        menubar: false,
                                        toolbar: "save | styleselect | bold italic | alignleft aligncenter alignright alignjustify"
                                    });
                                </script>
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
            <div class="col-md-3"></div>
        </div>
    </div>

<?php

require 'view/components/footer.php';
?>