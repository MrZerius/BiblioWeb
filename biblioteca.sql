-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2020 at 10:50 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `material_bibliografico`
--

CREATE TABLE `material_bibliografico` (
  `id` int(11) NOT NULL,
  `tipo` enum('CD','Libro','Investigación') NOT NULL DEFAULT 'Libro',
  `copias` int(11) NOT NULL DEFAULT '1',
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `descripcion` varchar(50) NOT NULL DEFAULT 'Sin Descripción',
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_bibliografico`
--

INSERT INTO `material_bibliografico` (`id`, `tipo`, `copias`, `nombre`, `autor`, `descripcion`, `foto`) VALUES
(8, 'Libro', 1, 'El Alquimista', 'Paulo Coelho', 'Desarrollo y Crecimiento personal', 'Alquimista.jpg'),
(9, 'Libro', 1, 'chiguinadas', 'romero', 'hrloow', 'maria.jpg'),
(10, 'Libro', 1, 'Como robar', 'El Brayan', 'La vida y obra de un drogadicto y ladrón.', 'brayan.jpg'),
(12, 'Libro', 3, 'Prueba prestamo', 'Prueba', 'asdas dasd asd asd         ', '../Publico/img/Admin/libros/20_10_22_22_21_10_descarga.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prestamo`
--

CREATE TABLE `prestamo` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_material_bibliografico` int(11) NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_fin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prolongar`
--

CREATE TABLE `prolongar` (
  `id` int(11) NOT NULL,
  `id_prestamo` int(11) NOT NULL,
  `fecha_fin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `motivo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_material_bibliografico` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estadoPrestamo` enum('En biblioteca','Entregado','Recibido','') NOT NULL,
  `estado` enum('Aprobado','Rechazado','Pendiente','Completado') NOT NULL DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solicitud`
--

INSERT INTO `solicitud` (`id`, `id_usuario`, `id_material_bibliografico`, `fecha_solicitud`, `fecha_inicio`, `fecha_fin`, `estadoPrestamo`, `estado`) VALUES
(1, 23, 12, '2020-10-22', '2020-10-22', '2020-10-29', 'Recibido', 'Completado'),
(2, 23, 12, '2020-10-29', NULL, NULL, 'En biblioteca', 'Rechazado');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo` enum('Bibliotecario','Alumno') NOT NULL DEFAULT 'Alumno',
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `nombres`, `apellidos`, `documento`, `email`, `password`) VALUES
(23, 'Bibliotecario', 'Administrador', 'admin', '111111', 'administrador@correo.com', '$2y$10$GPb6AqF8.tXgnBclusoBIebXGit6e.KBeE/ctAoUK4zMpE82QCbHa'),
(24, 'Alumno', 'Edwin', 'Lopez', '1212121', 'edwin.lopezb.1297@cotecnova.edu.co', '$2y$10$.fXW1Ept8bN6ABLwd1EIx.OgjN.zkSEuF0ubrsKKdhQQAaqpLGhIe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `material_bibliografico`
--
ALTER TABLE `material_bibliografico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_material_bibliografico` (`id_material_bibliografico`);

--
-- Indexes for table `prolongar`
--
ALTER TABLE `prolongar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prestamo` (`id_prestamo`);

--
-- Indexes for table `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuario_2` (`id_usuario`),
  ADD KEY `id_material_bibliografico` (`id_material_bibliografico`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento` (`documento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `material_bibliografico`
--
ALTER TABLE `material_bibliografico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prolongar`
--
ALTER TABLE `prolongar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`id_material_bibliografico`) REFERENCES `material_bibliografico` (`id`);

--
-- Constraints for table `prolongar`
--
ALTER TABLE `prolongar`
  ADD CONSTRAINT `prolongar_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id`);

--
-- Constraints for table `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`id_material_bibliografico`) REFERENCES `material_bibliografico` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
