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

