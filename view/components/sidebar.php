<?php 
$sidebar = $mainController->collectReadJSON('view/assets/json/sidebar.json');
?>

<div class="container-sm">
  <nav class="main-menu">
    <ul>
        <li>
            <a href="http://google.com">
                <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Home
                    </span>
            </a>   
        </li>

        <?php
            foreach ($sidebar as $key => $value) { ?>
                <li class="has-subnav">
                    <a class="sidenav" href="<?= $value->url ?>">
                    <i class="<?= $value->icon ?>"></i>
                    <span class="nav-text">
                        <?= $value->name ?>
                    </span>
                    </a>
                </li>
            <?php }
        ?>


            </ul>

            <ul class="logout">
                <li>
                   <a href="?con=auth&op=logout">
                      <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
  </body>
    </html>