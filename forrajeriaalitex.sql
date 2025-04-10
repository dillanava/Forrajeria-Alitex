-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2025 a las 18:22:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `forrajeriaalitex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_tipo` int(5) NOT NULL,
  `precio_inicial` decimal(11,1) NOT NULL,
  `precio_final` decimal(11,0) NOT NULL,
  `limites_descuento` varchar(10) NOT NULL,
  `id_unidadVenta` varchar(20) NOT NULL,
  `caducidad` varchar(2) NOT NULL,
  `detalles` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `suelto` tinyint(1) NOT NULL,
  `presentacion` decimal(11,1) NOT NULL,
  `id_unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `nombre`, `id_tipo`, `precio_inicial`, `precio_final`, `limites_descuento`, `id_unidadVenta`, `caducidad`, `detalles`, `activo`, `suelto`, `presentacion`, `id_unidad`) VALUES
(4, 'Micro inicio estandar', 1, 40.0, 55, '0', '2', 'no', 'Inicio (15 a 30 Kg)', 1, 1, 20.0, 1),
(5, 'Micro inicio 25 (CON ADIFICANTE)', 1, 52.0, 55, '0', '2', 'no', 'Inicio (15-30kg)', 1, 1, 25.0, 1),
(6, 'Micro crecimiento estandar', 1, 47.0, 1105, '0', '2', 'no', 'Crecimiento(30-50kg)', 1, 1, 20.0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `cantidad` decimal(10,1) NOT NULL,
  `id_art` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`cantidad`, `id_art`, `id`) VALUES
(10.0, 45, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierrecaja`
--

CREATE TABLE `cierrecaja` (
  `id_cierre` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `efectivo` decimal(11,1) NOT NULL,
  `tarjeta` decimal(11,1) NOT NULL,
  `cCorriente` decimal(11,1) NOT NULL,
  `canje` decimal(11,1) NOT NULL,
  `pagoEnCuentaC` decimal(11,1) NOT NULL,
  `Total` decimal(11,1) NOT NULL,
  `ganancia` decimal(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(6) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `apellido`, `nombre`, `telefono`, `activo`, `email`, `direccion`, `localidad`, `estado`) VALUES
(1, 'Mendez', 'Carlos', '5551488990', 1, 'juanbertho288@gmail.com', 'Calle Potro Mz. 23 Lt. 2', 'Ecatepec', 'Michoacán'),
(2, 'Carbajal Silva', 'Christopher Ernesto', '5626611645', 1, 'christopcs23@gamil.com', 'Albatro 234', 'Cuauhtemoc', 'Ciudad de México'),
(3, 'Dominguez', 'Dinora', '5626611648', 1, 'dinoran@gmail.com', 'vicente guerrero', 'chicoloapan', 'Estado de México'),
(4, 'Magaña', 'Fernando', '5534495009', 1, 'magacgf@gmail.com', 'Lago de Cuitzeu', 'Ecatepec', 'Estado de México'),
(5, 'Lopez', 'Alan', '5518594309', 1, 'alanpabf@gmail.com', 'Central Michocana', 'Cuauhtemoc', 'Ciudad de México');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentacorriente`
--

CREATE TABLE `cuentacorriente` (
  `id_cuentaCorriente` int(6) NOT NULL,
  `operacion` int(6) NOT NULL,
  `monto` decimal(11,1) NOT NULL,
  `fecha` date NOT NULL,
  `detalles` varchar(100) NOT NULL,
  `id_cliente` varchar(6) NOT NULL,
  `id_usuario` int(6) NOT NULL,
  `id_turno` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cuentacorriente`
--

INSERT INTO `cuentacorriente` (`id_cuentaCorriente`, `operacion`, `monto`, `fecha`, `detalles`, `id_cliente`, `id_usuario`, `id_turno`) VALUES
(1, 0, -2.0, '2024-05-15', 'entrega', '<br />', 2, 1),
(2, 33, 980.0, '2024-05-28', '-', '2', 4, 0),
(3, 51, 280.0, '2024-05-29', '-', '2', 4, 0),
(4, 4, 55.0, '2024-06-14', '-', '3', 4, 0),
(5, 0, -1250.0, '2025-02-23', 'entrega', '2', 9, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialprecio`
--

CREATE TABLE `historialprecio` (
  `id_historial` int(10) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `precio_inicial` decimal(11,1) NOT NULL,
  `precio_final` decimal(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historialprecio`
--

INSERT INTO `historialprecio` (`id_historial`, `id_articulo`, `fecha`, `precio_inicial`, `precio_final`) VALUES
(1, 5, '2024-06-14', 52.0, 55.0),
(2, 6, '2024-06-14', 47.0, 1105.0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE `operacion` (
  `id_operacion` int(10) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `venta` decimal(11,1) NOT NULL,
  `fecha` date NOT NULL,
  `descuento` decimal(5,1) NOT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `id_tipoVenta` int(6) NOT NULL,
  `detalles` varchar(255) DEFAULT NULL,
  `id_cliente` int(6) NOT NULL,
  `turno` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`id_operacion`, `id_usuario`, `venta`, `fecha`, `descuento`, `detalle`, `id_tipoVenta`, `detalles`, `id_cliente`, `turno`) VALUES
(1, 8, 55.0, '2024-06-10', 0.0, 'no hay', 1, 'no hay', 1, 0),
(2, 8, 5690.0, '2024-06-14', 0.0, 'no hay', 1, 'no hay', 5, 0),
(3, 4, 110.0, '2024-06-14', 0.0, 'no hay', 2, 'no hay', 1, 0),
(4, 4, 55.0, '2024-06-14', 0.0, 'no hay', 3, 'no hay', 3, 0),
(5, 7, 110.0, '2025-02-22', 0.0, '', 2, '22 febrero 2025', 1, 0),
(6, 7, 2210.0, '2025-02-22', 0.0, '', 1, '', 1, 0),
(7, 7, 2210.0, '2025-02-22', 0.0, '', 1, '', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacionpedido`
--

CREATE TABLE `operacionpedido` (
  `id_operacionPedido` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_proveedor` int(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `operacionpedido`
--

INSERT INTO `operacionpedido` (`id_operacionPedido`, `id_usuario`, `id_proveedor`, `fecha`) VALUES
(1, 9, 1, '2025-02-23'),
(2, 9, 5, '2025-02-23'),
(3, 9, 1, '2025-02-23'),
(4, 9, 1, '2025-02-23'),
(5, 9, 2, '2025-02-23'),
(6, 9, 1, '2025-02-23'),
(7, 9, 1, '2025-02-23'),
(8, 9, 1, '2025-02-23'),
(9, 9, 1, '2025-02-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(10) NOT NULL,
  `operacionPedido` int(10) NOT NULL,
  `id_articulo` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `operacionPedido`, `id_articulo`, `cantidad`, `fecha`) VALUES
(1, 1, 6, 2, '2025-02-23'),
(2, 2, 5, 4, '2025-02-23'),
(3, 3, 5, 2, '2025-02-23'),
(4, 4, 6, 2, '2025-02-23'),
(5, 5, 6, 2, '2025-02-23'),
(6, 6, 6, 2, '2025-02-23'),
(7, 7, 6, 14, '2025-02-23'),
(8, 8, 6, 2, '2025-02-23'),
(9, 9, 6, 2, '2025-02-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidocar`
--

CREATE TABLE `pedidocar` (
  `id_pedidoCar` int(10) NOT NULL,
  `id_articulo` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `rubro` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `telefono`, `rubro`, `direccion`, `localidad`, `mail`, `activo`) VALUES
(1, 'AgroProveedores S.A.', '5534567890', 'Alimentos para Animales', 'Av. Rural 123', 'Ciudad Agraria', 'contacto@agroproveedores.com', 1),
(2, 'CampoVerde Ltda', '5576543210', 'Semillas y Fertilizantes', ' Calle Verde 456', 'Villa Ecológica', 'info@campoverde.com', 1),
(3, 'EquiposRurales Corp.', '55516008901', 'Equipos Agrícolas', 'Calle Trabajo 789', 'Barrio Industrial', 'ventas@equiposrurales.com', 1),
(4, 'Forrajes Del Campo S.A.', '55536783012', 'Forrajes y Pastos', 'Av. Campo 321', 'Pueblo Ganadero', 'info@forrajesdelcampo.com', 1),
(5, 'Sembradores Unidos', '5678901234', 'Herramientas de Siembra', 'Calle Cosecha 987', 'Zona Agrícola', 'info@sembradoresunidos.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` decimal(11,1) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `stockMinimo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id_stock`, `id_articulo`, `cantidad`, `id_proveedor`, `stockMinimo`) VALUES
(1, 4, 20.0, 2, 5),
(2, 5, 21.0, 1, 15),
(3, 6, 17.0, 4, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suelto`
--

CREATE TABLE `suelto` (
  `id_suelto` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoart`
--

CREATE TABLE `tipoart` (
  `id_tipoArt` int(11) NOT NULL,
  `tipoArti` varchar(50) NOT NULL,
  `detalles` varchar(100) NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipoart`
--

INSERT INTO `tipoart` (`id_tipoArt`, `tipoArti`, `detalles`, `activo`) VALUES
(1, 'Linea cerdos estandar', 'Linea exclusiva para cerdos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoventa`
--

CREATE TABLE `tipoventa` (
  `id_tipoventa` int(11) NOT NULL,
  `tipoventa` varchar(50) NOT NULL,
  `detalles` varchar(100) NOT NULL,
  `interes` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipoventa`
--

INSERT INTO `tipoventa` (`id_tipoventa`, `tipoventa`, `detalles`, `interes`) VALUES
(1, 'Contado Efectivo', '--', 0),
(2, 'Tarjeta', '--', 15),
(3, 'Cuenta Coriente', '--', 20),
(4, 'Canje', '--', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadcantidad`
--

CREATE TABLE `unidadcantidad` (
  `id` int(11) NOT NULL,
  `unidadVenta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `unidadcantidad`
--

INSERT INTO `unidadcantidad` (`id`, `unidadVenta`) VALUES
(1, 'Unidad'),
(2, 'Kilo'),
(3, 'Litro'),
(4, 'Bolsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadmedida`
--

CREATE TABLE `unidadmedida` (
  `umedida` varchar(20) NOT NULL,
  `id_unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `unidadmedida`
--

INSERT INTO `unidadmedida` (`umedida`, `id_unidad`) VALUES
('Kilo', 1),
('Gramo', 2),
('Metro', 3),
('Centimetro', 4),
('Litro', 5),
('Mililitro', 6),
('Unidades', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(6) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `apellido`, `nombre`, `telefono`) VALUES
(9, 'Arath', 'zffI5UZ3S1GqMUjxuUWhWp5vz4Hx3CcTmt9inIdaRpSfJYpIA8VpCt59HzYTzdxriMv5WcV+PjnhdZOvE8Ntmg==', 'Garcia Nieto', 'Jonatan Arath', '5613845080');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` decimal(10,1) NOT NULL,
  `id_operacion` int(11) NOT NULL,
  `precioI` decimal(11,1) NOT NULL,
  `precioF` decimal(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_articulo`, `cantidad`, `id_operacion`, `precioI`, `precioF`) VALUES
(1, 4, 1.0, 1, 40.0, 55.0),
(2, 6, 5.0, 2, 47.0, 1105.0),
(3, 5, 2.0, 2, 52.0, 55.0),
(4, 4, 1.0, 2, 40.0, 55.0),
(5, 4, 1.0, 3, 40.0, 55.0),
(6, 5, 1.0, 3, 52.0, 55.0),
(7, 5, 1.0, 4, 52.0, 55.0),
(8, 4, 2.0, 5, 40.0, 55.0),
(9, 6, 2.0, 6, 47.0, 1105.0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cierrecaja`
--
ALTER TABLE `cierrecaja`
  ADD PRIMARY KEY (`id_cierre`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cuentacorriente`
--
ALTER TABLE `cuentacorriente`
  ADD PRIMARY KEY (`id_cuentaCorriente`);

--
-- Indices de la tabla `historialprecio`
--
ALTER TABLE `historialprecio`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`id_operacion`);

--
-- Indices de la tabla `operacionpedido`
--
ALTER TABLE `operacionpedido`
  ADD PRIMARY KEY (`id_operacionPedido`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `pedidocar`
--
ALTER TABLE `pedidocar`
  ADD PRIMARY KEY (`id_pedidoCar`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indices de la tabla `suelto`
--
ALTER TABLE `suelto`
  ADD PRIMARY KEY (`id_suelto`);

--
-- Indices de la tabla `tipoart`
--
ALTER TABLE `tipoart`
  ADD PRIMARY KEY (`id_tipoArt`);

--
-- Indices de la tabla `tipoventa`
--
ALTER TABLE `tipoventa`
  ADD PRIMARY KEY (`id_tipoventa`);

--
-- Indices de la tabla `unidadcantidad`
--
ALTER TABLE `unidadcantidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  ADD PRIMARY KEY (`id_unidad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cierrecaja`
--
ALTER TABLE `cierrecaja`
  MODIFY `id_cierre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cuentacorriente`
--
ALTER TABLE `cuentacorriente`
  MODIFY `id_cuentaCorriente` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `historialprecio`
--
ALTER TABLE `historialprecio`
  MODIFY `id_historial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
  MODIFY `id_operacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `operacionpedido`
--
ALTER TABLE `operacionpedido`
  MODIFY `id_operacionPedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pedidocar`
--
ALTER TABLE `pedidocar`
  MODIFY `id_pedidoCar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `suelto`
--
ALTER TABLE `suelto`
  MODIFY `id_suelto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoart`
--
ALTER TABLE `tipoart`
  MODIFY `id_tipoArt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipoventa`
--
ALTER TABLE `tipoventa`
  MODIFY `id_tipoventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `unidadcantidad`
--
ALTER TABLE `unidadcantidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
