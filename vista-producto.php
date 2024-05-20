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
    m.nombre_marca,
    c.nombre_categoria,
    f.nombre_franquicia,
    pr.precio,
    pr.descuento
FROM 
    productos p
INNER JOIN 
    estados e ON p.id_estado = e.id_estado
LEFT JOIN 
    precios pr ON p.id_producto = pr.id_producto
LEFT JOIN 
    marcas m ON p.id_marca = m.id_marca
LEFT JOIN 
    categorias c ON p.id_categoria = c.id_categoria
LEFT JOIN 
    franquicias f ON p.id_franquicia = f.id_franquicia
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
  $discount = $row['descuento'];
  $marca = $row['nombre_marca'];
  $categoria = $row['nombre_categoria'];
  $franquicia = $row['nombre_franquicia'];

  $rutaImg = $dir_images . 'principal.jpg';

  $titulo = $nombre . " | FiguShop";

  if (!file_exists($rutaImg)) {
    $rutaImg = 'img-producto-db/no-producto.jpg';
  }

  $imagenes = array();
  if (file_exists($dir_images)) {
    $dir = dir($dir_images);

    while (($archivo = $dir->read()) != false) {
      if ($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))) {
        $imagenes[] =  $dir_images . $archivo;
      }
    }
    $dir->close();
  }
} else {
  echo 'No se encontró el producto con el ID especificado.';
  exit;
}
$sql_ofertas = $con->prepare("SELECT 
    p.id_producto,
    p.nombre_producto,
    p.id_estado,
    pr.precio,
    pr.descuento
FROM 
    productos p
INNER JOIN 
    estados e ON p.id_estado = e.id_estado
LEFT JOIN 
    precios pr ON p.id_producto = pr.id_producto
WHERE 
    p.id_estado != 3");

$sql_ofertas->execute();
$ofertas = $sql_ofertas->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require('layout/navbar.php') ?>

<style>
  .owl-thumb-item img {
    width: 40px;
    /* Reduciendo el tamaño de las imágenes del carrusel */
    height: auto;
    border: 1px solid #ddd;
    margin: 5px;
    cursor: pointer;
    opacity: 0.5;
    /* Opacidad para miniaturas inactivas */
  }

  .owl-thumb-item img:hover {
    border-color: #007bff;
  }

  .owl-thumb-item.active img {
    border-color: #007bff;
    opacity: 1;
    /* Opacidad para miniatura activa */
  }

  .owl-thumb-item {
    display: inline-block;
    /* Mostrar miniaturas en todos los tamaños de pantalla */
    vertical-align: top;
  }
</style>
<main class="mt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <!--Carrusel-->
        <div class="owl-carousel owl-theme owl-thumb border rounded-3 ">
          <div class="thumb-item"><img src="<?php echo $rutaImg ?>" class="img-fluid" alt="..."></div>

          <?php foreach ($imagenes as $img) : ?>
            <div class="thumb-item">
              <img src="<?php echo $img; ?>" class="img-fluid" alt="...">
            </div>
          <?php endforeach; ?>

        </div>
        <div class="owl-thumb text-center mt-3">
          <div class="owl-thumb-item"><img src="<?php echo $rutaImg ?>" class="img-fluid" alt="..."></div>
          <?php foreach ($imagenes as $img) : ?>
            <div class="owl-thumb-item">
              <img src="<?php echo $img; ?>" class="img-fluid" alt="...">
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="col-lg-6">
        <h1><?php echo $nombre ?></h1>
        <hr>

        <!-- Precio -->
        <span class="position-absolute fw-semibold"><?php echo $marca ?></span>
        <div class="precio d-flex justify-content-end">
          <?php if ($discount > 0) : ?>
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="ofertas.php">
              <span class="discount" style="background-color: crimson; color: #fff; padding: 2px 1.2rem; border-radius: 16px;"><?php echo $discount ?>%</span>
            </a>
            <div class="me-2"></div>
          <?php endif; ?>

          <?php
          $estado_link = '';
          $estado_clase = '';
          $estado_texto = '';
          $estado_color = ''; // Variable para almacenar el color del estado

          switch ($row['id_estado']) {
            case 1:
              $estado_link = 'preventas.php';
              $estado_clase = 'preventa';
              $estado_texto = 'PRE-VENTA';
              $estado_color = 'cornflowerblue'; // Color para estado "PRE-VENTA"
              break;
            case 2:
              $estado_link = 'stock.php';
              $estado_clase = 'stock';
              $estado_texto = 'STOCK';
              $estado_color = 'green'; // Color para estado "STOCK"
              break;
            case 3:
              $estado_link = '#';
              $estado_clase = 'out-of-stock';
              $estado_texto = 'OUT OF STOCK';
              $estado_color = 'crimson'; // Color para estado "OUT OF STOCK"
              break;
            default:
              $estado_clase = '';
              $estado_texto = '';
              $estado_color = '';
              break;
          }
          ?>
          <a class="link-offset-2 link-underline link-underline-opacity-0" href="<?php echo $estado_link ?>">
            <span class="estado <?php echo $estado_clase; ?>" style="background-color: <?php echo $estado_color; ?>; color: #fff; padding: 2px 1.2rem; border-radius: 16px;">
              <?php echo $estado_texto; ?>
            </span>
          </a>
        </div>


        <p class="mt-3">Precio:
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

        <button class="btn btn-primary mt-3" type="button" onclick="addProductToCart(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')" <?php echo ($row['id_estado'] == 3) ? 'disabled' : ''; ?>>
          Agregar al carrito
        </button>




        <p class="mt-5 lead"><?php echo $descripcion ?></p>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
        <h2>Detalles del Producto</h2>
        <hr>
        <p><span class="fw-semibold">Fecha de Lanzamiento: </span><?php echo $fecha ?></p>
        <p><span class="fw-semibold">Marca: </span> <?php echo $marca ?></p>
        <p><span class="fw-semibold">Categoria: </span> <?php echo $categoria ?></p>
        <p><span class="fw-semibold">Franquicia: </span><?php echo $franquicia ?></p>
      </div>
    </div>
  </div>

  <!-- Carrusel de ofertas -->
  <div class="container">
    <hr>
    <h1 class="display-3 text-center my-5 titulo-mas-vendidos">Más Productos</h1>
    <div class="row">
      <div class="owl-carousel owl-theme owl-carousel-ofertas carousel-container">
        <?php foreach ($ofertas as $oferta) : ?>
          <!-- Item/Producto -->
          <div class="card h-100">
            <?php
            $id_oferta = $oferta['id_producto'];
            $imagen_oferta = "img-producto-db/" . $id_oferta . "/principal.jpg";
            $imagen_default = "img-producto-db/no-producto.jpg";
            $imagen_mostrar = file_exists($imagen_oferta) ? $imagen_oferta : $imagen_default;
            $descuento_oferta = $oferta['descuento'];
            $precio_original_oferta = $oferta['precio'];
            $precio_final_oferta = $precio_original_oferta - (($descuento_oferta * $precio_original_oferta) / 100);
            $estado_texto = '';
            $estado_clase = '';
            switch ($oferta['id_estado']) {
              case 1:
                $estado_texto = 'PRE-VENTA';
                $estado_clase = 'preventa';
                break;
              case 2:
                $estado_texto = 'STOCK';
                $estado_clase = 'stock';
                break;
              case 3:
                $estado_texto = 'OUT OF STOCK';
                $estado_clase = 'out-of-stock';
                break;
            }
            ?>

            <div class="imagen-content">
              <a href="vista-producto.php?id=<?php echo htmlspecialchars($oferta['id_producto']); ?>&token=<?php echo htmlspecialchars(hash_hmac('sha1', $oferta['id_producto'], KEY_TOKEN)); ?>">
                <?php if ($descuento_oferta > 0) : ?>
                  <span class="discount"><?php echo htmlspecialchars($descuento_oferta); ?>%</span>
                <?php endif; ?>
                <span class="estado <?php echo $estado_clase; ?>"><?php echo $estado_texto; ?></span>
                <img src="<?php echo htmlspecialchars($imagen_mostrar); ?>" class="card-img-top" alt="...">
              </a>
            </div>

            <div class="card-body">
              <a class="link-offset-2 link-underline link-underline-opacity-0 link-dark" href="vista-producto.php?id=<?php echo htmlspecialchars($oferta['id_producto']); ?>&token=<?php echo htmlspecialchars(hash_hmac('sha1', $oferta['id_producto'], KEY_TOKEN)); ?>">
                <h5 class="card-title"><?php echo htmlspecialchars($oferta['nombre_producto']); ?></h5>
              </a>
            </div>

            <div class="d-flex justify-content-around mb-2 precio">
              <h3 class="text-<?php echo $descuento_oferta > 0 ? 'danger' : 'primary'; ?>">
                <?php echo '$' . number_format($precio_final_oferta, 2); ?>
                <?php if ($descuento_oferta > 0) : ?>
                  <span class="text-primary precio-original" style="text-decoration: line-through; font-size: medium;">
                    $<?php echo number_format($precio_original_oferta, 2); ?>
                  </span>
                <?php endif; ?>
              </h3>
            </div>

            <div class="d-flex justify-content-center mb-2">
              <button class="btn btn-primary mt-3" type="button" onclick="addProductToCart(<?php echo $oferta['id_producto']; ?>, '<?php echo hash_hmac('sha1', $oferta['id_producto'], 'APR.wqc-354*'); ?>')">
                Agregar al carrito
              </button>
            </div>
          </div>
        <?php endforeach; ?>
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



<!-- Inicialización del carrusel -->
<script>
  $(document).ready(function() {
    // Carrusel de productos destacados con miniaturas
    var sync1 = $(".owl-carousel.owl-thumb");
    var sync2 = $(".owl-thumb");

    sync1.owlCarousel({
      items: 1,
      nav: false,
      dots: false,
      responsiveRefreshRate: 200,
      onInitialized: function(event) {
        sync2.find(".owl-thumb-item").eq(event.item.index).addClass("active");
      }
    }).on("changed.owl.carousel", function(event) {
      var index = event.item.index;
      sync2.find(".owl-thumb-item").removeClass("active").eq(index).addClass("active");
    });

    sync2.on("click", ".owl-thumb-item", function() {
      var index = $(this).index();
      sync1.trigger("to.owl.carousel", [index, 300, true]);
      sync2.find(".owl-thumb-item").removeClass("active").eq(index).addClass("active");
    });

    // Carrusel de ofertas
    $('.owl-carousel-ofertas').owlCarousel({
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
    });
  });
</script>

</body>

</html>