<?php
require './assets/classes/materia.class.php';

if (isset($_GET['id_materia']) && !empty($_GET['id_materia'])){
    $id = addslashes($_GET['id_materia']);
    $materia = new Materia($id);
    
    if( $materia->excluirMateria() ){
        echo 'Excluído com sucesso';
        header("Location: adicionar_materia.php");
    } else {
        echo 'Falha ao excuir';
    }
    
}

