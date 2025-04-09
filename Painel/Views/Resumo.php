<?php
  if (isset($usUario)) {
    echo $usUario;
    $Filtro = "AND  id={$usUario}";
  }
  require_once 'Painel/Views/Maquinas/index.php';