// const contenedorTarjetas = document.getElementById("productos-container")

// function crearTarjetasProductosInicio(productos){
//     productos.forEach(producto => {
//         const nuevaFigura = document.createElement("div");
//         nuevaFigura.classList = "targeta-producto";
//         nuevaFigura.innerHTML = `

//                     <div class="card h-100">
//                         <div class="imagen-content">
//                             <span class="discount">-16%</span>
//                             <span class="estado">PRE-VENTA</span>
//                             <img src="${producto.img}" class="card-img-top" alt="...">
//                         </div>
//                         <div class="card-body">
//                             <h5 class="card-title">${producto.nombre}</h5>
//                         </div>
//                         <div class="d-flex justify-content-around mb-2 precio">
//                             <h3 class="text-danger">$${producto.precioFinal.toFixed(2)}
//                                 <span class="text-primary precio-original" style="text-decoration: line-through; font-size: medium;">$${producto.precio.toFixed(2)}</span>
//                             </h3>
//                         </div>
//                         <div class="d-flex justify-content-center mb-2">
//                             <button class="btn btn-success addToCartBtn" data-name="${producto.nombre}" data-price="${producto.precioFinal}">Reserva aquí</button>
//                         </div>
//                     </div>

                    
//         `
//         contenedorTarjetas.appendChild(nuevaFigura);
        
//     });
// }

// crearTarjetasProductosInicio(figuras);