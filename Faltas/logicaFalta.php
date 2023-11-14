<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["recargarPagina"] = false;
    if (isset($_SESSION["identificador"]) && isset($_POST["fecha"])) {
        isset($_POST["faltaSeleccionado"]) ? $opcionSeleccionada = $_POST["faltaSeleccionado"] : $opcionSeleccionada = null;
        $fecha = $_POST["fecha"];
        $longitud = $_SESSION["numAlumnosInserccion"];
        $identificador = $_SESSION["identificador"];
        for ($alumno = 0; $alumno < $longitud; $alumno++) {
            $isCorrecto = true;
            for ($sesion = 1; $sesion <= 6; $sesion++) {
                if (isset($_POST[$alumno . "checkbox" . $sesion])) {
                    /**Prevencion por si hay modificacion del html antes de enviar el formulario */
                    isset($_POST["cialAlumno" . $alumno]) ? $cialAlumno = $_POST["cialAlumno" . $alumno] : $isCorrecto = false;
                    if ($isCorrecto) {
                        $tipoFaltaAlumno = $alumno . "tipoFalta" . $sesion;
                        isset($_POST[$tipoFaltaAlumno]) ? $tipoFalta = $_POST[$tipoFaltaAlumno] : $tipoFalta = null;
                        $numSesion = $sesion;
                        $nameFaltaExistente = $alumno . "faltaExistente" . $sesion;
                        isset($_POST[$nameFaltaExistente]) ? $idFaltaExistente = $_POST[$nameFaltaExistente] : $idFaltaExistente = null;
                        if ($opcionSeleccionada == "crearFalta" && $idFaltaExistente == null) {
                            try {
                                $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare("INSERT INTO `falta` ( `cial`, `idCorreo`, `sesion`, `dia`, `tipoFalta`,`fecha`) VALUES (:cialAlumno, :identificador, :numSesion, :fecha,:tipoFalta ,current_timestamp())");
                                $stmt->bindParam(':cialAlumno', $cialAlumno);
                                $stmt->bindParam(':identificador', $identificador);
                                $stmt->bindParam(':numSesion', $numSesion);
                                $stmt->bindParam(':tipoFalta', $tipoFalta);
                                $stmt->bindParam(':fecha', $fecha);
                                $stmt->execute();
                                $conn = "";
                            } catch (PDOException $e) {
                                echo "Conneccion fallida: " . $e->getMessage();
                            }
                        } else if ($opcionSeleccionada == "modificarFalta" && $idFaltaExistente != null) {
                            try {
                                $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare("UPDATE `falta` SET `fecha` = current_timestamp(), `tipoFalta` = :tipoFalta WHERE `falta`.`idfalta` = :idFalta");
                                $stmt->bindParam(':idFalta', $idFaltaExistente);
                                $stmt->bindParam(':tipoFalta', $tipoFalta);
                                $stmt->execute();
                                $nameFaltaExistente = $sesion . "faltaExistente$alumno ";
                            } catch (PDOException $e) {
                                echo "Conneccion fallida: " . $e->getMessage();
                            }
                        }


                    } //Evitar repeticion de peticion de formulario al refrescar
                    $_SESSION["recargarPagina"] = true;
                }

            }

        }
    }
    ;


}