<?php
if (isset($_GET['page'])) {
	switch ($_GET['page']){
		case "homepage":
			include("module/home/view/home.php");
			break;
		case "controller_home";
			include("module/home/controller/".$_GET['page'].".php");
			break;
		case "controller_travel";
			include("module/travel/controller/".$_GET['page'].".php");
			break;
		case "index";
			include("module/inicio/".$_GET['page'].".php");
			break;
		case "404":
			include("view/inc/error".$_GET['page'].".php");
			break;
		case "503":
			include("view/inc/error".$_GET['page'].".php");
			break;
	}
} else{
	$_GET['op'] = 'list';
	include("module/home/controller/controller_home.php");
}
?>