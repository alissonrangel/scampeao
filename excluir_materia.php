<?php
require './assets/cabecalhoErodape/cabecalho.php';
//require './assets/classes/materia.class.php';

if (isset($_GET['id_materia']) && !empty($_GET['id_materia'])){
    $id = addslashes($_GET['id_materia']);
    $materia = new Materia($id);
    
    if( $materia->excluirMateria() ){
        echo 'Excluído com sucesso<br>';
        echo '<a class="btn btn-dark" href="adicionar_materia.php">Voltar para a tela de cadastro de matérias</a>';
        
    } else {
        echo 'Falha ao excluir';
        echo '<a class="btn btn-dark" href="adicionar_materia.php">Voltar para a tela de cadastro de matérias</a>';
    }
    
}


require './assets/cabecalhoErodape/rodape.php';
