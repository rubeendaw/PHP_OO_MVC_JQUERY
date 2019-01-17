<?php

if (isset($_SESSION["lang"])){
    $lang = $_SESSION["lang"];

    switch($lang){
      case 'en';
         include 'en.php';
          break;
      case 'es';
          include 'es.php';
          break;
      case 'val';
          include 'val.php';
          break;
      default;
          include 'es.php';
         break;
    }
}else{
   include 'es.php';
}
