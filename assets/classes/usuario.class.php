<?php

class Usuario {

    private $pdo;
    private $idusuario;
    private $email;
    private $senha;
    private $nome;
    private $imagem;
    private $status;
    private $permissoes;

    public function __construct($i = "") {

        try {
            $this->pdo = new PDO("mysql:dbname=campeao;host=127.0.0.1", "root", "alisson");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exc) {
            echo "Falhou: " . $exc->getTraceAsString();
            echo "Falhou: " . $exc->getMessage();
        }

        if (!empty($i)) {
            $sql = "SELECT * FROM usuario WHERE idusuario = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($i));

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch();
                $this->idusuario = $data["idusuario"];
                $this->email = $data["email"];
                $this->senha = $data["senha"];
                $this->nome = $data["nome"];
                $this->imagem = $data['imagem'];
                $this->status = $data['status'];
                $this->permissoes = explode(",", $data['permissoes']);
            }
        }
    }
    
    function atualizarStatus() {
        $sql = "update usuario set status = '$this->status' "
                . "where idusuario = '$this->idusuario'";
        
        $sql = $this->pdo->query($sql);
    }
    
    function cadastrarUsuario($nome, $email, $senha) {
        try{
        echo '<br>@0';    
        $sql = "insert into usuario set nome ='$nome', email = '$email',"
                . " senha = md5('$senha'), status = 0, "
                . "imagem = 'usuario_em_branco.png', "
                . "permissoes = 'ADD,DEL,EDIT'";
        
        $sql = $this->pdo->query($sql);
        echo '<br>@1';
        } catch (PDOException $exp){
            echo '<br>@2';
            echo '<br>Falha1: '.$exp->getTraceAsString();
            echo '<br>Falha2: '.$exp->getMessage();
            return 1;
        }
        
        echo '<br>@3';
        
        $sql = "select idusuario from usuario where email = '$email' and "
                . "senha = md5('$senha')";
        $sql = $this->pdo->query($sql);
        $dado = 0;
        if ( $sql->rowCount() > 0){
            echo '<br>@4';
            $dado = $sql->fetch();
            echo "<br>dado: ".$dado['idusuario']."<br>";
        }
        echo '<br>@5';
        return $dado['idusuario'];
    }
    
    function fazerLogin($email, $senha) {
        $sql = "select * from usuario where email = '$email' and "
                . "senha = md5('$senha') and status = '0'";
        $sql= $this->pdo->query($sql);
        
        
        if ( $sql->rowCount() > 0){
            return false;
        }
        
        $sql = "select * from usuario where email = '$email' and "
                . "senha = md5('$senha') and status = '1'";
        $sql= $this->pdo->query($sql);
        
        $dado = [];
        if ( $sql->rowCount() > 0){
            $dado = $sql->fetch();
        }
        return $dado;
    }
    
    function setStatus($status) {
        $this->status = $status;
    }
    
    function getIdusuario() {
        return $this->idusuario;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNome() {
        return $this->nome;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getStatus() {
        return $this->status;
    }

    function getPermissoes() {
        return $this->permissoes;
    }


}

