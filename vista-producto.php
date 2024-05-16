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
}
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
          <div class="item"><img src="<?php echo $rutaImg ?>" class="img-fluid" alt="..."></div>

          <?php foreach ($imagenes as $img) : ?>
            <div class="item">
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
            <span class="discount" style="background-color: crimson; color: #fff; padding: 2px 1.2rem; border-radius: 16px;"><?php echo $discount ?>%</span>
            <div class="me-2"></div>
          <?php endif; ?>

          <?php
          $estado_clase = '';
          $estado_texto = '';
          $estado_color = ''; // Variable para almacenar el color del estado

          switch ($row['id_estado']) {
            case 1:
              $estado_clase = 'preventa';
              $estado_texto = 'PRE-VENTA';
              $estado_color = 'cornflowerblue'; // Color para estado "PRE-VENTA"
              break;
            case 2:
              $estado_clase = 'stock';
              $estado_texto = 'STOCK';
              $estado_color = 'green'; // Color para estado "STOCK"
              break;
            case 3:
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

          <span class="estado <?php echo $estado_clase; ?>" style="background-color: <?php echo $estado_color; ?>; color: #fff; padding: 2px 1.2rem; border-radius: 16px;">
            <?php echo $estado_texto; ?>
          </span>
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
      onInitialized: function(event) {
        sync2.find(".owl-thumb-item").eq(event.item.index).addClass("active");
      }
    }).on("changed.owl.carousel", function(event) {
      var index = event.item.index;
      sync2.find(".owl-thumb-item").removeClass("active").eq(index).addClass("active");
    });



    sync2.on("click", ".owl-thumb-item", function() {
      var index = $(this).index();
      sync1.trigger("to.owl.carousel", index);
    });
  });
</script>
</body>

</html>