<?php
require 'config/config.php';
require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
  echo 'Error: Faltan parámetros en la petición';
  exit;
}

// Calcular el token temporal usando HMAC-SHA1 con la clave definida
$token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

if ($token != $token_tmp) {
  echo 'Error: Token inválido, acceso denegado';
  exit;
}

// Verificar la existencia del producto
$sql = $con->prepare("SELECT 
    p.id_producto,
    p.nombre_producto,
    p.id_estado,
    p.descripcion_producto,
    p.fecha_producto,
    pr.precio,
    pr.descuento
FROM 
    productos p
INNER JOIN 
    estados e ON p.id_estado = e.id_estado
LEFT JOIN 
    precios pr ON p.id_producto = pr.id_producto
WHERE 
    p.id_producto = ?
LIMIT 1");

$sql->execute([$id]);
$row = $sql->fetch(PDO::FETCH_ASSOC);

if ($row) {
  // Asignar valores a variables individuales
  $nombre = $row['nombre_producto'];
  $estado = $row['id_estado'];
  $descripcion = $row['descripcion_producto'];
  $fecha = $row['fecha_producto'];
  $dir_images = 'img-producto-db/' . $id . '/';

  $rutaImg = $dir_images . 'principal.jpg';

  if(!file_exists($rutaImg)){
    $rutaImg = 'img-producto-db/no-producto.jpg';
  }

  $imagenes = array();
  $dir = dir($dir_images);

  while(($archivo = $dir->read()) !=false){
    if($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))){
      $imagenes[] =  $dir_images . $archivo;

    }
  }
  $dir->close();

} else {
  echo 'No se encontró el producto con el ID especificado.';
}
?>


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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
  crossorigin="anonymous">
  
  <!--LINK OwlCarousel-->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
  integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer" />

  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
  integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer" />

  <title><?php echo isset($titulo) ? $titulo : 'Título Predeterminado'; ?></title>
</head>
<body>
<!--Aqui Inicia La Navbar!!!-->
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary p-3">
  <!--logo:FiguShop-->
    <div class="container-fluid">
      <a class="navbar-brand" href="inicio.php"><img src="IMG/logo.png" width="250px" alt="Logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
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
        <!--Barra de busqueda!!!-->
        <form class="d-flex justify-content-center " role="search">
          <input class="form-control me-2 rounded-pill flex-grow-5" type="search" placeholder="Busqueda de catalogo" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>
        <div class="me-5"></div>
        <div class="d-flex justify-content-end my-3 py-2">
          <a class="mr-3 link-offset-2 link-underline link-underline-opacity-0" href="registro.php"><i class="fa-solid fa-user" style="font-size: 30px;"></i> inicio de sesión</a><!-- Usuario -->
          <div class="me-4"></div> <!-- Espacio en blanco -->
          <a class="link-offset-2 link-underline link-underline-opacity-0" href="#"><i class="fa-solid fa-cart-shopping " style="font-size: 30px;"></i>Proximamente Carro</a><!-- Carro de compras -->
        </div>
        <div class="me-2"></div>                
      </div>
    </div>
  </nav>
<!--Aqui Termina la Navbar!!!-->

  <style>
    .owl-thumb-item img {
      width: 40px; /* Reduciendo el tamaño de las imágenes del carrusel */
      height: auto;
      border: 1px solid #ddd;
      margin: 5px;
      cursor: pointer;
      opacity: 0.5; /* Opacidad para miniaturas inactivas */
    }
    .owl-thumb-item img:hover {
      border-color: #007bff;
    }
    .owl-thumb-item.active img {
      border-color: #007bff;
      opacity: 1; /* Opacidad para miniatura activa */
    }
    .owl-thumb-item {
      display: inline-block; /* Mostrar miniaturas en todos los tamaños de pantalla */
      vertical-align: top;
    }
  </style>
  <main class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <!--Carrusel-->
          <div class="owl-carousel owl-theme owl-thumb border rounded-3 ">
            <div class="item"><img src="<?php echo $rutaImg?>" class="img-fluid" alt="..."></div>

            <?php foreach ($imagenes as $img): ?>
              <div class="item">
                <img src="<?php echo $img; ?>" class="img-fluid"alt="...">
              </div>
            <?php endforeach; ?>  

          </div>
          <div class="owl-thumb text-center mt-3">
            <div class="owl-thumb-item"><img src="<?php echo $rutaImg?>" class="img-fluid" alt="..."></div>
            <?php foreach ($imagenes as $img): ?>
              <div class="owl-thumb-item">
                <img src="<?php echo $img; ?>" class="img-fluid" alt="...">
              </div>
            <?php endforeach; ?> 
          </div>
        </div>

        <div class="col-lg-6">
          <h1><?php echo $nombre?></h1> <hr>       

          <!--Precio-->
          <p>Precio:                 
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

                  <h1 class="text-<?php echo $clase_texto; ?>">
                      <?php echo '$' . number_format($precio_final, 2); ?>
                      <?php if ($descuento > 0) : ?>
                          <span class="text-primary precio-original" style="text-decoration: line-through; font-size: medium;">
                              $<?php echo number_format($precio_original, 2); ?>
                          </span>
                      <?php endif; ?>
                  </h1> 
            </p> 
          <!--Fin Precio-->
            
          <button class="btn btn-primary mt-3">Comprar</button>
          <p class="mt-5 lead"><?php echo $descripcion?></p>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col">
          <h2>Detalles del Producto</h2>
          <hr>
          <p class="fw-semibold">Fecha de Lanzamiento: <?php echo $fecha?></p>
        </div>
      </div>
    </div>
  </main>

<!--FOOTER.php y js Bootstrap-->
<?php require('./layout/footer.php') ?>

  <!-- Enlaces a jQuery, Owl Carousel JS y Bootstrap JS (opcional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Inicialización del carrusel -->
  <script>
    $(document).ready(function(){
      var sync1 = $(".owl-carousel");
      var sync2 = $(".owl-thumb");

      sync1.owlCarousel({
        items: 1,
        nav: false,
        dots: false,
        navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
        responsiveRefreshRate: 200,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        },
        onInitialized: function (event) {
          sync2.find(".owl-thumb-item").eq(event.item.index).addClass("active");
        }
      }).on("changed.owl.carousel", function (event) {
        var index = event.item.index;
        sync2.find(".owl-thumb-item").removeClass("active").eq(index).addClass("active");
      });

      

      sync2.on("click", ".owl-thumb-item", function () {
        var index = $(this).index();
        sync1.trigger("to.owl.carousel", index);
      });
    });
  </script> 
</body>
</html>
