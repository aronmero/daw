
INSERT INTO `curso` (`nombre`, `idCurso`) VALUES ('2DAW', '2daw');

INSERT INTO `usuario` (`nombre`, `primer_apellido`, `segundo_apellido`, `dni`, `contrasena`) VALUES
('aaron', 'medina', 'rodriguez', '42424242P', '1234');

INSERT INTO `alumno` (`cial`, `dni`, `idCurso`) VALUES ('457884164563468465465445234', '42424242P', '2daw');

INSERT INTO `usuario` (`nombre`, `primer_apellido`, `segundo_apellido`, `dni`, `contrasena`) VALUES ('prof', 'prorf', 'prof', '12345678A', '123456');
INSERT INTO `profesor` (`idCorreo`, `dni`) VALUES ('prof@prof.com', '12345678A');
INSERT INTO `imparte` (`idCorreo`, `idCurso`) VALUES ('prof@prof.com', '2daw');

UPDATE `usuario` SET `nombre` = 'Aaron', `primer_apellido` = 'Medina', `segundo_apellido` = 'Rodriguez' WHERE `usuario`.`dni` = '12345678A';