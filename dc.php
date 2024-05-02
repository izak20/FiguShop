<!--cambio de titulo-->
<?php
$titulo = "DC | FiguShop";
?>
<!--Navbar.php-->
<?php require('./layout/navbar.php') ?>

<!--Main de productos-->
<main>
        <!--cards de productos mas vendidos-->
        <div class="container mt-5 py-5">
          <h1 class="text-center">DC Comics</h1>
  
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4 py-5">
            <!--Items/Producto superman-mafex-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class=""></span> <span class="estado out-of-stock">OUT OF STOCK</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/mafex-superman/mafex-no117-superman-hush-ver-action-figure-reissue.jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> MAFEX (No.117) - Batman: Hush - Superman (Hush Ver.) Reissue [Medicom Toy]</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-primary">$104,990 
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;"></span></h3><!--Precio original/final-->
                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="#"><!--Link para la platilla de vista producto--> 
                      <button class="btn btn-success">Próximamente</button><!--boton de compra-->
                    </a>  
                  </div>
              </div>
            </div>
            <!--Fin de Item/Producto-->

            <!--Items/Producto batman (Preventa)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class=""></span> <span class="estado preventa">PRE-VENTA</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/yamaguchi-batman/revoltech-amazing-yamaguchi-batman-batman-arkham-knight-ver-action-figure-limited-bonus-set.jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> Amazing Yamaguchi/ Revoltech: Batman Arkham Knight - Batman - Arkham Knight Ver. (Limited + Bonus) [Kaiyodo]</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-primary">$79,990 
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

            <!--Items/Producto flash (stock)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class=""></span> <span class="estado stock">STOCK</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/yamaguchi-flash/amazing-yamaguchi-the-flash1.jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> Amazing Yamaguchi: The Flash - Flash (Limited Edition + Bonus) [Kaiyodo]</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-primary">$94,990 
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
 
            

  
          </div>
        </div>
        <!--final de cards-->

</main>
<!--Main de productos-->

<!--FOOTER.php y js Bootstrap-->
<?php require('./layout/footer.php') ?>

</body>
</html>