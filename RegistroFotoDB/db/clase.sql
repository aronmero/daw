CREATE TABLE usuarios (
  nombreUsuario varchar(255) NOT NULL,
  apellidosUsuario varchar(255) NOT NULL,
  emailUsuario varchar(255) NOT NULL,
  fechaNac date NOT NULL,
  contrasena varchar(255) NOT NULL,
  foto varchar(255) DEFAULT NULL,
  PRIMARY KEY(emailUsuario)
) 
