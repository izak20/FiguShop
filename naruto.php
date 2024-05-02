<!--cambio de titulo-->
<?php
$titulo = "Naruto | FiguShop";
?>
<!--Navbar.php-->
<?php require('./layout/navbar.php') ?>

<!--Main de productos-->
<main>
        <!--cards de productos mas vendidos-->
        <div class="container mt-5 py-5">
          <h1 class="text-center">Naruto</h1>
  
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4 py-5">


            <!--Items/Producto Naruto-SH (oferta/Preventa)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class="discount">-20%</span> <span class="estado preventa">PRE-VENTA</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/shf-naruto-sabio/shfiguarts-naruto-uzumaki-sage-mode-savior-of-konoha-naruto-shippuden-action-figure.jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> S.H.Figuarts NARUTO UZUMAKI [Sage Mode] - The Savior of Konoha who inherits the will of his master</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-danger">$67,990 
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;">$84,990</span></h3><!--Precio original/final-->
                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="#"><!--Link para la platilla de vista producto--> 
                      <button class="btn btn-success">Reserva aquí</button><!--boton de compra-->
                    </a>  
                  </div>
              </div>
            </div>
            <!--Fin de Item/Producto-->

            <!--Items/Producto Itachi-SH (oferta/Preventa)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class="discount">-20%</span> <span class="estado preventa">PRE-VENTA</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/shf-itachi/shfiguarts-itachi-uchiha-narutop99-edition-naruto-shippuuden-action-figure.jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> ITACHI UCHIHA -NARUTOP99 Edition</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-danger">$63,990 
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;">$79,990</span></h3><!--Precio original/final-->
                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="#"><!--Link para la platilla de vista producto--> 
                      <button class="btn btn-success">Reserva aquí</button><!--boton de compra-->
                    </a>  
                  </div>
              </div>
            </div>
            <!--Fin de Item/Producto-->

  
          </div>
        </div>
        <!--final de cards-->

</main>
<!--Main de productos-->

<!--FOOTER.php y js Bootstrap-->
<?php require('./layout/footer.php') ?>
</body>
</html>