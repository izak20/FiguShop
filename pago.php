<?php
$titulo = "Pago | FiguShop";
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
} else {
    header("Location: inicio.php");
    exit;
}
?>

<?php require './layout/navbar.php'; ?>

<main>
    <div class="container mt-2">
        <h1 class="text-center">Pagina de Pago</h1>

        <div class="row">
            <!-- Tabla de productos -->
            <div class="col-12 col-lg-6">
                <div class="table-responsive">
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($lista_carrito)) : ?>
                                <tr>
                                    <td colspan="2" class="text-center"><b>Lista Vacía</b></td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($lista_carrito as $producto) : ?>
                                    <tr>
                                        <td>
                                            <a href="vista-producto.php?id=<?php echo $producto['id_producto']; ?>&token=<?php echo hash_hmac('sha1', $producto['id_producto'], KEY_TOKEN); ?>">
                                                <div style="display: flex; align-items: center;">
                                                    <img src="<?php echo $producto['ruta_imagen']; ?>" alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>" style="width: 100px; height: auto; margin-right: 10px;">
                                                </div>
                                            </a>
                                            <p><?php echo htmlspecialchars($producto['nombre_producto']); ?> <b>X <?php echo $producto['cantidad']; ?></b></p>
                                        </td>
                                        <td>
                                            <div id="subtotal_<?php echo $producto['id_producto']; ?>">
                                                <?php echo '$' . number_format($producto['subtotal'], 2, '.', ','); ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <tr>
                                <td colspan="2" class="text-end">
                                    <p class="h3 total">Total: $<?php echo number_format($total, 2, '.', ','); ?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Botón de PayPal -->
            <div class="col-12 col-lg-6 mt-5">
                <div id="paypal-button-container"></div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Pago Realizado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¡El pago se ha realizado con éxito!<br><br>
                    Ahora seras redirigido al inicio
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</main>

<script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>"></script>

<script>
    paypal.Buttons({
        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay'
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: "<?php echo number_format($total, 2, '.', ''); ?>"
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(detalles) {
                console.log(detalles);

                // Enviar detalles de la transacción al servidor
                let url = 'clases/captura.php';
                return fetch(url, {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        detalles: detalles
                    })
                }).then(function(response) {
                    if (response.ok) {
                        console.log("Transacción guardada, mostrando el modal...");
                        // Muestra el modal de Bootstrap
                        var paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'), {
                            keyboard: false
                        });
                        paymentModal.show();

                        // Agregar el evento para redirigir al cerrar el modal
                        var myModalEl = document.getElementById('paymentModal');
                        myModalEl.addEventListener('hidden.bs.modal', function() {
                            window.location.href = 'inicio.php';
                        });
                    } else {
                        console.error("Error al guardar la transacción");
                    }
                }).catch(function(error) {
                    console.error('Error:', error);
                });
            });
        },
        onCancel: function(data) {
            alert("Pago Cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>