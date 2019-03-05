<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
  include($path . "module/cart/model/DAOcart.php");
  if (isset($_SESSION["tiempo"])) {  
      $_SESSION["tiempo"] = time();
  }
    if (!isset($_SESSION)){
      session_start();
    }
    switch($_GET['op']){

        case 'view':
            include("module/cart/view/cart.html");
        break;

        case 'fin_compra':
            include("module/cart/view/thankyou.html");
        break;

        default;
            include("view/inc/error404.php");
        break;
}