-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2023 a las 21:44:11
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tortilleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajainicial`
--

CREATE TABLE `cajainicial` (
  `IdMonto` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `TotalMonto` varchar(255) NOT NULL,
  `FechaRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cajainicial`
--

INSERT INTO `cajainicial` (`IdMonto`, `IdUsuario`, `TotalMonto`, `FechaRegistro`) VALUES
(1, 6, '800', '2023-12-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catproductos`
--

CREATE TABLE `catproductos` (
  `IdTipoProducto` int(11) NOT NULL,
  `IdEstatusProducto` int(11) NOT NULL,
  `TipoProducto` varchar(255) NOT NULL,
  `PrecioKg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catproductos`
--

INSERT INTO `catproductos` (`IdTipoProducto`, `IdEstatusProducto`, `TipoProducto`, `PrecioKg`) VALUES
(1, 1, 'Tortilla Normal', '20'),
(2, 1, 'Tortilla Taquera', '17.50'),
(3, 1, 'Masa Cruda', '10'),
(4, 1, 'Tortilla de Nopal', '23.5'),
(5, 1, 'Tortilla Arina', '22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cattipousuarios`
--

CREATE TABLE `cattipousuarios` (
  `IdTipoUsuario` int(11) NOT NULL,
  `TipoUsuario` varchar(255) NOT NULL,
  `FechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cattipousuarios`
--

INSERT INTO `cattipousuarios` (`IdTipoUsuario`, `TipoUsuario`, `FechaRegistro`) VALUES
(1, 'Administrador', '2023-12-20 15:46:45'),
(2, 'Empleado', '2023-12-20 15:46:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cattipoventas`
--

CREATE TABLE `cattipoventas` (
  `IdTipoVenta` int(11) NOT NULL,
  `TipoVenta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cattipoventas`
--

INSERT INTO `cattipoventas` (`IdTipoVenta`, `TipoVenta`) VALUES
(1, 'Por monto fijo $'),
(2, 'Por Kg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `IdEstatusProducto` int(11) NOT NULL,
  `NombreCliente` varchar(255) NOT NULL,
  `NumCompras` varchar(255) NOT NULL,
  `FechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `IdEstatusProducto`, `NombreCliente`, `NumCompras`, `FechaRegistro`) VALUES
(1, 1, 'Eliseo Navarro', '', '2023-12-20 20:04:17'),
(2, 1, 'Jose Luis', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `IdNombreComercio` int(11) NOT NULL,
  `NombreComercio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`IdNombreComercio`, `NombreComercio`) VALUES
(1, 'El chuy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cortecaja`
--

CREATE TABLE `cortecaja` (
  `IdCorteCaja` int(11) NOT NULL,
  `TotalMonto` varchar(255) NOT NULL,
  `Ganancias` varchar(255) NOT NULL,
  `Efectivo` varchar(255) NOT NULL,
  `Variacion` varchar(255) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cortecaja`
--

INSERT INTO `cortecaja` (`IdCorteCaja`, `TotalMonto`, `Ganancias`, `Efectivo`, `Variacion`, `FechaRegistro`, `IdUsuario`) VALUES
(9, '800.00', '925.00', '2000.00', '275.00', '2023-12-27 17:07:46', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatusproductos`
--

CREATE TABLE `estatusproductos` (
  `IdEstatusProducto` int(11) NOT NULL,
  `EstatusProducto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatusproductos`
--

INSERT INTO `estatusproductos` (`IdEstatusProducto`, `EstatusProducto`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatusventas`
--

CREATE TABLE `estatusventas` (
  `IdEstatus` int(11) NOT NULL,
  `Estatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatusventas`
--

INSERT INTO `estatusventas` (`IdEstatus`, `Estatus`) VALUES
(1, 'Cerrada'),
(2, 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `IdPrecio` int(11) NOT NULL,
  `Costo_Kg` varchar(255) NOT NULL,
  `FechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `IdTipoUsuario` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Foto2` varchar(255) NOT NULL,
  `Foto3` varchar(255) NOT NULL,
  `FechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `IdTipoUsuario`, `username`, `password`, `Foto`, `Foto2`, `Foto3`, `FechaRegistro`) VALUES
(6, 1, 'Dnavarro', '581769e29974cfdfe2c534e69ee6bad4', '../images/marca-de-verificacion.png', '../../images/marca-de-verificacion.png', 'images/marca-de-verificacion.png', '2023-12-20 09:01:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IdVenta` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cantidad` varchar(255) NOT NULL,
  `IdEstatus` int(11) NOT NULL,
  `Costo` varchar(255) NOT NULL,
  `PagaCon` varchar(255) NOT NULL,
  `Cambio` varchar(255) NOT NULL,
  `IdTipoVenta` int(11) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `FechaVenta` date NOT NULL,
  `HoraVenta` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`IdVenta`, `IdUsuario`, `IdCliente`, `IdProducto`, `Cantidad`, `IdEstatus`, `Costo`, `PagaCon`, `Cambio`, `IdTipoVenta`, `FechaRegistro`, `FechaVenta`, `HoraVenta`) VALUES
(22, 6, 2, 1, '2.50', 1, '50.00', '100', '50.00', 1, '2023-12-27 17:06:27', '2023-12-27', '17:06:27'),
(23, 6, 2, 2, '50.00', 1, '875.00', '1000', '125.00', 2, '2023-12-27 17:07:03', '2023-12-27', '17:07:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajainicial`
--
ALTER TABLE `cajainicial`
  ADD PRIMARY KEY (`IdMonto`);

--
-- Indices de la tabla `catproductos`
--
ALTER TABLE `catproductos`
  ADD PRIMARY KEY (`IdTipoProducto`);

--
-- Indices de la tabla `cattipousuarios`
--
ALTER TABLE `cattipousuarios`
  ADD PRIMARY KEY (`IdTipoUsuario`);

--
-- Indices de la tabla `cattipoventas`
--
ALTER TABLE `cattipoventas`
  ADD PRIMARY KEY (`IdTipoVenta`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`IdNombreComercio`);

--
-- Indices de la tabla `cortecaja`
--
ALTER TABLE `cortecaja`
  ADD PRIMARY KEY (`IdCorteCaja`);

--
-- Indices de la tabla `estatusproductos`
--
ALTER TABLE `estatusproductos`
  ADD PRIMARY KEY (`IdEstatusProducto`);

--
-- Indices de la tabla `estatusventas`
--
ALTER TABLE `estatusventas`
  ADD PRIMARY KEY (`IdEstatus`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`IdPrecio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cajainicial`
--
ALTER TABLE `cajainicial`
  MODIFY `IdMonto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `catproductos`
--
ALTER TABLE `catproductos`
  MODIFY `IdTipoProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cattipousuarios`
--
ALTER TABLE `cattipousuarios`
  MODIFY `IdTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cattipoventas`
--
ALTER TABLE `cattipoventas`
  MODIFY `IdTipoVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `IdNombreComercio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cortecaja`
--
ALTER TABLE `cortecaja`
  MODIFY `IdCorteCaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estatusproductos`
--
ALTER TABLE `estatusproductos`
  MODIFY `IdEstatusProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estatusventas`
--
ALTER TABLE `estatusventas`
  MODIFY `IdEstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `IdPrecio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
