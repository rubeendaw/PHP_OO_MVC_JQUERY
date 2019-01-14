<?php
if (isset($_GET['page'])) {
	switch ($_GET['page']){
		case "homepage":
			include("module/inicio/view/inicio.php");
			break;
		case "controller_inicio";
			include("module/inicio/controller/".$_GET['page'].".php");
			break;
		case "controller_travel";
			include("module/travel/controller/".$_GET['page'].".php");
			break;
		// case "controller_moviles";
		// 	include("module/moviles/controller/".$_GET['page'].".php");
		// 	break;
		// case "controller_login";
		// 	include("module/login/controller/".$_GET['page'].".php");
		// break;
		// case "controller_cart";
		// 	include("module/cart/controller/".$_GET['page'].".php");
		// break;
		// case "controller_fav";
		// 	include("module/examen/controller/".$_GET['page'].".php");
		// break;
		// case "services":
		// 	include("module/services/".$_GET['page'].".php");
		// 	break;
		// case "aboutus":
		// 	include("module/aboutus/".$_GET['page'].".php");
		// 	break;
		// case "contactus":
		// 	include("module/contact/".$_GET['page'].".php");
		// 	break;
		case "index";
			include("module/inicio/".$_GET['page'].".php");
			break;
		case "404":
			include("view/inc/error".$_GET['page'].".php");
			break;
		case "503":
			include("view/inc/error".$_GET['page'].".php");
			break;
		default;
			include("module/inicio/view/inicio.php");
			break;
	}
}else
		include("module/inicio/view/inicio.php");
?>
