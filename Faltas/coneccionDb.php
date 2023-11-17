<?php
require "../loginInfo.php";

$conn = generarConeccion();

function anadirLogErrores($sql, $error)
{
    if (!file_exists("../../logs")) {
        mkdir("../../logs");
    }
    $fecha = date("Y-m-d H:i:s");
    $string = "Fecha: " . $fecha . " Consulta:" . $sql . " Error: " . $error . "\n";
    file_put_contents("../../logs/erroresFalta.txt", $string, FILE_APPEND);
}

function generarConeccion()
{
    global $servername;
    global $username;
    global $password;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        anadirLogErrores("", $e->getMessage());
    }

    return null;
}

function actualizarFalta($idFaltaExistente, $tipoFalta)
{
    global $conn;
    try {

        $sql = "UPDATE `falta` SET `fecha` = current_timestamp(), `tipoFalta` = :tipoFalta WHERE `falta`.`idfalta` = :idFalta";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idFalta', $idFaltaExistente);
        $stmt->bindParam(':tipoFalta', $tipoFalta);
        $stmt->execute();
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
}

function eliminarFalta($idFaltaExistente)
{
    global $conn;
    try {

        $sql = "DELETE FROM falta WHERE `falta`.`idfalta` = :idFalta";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idFalta', $idFaltaExistente);
        $stmt->execute();
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
}

function anadirFalta($cialAlumno, $identificador, $numSesion, $tipoFalta, $fecha,$idCurso)
{
    global $conn;
    try {

        $sql = "INSERT INTO `falta` ( `cial`, `idCorreo`, `sesion`, `dia`, `tipoFalta`,`fecha`,`idCurso`) VALUES (:cialAlumno, :identificador, :numSesion, :fecha,:tipoFalta ,current_timestamp(),:idCurso)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cialAlumno', $cialAlumno);
        $stmt->bindParam(':identificador', $identificador);
        $stmt->bindParam(':numSesion', $numSesion);
        $stmt->bindParam(':tipoFalta', $tipoFalta);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':idCurso', $idCurso);
        $stmt->execute();
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
}

function obtenerCursoImpartido($idCorreo): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM  curso inner join imparte on curso.idCurso=imparte.idCurso where idCorreo=:idCorreo";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idCorreo', $idCorreo);
        $stmt->execute();
        $infoCursos = $stmt->fetchAll();
        return $infoCursos !== false ? $infoCursos : null;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
        return null;
    }
}

function obtenerAlumnoGrupo($grupoSeleccionado): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM alumno  
        inner join usuario on alumno.dni=usuario.dni 
        inner join cursa on alumno.cial=cursa.cial 
        where idCurso=:idCurso";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idCurso', $grupoSeleccionado);
        $stmt->execute();
        $datosAlumno = $stmt->fetchAll();
        return $datosAlumno !== false ? $datosAlumno : null;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
        return null;
    }
}


function obtenerFaltasFecha($cialAlumnoMostrar, $fecha,$idCurso): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM falta  where cial=:cial and dia=:dia and idCurso=:idCurso";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cial', $cialAlumnoMostrar);
        $stmt->bindParam(':dia', $fecha);
        $stmt->bindParam(':idCurso', $idCurso);
        $stmt->execute();
        $faltas = $stmt->fetchAll();
        return $faltas !== false ? $faltas : null;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
        return null;
    }
}

function obtenerFaltasAlumno($cialAlumnoMostrar,$offset,$numFaltas): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM falta inner join alumno on falta.cial=alumno.cial where falta.cial=:cial ORDER BY falta.dia DESC limit :offset , :numFaltas";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cial', $cialAlumnoMostrar);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':numFaltas', $numFaltas, PDO::PARAM_INT);
        $stmt->execute();
        $datosAlumno = $stmt->fetchAll();
        return $datosAlumno !== false ? $datosAlumno : null;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
        return null;
    }
}


function obtenerAlumnoCial($cial): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM  alumno where cial=:cial";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cial', $cial);
        $stmt->execute();
        $infoAlumno = $stmt->fetch();
        return $infoAlumno !== false ? $infoAlumno : null;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
        return null;
    }
}

function obtenerFaltasAlumnoProfesor($grupoSeleccionado,$offset,$numFaltas): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM falta inner join alumno on falta.cial=alumno.cial 
        inner join usuario on alumno.dni=usuario.dni 
        inner join cursa on alumno.cial=cursa.cial
        WHERE idCurso=:idCurso ORDER BY falta.dia DESC,falta.cial, falta.sesion limit :offset , :numFaltas";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idCurso', $grupoSeleccionado);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':numFaltas', $numFaltas, PDO::PARAM_INT);
        $stmt->execute();
        $datosAlumno = $stmt->fetchAll();
        return $datosAlumno !== false ? $datosAlumno : null;;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
        return null;
    }
}

function obtenernNumFaltaGrupo($grupoSeleccionado): int|null
{
    global $conn;
    try {
        $sql = "SELECT count(idfalta) FROM falta inner join alumno on falta.cial=alumno.cial 
        inner join cursa on alumno.cial=cursa.cial
        WHERE idCurso=:idCurso";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idCurso', $grupoSeleccionado);
        $stmt->execute();
        $datosAlumno = $stmt->fetch();
        return $datosAlumno !== false ? $datosAlumno[0] : null;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
        return null;
    }
}

function obtenernNumFaltaAlumno($cial): int|null
{
    global $conn;
    try {
        $sql = "SELECT count(idfalta) FROM falta WHERE cial=:cial";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cial', $cial);
        $stmt->execute();
        $datosAlumno = $stmt->fetch();
        return $datosAlumno !== false ? $datosAlumno[0] : null;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
        return null;
    }
}

function obtenerProfesor($identificador): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM  usuario inner join profesor on usuario.dni=profesor.dni where idCorreo=:idCorreo";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idCorreo', $identificador);
        $stmt->execute();
        $infoProfesor = $stmt->fetch();
        return $infoProfesor !== false ? $infoProfesor : null;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
        return null;
    }
}

function obtenerContrasena($dni): array|null
{
    global $conn;
    try {
        $sql = "SELECT contrasena FROM  usuario where dni=:dni";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':dni', $dni);
        $stmt->execute();
        $contrasenaDB = $stmt->fetch();
        return $contrasenaDB !== false ? $contrasenaDB : null;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
        return null;
    }
}


function obtenerProfesorDni($dni): array | null
{
    global $conn;
    try {
        $sql = "SELECT * FROM  profesor where dni=:dni";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':dni', $dni);
        $stmt->execute();
        $datosProfesor = $stmt->fetch();
        return $datosProfesor !== false ? $datosProfesor : null;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
        return null;
    }
}

function obtenerAlumnoDni($dni): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM  alumno where dni=:dni";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':dni', $dni);
        $stmt->execute();
        $datosAlumno = $stmt->fetch();
        return $datosAlumno !== false ? $datosAlumno : null;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
        return null;
    }
}
