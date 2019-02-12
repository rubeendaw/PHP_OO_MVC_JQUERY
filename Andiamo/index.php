<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

if ((isset($_GET['page'])) && ($_GET['page']==="controller_travel") ){
  include("view/inc/top_page_travel.php");
}else if ((isset($_GET['page'])) && ($_GET['page']==="controller_travel") ){
    include("view/inc/top_page_travel.php");
}else{
    include("view/inc/top_page.php");
}

// require('translations/lang.php');
//    	if (isset($_POST["lang"])){
//    		  $lang = $_POST["lang"];
//    		  $_SESSION ["lang"] = $lang;
//    	}
//     if(isset($_SESSION['lang'])){
// 	      include ('translations/lang.php');
//     }else{
//         include ('translations/es.php');
//    	}

?>
  <div class="site-wrap">
     <!-- if (isset($_SESSION['type']) && ($_SESSION['type'] == "1")){
       include("view/inc/menu_auth.php");
     }else if (isset($_SESSION['type']) && ($_SESSION['type'] == "2")){
       include("view/inc/menu_no_auth.php");
     }else{
       include("view/inc/menu.php");
       } -->
    <?php
      include("view/inc/menu.php");
      include("view/inc/pages.php");
      include("view/inc/footer.php");
      include("view/inc/bottom_page.php");
    ?>
  </div>
