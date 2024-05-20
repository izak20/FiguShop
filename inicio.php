<?php
$titulo = "Inicio | FiguShop";
?>
<?php require('layout/db-card.php') ?>

<?php require('./layout/navbar.php') ?>

<!--Aqui empieza el main-->
<main>
  <!--carrusel de imgs de header-->
  <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators mb-0"><!--botones de abajo-->
      <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="4" aria-label="Slide 5"></button>
      <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="5" aria-label="Slide 6"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="5000"><!--imagenes y tiempo de el carrusel-->
        <a href="shf.php"> <!-- Enlace para Bandai (ID del producto 1) -->
          <img src="IMG/Bandai.jpg" class="d-block w-100" alt="Bandai">
        </a>
      </div>
      <div class="carousel-item" data-bs-interval="4000">
        <a href="vista-producto.php?id=1&token=<?php echo hash_hmac('sha1', 1, KEY_TOKEN); ?>"> <!-- Enlace para Figma Link (ID del producto 2) -->
          <img src="IMG/figma_Link_Tears_of_the_Kingdom.jpg" class="d-block w-100" alt="Link_figma">
        </a>
      </div>
      <div class="carousel-item">
        <a href="vista-producto.php?id=10&token=<?php echo hash_hmac('sha1', 10, KEY_TOKEN); ?>"> <!-- Enlace para Spider-Man (ID del producto 3) -->
          <img src="IMG/MAFEX_Friendly_Neighborhood_Spider_Man_Template_1232x240_PC.jpg" class="d-block w-100" alt="Spider-man">
        </a>
      </div>
      <div class="carousel-item">
        <a href="vista-producto.php?id=4&token=<?php echo hash_hmac('sha1', 4, KEY_TOKEN); ?>"> <!-- Enlace para Spider-Man 2099 (ID del producto 4) -->
          <img src="IMG/MAFEX_Spider_Man_2099.jpg" class="d-block w-100" alt="Spider-man_2099">
        </a>
      </div>
      <div class="carousel-item">
        <a href="mha.php"> <!-- Enlace para Deku y Ochako (ID del producto 5) -->
          <img src="IMG/Revoltech_Izuku_and_Ochaco_1232x240_PC.jpg" class="d-block w-100" alt="Deku_Ochako">
        </a>
      </div>
      <div class="carousel-item">
        <a href="vista-producto.php?id=23&token=<?php echo hash_hmac('sha1', 23, KEY_TOKEN); ?>"> <!-- Enlace para Final Fantasy VII (ID del producto 6) -->
          <img src="IMG/Final_Fantasy_VII.jpg" class="d-block w-100" alt="FF_VII">
        </a>
      </div>
    </div>
    <!--botones de la parte izquierda y derecha del carrusel-->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!--fin carrusel imgs-->

  <!--Aqui empieza lo de las franquicias destacadas OwlCarousel-->
  <div class="container">
    <h1 class="dysplay-3 text-center my-5">Franquicias destacadas</h1>
    <!--Aqui empieza un owlcarousel carrusel de imgs-->
    <div class="row">
      <div class="owl-carousel owl-theme">

        <!--item Marvel-->
        <div class="item">
          <div class="card border border-0">
            <div class="card-body">
              <a href="marvel.php">
                <img src="IMG/logomarvel.png" alt="Marvel" class="card-img-top" width="150px">
              </a>
            </div>
          </div>
        </div>

        <!--item DBZ-->
        <div class="item">
          <div class="card border border-0">
            <div class="card-body">
              <a href="dbz.php">
                <img src="IMG/logodbz.png" alt="" class="card-img-top" width="150px">
              </a>
            </div>
          </div>
        </div>

        <!--item DC-->
        <div class="item">
          <div class="card border border-0">
            <div class="card-body">
              <a href="dc.php">
                <img src="IMG/logodccomics.png" alt="" class="card-img-top" width="150px">
              </a>
            </div>
          </div>
        </div>

        <!--item naruto-->
        <div class="item">
          <div class="card border border-0">
            <div class="card-body">
              <a href="naruto.php">
                <img src="IMG/narutologo.png" alt="" class="card-img-top" width="150px">
              </a>
            </div>
          </div>
        </div>

        <!--item persona-->
        <div class="item">
          <div class="card border border-0">
            <div class="card-body">
              <a href="persona.php">
                <img src="IMG/persona-logo.png" alt="" class="card-img-top pt-3 mt-5" width="150px">
              </a>
            </div>
          </div>
        </div>

        <!--item mha-->
        <div class="item">
          <div class="card border border-0">
            <div class="card-body">
              <a href="mha.php">
                <img src="IMG/mha.png" alt="" class="card-img-top  mt-5" width="150px">
              </a>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
  <!--Final del OwlCarousel-->

  <style>
    .image-item {
      max-width: 550px;
      position: relative;
      overflow: hidden;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .image-item img {
      max-width: 550px;
      width: 100%;
      height: auto;
      transition: transform 0.3s ease;
    }

    .image-item:hover img {
      transform: scale(1.1);
    }
  </style>

  <div class="container mt-4">
    <div class="row">
      <!-- Imagen 1 -->
      <div class="col-lg-4 col-md-3 col-sm-1  mb-4">
        <div class="image-item">
          <a href="mafex.php">
            <img src="IMG/mafex.jpg" alt="Marvel" class="img-fluid">
          </a>
        </div>
      </div>
      <!-- Imagen 2 -->
      <div class="col-lg-4 col-md-3 col-sm-1  mb-4 imagen-invisible">
        <div class="image-item">
          <a href="shf.php">
            <img src="IMG/sh.jpg" alt="McFarlane" class="img-fluid">
          </a>
        </div>
      </div>
      <!-- Imagen 3 -->
      <div class="col-lg-4 col-md-3 col-sm-1  mb-4 imagen-invisible">
        <div class="image-item">
          <a href="revoltech.php">
            <img src="IMG/kaiyodo.jpg" alt="Banner SH" class="img-fluid">
          </a>
        </div>
      </div>
      <!-- Imagen 4 -->
      <div class="col-lg-4 col-md-3 col-sm-1  mb-4 imagen-invisible">
        <div class="image-item">
          <a href="ml.php">
            <img src="IMG/marvel-l.jpg" alt="Star Wars" class="img-fluid">
          </a>
        </div>
      </div>
      <!-- Imagen 5 -->
      <div class="col-lg-4 col-md-3 col-sm-1  mb-4 imagen-invisible">
        <div class="image-item">
          <a href="figma.php">
            <img src="IMG/figma.jpg" alt="Nuevos Arribos" class="img-fluid">
          </a>
        </div>
      </div>

    </div>
  </div>

  <style>
    /* Media query para pantallas más pequeñas */
    @media only screen and (max-width: 600px) {

      /* Ocultar la columna de Descuento en pantallas más pequeñas */
      div.imagen-invisible {
        display: none;
      }
    }
  </style>

  <!--Carrusel de productos-->
  <div class="container mt-2 py-5">
    <h1 class="dysplay-3 text-center my-5 titulo-mas-vendidos">Los mas vendidos</h1>
    <div class="row">
      <div class="owl-carousel owl-theme carousel-container">
        <!--Imagen principal del producto-->
        <?php foreach ($resultado as $row) {

          //if ($row['descuento'] > 0) {
        ?>


          <!--Item/Producto-->
          <div class="item">
            <div class="card h-100">
              <?php
              $id = $row['id_producto'];
              $imagen = "img-producto-db/" . $id . "/principal.jpg";

              if (!file_exists($imagen)) {
                $imagen = "img-producto-db/no-producto.jpg";
              }
              ?>

              <div class="imagen-content">
                <a href="vista-producto.php?id=<?php echo $row['id_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>"><!--Link para la platilla de vista producto-->
                  <!--Variable de descuento-->
                  <?php
                  $descuento = $row['descuento'];
                  if ($descuento > 0) {
                    echo '<span class="discount">' . $descuento . '%</span>';
                  }
                  ?>

                  <!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si no hay descuento-->
                  <span class="estado <?php
                                      echo $row['id_estado'] == 1 ? 'preventa' : ($row['id_estado'] == 2 ? 'stock' : ($row['id_estado'] == 3 ? 'out-of-stock' : ''));
                                      ?>">
                    <?php
                    echo $row['id_estado'] == 1 ? 'PRE-VENTA' : ($row['id_estado'] == 2 ? 'STOCK' : ($row['id_estado'] == 3 ? 'OUT OF STOCK' : ''));
                    ?>
                  </span>
                  <img src="<?php echo $imagen; ?>" class="card-img-top" alt="..."> <!--imagen del producto-->
                </a>
              </div>

              <div class="card-body">
                <a class="link-offset-2 link-underline link-underline-opacity-0 link-dark" href="vista-producto.php?id=<?php echo $row['id_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>">
                  <h5 class="card-title"> <?php echo $row['nombre_producto']; ?> </h5>
                </a><!--nombre del producto-->
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
                  <?php echo '$' . number_format($precio_final, 2, '.', ','); ?>
                  <?php if ($descuento > 0) : ?>
                    <span class="text-primary precio-original" style="text-decoration: line-through; font-size: medium;">
                      $<?php echo number_format($precio_original, 2, '.', ','); ?>
                    </span>
                  <?php endif; ?>
                </h3>
                <!--Fin Precios-->
              </div>
              <style>
                /* Establece el ancho personalizado para los botones */
                .custom-btn {
                  width: 150px;
                  /* Cambia el valor según sea necesario */
                }
              </style>

              <div class="d-flex justify-content-center mb-2">
                <?php if ($row['id_estado'] != 3) : ?>
                  <!-- El producto está disponible para agregar al carrito -->
                  <button class="btn btn-primary mt-3" type="button" onclick="addProductToCart(<?php echo $row['id_producto']; ?>, '<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>')">
                    Agregar al carrito
                  </button>
                <?php else : ?>
                  <!-- El producto está fuera de stock -->
                  <a href="vista-producto.php?id=<?php echo $row['id_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>" class="btn btn-primary custom-btn mt-3">Detalles</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <!--Fin de Item/Producto-->
        <?php } ?>
        <?php // } 
        ?>

      </div>
    </div>
  </div>
  <!--fin de owlcarousel de productos-->

  <!--inicio de categorias-->
  <div class="container mt-5">
    <h1 class="dysplay-3 text-center my-5">Categorias populares</h1>
    <div class="row">
      <div class="col-lg-4 mb-4 order-lg-2">
        <div class="bg-light p-3 text-center img-container">
          <a href="videojuegos.php">
            <span class="tipo-categoria">VideoJuegos <i class="fa-solid fa-arrow-right"></i></span>
            <img src="IMG/mario.jpg" alt="" class="card-img-top img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 order-1 order-lg-2">
        <div class="bg-light p-3 text-center img-container">
          <a href="anime.php">
            <span class="tipo-categoria">Anime <i class="fa-solid fa-arrow-right"></i></span>
            <img src="IMG/840_560.jpeg" alt="" class="card-img-top img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 order-1 order-lg-2">
        <div class="bg-light p-3 text-center img-container">
          <a href="series-peliculas.php">
            <span class="tipo-categoria">Series/Peliculas <i class="fa-solid fa-arrow-right"></i></span>
            <img src="IMG/pexels-tima-miroshnichenko-5662857.jpg" alt="" class="card-img-top img-fluid">
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--final de categorias-->

  <!--Inicio Ofertas-->
  <div class="container">
    <h1 class="dysplay-3 text-center my-5 titulo-mas-vendidos">Ofertas</h1>
    <div class="row">
      <div class="owl-carousel owl-theme carousel-container">
        <!--Imagen principal del producto-->
        <?php foreach ($resultado as $row) {

          if ($row['descuento'] > 0) { ?>


            <!--Item/Producto-->
            <div class="item">
              <div class="card h-100">
                <?php
                $id = $row['id_producto'];
                $imagen = "img-producto-db/" . $id . "/principal.jpg";

                if (!file_exists($imagen)) {
                  $imagen = "img-producto-db/no-producto.jpg";
                }
                ?>

                <div class="imagen-content">
                  <a href="vista-producto.php?id=<?php echo $row['id_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>"><!--Link para la platilla de vista producto-->
                    <!--Variable de descuento-->
                    <?php
                    $descuento = $row['descuento'];
                    if ($descuento > 0) {
                      echo '<span class="discount">' . $descuento . '%</span>';
                    }
                    ?>

                    <!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si no hay descuento-->
                    <span class="estado <?php
                                        echo $row['id_estado'] == 1 ? 'preventa' : ($row['id_estado'] == 2 ? 'stock' : ($row['id_estado'] == 3 ? 'out-of-stock' : ''));
                                        ?>">
                      <?php
                      echo $row['id_estado'] == 1 ? 'PRE-VENTA' : ($row['id_estado'] == 2 ? 'STOCK' : ($row['id_estado'] == 3 ? 'OUT OF STOCK' : ''));
                      ?>
                    </span>
                    <img src="<?php echo $imagen; ?>" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>
                </div>

                <div class="card-body">
                  <a class="link-offset-2 link-underline link-underline-opacity-0 link-dark" href="vista-producto.php?id=<?php echo $row['id_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>">
                    <h5 class="card-title"> <?php echo $row['nombre_producto']; ?> </h5>
                  </a><!--nombre del producto-->
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
                    <?php echo '$' . number_format($precio_final, 2, '.', ','); ?>
                    <?php if ($descuento > 0) : ?>
                      <span class="text-primary precio-original" style="text-decoration: line-through; font-size: medium;">
                        $<?php echo number_format($precio_original, 2, '.', ','); ?>
                      </span>
                    <?php endif; ?>
                  </h3>
                  <!--Fin Precios-->
                </div>
                <style>
                  /* Establece el ancho personalizado para los botones */
                  .custom-btn {
                    width: 150px;
                    /* Cambiar el valor según sea necesario */
                  }
                </style>

                <div class="d-flex justify-content-center mb-2">
                  <?php if ($row['id_estado'] != 3) : ?>
                    <!-- El producto está disponible para agregar al carrito -->
                    <button class="btn btn-primary mt-3" type="button" onclick="addProductToCart(<?php echo $row['id_producto']; ?>, '<?php echo hash_hmac('sha1', $row['id_producto'], 'APR.wqc-354*'); ?>')">
                      Agregar al carrito
                    </button>

                  <?php else : ?>
                    <!-- El producto está fuera de stock -->
                    <a href="vista-producto.php?id=<?php echo $row['id_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>" class="btn btn-primary custom-btn mt-3">Detalles</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <!--Fin de Item/Producto-->
          <?php } ?>
        <?php } ?>

      </div>
    </div>
  </div>
</main>

<!--FOOTER.php-->
<?php require('./layout/footer.php') ?>

<!--JQUERY CDN LINK.
      IMPORTANTE INTEGRITY QUE HACE QUE NO FUNCIONE EL OWLCAROUSEL:
      integrity="sha512-qFOQ9YFAeGj1gDOuUD61g3D+tLDv3u1ECYWqT82WQoaWrOhAY+5mRMTTVsQdWutbA5FORCnkEPEgU0OF8IzGvA=="-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!--owlcarousel Script LIBRARY!!!-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--Cantidad de items en pantalla(responsive)
    tambien esta la funcion de autoplay(para que se mueva soloxd)-->
<script>
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    autoplay: true,
    autoplayTimeout: 2750,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 2
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
    }
  })
</script>

<script>
  function addProductToCart(id, token) {
    let formData = new FormData();
    formData.append('id', id);
    formData.append('token', token);

    fetch('clases/carrito.php', {
        method: 'POST',
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        console.log('Respuesta del servidor:', data);
        if (data.ok) {
          document.getElementById('num_cart').textContent = data.numero;
        } else {
          console.error('Error al agregar producto al carrito:', data.error);
        }
      })
      .catch(error => {
        console.error('Error de red:', error);
      });
  }
</script>


</body>

</html>