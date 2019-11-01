<?php
require './assets/classes/usuario.class.php';
if ( isset($_POST['nome']) && !empty($_POST['nome']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['senha']) && !empty($_POST['senha']) ){
    
    $nome = addslashes($_POST['nome']);
    $senha = addslashes($_POST['senha']);
    $email = addslashes($_POST['email']);
    
    $usuario = new Usuario();
    
    $id_usuario = $usuario->cadastrarUsuario($nome, $email, $senha);
    
    echo '<br>clique no link para confirmar envio<br>';
    echo '<a href="confirmar.php?id='.$id_usuario.'" >confirmar</a>' ;
    
    
    
}






?>
