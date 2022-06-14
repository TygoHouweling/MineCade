<?php 
    require 'view/components/header.php'; 

    foreach($html as $row => $value) { 
    }
?>

<h1>
    Update Form
</h1>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">

            <form action="?con=users&op=update" method="POST" enctype="multipart/form-data">

                <table class="form_styling">
                    <tr>
                        <td>
                            Firstname
                            <input type="text" name="firstname" value="<?= $value["firstname"] ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Lastname
                            <input type="text" name="lastname" value="<?= $value["lastname"] ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            username
                            <input type="text" name="username" value="<?= $value["username"] ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            email
                            <input type="email" name="email" value="<?= $value["email"] ?>" required>
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
<?php require 'view/components/footer.php'; ?>