drop DATABASE IF EXISTS faltas;
CREATE DATABASE faltas;
use faltas;
CREATE TABLE usuario(
    nombre varchar(50),
    primer_apellido varchar(20),
    segundo_apellido varchar(20),
    dni varchar(9),
    contrasena VARCHAR(100),
    CONSTRAINT usu_dni_pk PRIMARY key (dni)
);
CREATE TABLE profesor(
    idCorreo varchar(100),
    dni varchar(9),
    CONSTRAINT prof_dni_fk FOREIGN key (dni) REFERENCES usuario(dni),
    CONSTRAINT prof_idc_pk PRIMARY key (idCorreo)
);
CREATE TABLE curso(
    nombre varchar(100),
    idCurso varchar(9),
    CONSTRAINT curo_idc_pk PRIMARY key (idCurso)
);
CREATE TABLE alumno(
    cial varchar(100),
    dni varchar(9),
    CONSTRAINT alu_dni_fk FOREIGN key (dni) REFERENCES usuario(dni),
    CONSTRAINT alu_cial_pk PRIMARY key (cial)
);
CREATE TABLE falta(
    idfalta int AUTO_INCREMENT,
    cial varchar(100),
    idCorreo varchar(100),
    sesion SMALLINT,
    dia date,
    fecha datetime DEFAULT CURRENT_TIMESTAMP,
    tipoFalta VARCHAR(30) NOT NULL DEFAULT 'Falta sin Justificar',
    idCurso varchar(9) NOT NULL,
    CONSTRAINT fal_idf_pk PRIMARY key (idfalta),
    CONSTRAINT fal_idco_fk FOREIGN key (idCorreo) REFERENCES profesor(idCorreo),
    CONSTRAINT fal_idcu_fk FOREIGN key (idCurso) REFERENCES curso(idCurso),
    CONSTRAINT fal_cial_fk FOREIGN key (cial) REFERENCES alumno(cial)
);
create table imparte(
    idCorreo varchar(100),
    idCurso varchar(9),
    CONSTRAINT imp_idco_fk FOREIGN key (idCorreo) REFERENCES profesor(idCorreo),
    CONSTRAINT imp_idcu_fk FOREIGN key (idCurso) REFERENCES curso(idCurso),
    CONSTRAINT imp_idcc_pk PRIMARY key (idCorreo, idCurso)
);
CREATE TABLE cursa (
    cial VARCHAR(100) NOT NULL,
    idCurso VARCHAR(9) NOT NULL,
    CONSTRAINT cura_idco_fk FOREIGN key (cial) REFERENCES alumno(cial),
    CONSTRAINT cura_idcu_fk FOREIGN key (idCurso) REFERENCES curso(idCurso),
    CONSTRAINT cura_cid_pk PRIMARY key (cial, idCurso)
)