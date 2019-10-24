<?php
require './assets/cabecalhoErodape/cabecalho.php';

$aula = new Aula();
$usuario = new Usuario(1);
$data = date("Y-m-d", time());
if (isset($_GET['data']) && !empty($_GET['data'])){
    echo 'daadda --- '.$_GET['data'].' ---- <br>';
    $data = $_GET['data'];
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
}


$aulasString = implode(',', $aulasArray);
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
<body onload="povoar2('<?php echo $aulasString; ?>')">
    <div class="calendario">
        <?php
        require './calendario.php';
        
        ?>
    </div>
    <div class="models" style="display: none">

        <?php foreach ($aulas as $valor): ?>
            <div class="aula-item2">
                <div class="aula-item2-cabecalho">
                    <div class="aula2-data"><?php echo "data:" . $valor['data']; ?></div>
                    <div class="aula2-materia"><?php echo "matéria:" . $valor['nome_materia']; ?></div>
                    <div class="aula2-tipo-aula">Hoje</div>
                </div>
                <div class="aula-item2-conteudo">
                    <?php echo "assunto:" . $valor['assunto']; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="aula-item">
            <div class="aula-item-cabecalho">
                <div class="aula-data"></div>
                <div class="aula-materia"></div>
                <div class="aula-tipo-aula"></div>
            </div>
            <div class="aula-item-conteudo">

            </div>
        </div>

    </div>
    <main class="container">
        <div class="aula-area">

        </div>
    </main>



    <?php
    require './assets/cabecalhoErodape/rodape.php';
    ?>