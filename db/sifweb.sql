-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2014 a las 21:46:08
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sifweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono_compra`
--

CREATE TABLE IF NOT EXISTS `abono_compra` (
  `id_abono` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `orden_id` int(11) NOT NULL,
  `forma_pago` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `observacion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono_venta`
--

CREATE TABLE IF NOT EXISTS `abono_venta` (
  `id_abono` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `factura_id` int(11) NOT NULL,
  `observacion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acumulainventario`
--

CREATE TABLE IF NOT EXISTS `acumulainventario` (
`IdAcumulaInventario` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `NomProducto` varchar(200) DEFAULT NULL,
  `UltimoMovimiento` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `acumulainventario`
--

INSERT INTO `acumulainventario` (`IdAcumulaInventario`, `IdProducto`, `Cantidad`, `NomProducto`, `UltimoMovimiento`) VALUES
(5, 6, 17, 'Banana', '2014-12-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE IF NOT EXISTS `caja` (
`id_caja` int(11) NOT NULL,
  `base` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `venta` decimal(10,2) NOT NULL,
  `gasto` decimal(10,2) NOT NULL,
  `observacion` varchar(250) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE IF NOT EXISTS `categoria_producto` (
`id_categoria` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`id_categoria`, `descripcion`) VALUES
(1, 'Categoria 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono_1` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `e_mail` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `tipo_documento`, `nombre`, `apellido`, `telefono_1`, `celular`, `direccion`, `e_mail`) VALUES
(1072660049, 1, 'Michael Alexander', 'Espinosa Rico', 'na', '3214325244', 'vda Bojaca', 'michaelalexander_jean@hotmail.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE IF NOT EXISTS `detalle_venta` (
`id_detalle` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_unitario` double DEFAULT NULL,
  `factura_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle`, `producto_id`, `cantidad`, `valor_unitario`, `factura_id`) VALUES
(4, 6, 5, 1000, 129),
(5, 6, 10, 1000, 131),
(6, 6, 3, 1000, 133);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_compra`
--

CREATE TABLE IF NOT EXISTS `det_compra` (
`id_deta_compra` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `orden_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `det_compra`
--

INSERT INTO `det_compra` (`id_deta_compra`, `producto_id`, `cantidad`, `valor_unitario`, `orden_id`) VALUES
(10, 6, 35, '1000.00', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fac_venta`
--

CREATE TABLE IF NOT EXISTS `fac_venta` (
`id_factura` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `iva` decimal(10,2) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `observacion` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Volcado de datos para la tabla `fac_venta`
--

INSERT INTO `fac_venta` (`id_factura`, `fecha`, `subtotal`, `total`, `iva`, `cliente_id`, `estado`, `descuento`, `usuario_id`, `observacion`) VALUES
(125, '2014-12-11 11:44:32', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(126, '2014-12-11 11:44:44', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(127, '2014-12-11 14:03:40', '0.00', '0.00', '0.00', 1072660049, 1, '0.00', 123456, '0'),
(128, '2014-12-11 14:29:53', '0.00', '0.00', '0.00', 1072660049, 1, '0.00', 123456, '0'),
(129, '2014-12-11 14:31:04', '0.00', '0.00', '0.00', 1072660049, 1, '0.00', 123456, '0'),
(130, '2014-12-11 14:31:27', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(131, '2014-12-11 14:33:38', '0.00', '0.00', '0.00', 1072660049, 1, '0.00', 123456, '0'),
(132, '2014-12-11 14:34:04', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(133, '2014-12-11 14:43:12', '0.00', '0.00', '0.00', 1072660049, 1, '0.00', 123456, '0'),
(134, '2014-12-11 14:44:02', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(135, '2014-12-11 15:31:35', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
`id_inventario` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `IdOrden` int(11) DEFAULT NULL,
  `IdFactura` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `entrada` tinyint(1) NOT NULL,
  `observacion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `producto_id`, `IdOrden`, `IdFactura`, `fecha`, `cantidad`, `entrada`, `observacion`) VALUES
(12, 6, 16, NULL, '2014-12-11', 35, 1, 'Entrada para la orden de Compra: 16'),
(13, 6, NULL, 129, '2014-12-11', 5, 0, 'Salida con N&uacute;mero de Factura: 129'),
(14, 6, NULL, 131, '2014-12-11', 10, 0, 'Salida con N&uacute;mero de Factura: 131'),
(15, 6, NULL, 133, '2014-12-11', 3, 0, 'Salida con N&uacute;mero de Factura: 133');

--
-- Disparadores `inventario`
--
DELIMITER //
CREATE TRIGGER `acuInventario` AFTER INSERT ON `inventario`
 FOR EACH ROW BEGIN
	IF NEW.entrada = 1 THEN
     UPDATE acumulainventario
    SET cantidad = (acumulainventario.cantidad + NEW.cantidad),
        UltimoMovimiento = NOW() Where acumulainventario.IdProducto = NEW.producto_id;
     ELSE
     UPDATE acumulainventario
    SET cantidad = (acumulainventario.cantidad - NEW.cantidad),
        UltimoMovimiento = NOW() Where acumulainventario.IdProducto = NEW.producto_id;
     END IF;
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `acuInventarioU` AFTER UPDATE ON `inventario`
 FOR EACH ROW BEGIN
    UPDATE acumulainventario
    SET cantidad = (acumulainventario.cantidad + NEW.cantidad - OLD.cantidad),
        UltimoMovimiento = NOW() Where acumulainventario.IdProducto = NEW.producto_id; 
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
`id_lote` int(11) NOT NULL,
  `vencimiento` date NOT NULL,
  `dias` tinyint(4) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `observacion` varchar(250) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compra`
--

CREATE TABLE IF NOT EXISTS `orden_compra` (
`id_orden` int(11) NOT NULL,
  `fecha_factura` date NOT NULL,
  `vencimiento` date NOT NULL,
  `factura` varchar(30) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `iva` decimal(10,2) NOT NULL,
  `pagado` tinyint(1) NOT NULL DEFAULT '0',
  `usuario_id` int(11) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `observacion` varchar(250) DEFAULT NULL,
  `vendedor` varchar(50) NOT NULL,
  `ajuste` decimal(10,2) NOT NULL,
  `nit_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `orden_compra`
--

INSERT INTO `orden_compra` (`id_orden`, `fecha_factura`, `vencimiento`, `factura`, `subtotal`, `iva`, `pagado`, `usuario_id`, `descuento`, `total`, `observacion`, `vendedor`, `ajuste`, `nit_id`) VALUES
(16, '2014-12-11', '2014-12-12', '1', '0.00', '0.00', 1, 123456, '0.00', '0.00', '', 'Michael Espinosa', '0.00', 1014237285);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE IF NOT EXISTS `pagina` (
`idPagina` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina_perfil`
--

CREATE TABLE IF NOT EXISTS `pagina_perfil` (
`idPagina_perfil` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `idPagina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
`id_pago` int(11) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE IF NOT EXISTS `parametro` (
`idParametro` int(11) NOT NULL,
  `nomparametro` varchar(100) DEFAULT NULL,
  `parametro_fijo` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`idParametro`, `nomparametro`, `parametro_fijo`) VALUES
(1, 'Tipo de Documento', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
`id_perfil` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`id_producto` int(11) NOT NULL,
  `codigo_barras` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio_venta` decimal(10,2) DEFAULT NULL,
  `impuesto` float NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `codigo_barras`, `descripcion`, `precio_venta`, `impuesto`, `categoria_id`) VALUES
(6, '1234567890', 'Banana', '1000.00', 10, 1);

--
-- Disparadores `producto`
--
DELIMITER //
CREATE TRIGGER `Insertaproducto` AFTER INSERT ON `producto`
 FOR EACH ROW BEGIN
 
    INSERT INTO acumulainventario
    SET IdProducto = NEW.id_producto,
    	nomProducto = NEW.descripcion,
        cantidad = 0,
        UltimoMovimiento = NOW(); 
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_nit` int(11) NOT NULL,
  `tipo_documento` varchar(2) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `telefono_1` varchar(30) DEFAULT NULL,
  `telefono_2` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `e_mail` varchar(30) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `contacto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_nit`, `tipo_documento`, `razon_social`, `telefono_1`, `telefono_2`, `direccion`, `e_mail`, `observaciones`, `contacto`) VALUES
(123434, '2', 'proveedor', NULL, NULL, NULL, NULL, NULL, 'Michael'),
(1014237285, '1', 'ITEXO', '4545445', '4005555', 'cale falsa 123', 'crist_esr@hotmail.com', 'na', 'Aaron');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE IF NOT EXISTS `tienda` (
  `id_nit` int(11) NOT NULL,
  `razon_social` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `celular` varchar(10) NOT NULL,
  `e_mail` varchar(40) DEFAULT NULL,
  `regimen` varchar(50) DEFAULT NULL,
  `resolucion` varchar(200) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `administrador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id_nit`, `razon_social`, `direccion`, `telefono`, `celular`, `e_mail`, `regimen`, `resolucion`, `logo`, `administrador`) VALUES
(134, 'ssssss', 'calle123', '8888888', '444444', 'a@a.com', 'Reg.Simplificado', '234124', 'sss', 'adfasfasf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `tipo_document` varchar(2) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono_1` varchar(30) DEFAULT NULL,
  `celular` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `e_mail` varchar(30) DEFAULT NULL,
  `cargo` varchar(30) NOT NULL,
  `clave` varchar(15) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `tipo_document`, `nombre`, `apellido`, `telefono_1`, `celular`, `direccion`, `e_mail`, `cargo`, `clave`, `perfil_id`, `fecha_ingreso`, `salario`, `activo`) VALUES
(1014, '1', 'nn', 'eeee', '9999', '832947983427|', 'calle', 'a@a', 'no se ', '123', 2, '2014-12-10 00:00:00', '188882.00', 0),
(1324, '1', 'aaa', 'aa', 'aa', 'aa', 'aa', 'a@a', 'adfasf', '1234', 2, '2014-12-18 00:00:00', '188823.00', 0),
(101423, '1', 'noseeeeee', 'nose', 'nose', 'nose ', 'calle', 'a@aa', 'nose', '1234', 2, '2014-12-10 00:00:00', '1999.00', 1),
(123456, NULL, 'admin', '', NULL, '', '', NULL, '', '123456', 1, '0000-00-00 00:00:00', '0.00', 1),
(10142372, '1', 'aaronsito', 'escarrga', '800093', '31231', 'CALLLE', 'A@FFFF', 'TAMPOCO SE', '1324', 2, '2014-12-25 00:00:00', '748483.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor`
--

CREATE TABLE IF NOT EXISTS `valor` (
`idValor` int(11) NOT NULL,
  `nomvalor` varchar(100) DEFAULT NULL,
  `idParametro` int(11) NOT NULL,
  `valor_fijo` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `valor`
--

INSERT INTO `valor` (`idValor`, `nomvalor`, `idParametro`, `valor_fijo`) VALUES
(1, 'Cedula', 1, 0),
(2, 'Nit', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono_compra`
--
ALTER TABLE `abono_compra`
 ADD PRIMARY KEY (`id_abono`), ADD KEY `factura_id` (`orden_id`), ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `abono_venta`
--
ALTER TABLE `abono_venta`
 ADD PRIMARY KEY (`id_abono`), ADD KEY `factura_id` (`factura_id`);

--
-- Indices de la tabla `acumulainventario`
--
ALTER TABLE `acumulainventario`
 ADD PRIMARY KEY (`IdAcumulaInventario`), ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
 ADD PRIMARY KEY (`id_caja`), ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
 ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
 ADD PRIMARY KEY (`id_detalle`), ADD KEY `producto_id` (`producto_id`), ADD KEY `factura_id` (`factura_id`);

--
-- Indices de la tabla `det_compra`
--
ALTER TABLE `det_compra`
 ADD PRIMARY KEY (`id_deta_compra`), ADD KEY `producto_id` (`producto_id`), ADD KEY `orden_id` (`orden_id`);

--
-- Indices de la tabla `fac_venta`
--
ALTER TABLE `fac_venta`
 ADD PRIMARY KEY (`id_factura`), ADD KEY `cliente_id` (`cliente_id`), ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
 ADD PRIMARY KEY (`id_inventario`), ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
 ADD PRIMARY KEY (`id_lote`), ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
 ADD PRIMARY KEY (`id_orden`), ADD KEY `usuario_id` (`usuario_id`), ADD KEY `nit_id` (`nit_id`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
 ADD PRIMARY KEY (`idPagina`);

--
-- Indices de la tabla `pagina_perfil`
--
ALTER TABLE `pagina_perfil`
 ADD PRIMARY KEY (`idPagina_perfil`), ADD KEY `idPerfil` (`idPerfil`), ADD KEY `idPagina` (`idPagina`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
 ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
 ADD PRIMARY KEY (`idParametro`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
 ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`id_producto`), ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
 ADD PRIMARY KEY (`id_nit`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
 ADD PRIMARY KEY (`id_nit`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_usuario`), ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `valor`
--
ALTER TABLE `valor`
 ADD PRIMARY KEY (`idValor`), ADD KEY `idParametro` (`idParametro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acumulainventario`
--
ALTER TABLE `acumulainventario`
MODIFY `IdAcumulaInventario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `det_compra`
--
ALTER TABLE `det_compra`
MODIFY `id_deta_compra` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `fac_venta`
--
ALTER TABLE `fac_venta`
MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
MODIFY `id_lote` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
MODIFY `idPagina` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pagina_perfil`
--
ALTER TABLE `pagina_perfil`
MODIFY `idPagina_perfil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `parametro`
--
ALTER TABLE `parametro`
MODIFY `idParametro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
MODIFY `idValor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abono_compra`
--
ALTER TABLE `abono_compra`
ADD CONSTRAINT `abono_compra_ibfk_1` FOREIGN KEY (`orden_id`) REFERENCES `orden_compra` (`id_orden`),
ADD CONSTRAINT `abono_compra_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `abono_venta`
--
ALTER TABLE `abono_venta`
ADD CONSTRAINT `abono_venta_ibfk_1` FOREIGN KEY (`factura_id`) REFERENCES `fac_venta` (`id_factura`);

--
-- Filtros para la tabla `acumulainventario`
--
ALTER TABLE `acumulainventario`
ADD CONSTRAINT `acumulainventario_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
ADD CONSTRAINT `caja_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`factura_id`) REFERENCES `fac_venta` (`id_factura`),
ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `det_compra`
--
ALTER TABLE `det_compra`
ADD CONSTRAINT `det_compra_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`),
ADD CONSTRAINT `det_compra_ibfk_2` FOREIGN KEY (`orden_id`) REFERENCES `orden_compra` (`id_orden`);

--
-- Filtros para la tabla `fac_venta`
--
ALTER TABLE `fac_venta`
ADD CONSTRAINT `fac_venta_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
ADD CONSTRAINT `fac_venta_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
ADD CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
ADD CONSTRAINT `orden_compra_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
ADD CONSTRAINT `orden_compra_ibfk_2` FOREIGN KEY (`nit_id`) REFERENCES `proveedor` (`id_nit`);

--
-- Filtros para la tabla `pagina_perfil`
--
ALTER TABLE `pagina_perfil`
ADD CONSTRAINT `pagina_perfil_ibfk_1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`id_perfil`),
ADD CONSTRAINT `pagina_perfil_ibfk_2` FOREIGN KEY (`idPagina`) REFERENCES `pagina` (`idPagina`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_producto` (`id_categoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id_perfil`);

--
-- Filtros para la tabla `valor`
--
ALTER TABLE `valor`
ADD CONSTRAINT `valor_ibfk_1` FOREIGN KEY (`idParametro`) REFERENCES `parametro` (`idParametro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
