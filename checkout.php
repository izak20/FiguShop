<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();
$total = 0;

if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {
        $sql = $con->prepare("SELECT 
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
            p.id_producto = :id_producto");

        $sql->execute(array(':id_producto' => $clave));
        $producto = $sql->fetch(PDO::FETCH_ASSOC);

        if ($producto) {
            // Agregar la cantidad al producto en la lista del carrito
            $producto['cantidad'] = $cantidad;

            // Calcula el subtotal aplicando el descuento si está disponible
            if ($producto['descuento'] > 0) {
                $subtotal = $producto['precio'] * (1 - ($producto['descuento'] / 100)) * $cantidad;
            } else {
                $subtotal = $producto['precio'] * $cantidad;
            }

            // Construir la URL de la imagen del producto
            $id_producto = $producto['id_producto'];
            $ruta_imagen = "img-producto-db/{$id_producto}/principal.jpg";
            if (!file_exists($ruta_imagen)) {
                $ruta_imagen = "img-producto-db/no-producto.jpg";
            }
            $producto['ruta_imagen'] = $ruta_imagen;



            $producto['subtotal'] = $subtotal;

            // Agregar el producto con su información al carrito
            $lista_carrito[] = $producto;

            $total += $subtotal;
        }
    }
}
?>

<?php require './layout/navbar.php'; ?>

<main>
    <div class="container mt-2">
        <h1 class="text-center">Carrito de compras</h1>

        <div class="table-responsive">
            <style>
                /* Media query para pantallas más pequeñas */
                @media only screen and (max-width: 600px) {

                    /* Ocultar la columna de Descuento en pantallas más pequeñas */
                    th.descuento-column,
                    td.descuento-column {
                        display: none;
                    }
                }
            </style>
            <style>
                a.mostrar-column {
                    display: none;
                    margin-top: 200%;
                }

                p.mostrar-column {
                    display: none;

                }

                /* Media query para pantallas más pequeñas */
                @media only screen and (max-width: 600px) {

                    /* Ocultar la columna de Descuento en pantallas más pequeñas */
                    th.mostrar-column,
                    a.mostrar-column,
                    p.mostrar-column {
                        display: block;
                    }
                }
            </style>
            <style>
                /* Ocultar elementos con la clase "mostrar-column" en pantallas grandes */
                @media only screen and (min-width: 601px) {
                    .mostrar-column {
                        display: none;
                    }
                }

                /* Mostrar elementos con la clase "mostrar-column" solo en pantallas pequeñas */
                @media only screen and (max-width: 600px) {
                    .mostrar-column {
                        display: block;
                    }
                }

                /* Alinear el texto del total a la derecha para ambas columnas */
                .total-column {
                    text-align: end;
                }
            </style>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th class="descuento-column">Precio</th>
                        <th class="descuento-column">Descuento</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th class="descuento-column"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($lista_carrito)) : ?>
                        <tr>
                            <td colspan="6" class="text-center"><b>Lista Vacía</b></td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($lista_carrito as $producto) : ?>
                            <tr>
                                <td>
                                    <a href="vista-producto.php?id=<?php echo $producto['id_producto']; ?>&token=<?php echo hash_hmac('sha1', $producto['id_producto'], KEY_TOKEN); ?>">
                                        <div style="display: flex; align-items: center;">
                                            <?php if (!empty($producto['ruta_imagen']) && file_exists($producto['ruta_imagen'])) : ?>
                                                <img src="<?php echo $producto['ruta_imagen']; ?>" alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>" style="width: 100px; height: auto; margin-right: 10px;">
                                            <?php else : ?>
                                                <img src="img-producto-db/no-producto.jpg" alt="Imagen No Disponible" style="width: 100px; height: auto; margin-right: 10px;">
                                            <?php endif; ?>

                                        </div>
                                    </a>
                                    <?php echo htmlspecialchars($producto['nombre_producto']); ?>
                                </td>
                                <td class="descuento-column"><?php echo '$' . number_format($producto['precio'], 2, '.', ','); ?>
                                </td>
                                <td class="descuento-column">
                                    <?php if ($producto['descuento'] > 0) {
                                        echo '%' . $producto['descuento'];
                                    } else {
                                        echo 'N/A';
                                    } ?>
                                </td>
                                <td>
                                    <input type="number" min="1" max="99" step="1" value="<?php echo $producto['cantidad']; ?>" size="5" id="cantidad_<?php echo $producto['id_producto']; ?>" onchange="actualizaCantidad(this.value, <?php echo $producto['id_producto']; ?>)">
                                </td>
                                <td>
                                    <div id="subtotal_<?php echo $producto['id_producto']; ?>" name="subtotal[]">
                                        <?php echo '$' . number_format($producto['subtotal'], 2, '.', ','); ?>
                                    </div>
                                    <a href="#" id="eliminar" class="btn btn-danger btn-sm mostrar-column " data-bs-id="<?php echo $producto['id_producto']; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal1" onclick="eliminarProducto(<?php echo $producto['id_producto']; ?>)">Eliminar</a>
                                </td>
                                <td class="descuento-column">
                                    <a href="#" id="eliminar" class="btn btn-danger btn-sm" data-bs-id="<?php echo $producto['id_producto']; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal" onclick="eliminarProducto(<?php echo $producto['id_producto']; ?>)">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <tr>
                        <!-- Columna para dispositivos pequeños -->
                        <td colspan="3" class="text-end total-column">
                            <p id="totalSmall" class="h3 total mostrar-column">Total: $<?php echo number_format($total, 2, '.', ','); ?></p>
                        </td>

                        <!-- Columna para dispositivos grandes -->
                        <td colspan="3" class="text-end descuento-column">
                            <p id="totalLarge" class="h3 total">Total: $<?php echo number_format($total, 2, '.', ','); ?></p>
                        </td>

                </tbody>
            </table>
        </div>

        <?php if (!empty($lista_carrito)) : ?>
            <div class="row mb-5 ">
                <div class="col-md-5 offset-md-7 d-grip gap-2 d-flex justify-content-end">
                    <a href="pago.php" class="btn btn-primary btn-lg ">Realizar pago</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<script>
    let eliminaModal = document.getElementById('eliminaModal')
    eliminaModal.addEventListener('show.bs.modal', function(event) {
        let button = event.relatedTarget
        let id = botton.getAttribute('data-bs-id')
        let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
        buttonElimina.value = id
    })

    function eliminarProducto(idProducto) {
        if (!confirm('¿Estás seguro de que deseas eliminar este producto del carrito?')) {
            return;
        }

        // Crear instancia de FormData para enviar datos al servidor
        let formData = new FormData();
        formData.append('id', idProducto);
        formData.append('action', 'eliminar');

        // Realizar una solicitud POST utilizando fetch
        fetch('clases/actualizar_carrito.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                console.log('Respuesta del servidor:', data);
                if (data.ok) {
                    location.reload(); // Recargar la página después de eliminar el producto
                } else {
                    console.error('Error al eliminar producto del carrito:', data.error);
                    alert('Error al eliminar producto del carrito. Por favor, inténtalo de nuevo.');
                }
            })
            .catch(error => {
                console.error('Error de red al eliminar producto del carrito:', error);
                alert('Error de red al eliminar producto del carrito. Por favor, verifica tu conexión.');
            });
    }

    function actualizaCantidad(cantidad, id) {
        let formData = new FormData();
        formData.append('id', id);
        formData.append('cantidad', cantidad);
        formData.append('action', 'agregar');

        fetch('clases/actualizar_carrito.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                console.log('Respuesta del servidor:', data);
                if (data.ok) {
                    // Actualiza el subtotal en la interfaz
                    let divsubtotal = document.getElementById('subtotal_' + id);
                    if (divsubtotal) {
                        divsubtotal.innerHTML = data.sub;
                    }

                    // Recalcula y actualiza el total
                    let total = 0.00;
                    let subtotalElements = document.getElementsByName('subtotal[]');

                    subtotalElements.forEach(subtotalElement => {
                        let subtotalValue = parseFloat(subtotalElement.innerHTML.replace(/[$,]/g, ''));
                        total += subtotalValue;
                    });

                    console.log('Nuevo total calculado:', total);

                    // Actualiza el elemento HTML del total
                    let totalElement = document.getElementById('total');
                    if (totalElement) {
                        totalElement.textContent = 'Total: $' + total.toFixed(2);
                    }

                    // Actualiza el elemento HTML del total para pantallas pequeñas y grandes
                    let totalElementSmall = document.getElementById('totalSmall');
                    let totalElementLarge = document.getElementById('totalLarge');

                    if (totalElementSmall && totalElementLarge) {
                        totalElementSmall.textContent = 'Total: $' + total.toFixed(2);
                        totalElementLarge.textContent = 'Total: $' + total.toFixed(2);
                    }

                    // Actualiza el contador de elementos en el carrito
                    let numCartElement = document.getElementById('num_cart');
                    if (numCartElement) {
                        numCartElement.textContent = data.numero;
                    }
                } else {
                    console.error('Error al agregar producto al carrito:', data.error);
                }
            })
            .catch(error => {
                console.error('Error de red:', error);
            });
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>