<!--cambio de titulo-->
<?php
$titulo = "Todos los productos | FiguShop";
?>
<!--Navbar.php-->
<?php require('./layout/navbar.php') ?>

<!--Main de productos-->
<main>

        <!--cards de productos mas vendidos-->
        <div class="container mt-5 py-5">
          <h1 class="text-center">Todos los Productos <del class="text-primary"><span>Base De Datos</span></del></h1>  
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4 py-5">

          <!--Imagen principal del producto-->
            <?php foreach($resultado as $row) { ?>
            <!--Item/Producto-->
            <div class="item">
              <div class="card h-100">
                <?php
                                
                $id = $row['id_producto'];
                $imagen = "img-producto-db/" . $id . "/principal.jpg"; 

                if(!file_exists($imagen)){
                  $imagen = "img-producto-db/no-producto.jpg";
                }

                ?>

                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto--> 
                  
                  <!--Variable de descuento-->    
                    <?php $descuento = $row['descuento'];
                    if($descuento > 0){
                      echo '<span class="discount">' . $descuento . '%</span>';
                    } 
                    ?>

                    <!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->
                    <span class="estado <?php 
                    echo $row['id_estado'] == 1 ? 'preventa':
                        ($row['id_estado'] == 2 ? 'stock' :
                        ($row['id_estado'] == 3 ? 'out-of-stock' : '')); 
                        ?>">
                        <?php
                    echo $row['id_estado'] == 1 ? 'PRE-VENTA':
                        ($row['id_estado'] == 2 ? 'STOCK' :
                        ($row['id_estado'] == 3 ? 'OUT-OF-STOCK' : '')); 
                        ?>
                        </span>
                                                
                    <img src="<?php echo $imagen; ?>" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> <?php echo $row['nombre_producto']; ?> </h5><!--nombre del producto-->
                  </div>


                  <!--Precios-->
                  <div class="d-flex justify-content-around mb-2 precio">
                  
                  <?php
                  $descuento = $row['descuento'];
                  $precio_original = $row['precio'];

                  if ($descuento > 0) {
                      $descuento_aplicado = ($descuento * $precio_original) / 100;
                      $precio_final = $precio_original - $descuento_aplicado;
                      $clase_texto = 'danger'; 
                  } else {
                      $precio_final = $precio_original;
                      $clase_texto = 'primary'; 
                  }
                  ?>

                  <h3 class="text-<?php echo $clase_texto; ?>">
                      <?php echo '$' . number_format($precio_final, 2); ?>
                      <?php if ($descuento > 0) : ?>
                          <span class="text-primary precio-original" style="text-decoration: line-through; font-size: medium;">
                              $<?php echo number_format($precio_original, 2); ?>
                          </span>
                      <?php endif; ?>
                  </h3> 
                  <!--Fin Precios-->

                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="#"><!--Link para la platilla de vista producto--> 
                      <button class="btn btn-success"> <?php 
                      echo $row['id_estado'] == 1 ? 'Reserva Aquí':
                        ($row['id_estado'] == 2 ? 'Compra Aquí' :
                        ($row['id_estado'] == 3 ? 'Proxímamente' : '')); 
                        ?>
                        </button><!--boton de compra-->
                    </a>  
                  </div>
              </div>
            </div>
            <!--Fin de Item/Producto-->
            <?php } ?>

            

          </div>
        </div>
        <!--final de cards-->

</main>
<!--Main de productos-->

<!--FOOTER.php y js Bootstrap-->
<?php require('./layout/footer.php') ?>

</body>
</html>