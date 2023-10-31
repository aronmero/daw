drop DATABASE IF EXISTS faltas;

CREATE DATABASE faltas;

use faltas;

CREATE TABLE usuarios(
nombre varchar(50),
apellidos varchar(50),
dni varchar(9),
CONSTRAINT usu_dni_pk PRIMARY key (dni)
);

CREATE TABLE profesor(
idCorreo varchar(100),
dni varchar(9),
CONSTRAINT prof_dni_fk FOREIGN key (dni) REFERENCES usuarios(dni),
CONSTRAINT prof_idc_pk PRIMARY key (idCorreo)
);

CREATE TABLE alumno(
cial varchar(100),
dni varchar(9),
CONSTRAINT alu_dni_fk FOREIGN key (dni) REFERENCES usuarios(dni),
CONSTRAINT alu_cial_pk PRIMARY key (cial)
);

CREATE TABLE cursos(
nombre varchar(100),
idCurso varchar(9),
CONSTRAINT curo_idc_pk PRIMARY key (idCurso)
);

CREATE TABLE cursa(
idCurso varchar(9),
cial varchar(100),
CONSTRAINT cura_idc_fk FOREIGN key (idCurso) REFERENCES cursos(idCurso),
CONSTRAINT cura_cial_fk FOREIGN key (cial) REFERENCES alumno(cial),
CONSTRAINT cura_idcc_pk PRIMARY key (idCurso, cial)
);

CREATE TABLE faltas(
   	idFaltas varchar(255),
    cial varchar(9),
    idCorreo varchar(100),
    sesion SMALLINT,
    dia date,
    CONSTRAINT fal_idf_pk PRIMARY key (idFaltas),
    CONSTRAINT fal_idco_fk FOREIGN key (idCorreo) REFERENCES profesor(idCorreo),
    CONSTRAINT fal_cial_fk FOREIGN key (cial) REFERENCES alumno(cial)
);
create table imparte(
	idCorreo varchar(100),
    idCurso varchar(9),
    CONSTRAINT imp_idco_fk FOREIGN key (idCorreo) REFERENCES profesor(idCorreo),
    CONSTRAINT imp_idcu_fk FOREIGN key (idCurso) REFERENCES cursos(idCurso),
    CONSTRAINT imp_idcc_pk PRIMARY key (idCorreo, idCurso)
);