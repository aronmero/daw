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
                            anadirFalta($cialAlumno, $identificador, $numSesion, $tipoFalta, $fecha);
                        } else if ($opcionSeleccionada == "modificarFalta" && $idFaltaExistente != null) {
                            $nameFaltaEliminar = $alumno . "eliminarFalta" . $sesion;
                            if (isset($_POST["$nameFaltaEliminar"])) {
                                eliminarFalta($idFaltaExistente);
                            } else {
                                actualizarFalta($idFaltaExistente, $tipoFalta);
                            }
                        }
                    } //Evitar repeticion de peticion de formulario al refrescar
                    $_SESSION["recargarPagina"] = true;
                }
            }
        }
    }
}
