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

function actualizarFalta($sesion, $alumno)
{
    global $conn;
    try {

        $sql = "UPDATE `falta` SET `fecha` = current_timestamp(), `tipoFalta` = :tipoFalta WHERE `falta`.`idfalta` = :idFalta";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idFalta', $idFaltaExistente);
        $stmt->bindParam(':tipoFalta', $tipoFalta);
        $stmt->execute();
        $nameFaltaExistente = $sesion . "faltaExistente$alumno ";

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

function anadirFalta($cialAlumno, $identificador, $numSesion, $tipoFalta, $fecha)
{
    global $conn;
    try {

        $sql = "INSERT INTO `falta` ( `cial`, `idCorreo`, `sesion`, `dia`, `tipoFalta`,`fecha`) VALUES (:cialAlumno, :identificador, :numSesion, :fecha,:tipoFalta ,current_timestamp())";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cialAlumno', $cialAlumno);
        $stmt->bindParam(':identificador', $identificador);
        $stmt->bindParam(':numSesion', $numSesion);
        $stmt->bindParam(':tipoFalta', $tipoFalta);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->execute();

    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
}

function obtenerCurso(): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM  curso ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $infoCursos = $stmt->fetchAll();
        return $infoCursos;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
    return null;
}

function obtenerAlumnoGrupo($grupoSeleccionado): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM alumno  inner join usuario on alumno.dni=usuario.dni where idCurso=:idCurso";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idCurso', $grupoSeleccionado);
        $stmt->execute();
        $datosAlumno = $stmt->fetchAll();
        return $datosAlumno;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
    return null;
}


function obtenerFaltasFecha($cialAlumnoMostrar, $fecha): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM falta  where cial=:cial and dia=:dia";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cial', $cialAlumnoMostrar);
        $stmt->bindParam(':dia', $fecha);
        $stmt->execute();
        $faltas = $stmt->fetchAll();
        return $faltas;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
    return null;
}

function obtenerFaltasAlumno($cialAlumnoMostrar): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM falta inner join alumno on falta.cial=alumno.cial where falta.cial=:cial";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cial', $cialAlumnoMostrar);
        $stmt->bindParam(':dia', $fecha);
        $stmt->execute();
        $datosAlumno = $stmt->fetchAll();
        return $datosAlumno;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
    return null;
}


function obtenerAlumnoCial(): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM  alumno where cial=:cial";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cial', $_SESSION["identificador"]);
        $stmt->execute();
        $infoAlumno = $stmt->fetch();
        return $infoAlumno;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
    return null;
}

function obtenerFaltasAlumnoProfesor($grupoSeleccionado): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM falta inner join alumno on falta.cial=alumno.cial inner join usuario on alumno.dni=usuario.dni WHERE idCurso=:idCurso";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idCurso', $grupoSeleccionado);
        $stmt->execute();
        $datosAlumno = $stmt->fetchAll();
        return $datosAlumno;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
    return null;
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
        return $infoProfesor;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
    return null;
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
        return $contrasenaDB;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
    return null;
}


function obtenerProfesorDni($dni): array|null
{
    global $conn;
    try {
        $sql = "SELECT * FROM  profesor where dni=:dni";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':dni', $dni);
        $stmt->execute();
        $datosProfesor = $stmt->fetch();
        return $datosProfesor;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
    return null;
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
        return $datosAlumno;
    } catch (PDOException $e) {
        anadirLogErrores($sql, $e->getMessage());
    }
    return null;
}