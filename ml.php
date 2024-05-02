<!--cambio de titulo-->
<?php
$titulo = "Marvel Legends | FiguShop";
?>
<!--Navbar.php-->
<?php require('./layout/navbar.php') ?>

<!--Main de productos-->
<main>
        <!--cards de productos mas vendidos-->
        <div class="container mt-5 py-5">
          <h1 class="text-center">Marvel Legends</h1>
  
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4 py-5">

            <!--Items/Producto 2p-dd-hm (Preventa)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class=""></span> <span class="estado preventa">PRE-VENTA</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/ml-2p-dd-hm/dd-hm1.png" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> Marvel Legends: Daredevil & Hydro-Man VHS 2-Pack</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-primary">$72,990 
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;"></span></h3><!--Precio original/final-->
                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="#"><!--Link para la platilla de vista producto--> 
                      <button class="btn btn-success">Reserva aquí</button><!--boton de compra-->
                    </a>  
                  </div>
              </div>
            </div>
            <!--Fin de Item/Producto-->

            <!--Items/Producto ml-deadpool (Preventa)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class=""></span> <span class="estado preventa">PRE-VENTA</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/ml-deadpool/deadpool-1.png" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> Marvel Legends Deadpool: Deadpool Legacy Collection</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-primary">$30,490
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;"></span></h3><!--Precio original/final-->
                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="#"><!--Link para la platilla de vista producto--> 
                      <button class="btn btn-success">Reserva aquí</button><!--boton de compra-->
                    </a>  
                  </div>
              </div>
            </div>
            <!--Fin de Item/Producto-->

            <!--Items/Producto ml-Spider-Punk (stock)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class=""></span> <span class="estado stock">STOCK</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/ml-spider-punk/spider-punk1.png" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> Marvel Legends Series Spider-Punk</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-primary">$30.990 
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;"></span></h3><!--Precio original/final-->
                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="#"><!--Link para la platilla de vista producto--> 
                      <button class="btn btn-success">Compra aquí</button><!--boton de compra-->
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