<?php
$titulo = "Inicio | FiguShop";
?>

<?php require('./layout/navbar.php') ?>

    <!--Aqui empieza el main-->
    <main>
      <!--carrusel de imgs de header-->
      <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators mb-0"><!--botones de abajo-->
          <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="5000"><!--imagenes y tiempo de el carrusel-->
            <img src="IMG/Bandai.jpg" class="d-block w-100" alt="Bandai">
          </div>
          <div class="carousel-item" data-bs-interval="4000">
            <img src="IMG/figma_Link_Tears_of_the_Kingdom.jpg" class="d-block w-100" alt="Link_figma">
          </div>
          <div class="carousel-item">
            <img src="IMG/MAFEX_Friendly_Neighborhood_Spider_Man_Template_1232x240_PC.jpg" class="d-block w-100" alt="Spider-man">
          </div>
          <div class="carousel-item">
            <img src="IMG/MAFEX_Spider_Man_2099.jpg" class="d-block w-100" alt="Spider-man_2099">
          </div>
          <div class="carousel-item">
            <img src="IMG/Revoltech_Izuku_and_Ochaco_1232x240_PC.jpg" class="d-block w-100" alt="Deku_Ochako">
          </div>
          <div class="carousel-item">
            <img src="IMG/Final_Fantasy_VII.jpg" class="d-block w-100" alt="FF_VII">
          </div>
        </div>
        <!--botones de la parte izquierda y derecha del carrusel-->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!--fin carrusel imgs-->

      <!--Aqui empieza lo de las franquicias destacadas OwlCarousel-->
      <div class="container">
         <h1 class="dysplay-3 text-center my-5">Franquicias destacadas</h1>
         <!--Aqui empieza un owlcarousel carrusel de imgs-->
         <div class="row">
           <div class="owl-carousel owl-theme">

             <!--item Marvel-->
             <div class="item">
               <div class="card border border-0">
                 <div class="card-body">
                  <a href="marvel.php">
                    <img src="IMG/logomarvel.png" alt="Marvel" class="card-img-top" width="150px">
                  </a> 
                 </div>
               </div>
             </div> 

             <!--item DBZ-->
             <div class="item">
              <div class="card border border-0">
                <div class="card-body">
                  <a href="dbz.php">
                    <img src="IMG/logodbz.png" alt="" class="card-img-top" width="150px">
                  </a>
                </div>
              </div>
            </div>
            
            <!--item DC-->
            <div class="item">
              <div class="card border border-0">
                <div class="card-body">
                  <a href="dc.php">
                    <img src="IMG/logodccomics.png" alt="" class="card-img-top" width="150px">
                  </a>
                </div>
              </div>
            </div>
            
            <!--item naruto-->
            <div class="item">
              <div class="card border border-0">
                <div class="card-body">
                  <a href="naruto.php">
                    <img src="IMG/narutologo.png" alt="" class="card-img-top" width="150px">
                  </a>
                </div>
              </div>
            </div>


           </div>
         </div>
      </div>
      <!--Final del OwlCarousel-->

      <!--Aqui empieza las marcas-->
      <div class="container">
        <div class="image-grid">

          <!--Imagen grande-->      
          <img class="image-grid-col-2 image-grid-row-2" src="IMG/bannermarvel1.jpg" alt="Marvel">
          <!--imagenes pequeñas-->
          <img class="imagen" src="IMG/bannermcfarlane.jpg" alt="">
          <img src="IMG/BANNERSH.png" alt="">
          <img src="IMG/bannerstarwars.jpg" alt="">
          <img src="IMG/Nuevosarribos.png" alt="">

        </div>
      </div>
      <!--Final de seccion de marcas-->

      <!--Carrusel de productos-->
      <div class="container">
        <h1 class="dysplay-3 text-center my-5 titulo-mas-vendidos">Los mas vendidos</h1>
        <div class="row">
          <div class="owl-carousel owl-theme carousel-container">

                        <!--Items/Producto spider-man-2099 (oferta/Preventa)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class="discount">-16%</span> <span class="estado preventa">PRE-VENTA</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/mafex-spider-man-2099/mafex-spider-man-2099-comic-ver-action-figure (2).jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> MAFEX (No. 239): Spider-Man - Spider-Man 2099 (Comic Ver.) [Medicom Toy]</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-danger">$74,990 
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;">$89,990</span></h3><!--Precio original/final-->
                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="#"><!--Link para la platilla de vista producto--> 
                      <button class="btn btn-success">Reserva aquí</button><!--boton de compra-->
                    </a>  
                  </div>
              </div>
            </div>
            <!--Fin de Item/Producto-->

            <!--Items/Producto joker-p5-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class=""></span> <span class="estado out-of-stock">OUT OF STOCK</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/figma-joker-p5/persona-5-joker1.jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> Persona 5 - Joker Reissue [Figma 363] Persona 5 - persona 5 royale</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-primary">$99,990 
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

            <!--Items/Producto makoto-p3 (Stock)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class=""></span> <span class="estado stock">STOCK</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/figma-makoto-p3/persona-3-1.jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> Persona 3 The Movie - Makoto Yuki Reissue LIMITED EDITION [Figma 322]</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-primary">$84,990 
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

            <!--Items/Producto link-figma (oferta/Preventa)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="vista-link.php"><!--Link para la platilla de vista producto-->     
                    <span class="discount">-18%</span> <span class="estado preventa">PRE-VENTA</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/figma-link/figma-626-link-tears-of-the-kingdom.jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> Figma 626: The Legend of Zelda: Tears of the Kingdom - Link (Tears of the Kingdom Ver.) [Max Factory]</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-danger">$56,990 
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;">$69,990</span></h3><!--Precio original/final-->
                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="vista-link.php"><!--Link para la platilla de vista producto--> 
                      <button class="btn btn-success">Reserva aquí</button><!--boton de compra-->
                    </a>  
                  </div>
              </div>
            </div>
            <!--Fin de Item/Producto-->

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

            <!--Items/Producto mafex-t800 (stock)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class=""></span> <span class="estado stock">STOCK</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/mafex-t800/mafex-t-800-t2battle-damage-ver-action-figure (1).jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> MAFEX (no.191): The Terminator 2: Judgment Day - T-800 (T2: Battle Damage Ver.) [Medicom Toy]</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-primary">$89,990 
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
                      <h5 class="card-title">[Preventa] Marvel Legends: Daredevil & Hydro-Man VHS 2-Pack</h5><!--nombre del producto-->
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
                      <h5 class="card-title"> [Preventa] Marvel Legends Deadpool: Deadpool Legacy Collection</h5><!--nombre del producto-->
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
                      <h5 class="card-title"> Marvel Legends Series Spider-Punk - Spider Man Across the Spider Verse</h5><!--nombre del producto-->
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
                      <h5 class="card-title"> S.H.FIGUARTS: Naruto Shippuuden - Uchiha Itachi (NARUTOP99 Edition Ver.) [Bandai Spirits]</h5><!--nombre del producto-->
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

            <!--Items/Producto Agente-venom-Amazing (oferta/Preventa)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class="discount">-21%</span> <span class="estado preventa">PRE-VENTA</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/yamaguchi-agente-venom/revoltech-amazing-yamaguchi-agent-venom-marvel-action-figure.jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> Amazing Yamaguchi/ Revoltech: Spider-Man - Agent Venom [Kaiyodo]</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-danger">$85,990 
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;">$108,990</span></h3><!--Precio original/final-->
                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="#"><!--Link para la platilla de vista producto--> 
                      <button class="btn btn-success">Reserva aquí</button><!--boton de compra-->
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
      </div>
      <!--fin de owlcarousel de productos-->

      <!--inicio de categorias-->
      <div class="container mt-5">
        <h1 class="dysplay-3 text-center my-5">Categorias populares</h1>
        <div class="row">
          <div class="col-lg-4 mb-4 order-lg-2">
            <div class="bg-light p-3 text-center img-container">
              <a href="videojuegos.php">
                <span class="tipo-categoria">VideoJuegos <i class="fa-solid fa-arrow-right"></i></span>
                <img src="IMG/mario.jpg" alt="" class="card-img-top img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 order-1 order-lg-2">
            <div class="bg-light p-3 text-center img-container">
              <a href="anime.php">
                <span class="tipo-categoria">Anime <i class="fa-solid fa-arrow-right"></i></span>
                <img src="IMG/840_560.jpeg" alt="" class="card-img-top img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 order-1 order-lg-2">
            <div class="bg-light p-3 text-center img-container">
              <a href="series-peliculas.php">
                <span class="tipo-categoria">Series/Peliculas <i class="fa-solid fa-arrow-right"></i></span>
                <img src="IMG/pexels-tima-miroshnichenko-5662857.jpg" alt="" class="card-img-top img-fluid">
              </a>
            </div>
          </div>
        </div>
      </div>
      <!--final de categorias-->

      <!--Inicio Ofertas-->
      <div class="container">
        <h1 class="dysplay-3 text-center my-5 titulo-ofertas">Ofertas</h1>
        <div class="row">
          <div class="owl-carousel owl-theme carousel-container">

                        <!--Items/Producto spider-man-2099 (oferta/Preventa)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class="discount">-16%</span> <span class="estado preventa">PRE-VENTA</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/mafex-spider-man-2099/mafex-spider-man-2099-comic-ver-action-figure (2).jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> MAFEX (No. 239): Spider-Man - Spider-Man 2099 (Comic Ver.) [Medicom Toy]</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-danger">$74,990 
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;">$89,990</span></h3><!--Precio original/final-->
                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="#"><!--Link para la platilla de vista producto--> 
                      <button class="btn btn-success">Reserva aquí</button><!--boton de compra-->
                    </a>  
                  </div>
              </div>
            </div>
            <!--Fin de Item/Producto-->

            <!--Items/Producto link-figma (oferta/Preventa)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="vista-link.php"><!--Link para la platilla de vista producto-->     
                    <span class="discount">-18%</span> <span class="estado preventa">PRE-VENTA</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/figma-link/figma-626-link-tears-of-the-kingdom.jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> Figma 626: The Legend of Zelda: Tears of the Kingdom - Link (Tears of the Kingdom Ver.) [Max Factory]</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-danger">$56,990 
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;">$69,990</span></h3><!--Precio original/final-->
                  </div>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="vista-link.php"><!--Link para la platilla de vista producto--> 
                      <button class="btn btn-success">Reserva aquí</button><!--boton de compra-->
                    </a>  
                  </div>
              </div>
            </div>
            <!--Fin de Item/Producto-->

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
                      <h5 class="card-title"> S.H.FIGUARTS: Naruto Shippuuden - Uchiha Itachi (NARUTOP99 Edition Ver.) [Bandai Spirits]</h5><!--nombre del producto-->
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

            <!--Items/Producto Agente-venom-Amazing (oferta/Preventa)-->
            <div class="item">
              <div class="card h-100">
                <div class="imagen-content">
                  <a href="#"><!--Link para la platilla de vista producto-->     
                    <span class="discount">-21%</span> <span class="estado preventa">PRE-VENTA</span><!--etiquetas de cards (ESTADO STOCK/PREVENTA/OUT OF STOCK) quitae dicount si  no hay descuento-->       
                    <img src="img-producto/yamaguchi-agente-venom/revoltech-amazing-yamaguchi-agent-venom-marvel-action-figure.jpg" class="card-img-top" alt="..."> <!--imagen del producto-->
                  </a>  
                </div>  
                  <div class="card-body">
                      <h5 class="card-title"> Amazing Yamaguchi/ Revoltech: Spider-Man - Agent Venom [Kaiyodo]</h5><!--nombre del producto-->
                  </div>
                  <div class="d-flex justify-content-around mb-2 precio">
                    <h3 class="text-danger">$85,990 
                      <span class="text-primary  precio-original" style="text-decoration: line-through; font-size:medium;">$108,990</span></h3><!--Precio original/final-->
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
            <!--fin de items-->
            

          </div>
        </div>
      </div>  
    </main>

<!--FOOTER.php-->
<?php require('./layout/footer.php') ?>

    <!--JQUERY CDN LINK.
      IMPORTANTE INTEGRITY QUE HACE QUE NO FUNCIONE EL OWLCAROUSEL:
      integrity="sha512-qFOQ9YFAeGj1gDOuUD61g3D+tLDv3u1ECYWqT82WQoaWrOhAY+5mRMTTVsQdWutbA5FORCnkEPEgU0OF8IzGvA=="-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!--owlcarousel Script LIBRARY!!!-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" 
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!--Cantidad de items en pantalla(responsive)
    tambien esta la funcion de autoplay(para que se mueva soloxd)-->
    <script>
      $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:2750,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
    </script>

</body>
</html>