<?php
require './assets/classes/aula.class.php';
$id = $_GET['id'];
$aula = new Aula($id);
$aula->atualizarStatus();
$header = "Location: index.php?data=".$_GET['data'];
header($header);
?>