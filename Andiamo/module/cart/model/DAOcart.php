<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
include($path . "model/connect.php");

	class DAOcart{

    function select_travel($ref){
			$sql = "SELECT * FROM travels WHERE id='$ref'";

			$conexion = Conectar::con();
      $res = mysqli_query($conexion, $sql)->fetch_object();
      Conectar::close($conexion);
      return $res;
		}

    function insert_cart($data, $user){
      $longitud = count($data);
        for($i=0; $i<$longitud; $i++){
        $usuario = $user;
        $country = $data[$i]->Country;
        $destination = $data[$i]->Destination;
        $price = $data[$i]->Price;
        $quantity = $data[$i]->Quantity;
        $total = $precio * $cantidad;

        $sql = "INSERT INTO checkout (user, country, destination, price, quantity, total, date)
        VALUES ('$user', '$country', '$destination', '$price', '$quantity', '$total', now())";
        $conexion = Conectar::con();
        $res = mysqli_query($conexion, $sql);
        Conectar::close($conexion);
      }
      return $res;
		}
	}
