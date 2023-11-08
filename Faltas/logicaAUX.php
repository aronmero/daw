<?php
function ImprimirCurso($conn, $grupoSeleccionado)
{
  $stmt = $conn->prepare("SELECT * FROM  curso ");
  $stmt->execute();
  $infoCursos = $stmt->fetchAll();
  echo "<div class=selectorCurso>";

  for ($i = 0; $i < count($infoCursos); $i++) {
    if ($grupoSeleccionado == $infoCursos[$i][1]) {
      echo "<div class=seleccionado id=" . $infoCursos[$i][1] . ">" . $infoCursos[$i][0] . "</div>";
    } else {
      echo "<div id=" . $infoCursos[$i][1] . ">" . $infoCursos[$i][0] . "</div>";
    }
  }

  echo "</div>";

}