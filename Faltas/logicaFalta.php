<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["recargarPagina"] = false;
    if (isset($_POST["fecha"])) {
        $fecha = $_POST["fecha"];
        $longitud = $_SESSION["numAlumnosInserccion"];
        for ($i = 0; $i < $longitud; $i++) {
            $isCorrecto = true;
            for ($j = 1; $j <= 6; $j++) {
                if (isset($_POST[$i . "checkbox" . $j])) {
                    /**Prevencion por si hay modificacion del html antes de enviar el formulario */
                    isset($_POST["cialAlumno" . $i]) ? $cialAlumno = $_POST["cialAlumno" . $i] : $isCorrecto = false;
                    if ($isCorrecto) {
                        $numSesion = $j;
                        $nameFaltaExistente = $j . "faltaExistente$i ";
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
                                $stmt = $conn->prepare("INSERT INTO `falta` ( `cial`, `idCorreo`, `sesion`, `dia`, `fecha`) VALUES (:cialAlumno, :identificador, :numSesion, :fecha, current_timestamp())");
                                $stmt->bindParam(':cialAlumno', $cialAlumno);
                                $stmt->bindParam(':identificador', $identificador);
                                $stmt->bindParam(':numSesion', $numSesion);
                                $stmt->bindParam(':fecha', $fecha);
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