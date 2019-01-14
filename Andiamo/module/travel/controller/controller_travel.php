<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . '/www/Andiamo/';
    include($path . "module/travel/model/DAOtravel.php");

    switch($_GET['op']){
        case 'list':
            try{
                $daotravels = new DAOtravel();
            	$rdo = $daotravels->select_all_travels();
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }

            if(!$rdo){
    			$callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/travel/view/list_travel.php");
    		}
            break;

        case 'create':
            include("module/travel/model/validate.php");
            $ref='';
            $price='';
            $country='';
            $destination='';
            $check = true;

            if ($_POST){
                $check = validate_travel();
                print_r($check);
                // $error=$check['error']);
                // print_r($check['error']);
                die();
                // die();
                try{
                    $daotravel = new DAOtravel();
                	$rdoref = $daotravel->validate_ref($_POST);
                	// $smartphone=get_object_vars($rdo);
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
    			             die('<script>window.location.href="'.$callback .'";</script>');
                }
                if(!$rdoref){
                  // print_r("El IMEI no existe");
                  // include("module/smartphone/view/read_smartphone.php");
        		    }else{
                  print_r("La referencia ya existe");
                  $error_ref="La referencia ya existe";
                  // include("module/smartphone/view/create_smartphone.php");
                  die();
        		    }

                if ($check){
                    $_SESSION['check']=$_POST;
                    try{
                        $daotravel = new DAOtravel();
    		            $rdo = $daotravel->insert_travel($_POST);
                    }catch (Exception $e){
                        $callback = 'index.php?page=503';
        			    die('<script>window.location.href="'.$callback .'";</script>');
                    }

		            if($rdo){
            			echo '<script language="javascript">alert("Registrado en la base de datos correctamente")</script>';
            			$callback = 'index.php?page=controller_travel&op=list';
        			    die('<script>window.location.href="'.$callback .'";</script>');
            		}else{
            			$callback = 'index.php?page=503';
    			        die('<script>window.location.href="'.$callback .'";</script>');
            		}
                }
            }
            $error_type='';
            $error_ref='';
            $error_price='';
            $error_country='';
            $error_destination='';
            $error_discount='';
            $error_servicios='';
            // $error5=$check;
            include("module/travel/view/create_travel.php");
            break;

        case 'update':
            include("module/travel/model/validate.php");

            $check = true;

            if ($_POST){
                $check=validate_travel();

                if ($check){
                    $_SESSION['travel']=$_POST;
                    try{
                        $daotravel = new DAOtravel();
    		            $rdo = $daotravel->update_travel($_POST);
                    }catch (Exception $e){
                        $callback = 'index.php?page=503';
        			    die('<script>window.location.href="'.$callback .'";</script>');
                    }

		            if($rdo){
            			echo '<script language="javascript">alert("Actualizado en la base de datos correctamente")</script>';
            			$callback = 'index.php?page=controller_travel&op=list';
        			    die('<script>window.location.href="'.$callback .'";</script>');
            		}else{
            			$callback = 'index.php?page=503';
    			        die('<script>window.location.href="'.$callback .'";</script>');
            		}
                }
            }

            try{
                $daotravel = new DAOtravel();
            	$rdo = $daotravel->select_travel($_GET['id']);
            	$travel=get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }

            if(!$rdo){
    			$callback = 'index.php?page=503';
    			die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
          $error_type='';
          $error_ref='';
          $error_price='';
          $error_country='';
          $error_destination='';
          $error_discount='';
          $error_services='';
        	    include("module/travel/view/update_travel.php");
    		}
            break;

        case 'delete';
            if (isset($_POST['delete'])){
                try{
                    $daotravel = new DAOtravel();
                	$rdo = $daotravel->delete_travel($_GET['id']);
                  //var_dump($rdo);
                  // exit();
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
    			    die('<script>window.location.href="'.$callback .'";</script>');
                }

            	if($rdo){
        			//echo '<script language="javascript">alert("Borrado en la base de datos correctamente")</script>';
        			$callback = 'index.php?page=controller_travel&op=list';
    			    die('<script>window.location.href="'.$callback .'";</script>');
        		}else{
        			$callback = 'index.php?page=503';
			        die('<script>window.location.href="'.$callback .'";</script>');
        		}
            }

            include("module/travel/view/delete_travel.php");
            break;

        case 'read_modal':
            // echo $_GET["modal"];
            // exit;
            try{
                $daotravel = new DAOtravel();
            	  $rdo = $daotravel->select_travel($_GET['modal']);
            }catch (Exception $e){
              echo json_encode("error");
              exit;
            }
            if(!$rdo){
    			    echo json_encode("error");
              exit;
    		    }else{
    		      $travel=get_object_vars($rdo);
              echo json_encode($travel);
                //echo json_encode("error");
              exit;
    		}
            break;

            default;
                include("view/inc/error404.php");
                break;
    }
