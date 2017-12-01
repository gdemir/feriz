<?php

class BootstrapHelper {

  public static function breadcrumb_button() {

    $path = array_slice(explode("/", $_SERVER["REQUEST_URI"]), 1);
    $last_index = 2;

    $_list = "";
    $_value = "";
    foreach ($path as $index => $value) {
      $_value = $_value . "/" . $value;
      $_list .= (($index == $last_index) ? "<li active>$value</li>" : "<li><a href='$_value' class='btn btn-default btn-sm'>$value</a></li>");
    }
    return "<ol class='breadcrumb text-right'>" . $_list . "</ol>";
  }

  public static function notice_show() {
    $messages = "";
    if (isset($_SESSION["danger"]))
      $messages .= "<div class='alert alert-danger'  role='alert'><button data-dismiss='alert' class='close' type='button'>×</button>" . $_SESSION["danger"] . "</div>";
    if (isset($_SESSION["warning"]))
      $messages .= "<div class='alert alert-warning' role='alert'><button data-dismiss='alert' class='close' type='button'>×</button>" . $_SESSION["warning"] . "</div>";
    if (isset($_SESSION["success"]))
      $messages .= "<div class='alert alert-success' role='alert'><button data-dismiss='alert' class='close' type='button'>×</button>" . $_SESSION["success"] . "</div>";
    if (isset($_SESSION["info"]))
      $messages .= "<div class='alert alert-info'    role='alert'><button data-dismiss='alert' class='close' type='button'>×</button>" . $_SESSION["info"] . "</div>";
    return $messages;
  }

  public static function notice_clear() {
    $keys = ["success", "warning", "danger", "info"];
    foreach ($keys as $key)
      unset($_SESSION[$key]);
  }

}
?>