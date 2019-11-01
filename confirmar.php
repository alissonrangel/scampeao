<?php
require './assets/classes/usuario.class.php';
if( isset($_GET['id']) && !empty($_GET['id']) ){
    $id_usuario = $_GET['id'];
    $usuario = new Usuario($id_usuario);
    
    $usuario->setStatus(1);
    $usuario->atualizarStatus();
    
    echo 'Atualizado com sucesso!!!';
    echo '<br><a href="login.php" >Página de login</a>';
}

?>

