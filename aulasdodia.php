<?php

if (empty($_SESSION['id'])) {
    header("Location: login.php");
}
$id_usuario = $_SESSION['id'];

$aula = new Aula();
$usuario = new Usuario($id_usuario);

$data = date("Y-m-d", time());

if (isset($_GET['data']) && !empty($_GET['data'])){
    $data = $_GET['data'];
    
    $data_explode = explode('-', $_GET['data']);
    if(count($data_explode) == 3){
        
    }else{
        $data = $data.'-01';
    }
}else{
    
}

$aulas = Aula::listarAulasByIdUsuario($usuario->getIdusuario(), $aula->getPdo());
$aulas2 = Aula::listarAulasByIdData($usuario->getIdusuario(), $aula->getPdo(), $data);
//$aulas3 = Aula::listarAulasByIdData2($usuario->getIdusuario(), $aula->getPdo(), "2019-10-22");

$tipoDeAula = array('hoje', 'revisão 1', 'revisão 2', 'revisão 3');

//print_r($aulas2[0]);
//print_r($aulas2[1]);

$aulasArray = [];
foreach ($aulas2 as $valor) {    
    $aulasArray[] = $valor['assunto'];
    $aulasArray[] = $valor['data'];
    $aulasArray[] = $valor['nome_materia'];
    switch ($valor['tipo']) {
        case 1:
            $aulasArray[] = "Revisão 1";
            break;
        case 2:
            $aulasArray[] = "Revisão 2";
            break;
        case 3:
            $aulasArray[] = "Revisão 3";
            break;
        case 4:
            $aulasArray[] = "Revisão 4";
            break;
        default:
            break;
    }
    $aulasArray[] = $valor['status'];
    $aulasArray[] = $valor['idaula'];
}


$aulasString = implode(',', $aulasArray);

//echo 'skhdalnnn : '.$aulasString;
/*
  $aulasArray = [];
  foreach ($aulas as $valor) {
  $aulasArray[] = $valor['assunto'];
  $aulasArray[] = $valor['data'];
  $aulasArray[] = $valor['nome_materia'];
  $aulasArray[] = "Revisão 1";
  }

  $aulasArray2 = [];
  foreach ($aulas as $valor) {
  $aulasArray2[] = $valor['assunto'];
  $data2 = date("Y-m-d", strtotime("-1 days"))
  $aulasArray2[] = $valor['data'];
  $aulasArray2[] = $valor['nome_materia'];
  $aulasArray2[] = "Revisão 1";
  }
 */



/*
  $aulasArray = [];
  foreach ($aulas2[0] as $valor) {
  $aulasArray[] = $valor['assunto'];
  $aulasArray[] = $valor['data'];
  $aulasArray[] = $valor['nome_materia'];
  $aulasArray[] = $valor['tipo'];
  }

  $aulasArray2 = [];
  foreach ($aulas2[1] as $valor) {
  $aulasArray2[] = $valor['assunto'];
  $aulasArray2[] = $valor['data'];
  $aulasArray2[] = $valor['nome_materia'];
  $aulasArray2[] = $valor['tipo'];
  }

  $aulasArray3 = [];
  foreach ($aulas2[2] as $valor) {
  $aulasArray3[] = $valor['assunto'];
  $aulasArray3[] = $valor['data'];
  $aulasArray3[] = $valor['nome_materia'];
  $aulasArray3[] = $valor['tipo'];
  }

  $aulasArray4 = [];
  foreach ($aulas2[3] as $valor) {
  $aulasArray4[] = $valor['assunto'];
  $aulasArray4[] = $valor['data'];
  $aulasArray4[] = $valor['nome_materia'];
  $aulasArray4[] = $valor['tipo'];
  }


  $aulasString = implode(',', $aulasArray);
  $aulasString2 = implode(',', $aulasArray2);
  $aulasString3 = implode(',', $aulasArray3);
  $aulasString4 = implode(',', $aulasArray4);
 */
?>