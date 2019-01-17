<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
    include($path . "module/home/model/DAOhome.php");

    switch($_GET['op']){
        case 'list':
            try{
                $daohome = new DAOhome();
            	$rdo = $daohome->select_all_travels();
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }

            if(!$rdo){
    			$callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/home/view/home.php");
    		}
            break;

        default;
            include("view/inc/error404.php");
            break;
    }
