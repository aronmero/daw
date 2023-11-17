INSERT INTO `usuario` (`nombre`, `primer_apellido`, `segundo_apellido`, `dni`, `contrasena`) VALUES
('Ronald', 'Garcia', 'Garcia', '11111111P', '1234'),
('prof', 'prorf', 'prof', '12345678A', '123456'),
('juan', 'juan', 'juan', '12345678B', '1234'),
('aaron', 'medina', 'rodriguez', '42424242P', '1234'),
('antonio', 'antonio', 'antonio', '78965413A', '1234'),
('paco', 'paco', 'paco', '78968213B', '1234'),
('Javier', 'Rodriguez', 'Rodriguez', '88888888P', '1234');

INSERT INTO `curso` (`nombre`, `idCurso`) VALUES
('1DAW', '1daw'),
('2ASIR', '2asir'),
('2DAW', '2daw');

INSERT INTO `alumno` (`cial`, `dni`) VALUES
('963582765807926175962786275268752672672', '11111111P'),
('2455647637856387385738738738738638', '12345678B'),
('457884164563468465465445234', '42424242P'),
('54635463868768778678', '78965413A'),
('3543876879689689698767678687', '78968213B'),
('54854949564648542278587587658687', '88888888P');


INSERT INTO `profesor` (`idCorreo`, `dni`) VALUES
('prof@prof.com', '12345678A');

INSERT INTO `imparte` (`idCorreo`, `idCurso`) VALUES
('prof@prof.com', '2daw');

INSERT INTO `cursa` (`cial`, `idCurso`) VALUES
('2455647637856387385738738738738638', '2asir'),
('3543876879689689698767678687', '2asir'),
('457884164563468465465445234', '2daw'),
('54635463868768778678', '2daw'),
('54854949564648542278587587658687', '2daw'),
('963582765807926175962786275268752672672', '2daw');