<!--cambio de titulo-->
<?php
$titulo = "Dragon Ball | FiguShop";
?>
<!--Navbar.php-->
<?php require('./layout/navbar.php') ?>

<!--Main de productos-->
<main>
        <!--cards de productos mas vendidos-->
        <div class="container mt-5 py-5">
          <h1 class="text-center">Dragon Ball</h1>
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4 py-5">
            <!--Items/Producto Goku-SH (oferta/Preventa)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class="discount">-20%</span> <span class="estado preventa">PRE-VENTA</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/shf-goku/shfiguarts-ssj-son-goku-the-legendary-super-saiyan-dragon-ball-z-action-figure-reissue.jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> S.H.Figuarts -SUPER SAIYAN SON GOKU -LEGENDARY SUPER SAIYAN</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-danger">$51,990 
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;">$64,990</span></h3><!--Precio original/final-->
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