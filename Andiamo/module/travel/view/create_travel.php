<div class="container">
  <div class="row">
    <!-- <div class="col-md-6"> -->
	    <br/>
    <div id="contenido">
        <form autocomplete="on" method="post" name="alta_travel" id="alta_travel">
            <?php
        		if(isset($error)){
        			print ("<BR><span CLASS='styerror'>" . "* ".$error . "</span><br/>");
        		}?>
            <h1>Viaje nuevo</h1>
            <table border='0'>
              <tr>
                  <td>Tipo de viaje: </td>
                  <td>
                      <input type="radio" id="type" name="type" checked="checked" value="Nacional"/> Nacional
                      <input type="radio" id="type" name="type" value="Europeo"/> Europeo
                      <input type="radio" id="type" name="type" value="Internacional"/> Internacional
                  </td>
                  <td><font color="red">
                      <span id="error_type" class="error">
                          <?php
                              echo "$error_type";
                          ?>
                      </span>
                  </font>
                  </td>
                </tr>
                <tr>
                    <td>Referencia: </td>
                    <td><input type="text" id="ref" name="ref" placeholder="Ej: 21" value=""/></td>
                    <td><font color="red">
                        <span id="error_ref" class="error">
                            <?php
                                echo "$error_ref";
                            ?>
                        </span>
                    </font>
                  </td>
                </tr>
                <tr>
                    <td>Precio: </td>
                    <td><input type="text" id="price" name="price" placeholder="Ej: 200" value=""/></td>
                    <td><font color="red">
                        <span id="error_price" class="error">
                            <?php
                                print_r($error['price']);
                            ?>
                        </span>
                    </font>
                    </td>
                </tr>
                <tr>
                    <td>Pais: </td>
                    <td><input type="text" id="country" name="country" placeholder="Ej: Italia" value=""/></td>
                    <td><font color="red">
                        <span id="error_country" class="error">
                            <?php
                                echo "$error_country";
                            ?>
                        </span>
                    </font>
                    </td>
                </tr>
                <tr>
                    <td>Destino: </td>
                    <td><input type="text" id="destination" name="destination" placeholder="Ej: Venecia" value=""/></td>
                    <td><font color="red">
                        <span id="error_destination" class="error">
                            <?php
                                echo "$error_destination";
                            ?>
                        </span>
                    </font>
                    </td>
                </tr>
                <tr>
                    <td>Descuento: </td>
                    <td><select id="discount" name="discount">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        </select></td>
                    <td><font color="red">
                        <span id="error_discount" class="error">
                            <?php
                                echo "$error_discount";
                            ?>
                        </span>
                    </font>
                  </td>
                </tr>
                <tr>
                    <td>Servicios: </td>
                    <td>
                        <input type="checkbox" id= "services" name="services" value="wifi"/>Wifi
                        <input type="checkbox" id= "services" name="services" value="piscina"/>Piscina
                        <input type="checkbox" id= "services" name="services" value="parking"/>Parking
                        <input type="checkbox" id= "services" name="services" value="gimnasio"/>Gimnasio
                        <input type="checkbox" id= "services" name="services" value="spa"/>Spa
                        <input type="checkbox" id= "services" name="services" value="mascotas"/>Admite mascotas
                    </td>
                    <td><font color="red">
                        <span id="error_servicios[]" class="error">
                            <?php
                                echo "$error_servicios";
                            ?>
                        </span>
                    </font>
                  </td>
                </tr>

                <tr>
                    <td><input class="btn btn-success" type="button" name="create" id="create" value="Enviar" onclick="validate_travel()"/></td>
                    <td align="right"><a class="btn btn-danger" href="index.php?page=controller_travel&op=list">Volver</a></td>
                </tr>
            </table>
        </form>
    </div>
  </div>
</div>
