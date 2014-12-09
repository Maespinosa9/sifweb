-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2014 a las 08:03:51
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

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
  `observacion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_abono`),
  KEY `factura_id` (`orden_id`),
  KEY `usuario_id` (`usuario_id`)
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
  `observacion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_abono`),
  KEY `factura_id` (`factura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE IF NOT EXISTS `caja` (
  `id_caja` int(11) NOT NULL AUTO_INCREMENT,
  `base` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `venta` decimal(10,2) NOT NULL,
  `gasto` decimal(10,2) NOT NULL,
  `observacion` varchar(250) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id_caja`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE IF NOT EXISTS `categoria_producto` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_categoria`)
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
  `e_mail` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_unitario` double DEFAULT NULL,
  `factura_id` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `producto_id` (`producto_id`),
  KEY `factura_id` (`factura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_compra`
--

CREATE TABLE IF NOT EXISTS `det_compra` (
  `id_deta_compra` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `orden_id` int(11) NOT NULL,
  PRIMARY KEY (`id_deta_compra`),
  KEY `producto_id` (`producto_id`),
  KEY `orden_id` (`orden_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `det_compra`
--

INSERT INTO `det_compra` (`id_deta_compra`, `producto_id`, `cantidad`, `valor_unitario`, `orden_id`) VALUES
(1, 2, 2, '300.00', 8),
(2, 2, 3, '5000.00', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fac_venta`
--

CREATE TABLE IF NOT EXISTS `fac_venta` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `iva` decimal(10,2) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `observacion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `cliente_id` (`cliente_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `fac_venta`
--

INSERT INTO `fac_venta` (`id_factura`, `fecha`, `subtotal`, `total`, `iva`, `cliente_id`, `estado`, `descuento`, `usuario_id`, `observacion`) VALUES
(15, '2014-12-09 06:52:15', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(16, '2014-12-09 06:59:52', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(17, '2014-12-09 07:00:28', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(18, '2014-12-09 07:06:11', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(19, '2014-12-09 01:07:49', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(21, '2014-12-09 01:24:45', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(22, '2014-12-09 01:26:15', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(23, '2014-12-09 01:27:10', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(24, '2014-12-09 01:41:00', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(25, '2014-12-09 01:44:22', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(26, '2014-12-09 01:44:58', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(27, '2014-12-09 01:48:56', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(28, '2014-12-09 01:49:52', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(29, '2014-12-09 01:50:08', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(30, '2014-12-09 01:51:15', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(31, '2014-12-09 01:51:29', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(32, '2014-12-09 01:52:51', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(33, '2014-12-09 01:53:23', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(34, '2014-12-09 01:53:35', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(35, '2014-12-09 01:53:55', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(36, '2014-12-09 01:54:08', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(37, '2014-12-09 01:54:33', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(38, '2014-12-09 01:54:49', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(39, '2014-12-09 01:55:06', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0'),
(40, '2014-12-09 01:55:33', '0.00', '0.00', '0.00', NULL, 1, '0.00', 123456, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `entrada` tinyint(1) NOT NULL,
  `observacion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_inventario`),
  KEY `producto_id` (`producto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `producto_id`, `fecha`, `cantidad`, `entrada`, `observacion`) VALUES
(1, 3, '2014-12-10', 3, 1, 'nada'),
(2, 3, '2014-12-02', 3, 1, 'nada'),
(3, 2, '2014-12-16', 5, 1, 'nose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
  `id_lote` int(11) NOT NULL AUTO_INCREMENT,
  `vencimiento` date NOT NULL,
  `dias` tinyint(4) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `observacion` varchar(250) NOT NULL,
  `producto_id` int(11) NOT NULL,
  PRIMARY KEY (`id_lote`),
  KEY `producto_id` (`producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compra`
--

CREATE TABLE IF NOT EXISTS `orden_compra` (
  `id_orden` int(11) NOT NULL AUTO_INCREMENT,
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
  `nit_id` int(11) NOT NULL,
  PRIMARY KEY (`id_orden`),
  KEY `usuario_id` (`usuario_id`),
  KEY `nit_id` (`nit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `orden_compra`
--

INSERT INTO `orden_compra` (`id_orden`, `fecha_factura`, `vencimiento`, `factura`, `subtotal`, `iva`, `pagado`, `usuario_id`, `descuento`, `total`, `observacion`, `vendedor`, `ajuste`, `nit_id`) VALUES
(2, '2014-11-24', '2014-11-25', '56789', '10000.00', '15.00', 1, 123456, '2.00', '8000.00', 'segunda factura ', 'Michael Espinosa', '0.00', 123434),
(7, '2014-11-04', '2014-11-26', '9887766', '2000.00', '16.00', 1, 123456, '2.00', '4000.00', 'asdasdasd', 'Michael Espinosa', '0.00', 123434),
(8, '2014-11-12', '2014-11-20', '234234', '10000.00', '16.00', 0, 123456, '2.00', '8000.00', 'asdasdasd', 'Michael Espinosa', '0.00', 123434),
(9, '2014-11-12', '2014-11-20', '234234', '10000.00', '16.00', 1, 123456, '2.00', '8000.00', 'asdasdasd', 'Michael Espinosa', '0.00', 123434),
(10, '2014-12-17', '2014-12-03', '3241', '54332222.00', '123.00', 0, 123456, '2.00', '3243242.00', 'adsfafadfsaf', 'cristian', '234324.00', 123434),
(11, '2014-12-03', '2014-12-16', '123', '4325234.00', '324324.00', 1, 123456, '10231.00', '3432.00', 'adadfsa', 'nose', '324324.00', 1014237285),
(12, '2014-12-16', '2014-12-03', '987', '342.00', '324324.00', 1, 123456, '34324.00', '3242.00', 'sdasd', 'sdfdasf', '324234.00', 1014237285),
(13, '2014-12-03', '2014-12-16', '12', '4325234.00', '324324.00', 1, 123456, '10231.00', '3432.00', 'adadfsa', 'nose', '324324.00', 1014237285),
(14, '2014-12-03', '2014-12-16', '1231412', '124124.00', '123123.00', 0, 123456, '21312312.00', '99999999.99', 'asdadfadsf', 'pepito', '355345.00', 1014237285);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE IF NOT EXISTS `pagina` (
  `idPagina` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPagina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina_perfil`
--

CREATE TABLE IF NOT EXISTS `pagina_perfil` (
  `idPagina_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `idPerfil` int(11) NOT NULL,
  `idPagina` int(11) NOT NULL,
  PRIMARY KEY (`idPagina_perfil`),
  KEY `idPerfil` (`idPerfil`),
  KEY `idPagina` (`idPagina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(300) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_pago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE IF NOT EXISTS `parametro` (
  `idParametro` int(11) NOT NULL AUTO_INCREMENT,
  `nomparametro` varchar(100) DEFAULT NULL,
  `parametro_fijo` int(1) NOT NULL,
  PRIMARY KEY (`idParametro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

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
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_perfil`)
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
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_barras` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio_venta` decimal(10,2) DEFAULT NULL,
  `impuesto` float NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `codigo_barras`, `descripcion`, `precio_venta`, `impuesto`, `categoria_id`) VALUES
(2, '1234567890', 'producto 1', '2000.00', 2, 1),
(3, '0987654321', 'producto 2', '10000.00', 5, 1);

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
  `contacto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_nit`)
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
  `administrador` varchar(50) NOT NULL,
  PRIMARY KEY (`id_nit`)
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
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `perfil_id` (`perfil_id`)
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
  `idValor` int(11) NOT NULL AUTO_INCREMENT,
  `nomvalor` varchar(100) DEFAULT NULL,
  `idParametro` int(11) NOT NULL,
  `valor_fijo` int(1) NOT NULL,
  PRIMARY KEY (`idValor`),
  KEY `idParametro` (`idParametro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `valor`
--

INSERT INTO `valor` (`idValor`, `nomvalor`, `idParametro`, `valor_fijo`) VALUES
(1, 'Cedula', 1, 0),
(2, 'Nit', 1, 0);

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
