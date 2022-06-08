<?php

class Display
{

  public function CreateTable($result, $actionMode = false)
  {
    //var_dump($actionMode);

    $tableheader = false;
    $html = "";
    $html .= "<table class='table table-striped'>";
    $html .= "<a href='?con=admin&op=create'><button type='button' class='btn btn-success'>Create Event</button></a>";
    //while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
      foreach($result as $row) {
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
        $html .= "<a href='?con=admin&op=update&id={$row['id']}'>Edit </i></a>";
        $html .= "<a href='?con=admin&op=deleterequest&id={$row['id']}'>Delete </i></a>";
        $html .= "<a href='?con=admin&op=read&id={$row['id']}'>Read</i></a>";
        $html .= "</td>";
      }
      $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
  }

  public function CreateCard($result)
  {

    $result = $result->fetch(PDO::FETCH_ASSOC);
    $html = '';

    $html .= "<div class='container'>";
    $html .= "<div class='row'>";
    foreach ($result as $key=> $value) {
      $html .= "<div class='col-3'></div>";

      $html .= "<div class='col-3'>";
      $html .= $key . ":";
      $html .= "</div>";

      $html .= "<div class='col-3'>";
      $html .= $value;
      $html .= "</div>";

      $html .= "<div class='col-3'></div>";
    }

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

        $html .= '<li class="link page-item active"><a class="page-link" href="index.php?con=' . $_REQUEST['con'] . '&op=' . $_REQUEST['op'] . '&number=' . $x . '">' . $x . '<span class="sr-only">(current)</span></a></li>';
      } else {

        $html .= '<li class="link page-item"><a class="page-link" href="index.php?con=' . $_REQUEST['con'] . '&op=' . $_REQUEST['op'] . '&number=' . $x . '">' . $x . '</a></li>';
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

  public function limit_date($limit,$array){
    $time_now = strtotime('now');
    // die($time_now);
    $counter = 0;
    $result=[];
    foreach($array as $key=>$value){
      $time_event_unix = strtotime($value['event_date']);
      // echo "<pre>";
      // var_dump($time_event_unix > $time_now);
      if($time_event_unix > $time_now){
        $result[] = $value;

        $counter++;
        if($counter == $limit){
          return $result;
        }
      }
    }
    return $result;
  }
}
