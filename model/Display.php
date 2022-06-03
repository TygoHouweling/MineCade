<?php

class Display
{

  public function CreateTable($result, $actionMode = false)
  {
    //        die(var_dump($actionMode));

    $tableheader = false;
    $html = "";
    $html .= "<table class='table table-striped'>";

    foreach($result as $row){
      if ($tableheader == false) {
        $html .= "<tr>";
        foreach ($row as $key => $value) {
          $html .= "<th>{$key}</th>";
        }
        if ($actionMode) {
          $html .= "<th>Actions</th>";
        }
        $html .= "</tr>";
        $tableheader = true;
      }
      $html .= "<tr>";
      foreach ($row as $value) {
        $html .= "<td>{$value}</td>";
      }
      if ($actionMode) {
        $html .= "<td style='display: flex; justify-content: space-between;'>";
        $html .= "<a href='?con=admin&op={$_GET['op']}&page=update&id={$row['event_id']}'><i class='fa fa-edit'></i></a>";
        $html .= "<a href='?con=admin&op={$_GET['op']}&page=delete&id={$row['event_id']}'><i class='fa fa-trash'></i></a>";
        $html .= "<a href='?con=admin&op={$_GET['op']}&page=read&id={$row['event_id']}'><i class='fa fa-eye'></i></a>";
        $html .= "</td>";
      }
      $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
    }


  public function CreateCard($item)
  {
    //    $result = $result->fetch(PDO::FETCH_ASSOC);
    //
    //    $html = '';
    //
    //    $html .= "<div class='card'>";
    //    $html .= "<img src='view/assets/image/{$result['avatar']}' alt='Avatar' style='width:100%'>";
    //    $html .= "<div class='container'>";
    //    $html .= "<h4><b>{$result['name']}</b></h4>";
    //    $html .= "<p>{$result['phone']}</p>";
    //    $html .= "<p>{$result['email']}</p>";
    //    $html .= "<p>{$result['location']}</p>";
    //
    //    $html .= "</div>";
    //    $html .= "</div>";

    $html = "<div class=col-md-3>";
    $html .= "<div class='bestseller'>";
    $html .= "<div class='content_img'>";
    $link =  $item['id'];
    $html .= "<a href='?op=details&id=$link'>";
    $image = 'view/assets/image/' . $item['product_thumbnail'];
    $image = ($item['product_thumbnail'] != '' ? $image : "https://via.placeholder.com/350x430");
    $html .= "<img class='bestSellerImage' src='$image' alt=''></a>";
    $html .= "<div><a href='?op=details&id= $link '>Lees meer over dit product</a></div></div>";
    $product_name = $item['product_name'];
    $html .= "<div class='product_title'><h4>$product_name</h4></div>";
    $product_price = $item['product_price'];
    $id = $item['id'];
    $html .= "<div class='bottom_bestseller'><input type='hidden' name='product_id' value='$id' id='$id'><div class='price'><span>$product_price</span></div><div class='text-center d-md-inline'><button name='add' id='$id'class='rounded-circle border-0 roundbutton'><i class='fas fa-plus fa-010' aria-hidden='true'></i></button></div></div>";
    $html .= "</div></div>";

    return $html;
  }

  public function CreateCardProducts($result)
  {

    $result = $result->fetch(PDO::FETCH_ASSOC);

    $html = '';

    $html .= "<div class='card'>";
    $html .= "<div class='container'>";
    $html .= "<h4><b>{$result['product_title']}</b></h4>";
    $html .= "<p>Genre: {$result['product_categorie']}</p>";
    $html .= "<p>Naam: {$result['product_name']}</p>";
    $html .= "<p>Prijs: {$result['product_price']}</p>";
    $html .= "<p>Details: {$result['product_details']}</p>";
    $html .= "<p>Beschrijving: {$result['product_description']}</p>";
    $html .= "<img src='view/assets/image/{$result['product_thumbnail']}' alt='Thumbnail' style='width:20%'>";

    $html .= "</div>";
    $html .= "</div>";

    return $html;
  }

  public function PageNavigation($pages, $page)
  {

    $html = "";
    $html .= "<nav class='mt-4'>";

    $prevArrow = $page;
    $nextArrow = $page;
    $nextArrow++;
    if ($nextArrow > $pages) {
      $nextArrow = $pages;
    }

    $prevArrow--;
    if ($prevArrow <= 0) {
      $prevArrow = 1;
    }


    $html .= "<ul class='pagination'>";
    $html .= '<li class="link page-item"><a class="page-link" href="?con=' . $_REQUEST['con'] . '&op=' . $_REQUEST['op'] . '&number=' . $prevArrow . '"> &laquo; </a></li>';
    for ($x = 1; $x <= $pages; $x++) {
      if ($page == $x) {

        $html .= '<li class="link page-item active"><a class="page-link" href="?con=' . $_REQUEST['con'] . '&op=' . $_REQUEST['op'] . '&number=' . $x . '">' . $x . '<span class="sr-only">(current)</span></a></li>';
      } else {

        $html .= '<li class="link page-item"><a class="page-link" href="?con=' . $_REQUEST['con'] . '&op=' . $_REQUEST['op'] . '&number=' . $x . '">' . $x . '</a></li>';
      }
    }
    $html .=  '<li class="link page-item"><a class="page-link" href="?con=' . $_REQUEST['con'] . '&op=' . $_REQUEST['op'] . '&number=' . $nextArrow . '"> &raquo; </a></li>';
    $html .= "</ul>";
    $html .= "</nav>";

    return $html;
  }

  public function flash($name, $text = '')
  {
    if (isset($_SESSION[$name])) {
      $msg = $_SESSION[$name];
      unset($_SESSION[$name]);
      return $msg;
    } else {
      $_SESSION[$name] = $text;
    }

    return '';
  }

  public function readJSON($file){
    $result = file_get_contents($file);
    $details = json_decode($result);

    return $details;
  }
}
