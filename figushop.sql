-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2024 a las 22:54:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `figushop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Videojuegos'),
(2, 'Peliculas/Series'),
(3, 'Anime'),
(4, 'Sin-categoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_transaccion` varchar(20) NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_cliente` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_transaccion`, `fecha_compra`, `status`, `email`, `id_cliente`, `total`) VALUES
(1, '59W17425RE981931J', '2024-05-20 18:37:16', 'COMPLETED', 'sb-qmveh30856477@personal.example.com', '9EY5XKFKKSLXU', 54.65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compras`
--

CREATE TABLE `detalle_compras` (
  `id_detalle` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compras`
--

INSERT INTO `detalle_compras` (`id_detalle`, `id_compra`, `id_producto`, `nombre`, `precio`, `cantidad`) VALUES
(1, 1, 1, 'Figma 626: The Legend of Zelda: Tears of the Kingdom - Link (Tears of the Kingdom Ver.) [Max Factory]', 54.65, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `estado`) VALUES
(1, 'PRE-VENTA'),
(2, 'STOCK'),
(3, 'OUT OF STOCK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `franquicias`
--

CREATE TABLE `franquicias` (
  `id_franquicia` int(11) NOT NULL,
  `nombre_franquicia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `franquicias`
--

INSERT INTO `franquicias` (`id_franquicia`, `nombre_franquicia`) VALUES
(1, 'Marvel'),
(2, 'DC Comics'),
(3, 'Dragon Ball'),
(4, 'Naruto'),
(5, 'Sin-franquicia'),
(7, 'Persona'),
(8, 'My Hero Academia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`) VALUES
(1, 'Mafex'),
(2, 'Sh Figuarts'),
(3, 'Marvel Legends'),
(4, 'Figma'),
(5, 'Kaiyodo'),
(6, 'Sin-marca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `id_precio` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id_precio`, `id_producto`, `precio`, `descuento`) VALUES
(1, 1, 66.65, 18),
(2, 3, 334.24, 0),
(3, 4, 87.38, 18),
(4, 5, 107.16, 0),
(5, 6, 59.70, 0),
(6, 7, 48.13, 0),
(7, 8, 25.99, 0),
(8, 9, 66.65, 10),
(9, 10, 87.38, 18),
(10, 11, 69.95, 0),
(11, 12, 80.72, 0),
(12, 13, 96.99, 20),
(13, 14, 76.68, 0),
(14, 15, 73.27, 21),
(15, 16, 80.60, 21),
(16, 17, 80.60, 21),
(17, 18, 86.53, 0),
(18, 19, 71.81, 18),
(19, 20, 113.17, 0),
(20, 21, 71.81, 10),
(21, 22, 117.17, 0),
(22, 23, 87.93, 13),
(23, 24, 89.86, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_franquicia` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `descripcion_producto` text NOT NULL,
  `fecha_producto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_franquicia`, `id_marca`, `id_categoria`, `id_estado`, `nombre_producto`, `descripcion_producto`, `fecha_producto`) VALUES
(1, 5, 4, 1, 1, 'Figma 626: The Legend of Zelda: Tears of the Kingdom - Link (Tears of the Kingdom Ver.) [Max Factory]', '\"Dale vida al icónico héroe de Hyrule con Figma 626: The Legend of Zelda: Tears of the Kingdom - Link (Tears of the Kingdom Ver.) de Max Factory. Esta figura Figma altamente articulada presenta a Link con su atuendo Tears of the Kingdom, capturando cada detalle de la querida serie de videojuegos. Con múltiples accesorios y piezas intercambiables, puedes recrear tus escenas y poses favoritas. ¡Añade a Link a tu colección y emprende aventuras épicas en el reino de Hyrule!\"', '2025-02-28'),
(3, 7, 4, 1, 3, 'Persona 5 - Joker Reissue [Figma 363] Persona 5 - Persona 5 Royale', '¡El \"protagonista\" de Persona 5 se une a la serie figma!\r\n\r\n¡Del popular juego de rol \"Persona 5\" viene una figura del personaje principal con su traje de Phantom Thief!\r\n-Las articulaciones Figma, suaves pero articuladas, te permiten representar una variedad de escenas diferentes.\r\n-Se utiliza un plástico flexible en zonas específicas, lo que permite mantener las proporciones sin comprometer la posabilidad.\r\n-Viene con tres caras que incluyen una cara inexpresiva, una cara sonriente y una cara sonriente y sospechosa.\r\n-Los accesorios alternativos incluyen una pistola, un cuchillo y una raya frontal alternativa para posarlo con su máscara.\r\n-La compañera felina de los Phantom Thieves, Morgana, también está incluida para exhibirla a su lado.', '2019-12-31'),
(4, 1, 1, 2, 1, 'MAFEX (No. 239): Spider-Man - Spider-Man 2099 (Comic Ver.) [Medicom Toy]', '¡Acciona con la figura de acción MAFEX de Spider-Man 2099 (Comic Ver.) de Medicom Toy! Este coleccionable con licencia oficial captura la esencia de Spider-Man 2099 con un detalle impresionante. Con múltiples puntos de articulación, esta figura ofrece opciones de poses dinámicas. Fabricada con materiales de alta calidad, es imprescindible para fans y coleccionistas por igual. ¡Da vida al héroe del futuro en tu colección y recrea tus momentos favoritos de cómic! ', '2025-02-28'),
(5, 1, 5, 2, 2, 'Amazing Yamaguchi/ Revoltech: Spider-Man - Agent Venom [Kaiyodo]', 'Experimenta el dinámico mundo de Marvel con el Amazing Yamaguchi/ Revoltech: Spider-Man - Agent Venom de Kaiyodo. Esta figura de acción captura la esencia de Agent Venom con su increíble articulación y atención al detalle. Con piezas intercambiables y una amplia gama de puntos de articulación, puedes colocar a Agent Venom en diversas posturas llenas de acción. Ya seas coleccionista o fanático del Universo Marvel, esta figura es una adición imprescindible para tu colección.', '2024-04-30'),
(6, 2, 1, 2, 3, 'MAFEX (No.117) - Batman: Hush - Superman (Hush Ver.) Reissue [Medicom Toy]', '¡Reintroduciendo el icónico \"MAFEX (No.117) - Batman: Hush - Superman (Hush Ver.) Reissue\" de Medicom Toy! Esta figura de acción da vida al diseño clásico de Superman tal como se ve en la historia de Hush. Con una articulación excepcional y atención al detalle, esta figura es perfecta tanto para coleccionistas como para fanáticos del Hombre de Acero.\r\n\r\nSuperman viene con varias manos intercambiables, lo que te permite recrear poses dinámicas y escenas de la serie de cómics. Con una impresionante altura, está listo para proteger Metrópolis o unirse a tu colección de héroes y villanos de DC. No te pierdas la oportunidad de poseer esta obra maestra reeditada de uno de los más grandes íconos de DC\r\n\r\n', '2023-10-31'),
(7, 3, 2, 3, 1, 'S.H.Figuarts -SUPER SAIYAN SON GOKU -LEGENDARY SUPER SAIYAN', '¡Libera el poder del Super Saiyan Legendario con la figura S.H.Figuarts Son Goku SSJ (Legendary Super Saiyan Ver.) de Bandai Spirits! Esta figura altamente detallada da vida al icónico Son Goku de Dragon Ball Z. Con una escultura excepcional y una pintura intrincada, esta figura captura la intensidad y la fuerza de Son Goku en su forma de Super Saiyan. Con una altura aproximada de 14.5 cm, la figura tiene articulaciones completas, lo que permite poses dinámicas y diferentes opciones de exhibición. Ya seas fan de Dragon Ball Z o coleccionista de figuras de alta calidad, esta figura S.H.Figuarts es una adición imprescindible para tu colección. ¡Únete a Son Goku en sus batallas épicas y revive la emoción de Dragon Ball Z!', '2024-08-31'),
(8, 1, 3, 2, 1, 'Deadpool Marvel Legends Legacy Collection Deadpool\r\nDeadpool & Wolverine\r\n\r\n', 'Esta figura coleccionable de Marvel a escala de 6 pulgadas está detallada para parecerse a Deadpool de Deadpool 2. Lleva la emoción y las maravillas del Universo Marvel a tu colección con Hasbro Marvel Legends Deadpool y otros coleccionables de Marvel (los productos adicionales se venden por separado. Sujeto a disponibilidad .)', '2024-06-30'),
(9, 4, 2, 3, 1, 'S.H.FIGUARTS: Naruto Shippuuden - Uchiha Itachi (NARUTOP99 Edition Ver.) [Bandai Spirits]', '¡Libera el poder del Sharingan con S.H.Figuarts: Naruto Shippuden - Uchiha Itachi (NARUTOP99 Edition Ver.) de Bandai Spirits! Esta figura de acción de edición especial celebra al icónico personaje Itachi Uchiha con un detalle impresionante, capturando su presencia intensa y sus habilidades mortales. Con múltiples puntos de articulación y una variedad de manos intercambiables y accesorios, incluyendo su kunai y shuriken característicos, puedes recrear tus escenas favoritas del anime o crear exhibiciones dinámicas que muestren la destreza de Itachi en la batalla. Ya seas un fanático acérrimo de Naruto o simplemente aprecies las figuras de acción finamente elaboradas, S.H.Figuarts: Naruto Shippuden - Uchiha Itachi (NARUTOP99 Edition Ver.) es una adición imprescindible para cualquier colección.', '2024-08-31'),
(10, 1, 1, 2, 1, 'MAFEX (No. ): Spider-Man: No Way Home - Spider-Man - Friendly Neighborhood Spider-Man [Medicom Toy]', '¡Balanceate hacia la acción con la figura MAFEX: Spider-Man: No Way Home - Spider-Man - Friendly Neighborhood Spider-Man de Medicom Toy! Este coleccionable altamente articulado captura al icónico trepamuros en su clásico traje rojo y azul, listo para defender el vecindario de cualquier amenaza. Perfecto para los fans de Spider-Man y los coleccionistas que buscan poses dinámicas y detalles realistas.', '2024-12-31'),
(11, 3, 2, 3, 2, 'S.H.FIGUARTS: Dragon Ball Z - Son Gohan SSJ (The Fighter Who Surpassed Goku Ver.) [Bandai Spirits]', 'Experimenta el pináculo del poder Saiyan con \"S.H.FIGUARTS: Dragon Ball Z - Son Gohan SSJ (The Fighter Who Surpassed Goku Ver.)\" de Bandai Spirits. Esta figura captura la escena trascendental donde Gohan supera a su padre, Goku, mostrando su forma de Super Saiyan con un detalle y articulación excepcionales. Los coleccionistas apreciarán la artesanía precisa que da vida a la expresión intensa de Gohan y su icónico atuendo de batalla de la saga de los Juegos de Cell. Perfecta para posar llena de acción y crear exhibiciones dinámicas, esta versión de Son Gohan SSJ es una adición esencial para los entusiastas de Dragon Ball Z y coleccionistas de figuras.', '2024-04-30'),
(12, 7, 4, 1, 2, 'Persona 3 The Movie - Makoto Yuki Reissue LIMITED EDITION [Figma 322]', '¡Vuelve la figma del líder del Escuadrón Especializado de Ejecución Extraescolar (S.E.E.S)! ¡De \"Persona 3 The Movie\" llega una reedición de la figura del personaje principal, Makoto Yuki!', '2022-08-31'),
(13, 7, 4, 1, 2, 'Persona 4: Arena Ultimax figma No.256 Hero (Yu Narukami) (Reissue)', '¡La figura de Sister Complex Kingpin of Steel regresa para una nueva versión! ¡Del popular juego de lucha en 2D \'Persona 4 Arena Ultimax\' llega una reedición de la figura de Yu Narukami, el protagonista de Persona 4!', '2022-08-31'),
(14, 2, 5, 1, 1, 'Amazing Yamaguchi/ Revoltech: Batman Arkham Knight - Batman - Arkham Knight Ver. (Limited + Bonus) [Kaiyodo]', '\"Entra en el oscuro y emocionante mundo de Gotham con el Amazing Yamaguchi/ Revoltech: Batman Arkham Knight - Batman - Versión Arkham Knight (Limitada + Bonus) de Kaiyodo. Esta figura de edición limitada captura al Caballero de la Noche en su versión de Arkham Knight con un detalle excepcional y articulación. Viene con accesorios adicionales, permitiendo a los fans recrear las poses dinámicas e icónicas escenas de Batman. Perfecta para entusiastas de DC y coleccionistas, esta figura es un tributo al legado perdurable de Batman, combinando artesanía de alta calidad con la estética sombría de la serie Arkham. Imprescindible para cualquier aficionado de Batman, trae la intensidad y sofisticación del Caballero Oscuro a tu colección.\"', '2024-09-30'),
(15, 8, 5, 3, 2, 'Amazing Yamaguchi/Revoltech: My Hero Academia - Izuku Midoriya [Kaiyodo]', 'Izuku Midoriya (緑みどり谷や出いず久く Midoriya Izuku), también conocido como Deku (デク Deku), es el protagonista principal del manga y la serie de anime My Hero Academia.\r\n\r\nAunque nació sin Quirk, Izuku logra captar la atención del legendario héroe All Might, debido a su heroísmo innato y un fuerte sentido de la justicia, y desde entonces se ha convertido en su cercano discípulo, además de ser estudiante de la Clase 1-A en la Academia U.A. All Might le transmitió su Quirk transferible a Izuku, convirtiéndolo en el noveno portador de One For All.', '2022-09-30'),
(16, 8, 5, 3, 1, 'Amazing Yamaguchi/Revoltech: My Hero Academia - Ochaco Uraraka [Kaiyodo]', 'Ochaco Uraraka (麗うらら日かお茶ちゃ子こ Uraraka Ochako), también conocida como Uravity (ウラビティ Urabiti), es una estudiante de la Clase 1-A en la Academia U.A., entrenando para convertirse en una Héroe Profesional. Ella es una de las principales protagonistas de My Hero Academia.', '2024-11-30'),
(17, 8, 5, 3, 1, 'Amazing Yamaguchi/ Revoltech: My Hero Academia - Shigaraki Tomura - Awakening ver. [Kaiyodo]', '\"Abraza el lado oscuro del heroísmo con Amazing Yamaguchi/Revoltech: My Hero Academia - Shigaraki Tomura - Versión Despertar  de Kaiyodo. Esta figura de edición limitada captura la aura amenazante de Shigaraki con detalles y articulación excepcionales, imprescindible para los fans.\"', '2024-08-31'),
(18, 5, 1, 2, 2, 'MAFEX (no.151) The Boys - Homelander REISSUE [MEDICOM TOY]', 'Medicom relanza a Homelander de \"The Boys\" en una nueva figura de acción MAFEX. Este súper héroe totalmente articulado presenta su capa roja y blanca confeccionada en tela, una parte de pecho intercambiable, tres expresiones diferentes y un soporte para exhibirla. ¡Haz tu pedido hoy y añade algo de acción súper poderosa a tu colección!', '2023-01-31'),
(19, 1, 1, 2, 1, 'MAFEX (No. 223): Daredevil - Comic Ver. [Medicom Toy] Marvel Comics', 'Libera al vigilante que llevas dentro con MAFEX No. 223: Daredevil - Comic Ver. de Medicom Toy. Esta figura de acción da vida al icónico héroe de Marvel con un detalle impresionante, capturando su apariencia clásica de cómic.\r\n\r\nElaborada con precisión y articulación, esta figura de Daredevil te permite recrear poses dinámicas y escenas de acción de los cómics. Viene con una variedad de accesorios, incluyendo manos intercambiables y armas, para personalizar tu exhibición.', '2024-09-30'),
(20, 2, 1, 2, 2, 'MAFEX (No.105) - Batman: Hush - Batman (Bruce Wayne) Reissue [Medicom Toy]', '¡Medicom presenta la nueva figura de acción MAFEX de Batman \"Hush\"! Con una forma nítida y un increíble rango de movimiento, ¡esta figura es una verdadera obra maestra! Con expresiones faciales distintivas, piezas de reemplazo de muñeca y diversas piezas adicionales, este Batman captura el estilo original del cómic con gran fidelidad. Gracias a las numerosas articulaciones, la figura puede ser exhibida en una variedad de poses. La capa está hecha de tela y está integrada con alambres, permitiendo un posicionamiento preciso. También se incluye una base. ¡Ordénala ahora para agregar este icónico Batman a tu colección!', '2024-01-31'),
(21, 2, 1, 2, 2, 'MAFEX (no.188): The Batman - Batman (Bruce Wayne) [Medicom Toy]', '¡El Caballero de la Noche ha regresado! ¡La línea de figuras de acción MAFEX de Medicom ahora incluye a The Batman de la próxima película del mismo nombre! Esta figura altamente articulada viene con un alambre en el dobladillo de su capa de tela, lo que te permite crear poses dramáticas en el viento. También obtendrás cuatro cabezas intercambiables, varias pistolas de agarre y un soporte de figura móvil. No esperes para agregar esta nueva versión del icónico superhéroe a tu colección. ¡Consigue la tuya hoy mismo!', '2023-10-31'),
(22, 2, 5, 2, 2, 'Amazing Yamaguchi: Superman [Amazing Yamaguchi 027]', 'Japanese Original Edition, Brand New Figure', '2022-08-31'),
(23, 5, 6, 1, 1, 'Bring Arts: Final Fantasy VII - Cloud Strife (Reissue) [Square Enix]', '¡Presentamos la figura BRING ARTS de Cloud Strife de FINAL FANTASY VII! Esta figura meticulosamente diseñada captura fielmente la apariencia icónica de Cloud en el juego original, incluyendo su distintivo peinado, armadura de hombro y detalles de su traje que evocan nostalgia en los fans. Con atención al detalle en sus rasgos faciales marcados, texturas de ropa y arrugas, esta figura da vida a Cloud Strife con un detalle impresionante. Además, la figura viene con diversas manos intercambiables y el arma simbólica de Cloud, la Buster Sword, permitiendo a los fans crear poses dinámicas y revivir escenas memorables del querido juego.', '2024-07-31'),
(24, 2, 5, 2, 2, 'Amazing Yamaguchi: The Flash - Flash (Limited Edition + Bonus) [Kaiyodo]', '¡Experimenta la última rivalidad de velocistas con la figura de acción Amazing Yamaguchi: The Flash - Flash de Kaiyodo! Esta figura de edición limitada viene con accesorios adicionales, convirtiéndola en una pieza imprescindible para coleccionistas y fans del personaje de DC Comics. Con más de 30 puntos de articulación, esta figura altamente detallada y articulada permite una amplia gama de poses dinámicas. El icónico traje amarillo y negro del Reverse Flash está fielmente recreado con un acabado brillante que aumenta el impacto visual general de la figura. ¡Añade esta figura a tu colección y siente la prisa de la fuerza de la velocidad!\r\n', '2023-10-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `id_tienda` int(11) NOT NULL,
  `nombre_tienda` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `franquicias`
--
ALTER TABLE `franquicias`
  ADD PRIMARY KEY (`id_franquicia`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id_precio`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_franquicia` (`id_franquicia`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`id_tienda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `franquicias`
--
ALTER TABLE `franquicias`
  MODIFY `id_franquicia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `id_tienda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `precios`
--
ALTER TABLE `precios`
  ADD CONSTRAINT `precios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_franquicia`) REFERENCES `franquicias` (`id_franquicia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
