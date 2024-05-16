<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

// ID de la franquicia, marca y categoría que deseas filtrar
$id_marca = 1;       // Filtrar por marca con ID 1


$sql = $con->prepare("SELECT 
    p.id_producto,
    p.nombre_producto,
    p.id_estado,
    pr.precio,
    pr.descuento,
    f.nombre_franquicia,
    m.nombre_marca,
    c.nombre_categoria,
    e.estado
FROM 
    productos p
INNER JOIN 
    estados e ON p.id_estado = e.id_estado
LEFT JOIN 
    precios pr ON p.id_producto = pr.id_producto
LEFT JOIN 
    franquicias f ON p.id_franquicia = f.id_franquicia
LEFT JOIN 
    marcas m ON p.id_marca = m.id_marca
LEFT JOIN 
    categorias c ON p.id_categoria = c.id_categoria
WHERE 

    p.id_marca = :id_marca

");

$sql->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);

$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!--cambio de titulo-->
<?php
$titulo = "Mafex | FiguShop";
?>
<!--Navbar.php-->
<?php require('./layout/navbar.php') ?>
<?php
//session_destroy();
?>

<!--Main de productos-->
<main>

        <!--cards de productos mas vendidos-->
        <div class="container mt-5 py-5">
          <h1 class="text-center">Mafex</h1>  
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
                  <a href="vista-producto.php?id=<?php echo $row['id_producto']; 
                    ?>&token=<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>"><!--Link para la platilla de vista producto--> 
                  
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
                        ($row['id_estado'] == 3 ? 'OUT OF STOCK' : '')); 
                        ?>
                        </span>
                                                
                    <img src="<?php echo $imagen; ?>" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                    <a class="link-offset-2 link-underline link-underline-opacity-0 link-dark" href="vista-producto.php?id=<?php echo $row['id_producto']; 
                    ?>&token=<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>">
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
                      <?php echo '$' . number_format($precio_final, 2,'.',','); ?>
                      <?php if ($descuento > 0) : ?>
                          <span class="text-primary precio-original" style="text-decoration: line-through; font-size: medium;">
                              $<?php echo number_format($precio_original, 2,'.',','); ?>
                          </span>
                      <?php endif; ?>
                  </h3> 
                  <!--Fin Precios-->

                  </div>
                  <div class="d-flex justify-content-center mb-2">
                  <style>
    /* Establece el ancho personalizado para los botones */
    .custom-btn {
        width: 150px; /* Cambia el valor según sea necesario */
    }
</style>

<?php if ($row['id_estado'] != 3): ?>
    <!-- El producto está disponible para agregar al carrito -->
    <button class="btn btn-primary mt-3" type="button" 
        onclick="addProductToCart(<?php echo $row['id_producto']; ?>, '<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>')">
        Agregar al carrito
    </button>
<?php else: ?>
    <!-- El producto está fuera de stock -->
    <a href="vista-producto.php?id=<?php echo $row['id_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>" class="btn btn-primary custom-btn mt-3">Detalles</a>
<?php endif; ?>


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


