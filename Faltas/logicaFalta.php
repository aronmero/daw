<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["recargarPagina"] = false;
    if (isset($_POST["fecha"])) {
        $fecha = $_POST["fecha"];
        $longitud = $_SESSION["numAlumnosInserccion"];
        for ($alumno = 0; $alumno < $longitud; $alumno++) {
            $isCorrecto = true;
            for ($sesion = 1; $sesion <= 6; $sesion++) {
                if (isset($_POST[$alumno . "checkbox" . $sesion])) {
                    /**Prevencion por si hay modificacion del html antes de enviar el formulario */
                    isset($_POST["cialAlumno" . $alumno]) ? $cialAlumno = $_POST["cialAlumno" . $alumno] : $isCorrecto = false;
                    if ($isCorrecto) {
                        isset($_POST[$alumno . "tipoFalta" . $sesion]) ? $tipoFalta = $_POST[$alumno . "tipoFalta" . $sesion] : $tipoFalta = "FIXME:";
                        $numSesion = $sesion;
                        $nameFaltaExistente = $sesion . "faltaExistente$alumno ";
                        if (isset($_POST["$nameFaltaExistente"])) {
                            //TODO: Update falta
                            //TODO: hacer que segun el valor de accionFaltaSeleccionada se selecione update o crear

                        } else {
                            //Inserccion falta
                            try {
                                //FIXME:
                                //TODO: añadir el tipo de la falta al DB
                                $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare("INSERT INTO `falta` ( `cial`, `idCorreo`, `sesion`, `dia`, `fecha`,`tipoFalta`) VALUES (:cialAlumno, :identificador, :numSesion, :fecha, current_timestamp(),:tipoFalta)");
                               //'Falta sin Justificar'
                                $stmt->bindParam(':cialAlumno', $cialAlumno);
                                $stmt->bindParam(':identificador', $identificador);
                                $stmt->bindParam(':numSesion', $numSesion);
                                $stmt->bindParam(':fecha', $fecha);
                                $stmt->bindParam(':tipoFalta', $tipoFalta);
                                $stmt->execute();
                                $conn = "";
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