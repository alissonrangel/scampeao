<?php
require './assets/cabecalhoErodape/cabecalho.php';

$aula = new Aula();
if ( isset($_GET['assunto']) && !empty($_GET['assunto'])){
    
    $id_usuario = addslashes($_GET['id_usuario']);
    $data = addslashes($_GET['data']);
    $assunto = $_GET['assunto'];
    $id_materia = addslashes($_GET['materia']);
    
    echo 'data: '.$data;
    
    
    if($aula->adicionarAula($assunto, $id_usuario, $id_materia, $data)){
        echo 'Adicionado com sucesso<br>';
        echo '<a class="btn btn-dark" href="adicionar_aula.php">Voltar para a tela de cadastro de aulas</a>';
    } else {
        echo 'Falha ao adicionar!!!<br>';
        echo '<a class="btn btn-dark" href="adicionar_aula.php">Voltar para a tela de cadastro de aulas</a>';
    }
}


require './assets/cabecalhoErodape/rodape.php';
