<?php

require './assets/classes/usuario.class.php';

$usuario = new Usuario();

session_start();

if (isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['senha']) && !empty($_POST['senha'])) {

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $usuario = $usuario->fazerLogin($email, $senha);

    if ($usuario == []) {
        echo 'Usuário não encontrado';
    } else {
        $_SESSION['id'] = $usuario['idusuario'];
        $_SESSION['nome'] = $usuario['nome'];
        header("Location: index.php");
    }
}


