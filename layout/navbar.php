<?php require_once __DIR__ . '/../config/config.php';; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--Script fontawesome-->
  <script src="https://kit.fontawesome.com/87116d5df4.js" crossorigin="anonymous"></script>

  <!--Script index.JS-->
  <script src="js/index.js"></script>
  <!--LINK CSS-->
  <link rel="stylesheet" href="css/hola.css">

  <link rel="icon" href="IMG/logo-robot.png">

  <!--LINK Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!--LINK OwlCarousel-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title><?php echo isset($titulo) ? $titulo : 'Título Predeterminado'; ?></title>
</head>

<body>
  <!--Aqui Inicia La Navbar!!!-->
  <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary p-3">
    <!--logo:FiguShop-->
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand me-0" href="inicio.php"><img src="IMG/logo.png" width="250px" alt="Logo"></a>
      <div class="d-flex justify-content-end my-3 py-2">
        <a class="mr-3 link-offset-2 link-underline link-underline-opacity-0 icono-invisible" href="registro.php"><i class="fa-solid fa-user" style="font-size: 25px;"></i></a><!-- Usuario -->
        <div class="me-1"></div> <!-- Espacio en blanco -->
        <!-- Carro de compras -->
        <a class="link-offset-2 link-underline link-underline-opacity-0 icono-invisible" href="checkout.php" onclick="addProductToCart(<?php echo $id_producto; ?>, '<?php echo $token; ?>')">
          <i class="fa-solid fa-cart-shopping" style="font-size: 25px;"></i>
          <!-- Contador de elementos en el carrito -->
          <span id="num_cart" class="badge rounded-pill bg-danger">
            <?php echo $num_cart; ?>
          </span>
        </a>
      </div>
      <style>
        /* Estilos para el logo en modo mobile */
        @media (max-width: 601px) {
          .navbar-brand img {
            max-width: 175px;
            /* Ajusta el tamaño máximo del logo en dispositivos móviles */
          }
        }

        .icono-invisible {
          display: none;
        }


        @media only screen and (max-width: 601px) {
          .icono-invisible {
            display: block;
          }
        }

        @media only screen and (max-width: 601px) {
          .icono-visible {
            display: none;
          }
        }
      </style>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!--Contenido de navbar 
          "categorias, Marcas, Ofertas, Stock, etc..."-->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown"><!--categorias-->
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="series-peliculas.php">Series/Peliculas</a></li>
              <li><a class="dropdown-item" href="videojuegos.php">VideoJuegos</a></li>
              <li><a class="dropdown-item" href="anime.php">Anime</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown"><!--marcas-->
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Marcas
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="shf.php">Sh figuarts</a></li>
              <li><a class="dropdown-item" href="mafex.php">Mafex</a></li>
              <li><a class="dropdown-item" href="figma.php">Figma</a></li>
              <li><a class="dropdown-item" href="ml.php">Marvel legends</a></li>
              <li><a class="dropdown-item" href="revoltech.php">Revoltech</a></li>
            </ul>
          <li class="nav-item dropdown"><!--Franquicias-->
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Franquicias
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="marvel.php">Marvel</a></li>
              <li><a class="dropdown-item" href="dc.php">DC</a></li>
              <li><a class="dropdown-item" href="dbz.php">Dragon Ball</a></li>
              <li><a class="dropdown-item" href="naruto.php">Naruto</a></li>
              <li><a class="dropdown-item" href="persona.php">Persona</a></li>
            </ul>
          </li>
          <li class="nav-item"><!--Ofertas-->
            <a class="nav-link" href="ofertas.php">Ofertas</a>
          </li>
          <li class="nav-item"><!--Preventas-->
            <a class="nav-link" href="preventas.php">Preventas</a>
          </li>
          <li class="nav-item"><!--Stock-->
            <a class="nav-link" href="stock.php">Stock</a>
          </li>
        </ul>
        <div class="me-5"></div>

      </div>
      <div class="d-flex justify-content-end my-3 py-2">
        <a class="mr-3 link-offset-2 link-underline link-underline-opacity-0 icono-visible" href="registro.php"><i class="fa-solid fa-user" style="font-size: 30px;"></i></a><!-- Usuario -->
        <div class="me-1"></div> <!-- Espacio en blanco -->
        <!-- Carro de compras -->
        <a class="link-offset-2 link-underline link-underline-opacity-0 icono-visible " href="checkout.php" onclick="addProductToCart(<?php echo $id_producto; ?>, '<?php echo $token; ?>')">
          <i class="fa-solid fa-cart-shopping" style="font-size: 30px;"></i>
          <!-- Contador de elementos en el carrito -->
          <span id="num_cart" class="badge rounded-pill bg-danger">
            <?php echo $num_cart; ?>
          </span>
        </a>
      </div>


    </div>
  </nav>
  <!--Aqui Termina la Navbar!!!-->