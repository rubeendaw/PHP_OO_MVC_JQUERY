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


        case 'addcart':
          try{
            $daocart = new DAOcart();
            $rdo = $daocart->select_travel($_GET['id']);
            $travel=get_object_vars($rdo);
          } catch (Exception $e) {
            echo json_encode("error");
          }
          
          if (!$rdo) {
            echo json_encode("error");
          }else{
            echo json_encode($rdo);
            exit();
          }
        break;

        case 'checkout':
          $data = json_decode($_POST['data']);
          $user = $_SESSION['users']['nick'];
          $daocart = new DAOCart();
          $rdo = $daocart->insert_cart($data, $user);
          if ($rdo == true){
            echo json_encode("correcto");
            exit();
          }else{
            echo json_encode("error");
            exit();
          }
        break;

        default;
            include("view/inc/error404.php");
        break;
}