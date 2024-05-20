<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="IMG/logo-robot.png">
    <title>Formulario de Registro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .error {
            color: red;
        }

        /* Media query para dispositivos móviles */
        @media (max-width: 768px) {
            h2 {
                font-size: 24px;
                /* Tamaño de fuente más pequeño para dispositivos móviles */
                margin-top: 15px;
                /* Espacio superior reducido */
                margin-bottom: 15px;
                /* Espacio inferior reducido */
            }
        }

        /* Estilos para la imagen dentro del contenedor */
        .container img {
            max-width: 100%;
            /* Establece el ancho máximo de la imagen al 100% del contenedor */
            height: auto;
            /* La altura se ajustará automáticamente para mantener la proporción */
            display: block;
            /* Elimina cualquier espacio adicional alrededor de la imagen */
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center mt-5">
        <a href="inicio.php">
            <img src="IMG/logo.png" class="imagen-logo" alt="">
        </a>
        <style>
            @media (max-width: 768px) {
                .imagen-logo {
                    width: 275px;
                }
            }
        </style>
    </div>
    <div class="container my-5 py-5">
        <h2 class="mt-4">Crea Tu Cuenta</h2>
        <form id="registroForm" class="mt-4">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
                <span id="errorNombre" class="error"></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="ejemplo@mail.com" name="email">
                <span id="errorEmail" class="error"></span>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" placeholder="Minimo 6 caracteres" id="password" name="password">
                <span id="errorPassword" class="error"></span>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirmar Contraseña:</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                <span id="errorConfirmPassword" class="error"></span>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">+569</span>
                    </div>
                    <input type="text" class="form-control" id="telefono" name="telefono" pattern="[0-9]{8}" placeholder="EJ:12345678">
                </div>
                <span id="errorTelefono" class="error"></span>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
        </form>
    </div>

    <!-- jQuery, Bootstrap JS y Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#registroForm').on('submit', function(e) {
                e.preventDefault();

                var nombre = $('#nombre').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var confirmPassword = $('#confirmPassword').val();
                var telefono = $('#telefono').val();

                // Limpiar mensajes de error
                $('.error').text('');

                // Validar Nombre (no vacío)
                if (nombre == "") {
                    $('#errorNombre').text('Por favor ingrese su nombre.');
                    return false;
                }

                // Validar Email
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    $('#errorEmail').text('Por favor ingrese un email válido.');
                    return false;
                }

                // Validar Contraseña (al menos 6 caracteres)
                if (password.length < 6) {
                    $('#errorPassword').text('La contraseña debe tener al menos 6 caracteres.');
                    return false;
                }

                // Confirmar Contraseña
                if (password !== confirmPassword) {
                    $('#errorConfirmPassword').text('Las contraseñas no coinciden.');
                    return false;
                }

                // Validar Teléfono
                var telefonoRegex = /^\d{8}$/;
                if (!telefonoRegex.test(telefono)) {
                    $('#errorTelefono').text('Por favor ingrese un número de teléfono válido (debe tener 8 dígitos).');
                    return false;
                }

                // Si todas las validaciones son exitosas, mostrar la ventana emergente y limpiar las casillas
                mostrarVentanaEmergente();
                limpiarCasillas();
                return false; // Evitar el envío real del formulario
            });

            function mostrarVentanaEmergente() {
                // Crear el contenido de la ventana emergente
                var modalContent = `
                    <div class="modal fade" id="registroExitosoModal" tabindex="-1" role="dialog" aria-labelledby="registroExitosoModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="registroExitosoModalLabel">¡Registro completado exitosamente!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    El registro se ha completado exitosamente.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <a href="inicio.php" class="btn btn-primary">Ir al inicio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // Agregar el contenido a la página
                $('body').append(modalContent);

                // Mostrar la ventana emergente
                $('#registroExitosoModal').modal('show');

                // Eliminar la ventana emergente del DOM después de cerrarla
                $('#registroExitosoModal').on('hidden.bs.modal', function(e) {
                    $(this).remove();
                });
            }

            function limpiarCasillas() {
                $('#registroForm')[0].reset();
            }
        });
    </script>
</body>

</html>