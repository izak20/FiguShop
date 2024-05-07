<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plantilla de Producto con Bootstrap y Owl Carousel</title>
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
</head>
<body>

    <!--Aqui Inicia La Navbar!!!-->
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary p-3">
    <!--logo:FiguShop-->
      <div class="container-fluid">
        <a class="navbar-brand" href="inicio.html"><img src="IMG/logo.png" width="250px" alt="Logo"></a>
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
                <li><a class="dropdown-item" href="series-peliculas.html">Series/Peliculas</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="videojuegos.html">VideoJuegos</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="anime.html">Anime</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><!--marcas-->
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Marcas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="shf.html">Sh figuarts</a></li>
                <li><a class="dropdown-item" href="mafex.html">Mafex</a></li>
                <li><a class="dropdown-item" href="figma.html">Figma</a></li>
                <li><a class="dropdown-item" href="ml.html">Marvel legends</a></li>
                <li><a class="dropdown-item" href="revoltech.html">Revoltech</a></li>
              </ul>
            </li>
            <li class="nav-item"><!--Ofertas-->
              <a class="nav-link" href="ofertas.html">Ofertas</a>
            </li>
            <li class="nav-item"><!--Preventas-->
              <a class="nav-link" href="preventas.html">Preventas</a>
            </li>
            <li class="nav-item"><!--Stock-->
              <a class="nav-link" href="stock.html">Stock</a>
            </li>
          </ul>
          <!--Barra de busqueda!!!-->
          <form class="d-flex justify-content-center " role="search">
            <input class="form-control me-2 rounded-pill flex-grow-5" type="search" placeholder="Busqueda de catalogo" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
          </form>
          <div class="me-5"></div>
          <div class="d-flex justify-content-end my-3 py-2">
            <a class="mr-3 link-offset-2 link-underline link-underline-opacity-0" href="registro.html"><i class="fa-solid fa-user" style="font-size: 30px;"></i> inicio de sesión</a><!-- Usuario -->
            <div class="me-4"></div> <!-- Espacio en blanco -->
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="#"><i class="fa-solid fa-cart-shopping " style="font-size: 30px;"></i>Proximamente Carro</a><!-- Carro de compras -->
          </div>
          <div class="me-2"></div>                
        </div>
      </div>
    </nav>
  <!--Aqui Termina la Navbar!!!-->

  <main class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="owl-carousel owl-theme owl-thumb border rounded-3 ">
            <div class="item"><img src="img-producto/figma-link/figma-626-link-tears-of-the-kingdom.jpg" alt="Imagen 1"></div>
            <div class="item"><img src="img-producto/figma-link/figma-626-link-tears-of-the-kingdom (1).jpg" alt="Imagen 2"></div>
            <div class="item"><img src="img-producto/figma-link/figma-626-link-tears-of-the-kingdom (3).jpg" alt="Imagen 3"></div>
            <!-- Agrega más imágenes según sea necesario -->
          </div>
          <div class="owl-thumb text-center mt-3">
            <div class="owl-thumb-item"><img src="img-producto/figma-link/figma-626-link-tears-of-the-kingdom.jpg" alt="Thumbnail 1"></div>
            <div class="owl-thumb-item"><img src="img-producto/figma-link/figma-626-link-tears-of-the-kingdom (1).jpg" alt="Thumbnail 2"></div>
            <div class="owl-thumb-item"><img src="img-producto/figma-link/figma-626-link-tears-of-the-kingdom (3).jpg" alt="Thumbnail 3"></div>
            <!-- Agrega más miniaturas según sea necesario -->
          </div>
        </div>
        <div class="col-lg-6">
          <h1>Figma 626: The Legend of Zelda: Tears of the Kingdom - Link (Tears of the Kingdom Ver.) [Max Factory]</h1> <hr>
          <p>Descripción breve del producto.</p>
          <p>Precio: <h2 class="text-danger">$56,990 
            <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;">$69,990</span></h2></p>
          <button class="btn btn-primary">Comprar</button>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col">
          <h2>Detalles del Producto</h2>
          <p>Aquí puedes incluir más detalles sobre el producto, como características, especificaciones técnicas, etc.</p>
        </div>
      </div>
    </div>
  </main>

<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted mt-5">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Conéctate con nosotros en nuestras redes sociales:</span>
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <a href="inicio.html"><img src="IMG/logo.png" alt="logo" width="150px"></a>
            </h6>
            <p>
              Encuentra tus figuras de colección favoritas en nuestra
               tienda en línea, donde ofrecemos una amplia selección 
               que incluye desde personajes del anime hasta legendarios 
               íconos del cine y la cultura pop.
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Productos
            </h6>
            <p>
              <a href="stock.html" class="text-reset">Stock</a>
            </p>
            <p>
              <a href="preventas.html" class="text-reset">Perventas</a>
            </p>
            <p>
              <a href="ofertas.html" class="text-reset">Ofertas</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Informacion (proximamente)
            </h6>
            <p>
              <a href="#!" class="text-reset">Pagos</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Envios</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Preventas</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Preguntas frecuentes</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
            <p><i class="fas fa-home me-3"></i> Santiago, Renca, CL</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              marc.tapiap@duocuc.cl
            </p>
            <p><i class="fas fa-phone me-3"></i> +569 5555 4444</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2024 Copyright:
      <a class="text-reset fw-bold" href="">Marcos Tapia</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

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

      <!--Bootstrap JavaScript!!!-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
      crossorigin="anonymous"></script> 
</body>
</html>
