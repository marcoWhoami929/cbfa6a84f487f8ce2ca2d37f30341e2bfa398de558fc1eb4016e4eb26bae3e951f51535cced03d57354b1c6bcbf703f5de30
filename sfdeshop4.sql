-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2020 a las 09:30:49
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sfdeshop4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `email`, `foto`, `password`, `perfil`, `estado`, `fecha`) VALUES
(1, 'Administrador General', 'admin@sfd.com.mx', 'vistas/img/perfiles/276.png', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'administrador', 1, '2018-08-07 18:02:42'),
(2, 'Usuario Editor', 'editor@sfd.com.mx', 'vistas/img/perfiles/724.png', '$2a$07$asxx54ahjppf45sd87a5auBnK0T8g/TaNYrkZQmRmlyohJLox8X9S', 'editor', 1, '2018-08-10 19:17:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `img` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `ruta`, `tipo`, `img`, `estado`, `fecha`) VALUES
(2, 'pintura-automotriz', 'categorias', 'vistas/img/banner/automotriz-oficial.png', 1, '2018-08-06 14:42:52'),
(3, 'pintura-arquitectonica', 'categorias', 'vistas/img/banner/arquitectonica-oficial.png', 1, '2018-08-03 17:46:31'),
(4, 'pintura-industrial', 'categorias', 'vistas/img/banner/industrial-oficial.png', 1, '2018-08-03 17:46:35'),
(5, 'equipos-de-aplicacion', 'categorias', 'vistas/img/banner/aplicacion-oficial.png', 1, '2018-08-03 17:46:38'),
(6, 'estetica-automotriz', 'categorias', 'vistas/img/banner/estetica-oficial.png', 1, '2018-08-03 17:46:41'),
(7, 'abrasivos', 'categorias', 'vistas/img/banner/abrasivos-oficial.png', 1, '2018-08-03 17:46:43'),
(8, 'complementos', 'categorias', 'vistas/img/banner/complementos-oficial.png', 1, '2018-08-06 14:42:39'),
(9, 'base-color', 'subcategorias', 'vistas/img/banner/base-color.jpg', 1, '2018-09-26 18:33:43'),
(10, 'esmaltes', 'subcategorias', 'vistas/img/banner/pintura-automotriz.jpg.jpg', 1, '2018-09-26 18:34:00'),
(11, 'poliuretanos', 'subcategorias', 'vistas/img/banner/pintura-automotriz.jpg.jpg', 1, '2018-09-26 18:34:13'),
(12, 'primarios-automotriz', 'subcategorias', 'vistas/img/banner/pintura-automotriz.jpg.jpg', 1, '2018-09-26 18:34:37'),
(13, 'solventes', 'subcategorias', 'vistas/img/banner/pintura-automotriz.jpg.jpg', 1, '2018-09-26 18:34:52'),
(14, 'vinilicas', 'subcategorias', 'vistas/img/banner/pintura-arquitectonica.jpg.jpg', 1, '2018-09-26 18:40:34'),
(15, 'impermeabilizantes', 'subcategorias', 'vistas/img/banner/pintura-arquitectonica.jpg.jpg', 1, '2018-09-26 18:40:51'),
(16, 'selladores', 'subcategorias', 'vistas/img/banner/pintura-arquitectonica.jpg.jpg', 1, '2018-09-26 18:41:02'),
(17, 'primarios-industriales', 'subcategorias', 'vistas/img/banner/pintura-industrial.jpg.jpg', 1, '2018-09-26 18:41:30'),
(18, 'esmaltes-industriales', 'subcategorias', 'vistas/img/banner/pintura-industrial.jpg.jpg', 1, '2018-09-26 18:41:45'),
(19, 'epoxicas', 'subcategorias', 'vistas/img/banner/pintura-industrial.jpg.jpg', 1, '2018-09-26 18:41:56'),
(20, 'poliuretanos-industriales', 'subcategorias', 'vistas/img/banner/pintura-industrial.jpg.jpg', 1, '2018-09-26 18:42:08'),
(21, 'pistolas', 'subcategorias', 'vistas/img/banner/equipos-aplicacion.jpg.jpg', 1, '2018-09-26 18:42:52'),
(22, 'refacciones', 'subcategorias', 'vistas/img/banner/equipos-aplicacion.jpg.jpg', 1, '2018-09-26 18:43:05'),
(23, 'proteccion-personal', 'subcategorias', 'vistas/img/banner/equipos-aplicacion.jpg.jpg', 1, '2018-09-26 18:43:23'),
(24, 'pulido', 'subcategorias', 'vistas/img/banner/estetica-automotriz.jpg.jpg', 1, '2018-09-26 18:43:38'),
(25, 'adhesivo', 'subcategorias', 'vistas/img/banner/estetica-automotriz.jpg.jpg', 1, '2018-09-26 18:43:52'),
(26, 'reparacion', 'subcategorias', 'vistas/img/banner/estetica-automotriz.jpg.jpg', 1, '2018-09-26 18:44:06'),
(27, 'partes-plasticas', 'subcategorias', 'vistas/img/banner/estetica-automotriz.jpg.jpg', 1, '2018-09-26 18:44:15'),
(28, 'lijas', 'subcategorias', 'vistas/img/banner/abrasivos.jpg.jpg', 1, '2018-09-26 18:44:33'),
(29, 'tiras', 'subcategorias', 'vistas/img/banner/abrasivos.jpg.jpg', 1, '2018-09-26 18:44:43'),
(30, 'discos', 'subcategorias', 'vistas/img/banner/abrasivos.jpg.jpg', 1, '2018-09-26 18:45:01'),
(31, 'bandas', 'subcategorias', 'vistas/img/banner/abrasivos.jpg.jpg', 1, '2018-09-26 18:45:22'),
(32, 'estopas', 'subcategorias', 'vistas/img/banner/complementos.jpg.jpg', 1, '2018-09-26 18:45:40'),
(33, 'brochas', 'subcategorias', 'vistas/img/banner/complementos.jpg.jpg', 1, '2018-09-26 18:46:54'),
(34, 'rodillos', 'subcategorias', 'vistas/img/banner/complementos.jpg.jpg', 1, '2018-09-26 18:47:02'),
(35, 'varios', 'subcategorias', 'vistas/img/banner/complementos.jpg.jpg', 1, '2018-09-26 18:47:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabeceras`
--

CREATE TABLE `cabeceras` (
  `id` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `palabrasClaves` text COLLATE utf8_spanish_ci NOT NULL,
  `portada` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cabeceras`
--

INSERT INTO `cabeceras` (`id`, `ruta`, `titulo`, `descripcion`, `palabrasClaves`, `portada`, `fecha`) VALUES
(1, 'pintura-automotriz', 'PINTURA AUTOMOTRIZ', 'pintura automotriz', 'pintura automotriz', 'vistas/img/cabeceras/pintura-automotriz.jpg', '2018-09-26 18:21:56'),
(2, 'pintura-arquitectonica', 'PINTURA ARQUITECTÓNICA', 'pintura arquitectónica', 'pintura arquitectónica', 'vistas/img/cabeceras/pintura-arquitectonica.jpg', '2018-09-26 18:22:51'),
(3, 'pintura-industrial', 'PINTURA INDUSTRIAL', 'pintura industrial', 'pintura industrial', 'vistas/img/cabeceras/pintura-industrial.jpg', '2018-09-26 18:22:40'),
(4, 'equipos-de-aplicacion', 'EQUIPOS DE APLICACIÓN', 'equipos de aplicación', 'equipos de aplicación', 'vistas/img/cabeceras/equipos-de-aplicacion.jpg', '2018-09-26 18:22:31'),
(5, 'estetica-automotriz', 'ESTÉTICA AUTOMOTRIZ', 'estética automotriz', 'estética automotriz', 'vistas/img/cabeceras/estetica-automotriz.jpg', '2018-09-26 18:22:23'),
(6, 'abrasivos', 'ABRASIVOS', 'abrasivos', 'abrasivos', 'vistas/img/cabeceras/abrasivos.jpg', '2018-09-26 18:22:15'),
(7, 'complementos', 'COMPLEMENTOS', 'complementos', 'complementos', 'vistas/img/cabeceras/complementos.jpg', '2018-09-26 18:22:05'),
(8, 'base-color', 'Base Color', 'base color', 'base color', 'vistas/img/cabeceras/base-color.jpg', '2018-09-26 18:31:29'),
(9, 'esmaltes', 'Esmaltes', 'esmaltes', 'esmaltes', 'vistas/img/cabeceras/esmaltes.jpg', '2018-09-26 18:31:20'),
(10, 'poliuretanos', 'Poliuretanos', 'poliuretanos', 'poliuretanos', 'vistas/img/cabeceras/poliuretanos.jpg', '2018-09-26 18:31:11'),
(11, 'primarios-automotriz', 'Primarios Automotriz', 'primarios automotriz', 'primarios automotriz', 'vistas/img/cabeceras/primarios-automotriz.jpg', '2018-09-26 18:31:02'),
(12, 'vinilicas', 'Vinílicas', 'vinílicas', 'vinílicas', 'vistas/img/cabeceras/vinilicas.jpg', '2018-09-26 18:30:45'),
(13, 'impermeabilizantes', 'Impermeabilizantes', 'impermeabilizantes', 'impermeabilizantes', 'vistas/img/cabeceras/impermeabilizantes.jpg', '2018-09-26 18:30:35'),
(14, 'selladores', 'Selladores', 'selladores', 'selladores', 'vistas/img/cabeceras/selladores.jpg', '2018-09-26 18:30:24'),
(15, 'primarios-industriales', 'Primarios Industriales', 'primarios industriales', 'primarios industriales', 'vistas/img/cabeceras/primarios-industriales.jpg', '2018-09-26 18:27:27'),
(16, 'esmaltes-industriales', 'Esmaltes Industriales', 'esmaltes industriales', 'esmaltes industriales', 'vistas/img/cabeceras/esmaltes-industriales.jpg', '2018-09-26 18:27:19'),
(17, 'epoxicas', 'Epóxicas', 'epóxicas', 'epóxicas', 'vistas/img/cabeceras/epoxicas.jpg', '2018-09-26 18:27:08'),
(18, 'poliuretanos-industriales', 'Poliuretanos Industriales', 'poliuretanos industriales', 'poliuretanos industriales', 'vistas/img/cabeceras/poliuretanos-industriales.jpg', '2018-09-26 18:26:57'),
(19, 'pistolas', 'Pistolas', 'pistolas', 'pistolas', 'vistas/img/cabeceras/pistolas.jpg', '2018-09-26 18:26:45'),
(20, 'refacciones', 'Refacciones', 'refacciones', 'refacciones', 'vistas/img/cabeceras/refacciones.jpg', '2018-09-26 18:26:35'),
(21, 'pulido', 'Pulido', 'pulido', 'pulido', 'vistas/img/cabeceras/pulido.jpg', '2018-09-26 18:26:23'),
(22, 'adhesivo', 'Adhesivo', 'adhesivo', 'adhesivo', 'vistas/img/cabeceras/adhesivo.jpg', '2018-09-26 18:26:12'),
(23, 'reparacion', 'Reparación', 'reparación', 'reparación', 'vistas/img/cabeceras/reparacion.jpg', '2018-09-26 18:25:44'),
(24, 'partes-plasticas', 'Partes Plásticas', 'partes plásticas', 'partes plásticas', 'vistas/img/cabeceras/partes-plasticas.jpg', '2018-09-26 18:25:34'),
(25, 'lijas', 'Lijas', 'lijas', 'lijas', 'vistas/img/cabeceras/lijas.jpg', '2018-09-26 18:25:21'),
(26, 'tiras', 'Tiras', 'tiras', 'tiras', 'vistas/img/cabeceras/tiras.jpg', '2018-09-26 18:25:13'),
(27, 'discos', 'Discos', 'discos', 'discos', 'vistas/img/cabeceras/discos.jpg', '2018-09-26 18:25:05'),
(28, 'bandas', 'Bandas', 'bandas', 'bandas', 'vistas/img/cabeceras/bandas.jpg', '2018-09-26 18:24:56'),
(29, 'estopas', 'Estopas', 'estopas', 'estopas', 'vistas/img/cabeceras/estopas.jpg', '2018-09-26 18:24:47'),
(30, 'brochas', 'Brochas', 'brochas', 'brochas', 'vistas/img/cabeceras/brochas.jpg', '2018-09-26 18:24:39'),
(31, 'rodillos', 'Rodillos', 'rodillos', 'rodillos', 'vistas/img/cabeceras/rodillos.jpg', '2018-09-26 18:24:23'),
(32, 'varios', 'Varios', 'varios', 'varios', 'vistas/img/cabeceras/varios.jpg', '2018-09-26 18:24:17'),
(33, 'proteccion-personal', 'Protección Personal', 'protección personal', 'protección personal', 'vistas/img/cabeceras/proteccion-personal.jpg', '2018-09-26 18:23:06'),
(34, 'solventes', 'Solventes', 'solventes', 'solventes', 'vistas/img/cabeceras/solventes.jpg', '2018-09-26 18:21:31'),
(35, 'pintura-para-trafico-tipo-1-amarillo', 'Pintura Para Tráfico Tipo 1 Amarillo', 'Muy buena resistencia a la abrasión, secado rápido y excelente poder cubriente es ideal para pintar señalamientos sobre asfalto.', 'Pintura Para Tráfico Tipo 1 Amarillo', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 15:31:42'),
(36, 'pistola-lvlp', 'Pistola LVLP', 'Pistola de bajo volumen baja presión, el funcionamiento de este equipo la hace el complemento ideal para compresores de entrega de aire bajas, pero con la característica de la transferencia de material alta. Tiene tres controles: de material, de abanico y aire, tiene como estándar una boquilla de 1.3, pero puede cambiarse por una de 1.5 o 2.0 mm.', 'Pistola LVLP', 'vistas/img/cabeceras/default/default.jpg', '2018-09-28 22:42:59'),
(37, 'pistola-para-recubrimiento-de-auto-body', 'Pistola Para Recubrimiento De Auto Body', 'La pistola para la aplicación de body, cuenta con el diseño adecuado para adaptarse al bote de este material, con esta pistola el tiempo de aplicación de este material se reduce notablemente. Es una pistola de tipo de succión. Debido a la consistencia del material la pistola no cuenta con ningún tipo de regulador.', 'Pistola Para Recubrimiento De Auto Body', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 15:42:44'),
(38, 'pistola-doble-abanico', 'Pistola Doble Abanico', 'Pistola de baja presión diseñada para trabajar con compresores de potencia pequeña e incluso con compresores sin tanque. Son las pistolas más utilizadas por los profesionales y los amateurs, debido a su desempeño y costo. Con esta pistola se puede aplicar un gran gama de materiales como lo son: esmaltes, lacas, barnices y selladores de baja viscosidad. Ya viene incluida la boquilla de punto, empaque y filtro.', 'Pistola Doble Abanico', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 15:44:51'),
(39, 'solvente-zaak-626-para-epoxico', 'Solvente Zaak 626 Para Epóxico', 'Es un recubrimiento de uso industrial y comercial de gran resistencia mecánica, química, abrasión para pisos y superficies metálicas.', 'Solvente Zaak 626 Para Epóxico', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 15:52:42'),
(40, 'catalizador-epoxico-hd1', 'Catalizador Epóxico HD1', 'Es un recubrimiento de uso industrial y comercial de gran resistencia mecánica, química, abrasión para pisos y superficies metálicas.', 'Catalizador Epóxico HD1', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 15:56:27'),
(41, 'epoxico-hd1-as-blanco', 'Epóxico HD1 As Blanco', 'Es un recubrimiento de uso industrial y comercial de gran resistencia mecánica, química, abrasión para pisos y superficies metálicas.', 'Epóxico HD1 As Blanco', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 16:04:46'),
(42, 'eco-galer-blanco', 'Eco Galer Blanco', 'Es un esmalte base agua de nueva generación elaborado a base de resinas acrílicas soluble en agua de larga duración, excelente lavabilidad así como alto poder cubrirte y sin olor a disolventes.', 'Eco Galer Blanco', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 16:07:45'),
(43, 'artesano-500-blanco', 'Artesano 500 Blanco', 'Es una pintura para uso arquitectónico, proporciona buen desempeño en superficies de madera, muros de yeso ladrillo o block.', 'Artesano 500 Blanco', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 16:16:43'),
(44, 'cosmo-700-blanco', 'Cosmo 700 Blanco', 'Es una pintura para uso arquitectónico, resistente al desgaste en interiores y exteriores.', 'Cosmo 700 Blanco', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 16:20:39'),
(45, 'cosmo-plus-blanco', 'Cosmo Plus Blanco', 'Es una pintura para uso arquitectónico de gran rendimiento. Muy resistente al desgaste en interiores y exteriores.', 'Cosmo Plus Blanco', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 16:23:46'),
(46, 'ultra-body-sw-04-1500', 'Ultra Body Sw-04 1500', 'Masilla de poliester soft de 2 componentes en color Blanco. Aplicable sobre lámina desnuda, lámina galvanizada, aluminio, fibra de vidrio, plástico, etc.', 'Ultra Body Sw-04 1500', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 16:31:01'),
(47, 'kit-rts-transparente-eco-sw', 'Kit Rts Transparente ECO-SW', 'KIT RTS Transparente ECO-SW *Catalice y Aplique está conformado por el Transparente y Endurecedor RTS ECO-SW que, al ser mezclados se utilizan como capa Transparente en sistemas Dicapa y Tricapa en el Repintado de General o de Secciones de vehículos sobre capas de color de Esmaltes catalizados, Lacas y Bases Color de la marca Sherwin Williams Automotive. El KIT RTS Transparente ECO-SW *Catalice y Aplique está especialmente dirigido a zonas con una temperatura por arriba de 30 grados. Por su calidad en brillo, distinción de imagen y resistencia a la intemperie, el acabado final así obtenido es similar al original. Al utilizar este Kit, se simplifica la labor del pintor y se aumenta la productividad en el Repintado ya que, se puede aplicar sobre distintas capas de color (Esmaltes catalizados, Lacas y Bases Color), se reduce el tiempo de preparación del material para aplicar (ya que no se requiere ningún Reductor), si se requiere preparar todo el contenido de los 2 envases (946 ml), el Endurecedor se puede vaciar directamente al envase del Transparente para allí mismo agitar y aplicar inmediatamente y, si no requiere preparar todo el contenido de los envases, la relación de mezcla es simple y sencilla de recordar (5 partes en volumen del Transparente. por 1 parte en volumen).', 'Kit Rts Transparente ECO-SW', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 16:36:30'),
(48, 'xclo-primer-universal-negro', 'Xclo Primer Universal Negro', 'El XCLO Primer Universal es un producto de muy buena calidad para Repintado Automotriz, se pueden utilizar en repintado total o reparaciones; combina las principales ventajas del Primer Piroxilina y el Primer Sintético, su secado es bastante rápido, puede lijarse en seco y recubrirse de 45 minutos a una hora después de haber sido aplicado a una temperatura de 25 grados, tienen buena capacidad de relleno y muy buena adherencia sobre metales ferrosos, excelente resistencia a la corrosión, proporcionan muy buena retención de brillo y distinción de imagen (DOI) en el acabado.', 'Xclo Primer Universal Negro', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 16:40:01'),
(49, 'xclo-primer-universal-blanco', 'Xclo Primer Universal Blanco', 'El XCLO Primer Universal es un producto de muy buena calidad para Repintado Automotriz, se pueden utilizar en repintado total o reparaciones; combina las principales ventajas del Primer Piroxilina y el Primer Sintético, su secado es bastante rápido, puede lijarse en seco y recubrirse de 45 minutos a una hora después de haber sido aplicado a una temperatura de 25 grados, tienen buena capacidad de relleno y muy buena adherencia sobre metales ferrosos, excelente resistencia a la corrosión, proporcionan muy buena retención de brillo y distinción de imagen (DOI) en el acabado.', 'Xclo Primer Universal Blanco', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 16:44:32'),
(50, 'xclo-primer-universal-gris', 'Xclo Primer Universal Gris', 'El XCLO Primer Universal es un producto de muy buena calidad para Repintado Automotriz, se pueden utilizar en repintado total o reparaciones; combina las principales ventajas del Primer Piroxilina y el Primer Sintético, su secado es bastante rápido, puede lijarse en seco y recubrirse de 45 minutos a una hora después de haber sido aplicado a una temperatura de 25 grados, tienen buena capacidad de relleno y muy buena adherencia sobre metales ferrosos, excelente resistencia a la corrosión, proporcionan muy buena retención de brillo y distinción de imagen (DOI) en el acabado.', 'Xclo Primer Universal Gris', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 16:46:44'),
(51, 'sherprimer-ng-gris-claro', 'Sherprimer Ng Gris Claro', 'Es un primario de dos componentes, formulado con resinas acrílicas y poliéster de secado por catalización. Está diseñado para usarse en sistemas de alta tecnología, con alta retención de brillo, alta capacidad de relleno y excelente adherencia sobre acero al carbón, lámina galvanizada y fibra de vidrio.Se recomienda su uso en el repintado total o parcíal de automóviles. Está especialmente formulado para ser recubierto con las líneas de Base Color así como cualquiera de los acabados de Sherwin Willians Automotive.', 'Sherprimer Ng Gris Claro', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 16:51:56'),
(52, 'endurecedor-universal', 'Endurecedor universal', 'El Endurecedor Universal 31791 está echo a base de ioscinatos. Manténgase bien tapado ya que este producto es afectado por la humedad.No se use otro reductor,ya que podría perjudicar la mezcla.No prepare más material del que va a usar,ya que el tiempo de vida útil de la mezcla es de 3 a 5 horas.No regrese material preparado al bote original.En la limpieza del equipo,se recomienda usar Thinner E 32100. No deje material mezclado en el equipo.', 'Endurecedor universal', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 16:56:49'),
(53, 'endurecedor-para-sherprimer', 'Endurecedor Para Sherprimer', 'Es un producto de calidad formulado a base de Resinas de Poli-isocianato para utilizarse con el Primario de Relleno SherPrimer Ng, su uso proporciona alta resistencia química, dureza, durabilidad del primario y puede mejorar el tiempo de secado, no afecta el brillo, nivelación, ni la tonalidad, se debe de emplear siempre en las proporciones que se  indica ya que de lo  contrario puede afectar negativamente las propiedades del primario.', 'Endurecedor Para Sherprimer', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:00:35'),
(54, 'reductor-universal-tux-2', 'Reductor Universal Tux 2', 'La línea TUX son thinners universales de la más alta calidad, proporcionan el más alto brillo y excelente nivelación. Los thinne TUX han sido formulados especialmente para diluir primers y recubrientes como lacas acrílicas, lacas de nitro, bases color acrílicas y poliester, esmaltes económicos. Tux 2 Clima Fresco 16 grados a 27 grados centigrados.', 'Reductor Universal Tux 2', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:04:19'),
(55, 'reductor-acrilico-end-normal', 'Reductor Acrílico END Normal', 'Son solventes formulados especialmente para diluir productos que serán mezclados con el Endurecedor Universal, Multiusos o con el Endurecedor para Sher Truck Plus, proporcionando el más alto brillo y excelente nivelación. Estos reductores aseguran una reacción de catalización al 100 por ciento ya que no contienen componentes que reaccionen con el endurecedor, haciendo que los productos con los que se utilizan alcancen su máxima dureza, resistencia química, durabilidad y una óptima adherencia sobre los sustratos recomendados en cada caso.', 'Reductor Acrílico END Normal', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:08:50'),
(56, 'xclo-body-filler', 'Xclo Body Filler', 'Masilla de secado por catalización, para reparaciones de hojalateria en la industria automotriz y en cualquier otra donde se requiera resanar y o nivelar imperfecciones de superficies metálicas de manera rápida y fácil. Suavidad al lijar y muy poca pegajosidad no sangra o amarillea. SUSTRATOS RECOMENDADOS: metales ferrosos debidamente acondicionados, fibra de vidrio, madera y algunos plásticos rígidos. TIEMPO DE GELADO: 10 a 15 minutos. Tener cuidado en tiempo de calor por el secado tan rápido. MEZCLA: 60 a 1. 2 por ciento de Catalizador de lo que vamos a utilizar de Rellenador.', 'Xclo Body Filler', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:12:32'),
(57, 'plaster-de-piroxilina-auto-gris-claro', 'Plaster de Piroxilina Auto Gris Claro', 'El plaster de Piroxilina es un producto de secado al aire de excelente calidad listo para usarse en el repintado automotriz, desarrollado específicamente para corregir pequeñas irregularidades de la capa de primario como porosidades, rayas de lija número 150 o menores, etc, sus principales características son su fácil aplicación, secado rápido, suave al lijar, excelente capacidad de relleno y gran adherencia sobre todos los primarios.', 'Plaster de Piroxilina Auto Gris Claro', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:17:03'),
(58, 'imperial-wetordry-9x11-pul-p800', 'Imperial Wetordry 9x11 pul P800', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', 'Imperial Wetordry 9x11 pul P800', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:24:21'),
(59, 'imperial-wetordry-9x11-pul-p600', 'Imperial Wetordry 9x11 pul P600', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', 'Imperial Wetordry 9x11 pul P600', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:27:52'),
(60, 'imperial-wetordry-9x11-pul-p400', 'Imperial Wetordry 9x11 pul P400', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', 'Imperial Wetordry 9x11 pul P400', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:35:22'),
(61, 'imperial-wetordry-9x11-pul-p320', 'Imperial Wetordry 9x11 pul P320', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', 'Imperial Wetordry 9x11 pul P320', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:31:32'),
(62, 'imperial-wetordry-9x11-pul-p220', 'Imperial Wetordry 9x11 pul P220', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', 'Imperial Wetordry 9x11 pul P220', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:39:14'),
(63, 'imperial-wetordry-9x11-pul-p2000', 'Imperial Wetordry 9x11 pul P2000', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', 'Imperial Wetordry 9x11 pul P2000', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:42:51'),
(64, 'imperial-wetordry-9x11-pul-p1500', 'Imperial Wetordry 9x11 pul P1500', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', 'Imperial Wetordry 9x11 pul P1500', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:45:24'),
(65, 'imperial-wetordry-9x11-pul-p1200', 'Imperial Wetordry 9x11 pul P1200', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', 'Imperial Wetordry 9x11 pul P1200', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:46:49'),
(66, 'imperial-wetordry-9x11-pul-p1000', 'Imperial Wetordry 9x11 pul P1000', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', 'Imperial Wetordry 9x11 pul P1000', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 17:48:19'),
(67, 'retenedor-para-filtro-5n11-y-5p71', 'Retenedor Para Filtro 5N11 y 5P71', 'El retenedor del filtro 501, componente del sistema de protección respiratoria, mantiene en su lugar los filtros de partículas 5N11 y 5P71/07194 (AAD).', 'Retenedor Para Filtro 5N11 y 5P71', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 18:03:44'),
(68, 'respirador-media-cara-tamano-mediano', 'Respirador Media Cara Tamaño Mediano', 'El respirador tipo semimáscara es una alternativa de calidad a bajo costo si lo que requieres es un equipo seguro y de calidad. Este se utiliza en combinación con dos filtros livianos que se acoplan a la pieza facial mediante un ajuste tipo bayoneta. Este respirador es muy efectivo contra una gran variedad de gases, vapores y partículas dañinas y esta elaborado con un diseño liviano en material de elastómero termoplástico.', 'Respirador Media Cara Tamaño Mediano', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 18:06:11'),
(69, 'filtro-para-particulas-base-agua', 'Filtro Para Partículas Base Agua', 'Aprobado por NIOSH para ambientes que contengan ciertas partículas no aceitosas. Aplicación: Pintura con spray, petroquímica y manufactura química, así como pulverización pesticida.', 'Filtro Para Partículas Pinturas Base Agua', 'vistas/img/cabeceras/default/default.jpg', '2018-10-05 20:07:38'),
(70, 'cartucho-para-vapores-organicos', 'Cartucho Para Vapores Orgánicos', 'Brinda protección respiratoria contra ciertos vapores orgánicos y algunos alcoholes (excepto metanol), algunas acetonas, algunos solventes (excepto cloruro de metileno, tetrafluoretileno, propionaldehído y otros), etc. Aprobado por NIOSH contra no más de 1000 p.p.m de ciertos vapores orgánicos. Se usa con los respiradores de media cara y cara completa 3M con soporte de filtro de bayoneta.', 'Cartucho Para Vapores Orgánicos', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 18:12:35'),
(71, 'tela-pegajosa-dynatron-amarillo', 'Tela Pegajosa Dynatron Amarillo', 'Los paños que atrapan polvo de Dynatron están hechos con una mezcla precisa de resinas, aceites y plastificantes que mantienen el paño suave y pegajoso para asegurarse de una superficie lo más limpia posible para pintar.', 'Tela Pegajosa Dynatron Amarillo', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 18:15:39'),
(72, 'sellador-de-uretano-blanco', 'Sellador De Uretano Blanco', 'Un sellador de unión con muchos sólidos ideal para sellar juntas y uniones automotrices interiores y exteriores y en vehículos de recreación. Se adhiere bien al metal imprimado y superficies pintadas. Puede ser suavizado a un alisado de bordes y cepillado. No es pegajoso y se puede pintar en 30 a 45 minutos. De muchos sólidos, un solo componente que cura en la humedad, no se encoge, no se agrieta y se puede pintar, de olor bajo, capaz de rellenar cavidades grandes, se adhiere bien al metal imprimado y superficies pintadas, se puede aplanar a un alisado de bordes o cepillar y reduce el riesgo de trabajos dobles asociados con el uso de selladores de uniones a base de solventes.', 'Sellador De Uretano Blanco', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 18:21:12'),
(73, 'rellenador-quick-grip-galon', 'Rellenador Quick Grip Galon', 'Esta fórmula cremosa es fácil de lijar y se une rápidamente al acero galvanizado, aluminio, electrocapa, fibra de vidrio, hoja de compuesto moldeado (smc), epóxido curado, y primarios de uretano.', 'Rellenador Quick Grip Galon', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 18:24:59'),
(74, 'rellenador-platinum-select', 'Rellenador Platinum Select', 'Está diseñado para aumentar la productividad reduciendo agujeros hasta un 99% y reduciendo el uso de primario hasta un 30%. Ofrece rápida adherencia superficial al aluminio, acero, acero galvanizado, electrocapa, fibra de vidrio y Hoja de Compuesto Moldeado (SMC).', 'Rellenador Platinum Select', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 18:30:09'),
(75, 'superbuff-borla-de-lana-doble-cara-9-pul', 'Superbuff Borla De Lana Doble Cara 9 pul', 'Se trata de una borla para lijado de dos caras, hecha de lana de mezcla y buen rendimiento, cuenta con una efectividad comprobada. Sirve para refinar las rayaduras producidas por abrasivos de grano P1200 o más finos y otros defectos en la superficie de la pintura. Se debe utilizar con compuestos 3M y el adaptador 05710 3M.', 'Superbuff Borla De Lana Doble Cara 9 pul', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 18:35:21'),
(76, 'respaldo-para-pulidora-5-pul', 'Respaldo Para Pulidora 5 pul', 'Respaldo para pulidora doble acción con entrada 5/16\'\' 24 hilos, le queda a todas las pulidoras de doble acción. Con este respaldo puedes usar tus esponjas de 5 pulgadas con todo seguridad.', 'Respaldo Para Pulidora 5 pul', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 18:41:45'),
(77, 'perfect-it-ultrafina-borla-esponja-azul', 'Perfect It Ultrafina Borla Esponja Azul', 'El cojín de espuma ayuda a eliminar las marcas de remolino en superficies pintadas, aún en automóviles con pintura oscura difíciles. Como un paso de acabado después de remover las marca.', 'Perfect It Ultrafina Borla Esponja Azul', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 18:46:46'),
(78, 'perfect-it-borla-esponja-abrillantar-gris-8-pul', 'Perfect It Borla Esponja Abrillantar Gris 8 pul', 'Se utiliza para eliminar las marcas en espiral que dejan los compuestos y los defectos leves en la superficie de la pintura. Borla de abrillantado de una sola cara. Fabricada de esponja de color negro.', 'Perfect It Borla Esponja Abrillantar Gris 8 pul', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 18:59:28'),
(79, 'perfect-it-borla-esponja-abrillantar-2-caras', 'Perfect It Borla Esponja Abrillantar 2 Caras', 'Borla lustradora gris de espuma de gran rendimiento, 2 caras. Quita marcas de remolino de los compuestos y defectos finos superficiales en la pintura. Diseño único con Quick Connect (conexión rápida). La marca Perfect-It significa que esta es la borla para pulir de espuma y doble cara con rendimiento más alto de 3M.', 'Perfect It Borla Esponja Abrillantar 2 Caras', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:03:30'),
(80, 'adaptador-superbuff-3m-para-pulidoras', 'Adaptador Superbuff 3M Para Pulidoras', 'Este adaptador para máquinas de pulir sirve para conectar y desconectar rápidamente borlas de pulido de dos caras. Se debe utilizar con borlas para pulido y borlas para lijado marca 3M Perfect-It. Centra las borlas para utilizarlas con mayor eficiencia. Facilita el intercambio de las borlas para pulido y las borlas para lijado. Posee roscas de 16 mm.', 'Adaptador Superbuff 3M Para Pulidoras', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:09:29'),
(81, 'adaptador-para-borlas-doble-cara-5-8', 'Adaptador Para Borlas Doble Cara 5-8', 'Este adaptador para máquinas de pulir sirve para conectar y desconectar rápidamente borlas de pulido de dos caras. Se debe utilizar con borlas para pulido y borlas para lijado marca 3M. Centra las borlas para utilizarlas con mayor eficiencia. Facilita el intercambio de las borlas para pulido y las borlas para lijado. Posee roscas de 16 mm.', 'Adaptador Para Borlas Doble Cara 5-8', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:12:21'),
(82, '3m-removedor-de-marcas-econopack', '3m Removedor De Marcas Econopack', 'Compuesto para pulido a máquina de alto rendimiento. Elimina de manera rápida y eficaz las marcas en circulares que dejan los compuestos y produce un acabado espectacular. De buen manejo y fácil limpieza. Pulidor de alto rendimiento, diseñado para quitar rápidamente los hologramas de todos los tipos de pinturas automotrices y produce un acabado excepcional.', '3m Removedor De Marcas Econopack', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:17:19'),
(83, '3m-compuesto-pulidor-econopack-225-ml', '3m Compuesto Pulidor Econopack 225 ml', 'Compuesto pulidor de medio corte diseñado para remover rayas de lija y dejar un acabado fino en pinturas automotrices. Ha demostrado efectividad. Diseñado especialmente para corte medio, pulidor líquido para quitar rayas de lija de granos 1200, 1500, y 2000 en pinturas automotrices incluyendo capas claras. ', '3m Compuesto Pulidor Econopack 225 ml', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:24:24'),
(84, 'perfect-it-1', 'Perfect It 1', 'El Material de Acabado 3M Perfect-It 1 es un material de acabado de corte rápido diseñado para eliminar las rayaduras producidas por lijas de grano P3000 o más fino. Cuando se lo usa con las Almohadillas de Gomaespuma para Acabado 3M Perfect-It 1, esta fórmula única corta como un compuesto pero se maneja y brinda un acabado como un pulido, de alto brillo y sin marcas en espiral, ELIMINA RAYADURAS ABRASIVAS 3M TRIZACT.', 'Perfect It 1', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:30:50'),
(85, 'disco-hookit-trizact-p5000-6-pul', 'Disco Hookit Trizact P5000 6 pul', 'Los discos Trizact 5000 quitan las rayas finas del grano P3000. Pueden reducir o eliminar la necesidad de usar compuesto pulidor en situaciones específicas. Estos discos también pueden eliminar la necesidad de usar borlas de lana para pulir en reacabados de pintura automotriz.', 'Disco Hookit Trizact P5000 6 pul', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:35:25'),
(86, 'disco-hookit-trizact-p3000-6-pul', 'Disco Hookit Trizact P3000 6 pul', 'El disco de espuma es usado en un sistema de reparación de retoques para remover rayas de lijado de granos P1200 y P1500.', 'Disco Hookit Trizact P3000 6 pul', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:37:39'),
(87, 'disco-hookit-cubitron-ii-282-perforaciones-g80', 'Disco Hookit Cubitron Ii 282 Perforaciones G80', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice nuestros discos de grano 80+ para lijar rellenador plástico, el alisado áspero de bordes o el lijado final antes de imprimar.', 'Disco Hookit Cubitron Ii 282 Perforaciones G80', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:43:50'),
(88, 'disco-hookit-cubitron-ii-282-perforaciones-g220', 'Disco Hookit Cubitron Ii 282 Perforaciones G220', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice nuestros discos de grano 220+ para lijar rellenador plástico, el alisado áspero de bordes o el lijado final antes de imprimar.', 'Disco Hookit Cubitron Ii 282 Perforaciones G220', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:46:56'),
(89, 'disco-hookit-cubitron-ii-282-perforaciones-g180', 'Disco Hookit Cubitron Ii 282 Perforaciones G180', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice estos discos de grano 180+ para lijar rellenador plástico, el alisado áspero de bordes o el lijado final antes de imprimar.', 'Disco Hookit Cubitron Ii 282 Perforaciones G180', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:49:47'),
(90, 'disco-hookit-cubitron-ii-282-perforaciones-g150', 'Disco Hookit Cubitron Ii 282 Perforaciones G150', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice los discos de grano 150+ para lijar rellenador plástico, el alisado áspero de bordes o el lijado final antes de imprimar.', 'Disco Hookit Cubitron Ii 282 Perforaciones G150', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:52:41'),
(91, 'disco-hookit-cubitron-ii-282-perforaciones-g120', 'Disco Hookit Cubitron Ii 282 Perforaciones G120', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice los discos de grano 120+ para lijar rellenador plástico, el alisado áspero de bordes o el lijado final antes de imprimar.', 'Disco Hookit Cubitron Ii 282 Perforaciones G120', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 19:56:30'),
(92, 'pelicula-plastica-amarilla-365-mt', 'Pelicula Plastica Amarilla 365 mt', 'Película plástica amarilla para briseado de 3.65 X 106.6m, fabricada con polietileno de 3 milésimas, protege del briseado durante las operaciones de pintado.', 'Pelicula Plastica Amarilla 365 mt', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 20:00:56'),
(93, 'papel-para-enmascarar-blanco-36-pul', 'Papel Para Enmascarar Blanco 36 pul', 'Papel de enmascarar de color blanco fabricado específicamente para aplicaciones de pintura automotriz, con excelente resistencia a los solventes de pintura, uretanos, bases y esmaltes transparentes. Amoldable. Papel firmemente unido para reducir o evitar la contaminación con pelusas o fibras.', 'Papel Para Enmascarar Blanco 36 pul', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 20:02:30'),
(94, 'masking-tape-uso-general-3-4-pul', 'Masking Tape Uso General 3-4 pul', 'Es un tipo de cinta adhesiva fabricada generalmente con papel, de fácil desprendimiento y autoadhesiva. Se usa principalmente para enmascarar áreas que no deben ser pintadas. El tipo de adhesivo es un componente clave, ya que permite que la cinta sea fácilmente desprendida sin dejar residuos o dañar la superficie a la cual es aplicada. Se encuentra disponible en el mercado en diversas resistencias, clasificadas en una escala del 1 al 100 según la concentración del pegamento.', 'Masking Tape Uso General 3-4 pul', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 20:11:38'),
(95, 'masking-tape-uso-general-2-pul', 'Masking Tape Uso General 2 pul', 'Es un tipo de cinta adhesiva fabricada generalmente con papel, de fácil desprendimiento y autoadhesiva. Se usa principalmente para enmascarar áreas que no deben ser pintadas. El tipo de adhesivo es un componente clave, ya que permite que la cinta sea fácilmente desprendida sin dejar residuos o dañar la superficie a la cual es aplicada. Se encuentra disponible en el mercado en diversas resistencias, clasificadas en una escala del 1 al 100 según la concentración del pegamento.', 'Masking Tape Uso General 2 pul', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 20:13:04'),
(96, 'covercryl-anticorrosivo-base-agua', 'Covercryl Anticorrosivo Base Agua', 'Recubrimiento de color negro, con un secado libre al tacto aproximadamente 45 minutos a 23 grados. Debe ser aplicado con la pistola manual body schutz 8997. Tiene una apariencia más uniforme que busca lograr un acabado original. No presenta agrietamiento ni descascaramiento al ser doblado. Cubrimiento total del sustrato, lo cual garantiza una excelente protección. Una vez curado el Covercryl, presenta una mayor resistencia a estas sustancias.', 'Covercryl Anticorrosivo Base Agua', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 20:17:33'),
(97, 'covercryl-anticorrosivo-base-agua-2', 'Covercryl Anticorrosivo Base Agua 2', 'Recubrimiento de color negro, con un secado libre al tacto aproximadamente 45 minutos a 23 grados. Debe ser aplicado con la pistola manual body schutz 8997. Tiene una apariencia más uniforme que busca lograr un acabado original. No presenta agrietamiento ni descascaramiento al ser doblado. Cubrimiento total del sustrato, lo cual garantiza una excelente protección. Una vez curado el Covercryl, presenta una mayor resistencia a estas sustancias.', 'Covercryl Anticorrosivo Base Agua 2', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 20:22:47'),
(98, 'poliuretano-hd1-as-transparente', 'Poliuretano Hd1 As Transparente', 'Es un recubrimiento de uso industrial de alto desempeño especial para plataformas marinas,instalaciones petroleras, refinerías,pisos de concreto y mas aplicaciones donde se requiere alta resistencia al impacto e intemperie.', 'Poliuretano Hd1 As Transparente', 'vistas/img/cabeceras/default/default.jpg', '2018-09-07 20:25:19'),
(99, 'zaak-imper-3-1-fibra-oxido', 'Zaak Imper 3-1 Fibra Oxido', 'Es un impermeabilizante elaborado a base de resinas acrílicas e inteligent fiber de alta calidad que proporciona una Alta reflectancia a la luz y rayos UV. reduciendo la temperatura interior.', 'Zaak Imper 3+1 Fibra Oxido,pintura', 'vistas/img/cabeceras/default/default.jpg', '2018-10-05 14:17:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `oferta` int(11) NOT NULL,
  `precioOferta` float NOT NULL,
  `descuentoOferta` int(11) NOT NULL,
  `imgOferta` text COLLATE utf8_spanish_ci NOT NULL,
  `finOferta` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `ruta`, `estado`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `fecha`) VALUES
(1, 'PINTURA AUTOMOTRIZ', 'pintura-automotriz', 1, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-10-08 15:22:09'),
(2, 'PINTURA ARQUITECTÓNICA', 'pintura-arquitectonica', 1, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:47:14'),
(3, 'PINTURA INDUSTRIAL', 'pintura-industrial', 1, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:47:03'),
(4, 'EQUIPOS DE APLICACIÓN', 'equipos-de-aplicacion', 1, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:46:55'),
(5, 'ESTÉTICA AUTOMOTRIZ', 'estetica-automotriz', 1, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:46:48'),
(6, 'ABRASIVOS', 'abrasivos', 1, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-10-08 15:21:59'),
(7, 'COMPLEMENTOS', 'complementos', 1, 1, 0, 25, '', '2020-04-30 23:59:59', '2020-04-29 00:26:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `calificacion` float DEFAULT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `id` int(11) NOT NULL,
  `impuesto` float NOT NULL,
  `envioNacional` float NOT NULL,
  `envioInternacional` float NOT NULL,
  `tasaMinimaNal` float NOT NULL,
  `tasaMinimaInt` float NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  `modoPaypal` text COLLATE utf8_spanish_ci NOT NULL,
  `clienteIdPaypal` text COLLATE utf8_spanish_ci NOT NULL,
  `llaveSecretaPaypal` text COLLATE utf8_spanish_ci NOT NULL,
  `modoPayu` text COLLATE utf8_spanish_ci NOT NULL,
  `merchantIdPayu` int(11) NOT NULL,
  `accountIdPayu` int(11) NOT NULL,
  `apiKeyPayu` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`id`, `impuesto`, `envioNacional`, `envioInternacional`, `tasaMinimaNal`, `tasaMinimaInt`, `pais`, `modoPaypal`, `clienteIdPaypal`, `llaveSecretaPaypal`, `modoPayu`, `merchantIdPayu`, `accountIdPayu`, `apiKeyPayu`) VALUES
(1, 0, 42, 450, 10, 15, 'MX', 'sandbox', 'AbYCHpjcfP5Dyhp13lpvZhTR8LhMX0v6h7_4uHvL845OvLXHWJv4iSyJMr9mIiMOo-qjioTmwcreOd-B', 'EE4NNhbZ-p6TiWdFI6UaBFI0SZqa2fn3ZgSc8MFkYg7GyMliGTH1efBknOWyG1azRZ3Q92VdE8FAMiaR', 'sandbox', 508029, 512324, '4Vj8eK4rloUd272L48hsrarnUA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `id_pedido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `envio` int(11) DEFAULT NULL,
  `metodo` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  `pago` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `preferencia` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_usuario`, `id_pedido`, `id_producto`, `cantidad`, `envio`, `metodo`, `email`, `direccion`, `pais`, `pago`, `fecha`, `observaciones`, `preferencia`) VALUES
(1, 24, '10', 1, 1, 1, 'paypal', 'marcolopez@gmail.com', 'Calle Juarez 1, Miguel Hidalgo, Ciudad de Mexico, 11580', 'MX', 1971, '2019-12-14 18:04:44', '', ''),
(2, 24, '10', 4, 4, 1, 'paypal', 'marcolopez@gmail.com', 'Calle Juarez 1, Miguel Hidalgo, Ciudad de Mexico, 11580', 'MX', 297, '2019-12-14 18:04:44', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE `deseos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deseos`
--

INSERT INTO `deseos` (`id`, `id_usuario`, `id_producto`, `fecha`) VALUES
(2, 10, 5, '2017-12-28 03:19:55'),
(3, 10, 3, '2017-12-28 03:19:56'),
(4, 3, 9, '2018-02-03 18:28:03'),
(5, 9, 4, '2017-12-29 20:41:24'),
(6, 9, 3, '2017-12-29 20:41:25'),
(7, 9, 2, '2017-12-29 20:41:27'),
(8, 12, 29, '2018-01-03 20:06:07'),
(10, 3, 23, '2018-02-06 20:25:16'),
(11, 3, 7, '2018-02-06 20:26:08'),
(12, 3, 21, '2018-02-06 20:26:09'),
(13, 9, 37, '2018-02-18 22:04:47'),
(14, 17, 1, '2018-06-25 15:54:44'),
(15, 17, 31, '2018-06-25 15:54:47'),
(16, 8, 13, '2018-07-18 15:17:58'),
(17, 21, 10, '2018-08-03 22:28:44'),
(21, 2, 1, '2018-10-11 17:21:37'),
(22, 2, 2, '2018-10-11 17:21:38'),
(23, 2, 3, '2018-10-11 17:21:38'),
(24, 2, 6, '2018-10-11 18:08:36'),
(25, 24, 6, '2018-10-11 18:18:29'),
(26, 24, 5, '2018-10-11 18:18:30'),
(27, 24, 7, '2018-10-11 18:18:32'),
(28, 1, 2, '2018-10-11 18:20:55'),
(29, 1, 1, '2018-10-11 18:20:56'),
(30, 1, 3, '2018-10-11 18:20:57'),
(31, 24, 4, '2018-10-16 14:51:34'),
(34, 24, 3, '2018-10-16 15:05:05'),
(35, 31, 1, '2019-12-14 18:02:04'),
(36, 31, 2, '2019-12-14 18:02:06'),
(37, 31, 4, '2019-12-14 18:02:07'),
(38, 2, 2, '2020-04-28 22:45:55'),
(39, 2, 2, '2020-04-28 22:45:58'),
(40, 2, 2, '2020-04-28 22:46:00'),
(41, 2, 64, '2020-04-28 22:46:05'),
(42, 31, 2, '2020-04-28 22:46:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `nuevosUsuarios` int(11) NOT NULL,
  `nuevasVentas` int(11) NOT NULL,
  `nuevasVisitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `nuevosUsuarios`, `nuevasVentas`, `nuevasVisitas`) VALUES
(1, 0, 0, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_pedido` text COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_pedido`, `id_usuario`, `codigo`, `cantidad`, `fecha`) VALUES
(1, '', 1, 'IMP19300FR', 25, '2018-10-11 15:41:50'),
(2, '', 1, 'POL1900T', 35, '2018-10-11 15:41:50'),
(3, '', 1, 'COVER2', 12, '2018-10-11 15:41:50'),
(4, '', 1, 'COVER', 10, '2018-10-11 15:41:50'),
(5, '', 1, '6540', 5, '2018-10-11 15:41:50'),
(6, '', 1, '6700', 8, '2018-10-11 15:41:50'),
(7, '', 2, 'IMP19300FR', 25, '2018-10-11 15:44:44'),
(8, '', 2, 'POL1900T', 35, '2018-10-11 15:44:44'),
(9, '', 2, 'COVER2', 12, '2018-10-11 15:44:44'),
(10, '', 2, 'COVER', 10, '2018-10-11 15:44:44'),
(11, '', 2, '6540', 5, '2018-10-11 15:44:44'),
(12, '', 2, '6700', 8, '2018-10-11 15:44:44'),
(13, '', 2, 'IMP19300FR', 25, '2018-10-11 21:34:14'),
(14, '', 2, 'POL1900T', 35, '2018-10-11 21:34:14'),
(15, '', 2, 'COVER2', 12, '2018-10-11 21:34:14'),
(16, '', 2, 'COVER', 10, '2018-10-11 21:34:14'),
(17, '', 2, '6540', 5, '2018-10-11 21:34:14'),
(18, '', 2, '6700', 8, '2018-10-11 21:34:14'),
(19, '', 2, 'IMP19300FR', 25, '2018-10-11 21:41:55'),
(20, '', 2, 'POL1900T', 35, '2018-10-11 21:41:55'),
(21, '', 2, 'COVER2', 12, '2018-10-11 21:41:55'),
(22, '', 2, 'COVER', 10, '2018-10-11 21:41:55'),
(23, '', 2, '6540', 5, '2018-10-11 21:41:55'),
(24, '', 2, '6700', 8, '2018-10-11 21:41:55'),
(25, '201912141239-1', 2, 'IMP19300FR', 24, '2019-12-14 18:35:39'),
(26, '201912141239-1', 2, 'POL1900T', 10, '2019-12-14 18:35:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id` int(11) NOT NULL,
  `barraSuperior` text COLLATE utf8_spanish_ci NOT NULL,
  `textoSuperior` text COLLATE utf8_spanish_ci NOT NULL,
  `colorFondo` text COLLATE utf8_spanish_ci NOT NULL,
  `colorTexto` text COLLATE utf8_spanish_ci NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  `zaak` text COLLATE utf8_spanish_ci NOT NULL,
  `goni` text COLLATE utf8_spanish_ci NOT NULL,
  `3m` text COLLATE utf8_spanish_ci NOT NULL,
  `excelo` text COLLATE utf8_spanish_ci NOT NULL,
  `type` text COLLATE utf8_spanish_ci NOT NULL,
  `typeahead` text COLLATE utf8_spanish_ci NOT NULL,
  `icono` text COLLATE utf8_spanish_ci NOT NULL,
  `redesSociales` text COLLATE utf8_spanish_ci NOT NULL,
  `apiFacebook` text COLLATE utf8_spanish_ci NOT NULL,
  `pixelFacebook` text COLLATE utf8_spanish_ci NOT NULL,
  `googleAnalytics` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id`, `barraSuperior`, `textoSuperior`, `colorFondo`, `colorTexto`, `logo`, `zaak`, `goni`, `3m`, `excelo`, `type`, `typeahead`, `icono`, `redesSociales`, `apiFacebook`, `pixelFacebook`, `googleAnalytics`, `fecha`) VALUES
(1, '#ca7c7c', '#ffffff', '#4ce361', '#ffffff', 'vistas/img/plantilla/logo.png', 'vistas/img/plantilla/zaak.jpg', 'vistas/img/plantilla/goni-2.jpg', 'vistas/img/plantilla/3M.jpg', 'vistas/img/plantilla/excelo.jpg', 'vistas/js/type.js', 'vistas/js/typeahead.js', 'vistas/img/plantilla/icono.png', '[{\"red\":\"fa-facebook\",\"estilo\":\"facebookColor\",\"url\":\"http://facebook.com/\",\"activo\":1},{\"red\":\"fa-whatsapp\",\"estilo\":\"whatsappColor\",\"url\":\"https://api.whatsapp.com/send?phone=2761011654&text=Hola que tal me gustaría obtener información\",\"activo\":1}]', '\r\n<script>\r\n  window.fbAsyncInit = function() {\r\n    FB.init({\r\n      appId      : \'1869021360068786\',\r\n      cookie     : true,\r\n      xfbml      : true,\r\n      version    : \'v3.1\'\r\n    });\r\n      \r\n    FB.AppEvents.logPageView();   \r\n      \r\n  };\r\n\r\n  (function(d, s, id){\r\n     var js, fjs = d.getElementsByTagName(s)[0];\r\n     if (d.getElementById(id)) {return;}\r\n     js = d.createElement(s); js.id = id;\r\n     js.src = \"https://connect.facebook.net/en_US/sdk.js\";\r\n     fjs.parentNode.insertBefore(js, fjs);\r\n   }(document, \'script\', \'facebook-jssdk\'));\r\n</script>\r\n      		', '\r\n  			    \r\n  			', '\r\n  			      \r\n  			', '2020-04-28 22:57:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `titular` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `multimedia` text COLLATE utf8_spanish_ci NOT NULL,
  `detalles` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `portada` text COLLATE utf8_spanish_ci NOT NULL,
  `vistas` int(11) NOT NULL,
  `ventas` int(11) NOT NULL,
  `vistasGratis` int(11) NOT NULL,
  `ventasGratis` int(11) NOT NULL,
  `ofertadoPorCategoria` int(11) NOT NULL,
  `ofertadoPorSubCategoria` int(11) NOT NULL,
  `oferta` int(11) NOT NULL,
  `precioOferta` float NOT NULL,
  `descuentoOferta` int(11) NOT NULL,
  `imgOferta` text COLLATE utf8_spanish_ci NOT NULL,
  `finOferta` datetime NOT NULL,
  `peso` float NOT NULL,
  `largo` decimal(6,2) NOT NULL,
  `ancho` decimal(6,2) NOT NULL,
  `alto` decimal(6,2) NOT NULL,
  `entrega` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stock` int(50) NOT NULL,
  `agregarStock` int(11) NOT NULL,
  `stockMin` int(11) NOT NULL,
  `stockMax` int(11) NOT NULL,
  `entradas` int(50) NOT NULL,
  `salidas` int(50) NOT NULL,
  `existencias` int(50) NOT NULL,
  `tipoProducto` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `id_subcategoria`, `tipo`, `ruta`, `estado`, `titulo`, `titular`, `descripcion`, `multimedia`, `detalles`, `precio`, `portada`, `vistas`, `ventas`, `vistasGratis`, `ventasGratis`, `ofertadoPorCategoria`, `ofertadoPorSubCategoria`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `peso`, `largo`, `ancho`, `alto`, `entrega`, `fecha`, `stock`, `agregarStock`, `stockMin`, `stockMax`, `entradas`, `salidas`, `existencias`, `tipoProducto`) VALUES
(1, 3, 9, 'fisico', 'pintura-para-trafico-tipo-1-amarillo', 1, 'Pintura Para Tráfico Tipo 1 Amarillo', 'Muy buena resistencia a la abrasión, secado rápido y excelente poder cubriente es ideal para pintar señalamientos sobre asfalto....', 'Muy buena resistencia a la abrasión, secado rápido y excelente poder cubriente es ideal para pintar señalamientos sobre asfalto.', '[{\"foto\":\"vistas/img/multimedia/pintura-para-trafico-tipo-1-amarillo/zaac-trafico-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/pintura-para-trafico-tipo-1-amarillo/zaac-trafico-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/pintura-para-trafico-tipo-1-amarillo/zaac-trafico-traser.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"TRA19A\"],\"Marca\":[\"ZAAK\"]}', 1971, 'vistas/img/productos/pintura-para-trafico-tipo-1-amarillo.jpg', 8, 11, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 28.5, '0.00', '0.00', '0.00', 3, '2020-04-28 23:02:23', 3, 10, 1, 10, 102, 11, 94, 'pintura'),
(2, 4, 12, 'fisico', 'pistola-lvlp', 1, 'Pistola LVLP', 'Pistola de bajo volumen baja presión, el funcionamiento de este equipo la hace el complemento ideal para compresores de entrega de aire bajas, pero con la característica de la transferencia de material alta. Tiene tres cont...', 'Pistola de bajo volumen baja presión, el funcionamiento de este equipo la hace el complemento ideal para compresores de entrega de aire bajas, pero con la característica de la transferencia de material alta. Tiene tres controles: de material, de abanico y aire, tiene como estándar una boquilla de 1.3, pero puede cambiarse por una de 1.5 o 2.0 mm.', '[{\"foto\":\"vistas/img/multimedia/pistola-lvlp/pistola-lvlp-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/pistola-lvlp/pistola-lvlp-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/pistola-lvlp/pistola-lvlp-lateral.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"33000\"],\"Marca\":[\"GONI\"]}', 1182, 'vistas/img/productos/pistola-lvlp.jpg', 3, 8, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.9203, '0.00', '0.00', '0.00', 3, '2020-04-28 23:06:53', 3, 0, 1, 10, 2, 8, -3, 'pistolas'),
(3, 4, 12, 'fisico', 'pistola-para-recubrimiento-de-auto-body', 1, 'Pistola Para Recubrimiento De Auto Body', 'La pistola para la aplicación de body, cuenta con el diseño adecuado para adaptarse al bote de este material, con esta pistola el tiempo de aplicación de este material se reduce notablemente. Es una pistola de tipo de succ...', 'La pistola para la aplicación de body, cuenta con el diseño adecuado para adaptarse al bote de este material, con esta pistola el tiempo de aplicación de este material se reduce notablemente. Es una pistola de tipo de succión. Debido a la consistencia del material la pistola no cuenta con ningún tipo de regulador.', '[{\"foto\":\"vistas/img/multimedia/pistola-para-recubrimiento-de-auto-body/pistola-autobody-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/pistola-para-recubrimiento-de-auto-body/pistola-autobody-caja2.jpg\"},{\"foto\":\"vistas/img/multimedia/pistola-para-recubrimiento-de-auto-body/pistola-autobody-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/pistola-para-recubrimiento-de-auto-body/pistola-autobody-caja3.jpg\"},{\"foto\":\"vistas/img/multimedia/pistola-para-recubrimiento-de-auto-body/pistola-autobody-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/pistola-para-recubrimiento-de-auto-body/pistola-autobody-caja1.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"303\"],\"Marca\":[\"GONI\"]}', 192, 'vistas/img/productos/pistola-para-recubrimiento-de-auto-body.jpg', 3, 6, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.3892, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 6, -1, 'pistolas'),
(4, 4, 12, 'fisico', 'pistola-doble-abanico', 1, 'Pistola Doble Abanico', 'Pistola de baja presión diseñada para trabajar con compresores de potencia pequeña e incluso con compresores sin tanque. Son las pistolas más utilizadas por los profesionales y los amateurs, debido a su desempeño y costo...', 'Pistola de baja presión diseñada para trabajar con compresores de potencia pequeña e incluso con compresores sin tanque. Son las pistolas más utilizadas por los profesionales y los amateurs, debido a su desempeño y costo. Con esta pistola se puede aplicar un gran gama de materiales como lo son: esmaltes, lacas, barnices y selladores de baja viscosidad. Ya viene incluida la boquilla de punto, empaque y filtro.', '[{\"foto\":\"vistas/img/multimedia/pistola-doble-abanico/pistola-abanico-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/pistola-doble-abanico/pistola-abanico-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/pistola-doble-abanico/pistola-abanico-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/pistola-doble-abanico/pistola-abanico-caja1.jpg\"},{\"foto\":\"vistas/img/multimedia/pistola-doble-abanico/pistola-abanico-caja2.jpg\"},{\"foto\":\"vistas/img/multimedia/pistola-doble-abanico/pistola-abanico-caja3.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"29\"],\"Marca\":[\"GONI\"]}', 297, 'vistas/img/productos/pistola-doble-abanico.jpg', 2, 8, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.7814, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 10, 8, 5, 'pistolas'),
(5, 3, 11, 'fisico', 'solvente-zaak-626-para-epoxico', 1, 'Solvente Zaak 626 Para Epóxico', 'Es un recubrimiento de uso industrial y comercial de gran resistencia mecánica, química, abrasión para pisos y superficies metálicas....', 'Es un recubrimiento de uso industrial y comercial de gran resistencia mecánica, química, abrasión para pisos y superficies metálicas.', '[{\"foto\":\"vistas/img/multimedia/solvente-zaak-626-para-epoxico/solvente-zaak-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/solvente-zaak-626-para-epoxico/solvente-zaak-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/solvente-zaak-626-para-epoxico/solvente-zaak-lateral.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"SEPOX19\"],\"Marca\":[\"ZAAK\"]}', 1748, 'vistas/img/productos/solvente-zaak-626-para-epoxico.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 16.95, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'solventes'),
(6, 3, 10, 'fisico', 'catalizador-epoxico-hd1', 1, 'Catalizador Epóxico HD1', 'Es un recubrimiento de uso industrial y comercial de gran resistencia mecánica, química, abrasión para pisos y superficies metálicas....', 'Es un recubrimiento de uso industrial y comercial de gran resistencia mecánica, química, abrasión para pisos y superficies metálicas.', '[{\"foto\":\"vistas/img/multimedia/catalizador-epoxico-hd1/catalizador-epoxico-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/catalizador-epoxico-hd1/catalizador-epoxico-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/catalizador-epoxico-hd1/catalizador-epoxico-lateral.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"EPOX1900B\"],\"Marca\":[\"ZAAK\"]}', 4811, 'vistas/img/productos/catalizador-epoxico-hd1.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 21, '0.00', '0.00', '0.00', 3, '2020-04-29 00:27:21', 3, 0, 1, 10, 2, 4, 1, 'catalizadores'),
(7, 3, 10, 'fisico', 'epoxico-hd1-as-blanco', 1, 'Epóxico HD1 As Blanco', 'Es un recubrimiento de uso industrial y comercial de gran resistencia mecánica, química, abrasión para pisos y superficies metálicas....', 'Es un recubrimiento de uso industrial y comercial de gran resistencia mecánica, química, abrasión para pisos y superficies metálicas.', '[{\"foto\":\"vistas/img/multimedia/epoxico-hd1-as-blanco/epoxico-hd1-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/epoxico-hd1-as-blanco/epoxico-hd1-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/epoxico-hd1-as-blanco/epoxico-hd1-lateral.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"EPOX1900\"],\"Marca\":[\"ZAAK\"]}', 6060, 'vistas/img/productos/epoxico-hd1-as-blanco.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 31.4, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'epoxicos'),
(8, 2, 5, 'fisico', 'eco-galer-blanco', 1, 'Eco Galer Blanco', 'Es un esmalte base agua de nueva generación elaborado a base de resinas acrílicas soluble en agua de larga duración, excelente lavabilidad así como alto poder cubrirte y sin olor a disolventes....', 'Es un esmalte base agua de nueva generación elaborado a base de resinas acrílicas soluble en agua de larga duración, excelente lavabilidad así como alto poder cubrirte y sin olor a disolventes.', '[{\"foto\":\"vistas/img/multimedia/eco-galer-blanco/eco-galer-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/eco-galer-blanco/eco-galer-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/eco-galer-blanco/eco-galer-lateral.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"ES1900BA\"],\"Marca\":[\"ZAAK\"]}', 2538, 'vistas/img/productos/eco-galer-blanco.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 25.03, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'pintura'),
(9, 2, 5, 'fisico', 'artesano-500-blanco', 1, 'Artesano 500 Blanco', 'Es una pintura para uso arquitectónico, proporciona buen desempeño en superficies de madera, muros de yeso ladrillo o block....', 'Es una pintura para uso arquitectónico, proporciona buen desempeño en superficies de madera, muros de yeso ladrillo o block.', '[{\"foto\":\"vistas/img/multimedia/artesano-500-blanco/artesano-500-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/artesano-500-blanco/artesano-500-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/artesano-500-blanco/artesano-500-lateral.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"ART1900\"],\"Marca\":[\"ZAAK\"]}', 761, 'vistas/img/productos/artesano-500-blanco.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 27.9, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'pintura'),
(10, 2, 5, 'fisico', 'cosmo-700-blanco', 1, 'Cosmo 700 Blanco', 'Es una pintura para uso arquitectónico, resistente al desgaste en interiores y exteriores....', 'Es una pintura para uso arquitectónico, resistente al desgaste en interiores y exteriores.', '[{\"foto\":\"vistas/img/multimedia/cosmo-700-blanco/cosmo-700-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/cosmo-700-blanco/cosmo-700-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/cosmo-700-blanco/cosmo-700-traser.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"COSP1900\"],\"Marca\":[\"ZAAK\"]}', 1423, 'vistas/img/productos/cosmo-700-blanco.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 28.8, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'pintura'),
(11, 2, 5, 'fisico', 'cosmo-plus-blanco', 1, 'Cosmo Plus Blanco', 'Es una pintura para uso arquitectónico de gran rendimiento. Muy resistente al desgaste en interiores y exteriores....', 'Es una pintura para uso arquitectónico de gran rendimiento. Muy resistente al desgaste en interiores y exteriores.', '[{\"foto\":\"vistas/img/multimedia/cosmo-plus-blanco/cosmo-plus-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/cosmo-plus-blanco/cosmo-plus-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/cosmo-plus-blanco/cosmo-plus-traser.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"COSP1900\"],\"Marca\":[\"ZAAK\"]}', 1423, 'vistas/img/productos/cosmo-plus-blanco.jpg', 9, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 30.65, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'pintura'),
(12, 5, 16, 'fisico', 'ultra-body-sw-04-1500', 1, 'Ultra Body Sw-04 1500', 'Masilla de poliester soft de 2 componentes en color Blanco. Aplicable sobre lámina desnuda, lámina galvanizada, aluminio, fibra de vidrio, plástico, etc....', 'Masilla de poliester soft de 2 componentes en color Blanco. Aplicable sobre lámina desnuda, lámina galvanizada, aluminio, fibra de vidrio, plástico, etc.', '[{\"foto\":\"vistas/img/multimedia/ultra-body-sw-04-1500/ultra-sw04.jpg\"},{\"foto\":\"vistas/img/multimedia/ultra-body-sw-04-1500/ultra-sw04-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/ultra-body-sw-04-1500/ultra-sw04-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"371001\"],\"Marca\":[\"EXCELO\"]}', 335, 'vistas/img/productos/ultra-body-sw-04-1500.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1.6293, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'estetica automotriz'),
(13, 1, 3, 'fisico', 'kit-rts-transparente-eco-sw', 1, 'Kit Rts Transparente ECO-SW', 'KIT RTS Transparente ECO-SW *Catalice y Aplique está conformado por el Transparente y Endurecedor RTS ECO-SW que, al ser mezclados se utilizan como capa Transparente en sistemas Dicapa y Tricapa en el Repintado de General o ...', 'KIT RTS Transparente ECO-SW *Catalice y Aplique está conformado por el Transparente y Endurecedor RTS ECO-SW que, al ser mezclados se utilizan como capa Transparente en sistemas Dicapa y Tricapa en el Repintado de General o de Secciones de vehículos sobre capas de color de Esmaltes catalizados, Lacas y Bases Color de la marca Sherwin Williams Automotive. El KIT RTS Transparente ECO-SW *Catalice y Aplique está especialmente dirigido a zonas con una temperatura por arriba de 30 grados. Por su calidad en brillo, distinción de imagen y resistencia a la intemperie, el acabado final así obtenido es similar al original. Al utilizar este Kit, se simplifica la labor del pintor y se aumenta la productividad en el Repintado ya que, se puede aplicar sobre distintas capas de color (Esmaltes catalizados, Lacas y Bases Color), se reduce el tiempo de preparación del material para aplicar (ya que no se requiere ningún Reductor), si se requiere preparar todo el contenido de los 2 envases (946 ml), el Endurecedor se puede vaciar directamente al envase del Transparente para allí mismo agitar y aplicar inmediatamente y, si no requiere preparar todo el contenido de los envases, la relación de mezcla es simple y sencilla de recordar (5 partes en volumen del Transparente. por 1 parte en volumen).', '[{\"foto\":\"vistas/img/multimedia/kit-rts-transparente-eco-sw/kit-rts-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/kit-rts-transparente-eco-sw/kit-rts-trasera.jpg\"},{\"foto\":\"vistas/img/multimedia/kit-rts-transparente-eco-sw/kit-rts-lateral.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"322428\"],\"Marca\":[\"EXCELO\"]}', 155, 'vistas/img/productos/kit-rts-transparente-eco-sw.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1.0418, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'kit'),
(14, 1, 4, 'fisico', 'xclo-primer-universal-negro', 1, 'Xclo Primer Universal Negro', 'El XCLO Primer Universal es un producto de muy buena calidad para Repintado Automotriz, se pueden utilizar en repintado total o reparaciones; combina las principales ventajas del Primer Piroxilina y el Primer Sintético, su s...', 'El XCLO Primer Universal es un producto de muy buena calidad para Repintado Automotriz, se pueden utilizar en repintado total o reparaciones; combina las principales ventajas del Primer Piroxilina y el Primer Sintético, su secado es bastante rápido, puede lijarse en seco y recubrirse de 45 minutos a una hora después de haber sido aplicado a una temperatura de 25 grados, tienen buena capacidad de relleno y muy buena adherencia sobre metales ferrosos, excelente resistencia a la corrosión, proporcionan muy buena retención de brillo y distinción de imagen (DOI) en el acabado.', '[{\"foto\":\"vistas/img/multimedia/xclo-primer-universal-negro/primer-universal-negro.jpg\"},{\"foto\":\"vistas/img/multimedia/xclo-primer-universal-negro/primer-universal-negro-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/xclo-primer-universal-negro/primer-universal-negro-traser.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"307108.61\"],\"Marca\":[\"EXCELO\"]}', 2848, 'vistas/img/productos/xclo-primer-universal-negro.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 26.75, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'primers'),
(15, 1, 4, 'fisico', 'xclo-primer-universal-blanco', 1, 'Xclo Primer Universal Blanco', 'El XCLO Primer Universal es un producto de muy buena calidad para Repintado Automotriz, se pueden utilizar en repintado total o reparaciones; combina las principales ventajas del Primer Piroxilina y el Primer Sintético, su s...', 'El XCLO Primer Universal es un producto de muy buena calidad para Repintado Automotriz, se pueden utilizar en repintado total o reparaciones; combina las principales ventajas del Primer Piroxilina y el Primer Sintético, su secado es bastante rápido, puede lijarse en seco y recubrirse de 45 minutos a una hora después de haber sido aplicado a una temperatura de 25 grados, tienen buena capacidad de relleno y muy buena adherencia sobre metales ferrosos, excelente resistencia a la corrosión, proporcionan muy buena retención de brillo y distinción de imagen (DOI) en el acabado.', '[{\"foto\":\"vistas/img/multimedia/xclo-primer-universal-blanco/primer-universal-blanco.jpg\"},{\"foto\":\"vistas/img/multimedia/xclo-primer-universal-blanco/primer-universal-blanco-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/xclo-primer-universal-blanco/primer-universal-blanco-traser.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"307107.61\"],\"Marca\":[\"EXCELO\"]}', 2848, 'vistas/img/productos/xclo-primer-universal-blanco.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 26.75, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'primers'),
(16, 1, 4, 'fisico', 'xclo-primer-universal-gris', 1, 'Xclo Primer Universal Gris', 'El XCLO Primer Universal es un producto de muy buena calidad para Repintado Automotriz, se pueden utilizar en repintado total o reparaciones; combina las principales ventajas del Primer Piroxilina y el Primer Sintético, su s...', 'El XCLO Primer Universal es un producto de muy buena calidad para Repintado Automotriz, se pueden utilizar en repintado total o reparaciones; combina las principales ventajas del Primer Piroxilina y el Primer Sintético, su secado es bastante rápido, puede lijarse en seco y recubrirse de 45 minutos a una hora después de haber sido aplicado a una temperatura de 25 grados, tienen buena capacidad de relleno y muy buena adherencia sobre metales ferrosos, excelente resistencia a la corrosión, proporcionan muy buena retención de brillo y distinción de imagen (DOI) en el acabado.', '[{\"foto\":\"vistas/img/multimedia/xclo-primer-universal-gris/primer-universal-gris.jpg\"},{\"foto\":\"vistas/img/multimedia/xclo-primer-universal-gris/primer-universal-gris-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/xclo-primer-universal-gris/primer-universal-gris-traser.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"307109.61\"],\"Marca\":[\"EXCELO\"]}', 2848, 'vistas/img/productos/xclo-primer-universal-gris.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 26.75, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'primers'),
(17, 1, 4, 'fisico', 'sherprimer-ng-gris-claro', 1, 'Sherprimer Ng Gris Claro', 'Es un primario de dos componentes, formulado con resinas acrílicas y poliéster de secado por catalización. Está diseñado para usarse en sistemas de alta tecnología, con alta retención de brillo, alta capacidad de relle...', 'Es un primario de dos componentes, formulado con resinas acrílicas y poliéster de secado por catalización. Está diseñado para usarse en sistemas de alta tecnología, con alta retención de brillo, alta capacidad de relleno y excelente adherencia sobre acero al carbón, lámina galvanizada y fibra de vidrio.Se recomienda su uso en el repintado total o parcíal de automóviles. Está especialmente formulado para ser recubierto con las líneas de Base Color así como cualquiera de los acabados de Sherwin Willians Automotive.', '[{\"foto\":\"vistas/img/multimedia/sherprimer-ng-gris-claro/sherprimer-gris-claro-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/sherprimer-ng-gris-claro/sherprimer-gris-claro-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/sherprimer-ng-gris-claro/sherprimer-gris-claro-traser.jpg\"}]', '{\"Unidad\":[\"Galon\"],\"Codigo\":[\"320349.51\"],\"Marca\":[\"EXCELO\"]}', 1085, 'vistas/img/productos/sherprimer-ng-gris-claro.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 5.9677, '0.00', '0.00', '0.00', 3, '2020-04-28 22:54:31', 3, 0, 1, 10, 2, 4, 1, 'primers'),
(18, 1, 27, 'fisico', 'endurecedor-universal', 1, 'Endurecedor universal', 'El Endurecedor Universal 31791 está echo a base de ioscinatos. Manténgase bien tapado ya que este producto es afectado por la humedad.No se use otro reductor,ya que podría perjudicar la mezcla.No prepare más material del ...', 'El Endurecedor Universal 31791 está echo a base de ioscinatos. Manténgase bien tapado ya que este producto es afectado por la humedad.No se use otro reductor,ya que podría perjudicar la mezcla.No prepare más material del que va a usar,ya que el tiempo de vida útil de la mezcla es de 3 a 5 horas.No regrese material preparado al bote original.En la limpieza del equipo,se recomienda usar Thinner E 32100. No deje material mezclado en el equipo.', '[{\"foto\":\"vistas/img/multimedia/endurecedor-universal/edurecedor-universal-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/endurecedor-universal/edurecedor-universal-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/endurecedor-universal/edurecedor-universal-lateral.jpg\"}]', '{\"Unidad\":[\"Litro\"],\"Codigo\":[\"331791.41\"],\"Marca\":[\"EXCELO\"]}', 573, 'vistas/img/productos/endurecedor-universal.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1.063, '0.00', '0.00', '0.00', 3, '2020-04-28 22:50:17', 3, 0, 1, 10, 2, 4, 1, 'endurecedores'),
(19, 1, 27, 'fisico', 'endurecedor-para-sherprimer', 1, 'Endurecedor Para Sherprimer', 'Es un producto de calidad formulado a base de Resinas de Poli-isocianato para utilizarse con el Primario de Relleno SherPrimer Ng, su uso proporciona alta resistencia química, dureza, durabilidad del primario y puede mejorar...', 'Es un producto de calidad formulado a base de Resinas de Poli-isocianato para utilizarse con el Primario de Relleno SherPrimer Ng, su uso proporciona alta resistencia química, dureza, durabilidad del primario y puede mejorar el tiempo de secado, no afecta el brillo, nivelación, ni la tonalidad, se debe de emplear siempre en las proporciones que se  indica ya que de lo  contrario puede afectar negativamente las propiedades del primario.', '[{\"foto\":\"vistas/img/multimedia/endurecedor-para-sherprimer/sherprimer-ng-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/endurecedor-para-sherprimer/sherprimer-ng-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/endurecedor-para-sherprimer/sherprimer-ng-traser.jpg\"}]', '{\"Unidad\":[\"Litro\"],\"Codigo\":[\"331769.41\"],\"Marca\":[\"EXCELO\"]}', 395, 'vistas/img/productos/endurecedor-para-sherprimer.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1.196, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'endurecedores'),
(20, 1, 27, 'fisico', 'reductor-universal-tux-2', 1, 'Reductor Universal Tux 2', 'La línea TUX son thinners universales de la más alta calidad, proporcionan el más alto brillo y excelente nivelación. Los thinne TUX han sido formulados especialmente para diluir primers y recubrientes como lacas acrílic...', 'La línea TUX son thinners universales de la más alta calidad, proporcionan el más alto brillo y excelente nivelación. Los thinne TUX han sido formulados especialmente para diluir primers y recubrientes como lacas acrílicas, lacas de nitro, bases color acrílicas y poliester, esmaltes económicos. Tux 2 Clima Fresco 16 grados a 27 grados centigrados.', '[{\"foto\":\"vistas/img/multimedia/reductor-universal-tux-2/tux2-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/reductor-universal-tux-2/tux2-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/reductor-universal-tux-2/tux2-lateral.jpg\"}]', '{\"Unidad\":[\"Galon\"],\"Codigo\":[\"332115.51\"],\"Marca\":[\"EXCELO\"]}', 632, 'vistas/img/productos/reductor-universal-tux-2.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 3.4576, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'reductores'),
(21, 1, 27, 'fisico', 'reductor-acrilico-end-normal', 1, 'Reductor Acrílico END Normal', 'Son solventes formulados especialmente para diluir productos que serán mezclados con el Endurecedor Universal, Multiusos o con el Endurecedor para Sher Truck Plus, proporcionando el más alto brillo y excelente nivelación. ...', 'Son solventes formulados especialmente para diluir productos que serán mezclados con el Endurecedor Universal, Multiusos o con el Endurecedor para Sher Truck Plus, proporcionando el más alto brillo y excelente nivelación. Estos reductores aseguran una reacción de catalización al 100 por ciento ya que no contienen componentes que reaccionen con el endurecedor, haciendo que los productos con los que se utilizan alcancen su máxima dureza, resistencia química, durabilidad y una óptima adherencia sobre los sustratos recomendados en cada caso.', '[{\"foto\":\"vistas/img/multimedia/reductor-acrilico-end-normal/reductor-end-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/reductor-acrilico-end-normal/reductor-end-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/reductor-acrilico-end-normal/reductor-end-traser.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"332036.61\"],\"Marca\":[\"EXCELO\"]}', 1853, 'vistas/img/productos/reductor-acrilico-end-normal.jpg', 10, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 17, '0.00', '0.00', '0.00', 3, '2020-04-28 22:49:35', 3, 0, 1, 10, 2, 4, 1, 'reductores'),
(22, 5, 16, 'fisico', 'xclo-body-filler', 1, 'Xclo Body Filler', 'Masilla de secado por catalización, para reparaciones de hojalateria en la industria automotriz y en cualquier otra donde se requiera resanar y o nivelar imperfecciones de superficies metálicas de manera rápida y fácil. S...', 'Masilla de secado por catalización, para reparaciones de hojalateria en la industria automotriz y en cualquier otra donde se requiera resanar y o nivelar imperfecciones de superficies metálicas de manera rápida y fácil. Suavidad al lijar y muy poca pegajosidad no sangra o amarillea. SUSTRATOS RECOMENDADOS: metales ferrosos debidamente acondicionados, fibra de vidrio, madera y algunos plásticos rígidos. TIEMPO DE GELADO: 10 a 15 minutos. Tener cuidado en tiempo de calor por el secado tan rápido. MEZCLA: 60 a 1. 2 por ciento de Catalizador de lo que vamos a utilizar de Rellenador.', '[{\"foto\":\"vistas/img/multimedia/xclo-body-filler/xclo-body-filler-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/xclo-body-filler/xclo-body-filler-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/xclo-body-filler/xclo-body-filler-lateral.jpg\"}]', '{\"Unidad\":[\"Galon\"],\"Codigo\":[\"339900.51\"],\"Marca\":[\"EXCELO\"]}', 272, 'vistas/img/productos/xclo-body-filler.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 4.0656, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'estetica automotriz'),
(23, 3, 8, 'fisico', 'plaster-de-piroxilina-auto-gris-claro', 1, 'Plaster de Piroxilina Auto Gris Claro', 'El plaster de Piroxilina es un producto de secado al aire de excelente calidad listo para usarse en el repintado automotriz, desarrollado específicamente para corregir pequeñas irregularidades de la capa de primario como po...', 'El plaster de Piroxilina es un producto de secado al aire de excelente calidad listo para usarse en el repintado automotriz, desarrollado específicamente para corregir pequeñas irregularidades de la capa de primario como porosidades, rayas de lija número 150 o menores, etc, sus principales características son su fácil aplicación, secado rápido, suave al lijar, excelente capacidad de relleno y gran adherencia sobre todos los primarios.', '[{\"foto\":\"vistas/img/multimedia/plaster-de-piroxilina-auto-gris-claro/plaster-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/plaster-de-piroxilina-auto-gris-claro/plaster-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/plaster-de-piroxilina-auto-gris-claro/plaster-lateral.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"311020.61\"],\"Marca\":[\"EXCELO\"]}', 3338, 'vistas/img/productos/plaster-de-piroxilina-auto-gris-claro.jpg', 7, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 27.4, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'plaster'),
(24, 6, 18, 'fisico', 'imperial-wetordry-9x11-pul-p800', 1, 'Imperial Wetordry 9x11 pul P800', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, s...', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', '[{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p800/wetordry-p800-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p800/wetordry-p800-frontal.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"02035\"],\"Marca\":[\"3M\"]}', 11, 'vistas/img/productos/imperial-wetordry-9x11-pul-p800.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0111, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'lijas'),
(25, 6, 18, 'fisico', 'imperial-wetordry-9x11-pul-p600', 1, 'Imperial Wetordry 9x11 pul P600', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, s...', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', '[{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p600/wetordry-p600-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p600/wetordry-p600-frontal.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"02036\"],\"Marca\":[\"3M\"]}', 11, 'vistas/img/productos/imperial-wetordry-9x11-pul-p600.jpg', 3, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0115, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'lijas'),
(26, 6, 18, 'fisico', 'imperial-wetordry-9x11-pul-p400', 1, 'Imperial Wetordry 9x11 pul P400', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, s...', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', '[{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p400/wetordry-p400-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p400/wetordry-p400-frontal.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"02038\"],\"Marca\":[\"3M\"]}', 11, 'vistas/img/productos/imperial-wetordry-9x11-pul-p400.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0127, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'lijas'),
(27, 6, 18, 'fisico', 'imperial-wetordry-9x11-pul-p320', 1, 'Imperial Wetordry 9x11 pul P320', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, s...', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', '[{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p320/wetordry-p320-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p320/wetordry-p320-frontal.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"02040\"],\"Marca\":[\"3M\"]}', 11, 'vistas/img/productos/imperial-wetordry-9x11-pul-p320.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0151, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'lijas'),
(28, 6, 18, 'fisico', 'imperial-wetordry-9x11-pul-p220', 1, 'Imperial Wetordry 9x11 pul P220', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, s...', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', '[{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p220/wetordry-p220-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p220/wetordry-p220-frontal.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"02043\"],\"Marca\":[\"3M\"]}', 11, 'vistas/img/productos/imperial-wetordry-9x11-pul-p220.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0166, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'lijas'),
(29, 6, 18, 'fisico', 'imperial-wetordry-9x11-pul-p2000', 1, 'Imperial Wetordry 9x11 pul P2000', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, s...', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', '[{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p2000/wetordry-p2000-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p2000/wetordry-p2000-frontal.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"02020\"],\"Marca\":[\"3M\"]}', 29, 'vistas/img/productos/imperial-wetordry-9x11-pulp2000.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0089, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'lijas'),
(30, 6, 18, 'fisico', 'imperial-wetordry-9x11-pul-p1500', 1, 'Imperial Wetordry 9x11 pul P1500', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, s...', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', '[{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p1500/wetordry-p1500-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p1500/wetordry-p1500-frontal.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"02032\"],\"Marca\":[\"3M\"]}', 29, 'vistas/img/productos/imperial-wetordry-9x11-pul-p1500.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0092, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'lijas'),
(31, 6, 18, 'fisico', 'imperial-wetordry-9x11-pul-p1200', 1, 'Imperial Wetordry 9x11 pul P1200', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, s...', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', '[{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p1200/wetordry-p1200-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p1200/wetordry-p1200-frontal.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"02033\"],\"Marca\":[\"3M\"]}', 29, 'vistas/img/productos/imperial-wetordry-9x11-pul-p1200.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0094, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'lijas'),
(32, 6, 18, 'fisico', 'imperial-wetordry-9x11-pul-p1000', 1, 'Imperial Wetordry 9x11 pul P1000', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, s...', 'Lija mineral de óxido de aluminio está revestida en una solución flexible forro impermeable negro, la mejora de la construcción de papel para un acabado consistente uniforme. Lijado húmedo o seco de la pintura o metal, se utiliza en el lijado en húmedo y zonas ásperas. También puede ser utilizado para lijado final de relleno de plástico y masilla. Mejor producto para lijado en húmedo.', '[{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p1000/wetordry-p1000-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/imperial-wetordry-9x11-pul-p1000/wetordry-p1000-frontal.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"02034\"],\"Marca\":[\"3M\"]}', 29, 'vistas/img/productos/imperial-wetordry-9x11-pul-p1000.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0094, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'lijas'),
(33, 4, 26, 'fisico', 'retenedor-para-filtro-5n11-y-5p71', 1, 'Retenedor Para Filtro 5N11 y 5P71', 'El retenedor del filtro 501, componente del sistema de protección respiratoria, mantiene en su lugar los filtros de partículas 5N11 y 5P71/07194 (AAD)....', 'El retenedor del filtro 501, componente del sistema de protección respiratoria, mantiene en su lugar los filtros de partículas 5N11 y 5P71/07194 (AAD).', '[{\"foto\":\"vistas/img/multimedia/retenedor-para-filtro-5n11-y-5p71/retenedor-filtro-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/retenedor-para-filtro-5n11-y-5p71/retenedor-filtro-lateral.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"501\"],\"Marca\":[\"3M\"]}', 56, 'vistas/img/productos/retenedor-para-filtro-5n11-y-5p71.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0104, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'equipos de aplicacion'),
(34, 4, 26, 'fisico', 'respirador-media-cara-tamano-mediano', 1, 'Respirador Media Cara Tamaño Mediano', 'El respirador tipo semimáscara es una alternativa de calidad a bajo costo si lo que requieres es un equipo seguro y de calidad. Este se utiliza en combinación con dos filtros livianos que se acoplan a la pieza facial median...', 'El respirador tipo semimáscara es una alternativa de calidad a bajo costo si lo que requieres es un equipo seguro y de calidad. Este se utiliza en combinación con dos filtros livianos que se acoplan a la pieza facial mediante un ajuste tipo bayoneta. Este respirador es muy efectivo contra una gran variedad de gases, vapores y partículas dañinas y esta elaborado con un diseño liviano en material de elastómero termoplástico.', '[{\"foto\":\"vistas/img/multimedia/respirador-media-cara-tamano-mediano/respirador-media-cara-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/respirador-media-cara-tamano-mediano/respirador-media-cara-lateral2.jpg\"},{\"foto\":\"vistas/img/multimedia/respirador-media-cara-tamano-mediano/respirador-media-cara-lateral1.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"6200\"],\"Marca\":[\"3M\"]}', 374, 'vistas/img/productos/respirador-media-cara-tamano-mediano.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.1225, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'respiradores'),
(35, 4, 26, 'fisico', 'filtro-para-particulas-base-agua', 1, 'Filtro Para Partículas Base Agua', 'Aprobado por NIOSH para ambientes que contengan ciertas partículas no aceitosas. Aplicación: Pintura con spray, petroquímica y manufactura química, así como pulverización pesticida....', 'Aprobado por NIOSH para ambientes que contengan ciertas partículas no aceitosas. Aplicación: Pintura con spray, petroquímica y manufactura química, así como pulverización pesticida.', '[{\"foto\":\"vistas/img/multimedia/filtro-para-particulas-pintura-base-agua/filtro-base-agua-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/filtro-para-particulas-pintura-base-agua/filtro-base-agua-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"5N11\"],\"Marca\":[\"3M\"]}', 48, 'vistas/img/productos/filtro-para-particulas-pintura-base-agua.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.00299, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'equipos de aplicacion'),
(36, 4, 26, 'fisico', 'cartucho-para-vapores-organicos', 1, 'Cartucho Para Vapores Orgánicos', 'Brinda protección respiratoria contra ciertos vapores orgánicos y algunos alcoholes (excepto metanol), algunas acetonas, algunos solventes (excepto cloruro de metileno, tetrafluoretileno, propionaldehído y otros), etc. Apr...', 'Brinda protección respiratoria contra ciertos vapores orgánicos y algunos alcoholes (excepto metanol), algunas acetonas, algunos solventes (excepto cloruro de metileno, tetrafluoretileno, propionaldehído y otros), etc. Aprobado por NIOSH contra no más de 1000 p.p.m de ciertos vapores orgánicos. Se usa con los respiradores de media cara y cara completa 3M con soporte de filtro de bayoneta.', '[{\"foto\":\"vistas/img/multimedia/cartucho-para-vapores-organicos/cartucho-vapores-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/cartucho-para-vapores-organicos/cartucho-vapores-lateral.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"6001\"],\"Marca\":[\"3M\"]}', 170, 'vistas/img/productos/cartucho-para-vapores-organicos.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.1979, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'equipos de aplicacion'),
(37, 7, 25, 'fisico', 'tela-pegajosa-dynatron-amarillo', 1, 'Tela Pegajosa Dynatron Amarillo', 'Los paños que atrapan polvo de Dynatron están hechos con una mezcla precisa de resinas, aceites y plastificantes que mantienen el paño suave y pegajoso para asegurarse de una superficie lo más limpia posible para pintar....', 'Los paños que atrapan polvo de Dynatron están hechos con una mezcla precisa de resinas, aceites y plastificantes que mantienen el paño suave y pegajoso para asegurarse de una superficie lo más limpia posible para pintar.', '[{\"foto\":\"vistas/img/multimedia/tela-pegajosa-dynatron-amarillo/dynatron-amarillo-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/tela-pegajosa-dynatron-amarillo/dynatron-amarillo-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/tela-pegajosa-dynatron-amarillo/dynatron-amarillo-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"B812\"],\"Marca\":[\"3M\"]}', 25, 'vistas/img/productos/tela-pegajosa-dynatron-amarillo.jpg', 3, 4, 0, 0, 1, 0, 1, 18.75, 25, '', '2020-04-30 23:59:59', 0.0137, '0.00', '0.00', '0.00', 3, '2020-04-29 00:27:05', 3, 0, 1, 10, 2, 4, 1, 'complementos'),
(38, 1, 3, 'fisico', 'sellador-de-uretano-blanco', 1, 'Sellador De Uretano Blanco', 'Un sellador de unión con muchos sólidos ideal para sellar juntas y uniones automotrices interiores y exteriores y en vehículos de recreación. Se adhiere bien al metal imprimado y superficies pintadas. Puede ser suavizado ...', 'Un sellador de unión con muchos sólidos ideal para sellar juntas y uniones automotrices interiores y exteriores y en vehículos de recreación. Se adhiere bien al metal imprimado y superficies pintadas. Puede ser suavizado a un alisado de bordes y cepillado. No es pegajoso y se puede pintar en 30 a 45 minutos. De muchos sólidos, un solo componente que cura en la humedad, no se encoge, no se agrieta y se puede pintar, de olor bajo, capaz de rellenar cavidades grandes, se adhiere bien al metal imprimado y superficies pintadas, se puede aplanar a un alisado de bordes o cepillar y reduce el riesgo de trabajos dobles asociados con el uso de selladores de uniones a base de solventes.', '[{\"foto\":\"vistas/img/multimedia/sellador-de-uretano-blanco/sellador-uretano-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/sellador-de-uretano-blanco/sellador-uretano-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/sellador-de-uretano-blanco/sellador-uretano-lateral.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"08368\"],\"Marca\":[\"3M\"]}', 198, 'vistas/img/productos/sellador-de-uretano-blanco.jpg', 3, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.3988, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'selladores'),
(39, 5, 16, 'fisico', 'rellenador-quick-grip-galon', 1, 'Rellenador Quick Grip Galon', 'Esta fórmula cremosa es fácil de lijar y se une rápidamente al acero galvanizado, aluminio, electrocapa, fibra de vidrio, hoja de compuesto moldeado (smc), epóxido curado, y primarios de uretano....', 'Esta fórmula cremosa es fácil de lijar y se une rápidamente al acero galvanizado, aluminio, electrocapa, fibra de vidrio, hoja de compuesto moldeado (smc), epóxido curado, y primarios de uretano.', '[{\"foto\":\"vistas/img/multimedia/rellenador-quick-grip-galon/quick-grip-galon-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/rellenador-quick-grip-galon/quick-grip-galon-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/rellenador-quick-grip-galon/quick-grip-galon-traser.jpg\"}]', '{\"Unidad\":[\"Galon\"],\"Codigo\":[\"33181.51\"],\"Marca\":[\"3M\"]}', 617, 'vistas/img/productos/rellenador-quick-grip-galon.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 3.3256, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'estetica automotriz'),
(40, 5, 16, 'fisico', 'rellenador-platinum-select', 1, 'Rellenador Platinum Select', 'Está diseñado para aumentar la productividad reduciendo agujeros hasta un 99% y reduciendo el uso de primario hasta un 30%. Ofrece rápida adherencia superficial al aluminio, acero, acero galvanizado, electrocapa, fibra de ...', 'Está diseñado para aumentar la productividad reduciendo agujeros hasta un 99% y reduciendo el uso de primario hasta un 30%. Ofrece rápida adherencia superficial al aluminio, acero, acero galvanizado, electrocapa, fibra de vidrio y Hoja de Compuesto Moldeado (SMC).', '[{\"foto\":\"vistas/img/multimedia/rellenador-platinum-select/rellenador-platinum-select-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/rellenador-platinum-select/rellenador-platinum-select-traser.jpg\"}]', '{\"Unidad\":[\"Galon\"],\"Codigo\":[\"31131.51\"],\"Marca\":[\"3M\"]}', 797, 'vistas/img/productos/rellenador-platinum-select.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 3.5659, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'estetica automotriz'),
(41, 5, 14, 'fisico', 'superbuff-borla-de-lana-doble-cara-9-pul', 1, 'Superbuff Borla De Lana Doble Cara 9 pul', 'Se trata de una borla para lijado de dos caras, hecha de lana de mezcla y buen rendimiento, cuenta con una efectividad comprobada. Sirve para refinar las rayaduras producidas por abrasivos de grano P1200 o más finos y otros ...', 'Se trata de una borla para lijado de dos caras, hecha de lana de mezcla y buen rendimiento, cuenta con una efectividad comprobada. Sirve para refinar las rayaduras producidas por abrasivos de grano P1200 o más finos y otros defectos en la superficie de la pintura. Se debe utilizar con compuestos 3M y el adaptador 05710 3M.', '[{\"foto\":\"vistas/img/multimedia/superbuff-borla-de-lana-doble-cara-9-pul/borla-doble-cara-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/superbuff-borla-de-lana-doble-cara-9-pul/borla-doble-cara-traser2.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"05703\"],\"Marca\":[\"3M\"]}', 697, 'vistas/img/productos/superbuff-borla-de-lana-doble-cara-9-pul.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.3096, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'borlas');
INSERT INTO `productos` (`id`, `id_categoria`, `id_subcategoria`, `tipo`, `ruta`, `estado`, `titulo`, `titular`, `descripcion`, `multimedia`, `detalles`, `precio`, `portada`, `vistas`, `ventas`, `vistasGratis`, `ventasGratis`, `ofertadoPorCategoria`, `ofertadoPorSubCategoria`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `peso`, `largo`, `ancho`, `alto`, `entrega`, `fecha`, `stock`, `agregarStock`, `stockMin`, `stockMax`, `entradas`, `salidas`, `existencias`, `tipoProducto`) VALUES
(42, 5, 14, 'fisico', 'respaldo-para-pulidora-5-pul', 1, 'Respaldo Para Pulidora 5 pul', 'Respaldo para pulidora doble acción con entrada 5/16\'\' 24 hilos, le queda a todas las pulidoras de doble acción. Con este respaldo puedes usar tus esponjas de 5 pulgadas con todo seguridad....', 'Respaldo para pulidora doble acción con entrada 5/16\'\' 24 hilos, le queda a todas las pulidoras de doble acción. Con este respaldo puedes usar tus esponjas de 5 pulgadas con todo seguridad.', '[{\"foto\":\"vistas/img/multimedia/respaldo-para-pulidora-5-pul/respaldo-pulidora-5-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/respaldo-para-pulidora-5-pul/respaldo-pulidora-5-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"E112\"],\"Marca\":[\"3M\"]}', 297, 'vistas/img/productos/respaldo-para-pulidora-5-pul.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.1487, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'respaldos'),
(43, 5, 14, 'fisico', 'perfect-it-ultrafina-borla-esponja-azul', 1, 'Perfect It Ultrafina Borla Esponja Azul', 'El cojín de espuma ayuda a eliminar las marcas de remolino en superficies pintadas, aún en automóviles con pintura oscura difíciles. Como un paso de acabado después de remover las marca....', 'El cojín de espuma ayuda a eliminar las marcas de remolino en superficies pintadas, aún en automóviles con pintura oscura difíciles. Como un paso de acabado después de remover las marca.', '[{\"foto\":\"vistas/img/multimedia/perfect-it-ultrafina-borla-esponja-azul/borla-esponja-azul-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/perfect-it-ultrafina-borla-esponja-azul/borla-esponja-azul-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"05733\"],\"Marca\":[\"3M\"]}', 426, 'vistas/img/productos/perfect-it-ultrafina-borla-esponja-azul.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0468, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'borlas'),
(44, 5, 14, 'fisico', 'perfect-it-borla-esponja-abrillantar-gris-8-pul', 1, 'Perfect It Borla Esponja Abrillantar Gris 8 pul', 'Se utiliza para eliminar las marcas en espiral que dejan los compuestos y los defectos leves en la superficie de la pintura. Borla de abrillantado de una sola cara. Fabricada de esponja de color negro....', 'Se utiliza para eliminar las marcas en espiral que dejan los compuestos y los defectos leves en la superficie de la pintura. Borla de abrillantado de una sola cara. Fabricada de esponja de color negro.', '[{\"foto\":\"vistas/img/multimedia/perfect-it-borla-esponja-abrillantar-gris-8-pul/borla-gris-8-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/perfect-it-borla-esponja-abrillantar-gris-8-pul/borla-gris-8-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"05725\"],\"Marca\":[\"3M\"]}', 855, 'vistas/img/productos/perfect-it-borla-esponja-abrillantar-gris-8-pul.jpg', 5, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0618, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'borlas'),
(45, 5, 14, 'fisico', 'perfect-it-borla-esponja-abrillantar-2-caras', 1, 'Perfect It Borla Esponja Abrillantar 2 Caras', 'Borla lustradora gris de espuma de gran rendimiento, 2 caras. Quita marcas de remolino de los compuestos y defectos finos superficiales en la pintura. Diseño único con Quick Connect (conexión rápida). La marca Perfect-It ...', 'Borla lustradora gris de espuma de gran rendimiento, 2 caras. Quita marcas de remolino de los compuestos y defectos finos superficiales en la pintura. Diseño único con Quick Connect (conexión rápida). La marca Perfect-It significa que esta es la borla para pulir de espuma y doble cara con rendimiento más alto de 3M.', '[{\"foto\":\"vistas/img/multimedia/perfect-it-borla-esponja-abrillantar-2-caras/borla-gris-2caras-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/perfect-it-borla-esponja-abrillantar-2-caras/borla-gris-2caras-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"05707\"],\"Marca\":[\"3M\"]}', 840, 'vistas/img/productos/perfect-it-borla-esponja-abrillantar-2-caras.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.1637, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'borlas'),
(46, 5, 14, 'fisico', 'adaptador-superbuff-3m-para-pulidoras', 1, 'Adaptador Superbuff 3M Para Pulidoras', 'Este adaptador para máquinas de pulir sirve para conectar y desconectar rápidamente borlas de pulido de dos caras. Se debe utilizar con borlas para pulido y borlas para lijado marca 3M Perfect-It. Centra las borlas para uti...', 'Este adaptador para máquinas de pulir sirve para conectar y desconectar rápidamente borlas de pulido de dos caras. Se debe utilizar con borlas para pulido y borlas para lijado marca 3M Perfect-It. Centra las borlas para utilizarlas con mayor eficiencia. Facilita el intercambio de las borlas para pulido y las borlas para lijado. Posee roscas de 16 mm.', '[{\"foto\":\"vistas/img/multimedia/adaptador-superbuff-3m-para-pulidoras/adaptador-superbuff-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/adaptador-superbuff-3m-para-pulidoras/adaptador-superbuff-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/adaptador-superbuff-3m-para-pulidoras/adaptador-superbuff-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"05710\"],\"Marca\":[\"3M\"]}', 214, 'vistas/img/productos/adaptador-superbuff-3m-para-pulidoras.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0406, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'adaptadores'),
(47, 5, 14, 'fisico', 'adaptador-para-borlas-doble-cara-5-8', 1, 'Adaptador Para Borlas Doble Cara 5-8', 'Este adaptador para máquinas de pulir sirve para conectar y desconectar rápidamente borlas de pulido de dos caras. Se debe utilizar con borlas para pulido y borlas para lijado marca 3M. Centra las borlas para utilizarlas co...', 'Este adaptador para máquinas de pulir sirve para conectar y desconectar rápidamente borlas de pulido de dos caras. Se debe utilizar con borlas para pulido y borlas para lijado marca 3M. Centra las borlas para utilizarlas con mayor eficiencia. Facilita el intercambio de las borlas para pulido y las borlas para lijado. Posee roscas de 16 mm.', '[{\"foto\":\"vistas/img/multimedia/adaptador-para-borlas-doble-cara-5-8/adaptador-5-8-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/adaptador-para-borlas-doble-cara-5-8/adaptador-5-8-lateral.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"05752\"],\"Marca\":[\"3M\"]}', 790, 'vistas/img/productos/adaptador-para-borlas-doble-cara-5-8.jpg', 3, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.1043, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'adaptadores'),
(48, 5, 14, 'fisico', '3m-removedor-de-marcas-econopack', 1, '3m Removedor De Marcas Econopack', 'Compuesto para pulido a máquina de alto rendimiento. Elimina de manera rápida y eficaz las marcas en circulares que dejan los compuestos y produce un acabado espectacular. De buen manejo y fácil limpieza. Pulidor de alto r...', 'Compuesto para pulido a máquina de alto rendimiento. Elimina de manera rápida y eficaz las marcas en circulares que dejan los compuestos y produce un acabado espectacular. De buen manejo y fácil limpieza. Pulidor de alto rendimiento, diseñado para quitar rápidamente los hologramas de todos los tipos de pinturas automotrices y produce un acabado excepcional.', '[{\"foto\":\"vistas/img/multimedia/3m-removedor-de-marcas-econopack/removedor-marcas-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/3m-removedor-de-marcas-econopack/removedor-marcas-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"05994P\"],\"Marca\":[\"3M\"]}', 205, 'vistas/img/productos/3m-removedor-de-marcas-econopack.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.234, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'estetica automotriz'),
(49, 5, 14, 'fisico', '3m-compuesto-pulidor-econopack-225-ml', 1, '3m Compuesto Pulidor Econopack 225 ml', 'Compuesto pulidor de medio corte diseñado para remover rayas de lija y dejar un acabado fino en pinturas automotrices. Ha demostrado efectividad. Diseñado especialmente para corte medio, pulidor líquido para quitar rayas d...', 'Compuesto pulidor de medio corte diseñado para remover rayas de lija y dejar un acabado fino en pinturas automotrices. Ha demostrado efectividad. Diseñado especialmente para corte medio, pulidor líquido para quitar rayas de lija de granos 1200, 1500, y 2000 en pinturas automotrices incluyendo capas claras. ', '[{\"foto\":\"vistas/img/multimedia/3m-compuesto-pulidor-econopack-225-ml/econopak-255-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/3m-compuesto-pulidor-econopack-225-ml/econopak-255-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"05971P\"],\"Marca\":[\"3M\"]}', 131, 'vistas/img/productos/3m-compuesto-pulidor-econopack-225-ml.jpg', 8, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.2728, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'estetica automotriz'),
(50, 5, 14, 'fisico', 'perfect-it-1', 1, 'Perfect It 1', 'El Material de Acabado 3M Perfect-It 1 es un material de acabado de corte rápido diseñado para eliminar las rayaduras producidas por lijas de grano P3000 o más fino. Cuando se lo usa con las Almohadillas de Gomaespuma para...', 'El Material de Acabado 3M Perfect-It 1 es un material de acabado de corte rápido diseñado para eliminar las rayaduras producidas por lijas de grano P3000 o más fino. Cuando se lo usa con las Almohadillas de Gomaespuma para Acabado 3M Perfect-It 1, esta fórmula única corta como un compuesto pero se maneja y brinda un acabado como un pulido, de alto brillo y sin marcas en espiral, ELIMINA RAYADURAS ABRASIVAS 3M TRIZACT.', '[{\"foto\":\"vistas/img/multimedia/perfect-it-1/perfect-it-1-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/perfect-it-1/perfect-it-1-traser.jpg\"}]', '{\"Unidad\":[\"Litro\"],\"Codigo\":[\"36064.41\"],\"Marca\":[\"3M\"]}', 800, 'vistas/img/productos/perfect-it-1.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1.0792, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'estetica automotriz'),
(51, 6, 20, 'fisico', 'disco-hookit-trizact-p5000-6-pul', 1, 'Disco Hookit Trizact P5000 6 pul', 'Los discos Trizact 5000 quitan las rayas finas del grano P3000. Pueden reducir o eliminar la necesidad de usar compuesto pulidor en situaciones específicas. Estos discos también pueden eliminar la necesidad de usar borlas d...', 'Los discos Trizact 5000 quitan las rayas finas del grano P3000. Pueden reducir o eliminar la necesidad de usar compuesto pulidor en situaciones específicas. Estos discos también pueden eliminar la necesidad de usar borlas de lana para pulir en reacabados de pintura automotriz.', '[{\"foto\":\"vistas/img/multimedia/disco-hookit-trizact-p5000-6-pul/hookit-trizact-p5000.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-trizact-p5000-6-pul/hookit-trizact-p5000-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"30662\"],\"Marca\":[\"3M\"]}', 104, 'vistas/img/productos/disco-hookit-trizact-p5000-6-pul.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0109, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'discos'),
(52, 6, 20, 'fisico', 'disco-hookit-trizact-p3000-6-pul', 1, 'Disco Hookit Trizact P3000 6 pul', 'El disco de espuma es usado en un sistema de reparación de retoques para remover rayas de lijado de granos P1200 y P1500....', 'El disco de espuma es usado en un sistema de reparación de retoques para remover rayas de lijado de granos P1200 y P1500.', '[{\"foto\":\"vistas/img/multimedia/disco-hookit-trizact-p3000-6-pul/hookit-trizact-p3000.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-trizact-p3000-6-pul/hookit-trizact-p3000-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"02085\"],\"Marca\":[\"3M\"]}', 104, 'vistas/img/productos/disco-hookit-trizact-p3000-6-pul.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0107, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'discos'),
(53, 6, 20, 'fisico', 'disco-hookit-cubitron-ii-282-perforaciones-g80', 1, 'Disco Hookit Cubitron Ii 282 Perforaciones G80', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice nuestros discos de grano 80+ para lijar rellen...', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice nuestros discos de grano 80+ para lijar rellenador plástico, el alisado áspero de bordes o el lijado final antes de imprimar.', '[{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g80/hookit-g80-disco.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g80/hookit-g80-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g80/hookit-g80.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g80/hookit-g80-disco-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"31371\"],\"Marca\":[\"3M\"]}', 22, 'vistas/img/productos/disco-hookit-cubitron-ii-282-perforaciones-g80.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0105, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'discos'),
(54, 6, 20, 'fisico', 'disco-hookit-cubitron-ii-282-perforaciones-g220', 1, 'Disco Hookit Cubitron Ii 282 Perforaciones G220', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice nuestros discos de grano 220+ para lijar relle...', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice nuestros discos de grano 220+ para lijar rellenador plástico, el alisado áspero de bordes o el lijado final antes de imprimar.', '[{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g220/hookit-g220-disco.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g220/hookit-g220-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g220/hookit-g220.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g220/hookit-g220-disco-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"31481\"],\"Marca\":[\"3M\"]}', 22, 'vistas/img/productos/disco-hookit-cubitron-ii-282-perforaciones-g220.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0066, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'discos'),
(55, 6, 20, 'fisico', 'disco-hookit-cubitron-ii-282-perforaciones-g180', 1, 'Disco Hookit Cubitron Ii 282 Perforaciones G180', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice estos discos de grano 180+ para lijar rellenad...', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice estos discos de grano 180+ para lijar rellenador plástico, el alisado áspero de bordes o el lijado final antes de imprimar.', '[{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g180/hookit-g180-disco.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g180/hookit-g180-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g180/hookit-g180.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g180/hookit-g180-disco-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"31374\"],\"Marca\":[\"3M\"]}', 22, 'vistas/img/productos/disco-hookit-cubitron-ii-282-perforaciones-g180.jpg', 3, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.007, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'discos'),
(56, 6, 20, 'fisico', 'disco-hookit-cubitron-ii-282-perforaciones-g150', 1, 'Disco Hookit Cubitron Ii 282 Perforaciones G150', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice los discos de grano 150+ para lijar rellenador...', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice los discos de grano 150+ para lijar rellenador plástico, el alisado áspero de bordes o el lijado final antes de imprimar.', '[{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g150/hookit-g150-disco.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g150/hookit-g150.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g150/hookit-g150-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g150/hookit-g150-disco-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"31373\"],\"Marca\":[\"3M\"]}', 22, 'vistas/img/productos/disco-hookit-cubitron-ii-282-perforaciones-g150.jpg', 2, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0075, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'discos'),
(57, 6, 20, 'fisico', 'disco-hookit-cubitron-ii-282-perforaciones-g120', 1, 'Disco Hookit Cubitron Ii 282 Perforaciones G120', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice los discos de grano 120+ para lijar rellenador...', 'Disco de larga duración y acción rápida para lijar rellenador de carrocería y el alisado de bordes. Modelo de muchos agujeros para la extracción excelente del polvo. Utilice los discos de grano 120+ para lijar rellenador plástico, el alisado áspero de bordes o el lijado final antes de imprimar.', '[{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g120/hookit-g120-disco.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g120/hookit-g120-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g120/hookit-g120.jpg\"},{\"foto\":\"vistas/img/multimedia/disco-hookit-cubitron-ii-282-perforaciones-g120/hookit-g120-disco-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"31372\"],\"Marca\":[\"3M\"]}', 22, 'vistas/img/productos/disco-hookit-cubitron-ii-282-perforaciones-g120.jpg', 5, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0.0081, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'discos'),
(58, 7, 25, 'fisico', 'pelicula-plastica-amarilla-365-mt', 1, 'Pelicula Plastica Amarilla 365 mt', 'Película plástica amarilla para briseado de 3.65 X 106.6m, fabricada con polietileno de 3 milésimas, protege del briseado durante las operaciones de pintado....', 'Película plástica amarilla para briseado de 3.65 X 106.6m, fabricada con polietileno de 3 milésimas, protege del briseado durante las operaciones de pintado.', '[{\"foto\":\"vistas/img/multimedia/pelicula-plastica-amarilla-365-mt/pelicula-plastica.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"06700\"],\"Marca\":[\"3M\"]}', 618, 'vistas/img/productos/pelicula-plastica-amarilla-365-mt.jpg', 0, 4, 0, 0, 1, 0, 1, 463.5, 25, '', '2020-04-30 23:59:59', 3.7556, '0.00', '0.00', '0.00', 3, '2020-04-29 00:26:59', 3, 0, 1, 10, 2, 4, 1, 'complementos'),
(59, 7, 25, 'fisico', 'papel-para-enmascarar-blanco-36-pul', 1, 'Papel Para Enmascarar Blanco 36 pul', 'Papel de enmascarar de color blanco fabricado específicamente para aplicaciones de pintura automotriz, con excelente resistencia a los solventes de pintura, uretanos, bases y esmaltes transparentes. Amoldable. Papel firmemen...', 'Papel de enmascarar de color blanco fabricado específicamente para aplicaciones de pintura automotriz, con excelente resistencia a los solventes de pintura, uretanos, bases y esmaltes transparentes. Amoldable. Papel firmemente unido para reducir o evitar la contaminación con pelusas o fibras.', '[{\"foto\":\"vistas/img/multimedia/papel-para-enmascarar-blanco-36-pul/papael-enmascarar.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"06540\"],\"Marca\":[\"3M\"]}', 1512, 'vistas/img/productos/papel-para-enmascarar-blanco-36-pul.jpg', 0, 4, 0, 0, 1, 0, 1, 1134, 25, '', '2020-04-30 23:59:59', 8.349, '0.00', '0.00', '0.00', 3, '2020-04-29 00:26:59', 3, 0, 1, 10, 2, 4, 1, 'complementos'),
(60, 7, 25, 'fisico', 'masking-tape-uso-general-3-4-pul', 1, 'Masking Tape Uso General 3-4 pul', 'Es un tipo de cinta adhesiva fabricada generalmente con papel, de fácil desprendimiento y autoadhesiva. Se usa principalmente para enmascarar áreas que no deben ser pintadas. El tipo de adhesivo es un componente clave, ya q...', 'Es un tipo de cinta adhesiva fabricada generalmente con papel, de fácil desprendimiento y autoadhesiva. Se usa principalmente para enmascarar áreas que no deben ser pintadas. El tipo de adhesivo es un componente clave, ya que permite que la cinta sea fácilmente desprendida sin dejar residuos o dañar la superficie a la cual es aplicada. Se encuentra disponible en el mercado en diversas resistencias, clasificadas en una escala del 1 al 100 según la concentración del pegamento.', '[{\"foto\":\"vistas/img/multimedia/masking-tape-uso-general-3-4-pul/masking-2p-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/masking-tape-uso-general-3-4-pul/masking-2p-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/masking-tape-uso-general-3-4-pul/masking-2p-lateral.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"203/18\"],\"Marca\":[\"3M\"]}', 27, 'vistas/img/productos/masking-tape-uso-general-3-4-pul.jpg', 25, 4, 0, 0, 1, 0, 1, 20.25, 25, '', '2020-04-30 23:59:59', 0.1046, '0.00', '0.00', '0.00', 3, '2020-04-29 00:26:59', 3, 0, 1, 10, 2, 4, 1, 'complementos'),
(61, 7, 25, 'fisico', 'masking-tape-uso-general-2-pul', 1, 'Masking Tape Uso General 2 pul', 'Es un tipo de cinta adhesiva fabricada generalmente con papel, de fácil desprendimiento y autoadhesiva. Se usa principalmente para enmascarar áreas que no deben ser pintadas. El tipo de adhesivo es un componente clave, ya q...', 'Es un tipo de cinta adhesiva fabricada generalmente con papel, de fácil desprendimiento y autoadhesiva. Se usa principalmente para enmascarar áreas que no deben ser pintadas. El tipo de adhesivo es un componente clave, ya que permite que la cinta sea fácilmente desprendida sin dejar residuos o dañar la superficie a la cual es aplicada. Se encuentra disponible en el mercado en diversas resistencias, clasificadas en una escala del 1 al 100 según la concentración del pegamento.', '[{\"foto\":\"vistas/img/multimedia/masking-tape-uso-general-2-pul/masking-3-4p-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/masking-tape-uso-general-2-pul/masking-3-4p-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/masking-tape-uso-general-2-pul/masking-3-4p-frontal.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"203/48\"],\"Marca\":[\"3M\"]}', 73, 'vistas/img/productos/masking-tape-uso-general-2-pul.jpg', 90, 4, 0, 0, 1, 0, 1, 54.75, 25, '', '2020-04-30 23:59:59', 0.2001, '0.00', '0.00', '0.00', 3, '2020-04-29 00:26:59', 3, 0, 1, 10, 2, 4, 1, 'complementos'),
(62, 5, 16, 'fisico', 'covercryl-anticorrosivo-base-agua', 1, 'Covercryl Anticorrosivo Base Agua', 'Recubrimiento de color negro, con un secado libre al tacto aproximadamente 45 minutos a 23 grados. Debe ser aplicado con la pistola manual body schutz 8997. Tiene una apariencia más uniforme que busca lograr un acabado origi...', 'Recubrimiento de color negro, con un secado libre al tacto aproximadamente 45 minutos a 23 grados. Debe ser aplicado con la pistola manual body schutz 8997. Tiene una apariencia más uniforme que busca lograr un acabado original. No presenta agrietamiento ni descascaramiento al ser doblado. Cubrimiento total del sustrato, lo cual garantiza una excelente protección. Una vez curado el Covercryl, presenta una mayor resistencia a estas sustancias.', '[{\"foto\":\"vistas/img/multimedia/covercryl-anticorrosivo-base-agua/cover-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/covercryl-anticorrosivo-base-agua/cover-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/covercryl-anticorrosivo-base-agua/cover-lateral.jpg\"}]', '{\"Unidad\":[\"Litro\"],\"Codigo\":[\"COVER\"],\"Marca\":[\"3M\"]}', 199, 'vistas/img/productos/covercryl-anticorrosivo-base-agua.jpg', 0, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1.126, '0.00', '0.00', '0.00', 3, '2018-10-16 14:16:44', 3, 0, 1, 10, 2, 4, 1, 'estetica automotriz'),
(63, 5, 16, 'fisico', 'covercryl-anticorrosivo-base-agua-2', 1, 'Covercryl Anticorrosivo Base Agua 2', 'Recubrimiento de color negro, con un secado libre al tacto aproximadamente 45 minutos a 23 grados. Debe ser aplicado con la pistola manual body schutz 8997. Tiene una apariencia más uniforme que busca lograr un acabado origi...', 'Recubrimiento de color negro, con un secado libre al tacto aproximadamente 45 minutos a 23 grados. Debe ser aplicado con la pistola manual body schutz 8997. Tiene una apariencia más uniforme que busca lograr un acabado original. No presenta agrietamiento ni descascaramiento al ser doblado. Cubrimiento total del sustrato, lo cual garantiza una excelente protección. Una vez curado el Covercryl, presenta una mayor resistencia a estas sustancias.', '[{\"foto\":\"vistas/img/multimedia/covercryl-anticorrosivo-base-agua-2/cover2-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/covercryl-anticorrosivo-base-agua-2/cover2-traser.jpg\"}]', '{\"Unidad\":[\"Pieza\"],\"Codigo\":[\"COVER2\"],\"Marca\":[\"3M\"]}', 645, 'vistas/img/productos/covercryl-anticorrosivo-base-agua-2.jpg', 1, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 4, '0.00', '0.00', '0.00', 3, '2020-04-28 23:02:23', 3, 12, 1, 10, 14, 4, 13, 'estetica automotriz'),
(64, 3, 11, 'fisico', 'poliuretano-hd1-as-transparente', 1, 'Poliuretano Hd1 As Transparente', 'Es un recubrimiento de uso industrial de alto desempeño especial para plataformas marinas,instalaciones petroleras, refinerías,pisos de concreto y mas aplicaciones donde se requiere alta resistencia al impacto e intemperie....', 'Es un recubrimiento de uso industrial de alto desempeño especial para plataformas marinas,instalaciones petroleras, refinerías,pisos de concreto y mas aplicaciones donde se requiere alta resistencia al impacto e intemperie.', '[{\"foto\":\"vistas/img/multimedia/poliuretano-hd1-as-transparente/poliuretano-hd1-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/poliuretano-hd1-as-transparente/poliuretano-hd1-traser.jpg\"},{\"foto\":\"vistas/img/multimedia/poliuretano-hd1-as-transparente/poliuretano-hd1-lateral.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"POL1900T\"],\"Marca\":[\"ZAAK\"]}', 3796, 'vistas/img/productos/poliuretano-hd1-as-transparente.jpg', 51, 4, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 23.14, '0.00', '0.00', '0.00', 3, '2020-04-28 23:02:23', 3, 12, 1, 10, 26, 4, 25, 'poliuretanos'),
(65, 2, 6, 'fisico', 'zaak-imper-3-1-fibra-oxido', 1, 'Zaak Imper 3-1 Fibra Oxido', 'Es un impermeabilizante elaborado a base de resinas acrílicas e inteligent fiber de alta calidad que proporciona una Alta reflectancia a la luz y rayos UV. reduciendo la temperatura interior....', 'Es un impermeabilizante elaborado a base de resinas acrílicas e inteligent fiber de alta calidad que proporciona una Alta reflectancia a la luz y rayos UV. reduciendo la temperatura interior.', '[{\"foto\":\"vistas/img/multimedia/zaak-imper-3-1-fibra-oxido/imper-fibra-frontal.jpg\"},{\"foto\":\"vistas/img/multimedia/zaak-imper-3-1-fibra-oxido/imper-fibra-lateral.jpg\"},{\"foto\":\"vistas/img/multimedia/zaak-imper-3-1-fibra-oxido/imper-fibra-traser.jpg\"}]', '{\"Unidad\":[\"Cubeta\"],\"Codigo\":[\"IMP19300FR\"],\"Marca\":[\"ZAAK\"]}', 809, 'vistas/img/productos/zaak-imper-3-1-fibra-oxido.jpg', 5, 4, 0, 0, 0, 1, 1, 728.1, 10, '', '2019-12-16 23:59:59', 24.7, '31.70', '31.70', '37.30', 3, '2020-04-29 00:17:08', 3, 11, 1, 10, 57, 4, 56, 'impermeabilizantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `imgFondo` text COLLATE utf8_spanish_ci NOT NULL,
  `tipoSlide` text COLLATE utf8_spanish_ci NOT NULL,
  `imgProducto` text COLLATE utf8_spanish_ci NOT NULL,
  `estiloImgProducto` text COLLATE utf8_spanish_ci NOT NULL,
  `estiloTextoSlide` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo1` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo2` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo3` text COLLATE utf8_spanish_ci NOT NULL,
  `boton` text COLLATE utf8_spanish_ci NOT NULL,
  `url` text COLLATE utf8_spanish_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`id`, `nombre`, `imgFondo`, `tipoSlide`, `imgProducto`, `estiloImgProducto`, `estiloTextoSlide`, `titulo1`, `titulo2`, `titulo3`, `boton`, `url`, `orden`, `fecha`) VALUES
(5, 'automotriz-oficial', 'vistas/img/slide/slide5/fondo.png', 'slideOpcion2', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"0\",\"width\":\"\"}', '{\"top\":\"45\",\"right\":\"14.999745437883206\",\"left\":\"\",\"width\":\"40\"}', '{\"texto\":\"\",\"color\":\"#d06262\"}', '{\"texto\":\"\",\"color\":\"#9c3939\"}', '{\"texto\":\"\",\"color\":\"#ffffff\"}', 'VER PRODUCTO', '#', 1, '2018-09-19 23:02:22'),
(6, 'arquitectonica-oficial', 'vistas/img/slide/slide6/fondo.png', 'slideOpcion1', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"\",\"width\":\"\"}', '{\"top\":\"20\",\"right\":\"\",\"left\":\"15\",\"width\":\"40\"}', '{\"texto\":\"\",\"color\":\"#333\"}', '{\"texto\":\"\",\"color\":\"#777\"}', '{\"texto\":\"\",\"color\":\"#888\"}', 'VER PRODUCTO', '#', 2, '2018-07-26 22:55:58'),
(7, 'industrial-oficial', 'vistas/img/slide/slide7/fondo.png', 'slideOpcion1', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"\",\"width\":\"\"}', '{\"top\":\"20\",\"right\":\"\",\"left\":\"15\",\"width\":\"40\"}', '{\"texto\":\"\",\"color\":\"#333\"}', '{\"texto\":\"\",\"color\":\"#777\"}', '{\"texto\":\"\",\"color\":\"#888\"}', 'VER PRODUCTO', '#', 3, '2018-07-26 22:56:20'),
(8, 'aplicacion-oficial', 'vistas/img/slide/slide8/fondo.png', 'slideOpcion1', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"\",\"width\":\"\"}', '{\"top\":\"20\",\"right\":\"\",\"left\":\"15\",\"width\":\"40\"}', '{\"texto\":\"\",\"color\":\"#333\"}', '{\"texto\":\"\",\"color\":\"#777777\"}', '{\"texto\":\"\",\"color\":\"#888\"}', 'VER PRODUCTO', '#', 4, '2018-07-26 22:56:47'),
(9, 'estetica-oficial', 'vistas/img/slide/slide9/fondo.png', 'slideOpcion1', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"\",\"width\":\"\"}', '{\"top\":\"20\",\"right\":\"\",\"left\":\"15\",\"width\":\"40\"}', '{\"texto\":\"\",\"color\":\"#333\"}', '{\"texto\":\"\",\"color\":\"#777\"}', '{\"texto\":\"\",\"color\":\"#888\"}', 'VER PRODUCTO', '#', 5, '2018-07-26 22:57:10'),
(10, 'abrasivos-oficial', 'vistas/img/slide/slide10/fondo.png', 'slideOpcion1', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"\",\"width\":\"\"}', '{\"top\":\"20\",\"right\":\"\",\"left\":\"15\",\"width\":\"40\"}', '{\"texto\":\"\",\"color\":\"#333\"}', '{\"texto\":\"\",\"color\":\"#777\"}', '{\"texto\":\"\",\"color\":\"#888\"}', 'VER PRODUCTO', '#', 6, '2018-07-26 22:57:40'),
(11, 'complementos-oficial', 'vistas/img/slide/slide11/fondo.png', 'slideOpcion1', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"\",\"width\":\"\"}', '{\"top\":\"40\",\"right\":\"\",\"left\":\"15\",\"width\":\"40\"}', '{\"texto\":\"\",\"color\":\"#333\"}', '{\"texto\":\"\",\"color\":\"#777777\"}', '{\"texto\":\"\",\"color\":\"#888\"}', 'VER PRODUCTO', '#', 7, '2018-08-01 14:48:49'),
(12, '', 'vistas/img/slide/default/fondo.jpg', 'slideOpcion1', '', '{\"top\":\"\",\"right\":\"\",\"left\":\"\",\"width\":\"\"}', '{\"top\":\"50\",\"right\":\"\",\"left\":\"15\",\"width\":\"40\"}', '{\"texto\":\"Lorem Ipsum\",\"color\":\"#333\"}', '{\"texto\":\"Lorem ipsum dolor sit\",\"color\":\"#777\"}', '{\"texto\":\"Lorem ipsum dolor sit\",\"color\":\"#888\"}', 'VER PRODUCTO', '#', 8, '2018-09-27 17:22:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `subcategoria` text COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ofertadoPorCategoria` int(11) NOT NULL,
  `oferta` int(11) NOT NULL,
  `precioOferta` float NOT NULL,
  `descuentoOferta` int(11) NOT NULL,
  `imgOferta` text COLLATE utf8_spanish_ci NOT NULL,
  `finOferta` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `subcategoria`, `id_categoria`, `ruta`, `estado`, `ofertadoPorCategoria`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `fecha`) VALUES
(1, 'Base Color', 1, 'base-color', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-10-08 15:22:08'),
(2, 'Esmaltes', 1, 'esmaltes', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-10-08 15:22:08'),
(3, 'Poliuretanos', 1, 'poliuretanos', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-10-08 15:22:08'),
(4, 'Primarios Automotriz', 1, 'primarios-automotriz', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-10-08 15:22:08'),
(5, 'Vinílicas', 2, 'vinilicas', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:47:13'),
(6, 'Impermeabilizantes', 2, 'impermeabilizantes', 1, 0, 1, 0, 10, '', '2019-12-16 23:59:59', '2019-12-14 18:18:03'),
(7, 'Selladores', 2, 'selladores', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:47:13'),
(8, 'Primarios Industriales', 3, 'primarios-industriales', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:47:03'),
(9, 'Esmaltes Industriales', 3, 'esmaltes-industriales', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:47:03'),
(10, 'Epóxicas', 3, 'epoxicas', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:47:03'),
(11, 'Poliuretanos Industriales', 3, 'poliuretanos-industriales', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:47:03'),
(12, 'Pistolas', 4, 'pistolas', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:46:55'),
(13, 'Refacciones', 4, 'refacciones', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:46:55'),
(14, 'Pulido', 5, 'pulido', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:46:48'),
(15, 'Adhesivo', 5, 'adhesivo', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:46:48'),
(16, 'Reparación', 5, 'reparacion', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:46:48'),
(17, 'Partes Plásticas', 5, 'partes-plasticas', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:46:48'),
(18, 'Lijas', 6, 'lijas', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-10-08 15:21:58'),
(19, 'Tiras', 6, 'tiras', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-10-08 15:21:58'),
(20, 'Discos', 6, 'discos', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-10-08 15:21:58'),
(21, 'Bandas', 6, 'bandas', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-10-08 15:21:58'),
(22, 'Estopas', 7, 'estopas', 1, 1, 1, 0, 25, '', '2020-04-30 23:59:59', '2020-04-29 00:26:59'),
(23, 'Brochas', 7, 'brochas', 1, 1, 1, 0, 25, '', '2020-04-30 23:59:59', '2020-04-29 00:26:59'),
(24, 'Rodillos', 7, 'rodillos', 1, 1, 1, 0, 25, '', '2020-04-30 23:59:59', '2020-04-29 00:26:59'),
(25, 'Varios', 7, 'varios', 1, 1, 1, 0, 25, '', '2020-04-30 23:59:59', '2020-04-29 00:26:59'),
(26, 'Protección Personal', 4, 'proteccion-personal', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-09-26 17:46:55'),
(27, 'Solventes', 1, 'solventes', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-10-08 15:22:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `modo` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `cp` int(11) DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `municipio` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rfc` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `verificacion` int(11) NOT NULL,
  `emailEncriptado` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `email`, `modo`, `foto`, `cp`, `pais`, `ciudad`, `estado`, `municipio`, `telefono`, `domicilio`, `colonia`, `rfc`, `verificacion`, `emailEncriptado`, `fecha`) VALUES
(3, 'MARCO ANTONIO', '$2a$07$asxx54ahjppf45sd87a5aud2d07VeEnLqZKu8XbNjTkmhiELhqRz.', 'marco@hotmail.com', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, '4128b2a4299a23a128d5c01fcb5ea2e8', '2017-12-29 16:25:20'),
(5, 'guillermo guzman', '$2a$07$asxx54ahjppf45sd87a5au0whm9/21A1HDFEcpVJ.Mjf5tDdkmCX.', 'guillermo@hotmail.com', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, 'aa60c8d6ce3d8ecd0d158d4bd2d05df4', '2018-08-03 21:34:50'),
(8, 'Susana Junco', 'null', 'susjuca@gmail.com', 'google', 'https://lh5.googleusercontent.com/-Q2V7ttKo5CQ/AAAAAAAAAAI/AAAAAAAAABE/uxhSfqynhcA/s96-c/photo.jpg', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, 'null', '2017-12-27 04:12:54'),
(9, 'JULIAN ARANGO', '$2a$07$asxx54ahjppf45sd87a5auzkUhBhsfp0VYdQAaBKIztJa/M7uuw.K', 'julian@hotmail.com', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, 'f098b6d1c21d67fd4a7be98da9d1cdd7', '2017-12-27 04:14:06'),
(10, 'laura cano', '$2a$07$asxx54ahjppf45sd87a5autMleF8QipviUgSpeQ6kZB7B8ZYQQfdm', 'laura@hotmail.com', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, '3a635ed5037a3fca6a6f5287f3a51a57', '2018-01-29 19:14:25'),
(12, 'luis enrique', '$2a$07$asxx54ahjppf45sd87a5auwx8lyuZ.kds4dac831wJ6GwzvInb.wG', 'luis@hotmail.com', 'directo', 'vistas/img/usuarios/40/944.jpg', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, 'ee54813394c942c2921256160a05a0d4', '2018-01-16 20:55:15'),
(13, 'alex cabrera', 'null', 'todotodo90@gmail.com', 'google', 'https://lh5.googleusercontent.com/-87_AbeUjVFk/AAAAAAAAAAI/AAAAAAAABHw/EVJ5E36tRn0/s96-c/photo.jpg', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, 'null', '2018-02-28 19:45:16'),
(14, 'ale', '$2a$07$asxx54ahjppf45sd87a5aup7IS7M08iIOt4aO.xoBEj45JLRuu3zS', 'alex.necro@hotmail.com', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1, 'a1ab88347d27e148021e8df0c5083b41', '2018-02-28 19:47:13'),
(15, 'MARCO ANTONIO ROSAS IBARRA', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'rimazer0.2013@gmail.com', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1, 'a2c7a6696432233806bc93fe283d0a21', '2018-06-25 12:15:05'),
(17, 'SUSAN', '$2a$07$asxx54ahjppf45sd87a5au2Bt.5fy0YDLb4Jx.F2DyJs72.fA13ou', 'anasusjuca@hotmail.com', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, '684c141e9107e98453e9c61e7999ccfa', '2018-08-28 19:28:51'),
(18, 'JONATHAN gONZALEZ SANCHEZ', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'jgonzalez@sfd.com.mx', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, '3c0a3b61fb946538cab81e4522de18a1', '2018-06-25 16:50:50'),
(19, 'HECTOR gutierrez', '$2a$07$asxx54ahjppf45sd87a5auje6CNC7ZUyHq1aUTeaZr8kayvtyha8y', 'hgutierrez.ang@gmail.com', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, '5ef2e74f3adbef5611337658c922fc70', '2018-06-26 14:37:21'),
(20, 'Marco', '$2a$07$asxx54ahjppf45sd87a5au2ese7b1YA2m26hPURsuceD.J8i0WK/G', 'mm_marco_mar@hotmail.com', 'directo', 'vistas/img/usuarios/20/125.jpg', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, 'a5b1af886ade59a093ef4080239e556f', '2018-08-07 22:39:08'),
(22, 'lenguaje code', 'null', 'lenguajecode@gmail.com', 'google', 'https://lh4.googleusercontent.com/-sYdnoeSIFfQ/AAAAAAAAAAI/AAAAAAAAAAA/AAnnY7q8YpSp3OJD5F4ciE_X9Ovozq3AEA/s96-c/photo.jpg', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, 'null', '2018-08-06 15:08:45'),
(24, 'Marco Antonio López Pérez', '$2a$07$asxx54ahjppf45sd87a5auvtFiMjHE.9yNACeQe/AOCRURytC0Qty', 'pperez1@gmail.com', 'directo', 'vistas/img/usuarios/24/159.jpg', 75000, 'MEXICO', 'puebla', 'puebla', 'rafael lara grajales', '2761011654', 'CALLE 6 ORIENTE NUM 4', 'centro', 'XEX010101000', 0, '9da32d7b437d48e4f3474f3aaa7ee2fe', '2018-10-17 15:01:33'),
(25, 'daniel', '$2a$07$asxx54ahjppf45sd87a5auVhizgKhSX28EvvDRay9aGn7sTyVDLAm', 'danid12@gmail.com', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, '495ff793772ecdeeab863094d4731a99', '2018-09-19 04:50:20'),
(26, 'San Francisco Dekkerlab', 'null', 'sfdeshop@gmail.com', 'google', 'https://lh5.googleusercontent.com/-dhQboRYJ_EY/AAAAAAAAAAI/AAAAAAAAAAA/AAnnY7pPrunk6o2DZErjlbjiktimQBohXw/s96-c/photo.jpg', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, 'null', '2018-08-10 18:36:17'),
(27, 'carluis pateti', '$2a$07$asxx54ahjppf45sd87a5auYaZwdTRHFpgDz0nEdNpl7FZnuV.i6oK', 'pateticarluis@gmail.com', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, 'a61148ccfd5fba4ab2c457573b3631b8', '2018-09-19 17:08:34'),
(28, 'carlusi pateti', '$2a$07$asxx54ahjppf45sd87a5auYaZwdTRHFpgDz0nEdNpl7FZnuV.i6oK', 'pateticarluis@gmail.com', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, 'a61148ccfd5fba4ab2c457573b3631b8', '2018-09-19 17:09:11'),
(29, 'Poly Modul', 'null', 'polymodul@gmail.com', 'google', 'https://lh5.googleusercontent.com/-8fsHF7OYWug/AAAAAAAAAAI/AAAAAAAAAAA/APUIFaP2JzBYFm4zPQP8oudJns69fuGT3g/s96-c/photo.jpg', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, 'null', '2018-09-17 14:03:51'),
(30, 'manuel', '$2a$07$asxx54ahjppf45sd87a5au0oYTNGHNPyGtPVr6uZ785ccX11i8Czu', 'manueldepuebla@hotmail.com', 'directo', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, '27998622411fc899efa4a990be706499', '2018-09-19 17:33:33'),
(31, 'Marco Lopez', 'null', 'disprosoft@gmail.com', 'google', 'https://lh4.googleusercontent.com/-j-t-wwGv0vw/AAAAAAAAAAI/AAAAAAAAAAA/AAN31DWHylIXcv9iG5HUZSsNsYa0cHQg2g/s96-c/photo.jpg', 75000, 'MEXICO', 'PUEBLA', 'PUEBLA', 'RAFAEL LARA GRAJALES', '2761011654', 'CALLE 6 ORIENTE NUM 4', 'CENTRO', 'XEX010101000', 0, 'null', '2018-10-17 15:02:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosmayoreo`
--

CREATE TABLE `usuariosmayoreo` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `modo` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `pais` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `colonia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rfc` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `verificacion` int(11) NOT NULL,
  `emailEncriptado` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pedido` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuariosmayoreo`
--

INSERT INTO `usuariosmayoreo` (`id`, `nombre`, `password`, `email`, `modo`, `foto`, `cp`, `pais`, `ciudad`, `estado`, `municipio`, `domicilio`, `colonia`, `rfc`, `telefono`, `verificacion`, `emailEncriptado`, `fecha`, `pedido`) VALUES
(1, 'OJPUB2ZMU', '$2a$07$asxx54ahjppf45sd87a5au4cQhE2k.g.AHySCPph.E8J55baqUL6m', 'marcsan395@gmail.com', 'mayoreo', 'vistas/img/usuarios/1/150.jpg', 72550, 'mexico', 'puebla', 'puebla', 'san baltazar linda vista', 'calle ejido 5925 ', 'san baltazar campeche', 'XEX010101000', '2761011654', 0, '3c43518651e6a2a424161e99fc2d9761', '2018-10-17 17:03:18', ''),
(2, 'BLFT4TR2P', '$2a$07$asxx54ahjppf45sd87a5auru3w28A1UkUd4N2KwA41hQ5uKa15L9W', 'disprosoft@gmail.com', 'mayoreo', 'vistas/img/usuarios/2/537.jpg', 72550, 'MEXICO', 'PUEBLA', 'PUEBLA', 'PUEBLA', 'CALLE EJIDO 5925', 'SAN BALTAZAR CAMPECHE', '', '', 0, 'efe211456099014994a77fc4144a0a4c', '2018-10-17 17:03:18', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitaspaises`
--

CREATE TABLE `visitaspaises` (
  `id` int(11) NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `visitaspaises`
--

INSERT INTO `visitaspaises` (`id`, `pais`, `cantidad`, `fecha`) VALUES
(16, 'United States', 11, '2018-08-28 13:45:29'),
(17, 'Canada', 1, '2018-08-07 16:08:35'),
(18, 'Romania', 1, '2018-08-07 16:09:09'),
(19, 'Unknown', 1, '2018-08-09 14:05:18'),
(20, 'Mexico', 40, '2020-05-04 22:42:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitaspersonas`
--

CREATE TABLE `visitaspersonas` (
  `id` int(11) NOT NULL,
  `ip` text COLLATE utf8_spanish_ci NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  `visitas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `visitaspersonas`
--

INSERT INTO `visitaspersonas` (`id`, `ip`, `pais`, `visitas`, `fecha`) VALUES
(153, '88.113.49.40', 'Finland', 1, '2018-08-07 16:00:25'),
(154, '108.50.9.232', 'United States', 1, '2018-08-07 16:07:59'),
(155, '142.21.170.217', 'Canada', 1, '2018-08-07 16:08:35'),
(156, '188.26.136.225', 'Romania', 1, '2018-08-07 16:09:09'),
(157, '184.121.130.38', 'United States', 1, '2018-08-07 17:04:55'),
(158, '184.121.130.38', 'United States', 1, '2018-08-08 17:40:33'),
(159, '184.121.130.38', 'Unknown', 1, '2018-08-09 14:05:18'),
(160, '184.121.130.38', 'United States', 1, '2018-08-10 16:39:41'),
(161, '184.121.130.38', 'United States', 1, '2018-08-13 05:09:41'),
(162, '184.121.130.38', 'United States', 1, '2018-08-14 13:51:04'),
(163, '184.121.130.38', 'United States', 1, '2018-08-16 04:06:02'),
(164, '184.121.130.38', 'United States', 1, '2018-08-19 07:19:37'),
(165, '184.121.130.38', 'United States', 1, '2018-08-22 02:37:46'),
(166, '184.121.130.38', 'United States', 1, '2018-08-27 22:12:29'),
(167, '184.121.130.38', 'United States', 1, '2018-08-28 13:45:29'),
(168, '189.211.123.176', 'Mexico', 1, '2018-09-06 21:52:22'),
(169, '189.211.123.176', 'Mexico', 1, '2018-09-07 16:07:57'),
(170, '189.211.123.176', 'Mexico', 1, '2018-09-12 02:41:40'),
(171, '189.211.123.176', 'Mexico', 1, '2018-09-12 05:02:34'),
(172, '189.211.123.176', 'Mexico', 1, '2018-09-14 00:45:28'),
(173, '189.211.123.176', 'Mexico', 1, '2018-09-14 05:16:48'),
(174, '189.211.123.176', 'Mexico', 1, '2018-09-15 11:52:31'),
(175, '189.211.123.176', 'Mexico', 1, '2018-09-17 13:58:01'),
(176, '189.211.123.176', 'Mexico', 1, '2018-09-18 17:04:24'),
(177, '189.211.123.176', 'Mexico', 1, '2018-09-19 05:07:42'),
(178, '189.211.123.176', 'Mexico', 1, '2018-09-20 15:03:42'),
(179, '189.211.123.176', 'Mexico', 1, '2018-09-21 13:33:43'),
(180, '189.211.123.176', 'Mexico', 1, '2018-09-22 14:13:41'),
(181, '189.211.123.176', 'Mexico', 1, '2018-09-24 16:24:15'),
(182, '189.211.123.176', 'Mexico', 1, '2018-09-26 15:02:11'),
(183, '189.211.123.176', 'Mexico', 1, '2018-09-27 13:36:21'),
(184, '189.211.123.176', 'Mexico', 1, '2018-09-28 13:34:01'),
(185, '189.211.123.176', 'Mexico', 1, '2018-09-29 14:11:00'),
(186, '189.211.123.176', 'Mexico', 1, '2018-09-30 16:52:35'),
(187, '189.211.123.176', 'Mexico', 1, '2018-10-01 13:54:06'),
(188, '189.211.123.176', 'Mexico', 1, '2018-10-02 19:05:26'),
(189, '189.211.123.176', 'Mexico', 1, '2018-10-03 13:46:37'),
(190, '189.211.123.176', 'Mexico', 1, '2018-10-04 13:53:27'),
(191, '189.211.123.176', 'Mexico', 1, '2018-10-05 14:16:34'),
(192, '189.211.123.176', 'Mexico', 1, '2018-10-06 14:09:24'),
(193, '189.211.123.176', 'Mexico', 1, '2018-10-08 13:58:34'),
(194, '189.211.123.176', 'Mexico', 1, '2018-10-09 13:37:12'),
(195, '189.211.123.176', 'Mexico', 1, '2018-10-10 13:54:33'),
(196, '189.211.123.176', 'Mexico', 1, '2018-10-11 14:29:33'),
(197, '189.211.123.176', 'Mexico', 1, '2018-10-12 13:44:47'),
(198, '189.211.123.176', 'Mexico', 1, '2018-10-13 14:31:48'),
(199, '189.211.123.176', 'Mexico', 1, '2018-10-14 21:02:25'),
(200, '189.211.123.176', 'Mexico', 1, '2018-10-15 13:54:56'),
(201, '189.211.123.176', 'Mexico', 1, '2018-10-16 13:44:36'),
(202, '189.211.123.176', 'Mexico', 1, '2018-10-17 13:36:45'),
(203, '189.211.123.176', 'Mexico', 1, '2019-12-14 17:47:55'),
(204, '189.211.123.176', 'Mexico', 1, '2020-02-04 17:22:55'),
(205, '189.211.123.176', 'Mexico', 1, '2020-04-26 22:23:30'),
(206, '189.211.123.176', 'Mexico', 1, '2020-04-28 22:44:50'),
(207, '189.211.123.176', 'Mexico', 1, '2020-05-04 22:42:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cabeceras`
--
ALTER TABLE `cabeceras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuariosmayoreo`
--
ALTER TABLE `usuariosmayoreo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitaspaises`
--
ALTER TABLE `visitaspaises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitaspersonas`
--
ALTER TABLE `visitaspersonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `cabeceras`
--
ALTER TABLE `cabeceras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `deseos`
--
ALTER TABLE `deseos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuariosmayoreo`
--
ALTER TABLE `usuariosmayoreo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `visitaspaises`
--
ALTER TABLE `visitaspaises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `visitaspersonas`
--
ALTER TABLE `visitaspersonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
