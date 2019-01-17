<div class="site-section block-3 site-blocks-2 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 site-section-heading text-center pt-4">
        <h2>Los Más Destacados</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="nonloop-block-3 owl-carousel">
        <?php                   
        if ($rdo->num_rows === 0){
           echo '<h3 align="center"  colspan="3">NO HAY NINGUN VIAJE</h3>';
        }else{
            foreach ($rdo as $row) {
              echo '<div class="item">';
                echo '<div class="block-4 text-center">';
                  echo '<figure class="block-4-image">';
                    echo '<img src="view/assets/images/'. $row['img'] . '" alt="Image placeholder" class="img-fluid">';
                  echo '</figure>';
                  echo '<div class="block-4-text p-4">';
                    echo '<h3><a href="#">'. $row['country'] . '</a></h3>';
                    echo '<p class="mb-0">'. $row['destination'] . '</p>';
                    echo '<p class="text-primary font-weight-bold">'. $row['price'] . '€</p>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
            }
        }
      ?>
        </div>
      </div>
    </div>
  </div>
</div>
