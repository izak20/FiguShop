
    <style>
        /* Estilo para pantallas grandes */
        @media (min-width: 992px) {
            .img-container img {
                max-width: 100%;
                max-height: 400px;
                object-fit: cover;
            }
        }

        /* Estilo para pantallas pequeñas */
        @media (max-width: 991px) {
            .img-container img {
                max-width: 100%;
                max-height: 300px;
                object-fit: cover;
            }
        }
    </style>

    <?php require('./layout/navbar.php') ?>
    <div class="container">
        <div class="row">
            <!-- Imagen de 6 columnas con enlace -->
            <div class="col-md-6">
                <a href="enlace_principal.html">
                    <div class="img-container">
                        <img src="IMG/mafex.jpg" alt="Imagen Principal" class="img-fluid">
                    </div>
                </a>
            </div>
            <!-- Cuatro imágenes de 3 columnas cada una con enlaces -->
            <div class="col-md-3">
                <div class="row">
                    <div class="col">
                        <a href="enlace1.html">
                            <div class="img-container">
                                <img src="IMG/sh.jpg" alt="Imagen 1" class="img-fluid">
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="enlace2.html">
                            <div class="img-container">
                                <img src="IMG/ml.jpg" alt="Imagen 2" class="img-fluid">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="enlace3.html">
                            <div class="img-container">
                                <img src="IMG/figma.jpg" alt="Imagen 3" class="img-fluid">
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="enlace4.html">
                            <div class="img-container">
                                <img src="IMG/kaiyodo.jpg" alt="Imagen 4" class="img-fluid">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
