-- -----------------------------------------------------
-- Data for table `bidcom`.`productos`
-- -----------------------------------------------------
START TRANSACTION;
USE `bidcom`;
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (1, 'Peluca Pelo Largo Verde', 'Peluca rizada color verde pelo largo producto importado', 16999, 24, 1810);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (2, 'Peluca Red Kanekalon', 'Peluca pelo lacio cabello negro puntas rojas producto nacional', 14999, 29, 1358);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (3, 'Peluca Rizado Rosa', 'Peluca pelo corto rizado color rosa producto importado', 17999, 29, 1357);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (4, 'Peluca Pelo Lacio Lila', 'Peluca pelo lacio color lila fantasÃ­a producto nacional', 12999, 29, 713);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (5, 'Peluca Negra Mechones Rosa', 'Peluca pelo lacio cabello negro mechones rosa producto importado', 21999, 29, 1492);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (6, 'Peluca Anime Rosa Peinado', 'Peluca estilo anime color rosa con peinado producto importado', 0, 0, 0);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (7, 'Peluca Anime Rosa Pastel', 'Peluca estilo anime pelo corto color rosa pastel producto importado', 0, 0, 0);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (8, 'Peluca Anime Rubio', 'Peluca estilo anime pelo lacio color rubio producto nacional', 0, 0, 0);
INSERT INTO `bidcom`.`productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`) VALUES (9, 'Peluca Anime Arco Iris', 'Peluca estilo anime lacio con peinado color arco iris producto importa', 0, 0, 0);

COMMIT;


-- -----------------------------------------------------
-- Data for table `bidcom`.`usuarios`
-- -----------------------------------------------------
START TRANSACTION;
USE `bidcom`;
INSERT INTO `bidcom`.`usuarios` (`id_usuario`, `username`, `mail`, `password`, `admin`) VALUES (1, 'admin', 'admin@gmail.com', '$2y$10$MRS9htOWK3EGN67u6ftUO.jgoWRb95rQvi4v96ZfU2BO0t6PJVF8y', 1);
INSERT INTO `bidcom`.`usuarios` (`id_usuario`, `username`, `mail`, `password`, `admin`) VALUES (2, 'santi', 'santi.falcon@hotmail.com', '$2y$10$Afk4Nxn2qlSdkFQqU7QU0OqpvVGOirtPBmlGBf9Uhoxiu10ktyWOi', 0);

COMMIT;


-- -----------------------------------------------------
-- Data for table `bidcom`.`sucursales`
-- -----------------------------------------------------
START TRANSACTION;
USE `bidcom`;
INSERT INTO `bidcom`.`sucursales` (`id_sucursal`, `nombre`, `telefono`, `direccion`) VALUES (1, 'Bidcom Paternal', '4582-8070', 'Av San Martin 2270');
INSERT INTO `bidcom`.`sucursales` (`id_sucursal`, `nombre`, `telefono`, `direccion`) VALUES (2, 'Bidcom Microcentro', '4081-8080', 'Bartolomé Mitre 600');
INSERT INTO `bidcom`.`sucursales` (`id_sucursal`, `nombre`, `telefono`, `direccion`) VALUES (3, 'Bidcom Recoleta', '4583-8063', 'Av. Gral Las Heras 1977');
INSERT INTO `bidcom`.`sucursales` (`id_sucursal`, `nombre`, `telefono`, `direccion`) VALUES (4, 'Bidcom Caballito', '4983-2055', 'Rojas 702');
INSERT INTO `bidcom`.`sucursales` (`id_sucursal`, `nombre`, `telefono`, `direccion`) VALUES (5, 'Bidcom Palermo', '4081-4299', 'Jerónimo Salguero 1441');
INSERT INTO `bidcom`.`sucursales` (`id_sucursal`, `nombre`, `telefono`, `direccion`) VALUES (6, 'Bidcom Belgrano', '4583-8593', 'Vuelta de Obligado 2250');

COMMIT;
