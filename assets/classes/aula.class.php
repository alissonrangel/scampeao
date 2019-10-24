<?php

class Aula {

    private $pdo;
    private $idaula;
    private $id_materia;
    private $id_usuario;
    private $assunto;
    private $datahora;
    private $status;
    
    public function constructPdo() {
        $this->pdo = "";
        try {
            $this->pdo = new PDO("mysql:dbname=campeao;host=127.0.0.1", "root", "alisson");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exc) {
            echo "Falhou: " . $exc->getTraceAsString();
            echo "Falhou: " . $exc->getMessage();
        }
        return $this->pdo;
    }
    
    public function __construct($i = "") {
        
        $this->constructPdo();
        
        if (!empty($i)) {
            $sql = "SELECT * FROM aula WHERE idaula = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($i));

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch();
                $this->idaula = $data["idaula"];
                $this->id_materia = $data["id_materia"];
                $this->id_usuario = $data["id_usuario"];
                $this->assunto = $data["assunto"];
                $this->datahora = $data['data'];
                $this->status = $data['status'];
            }
        }
    }

    public static function listarAulasByIdUsuario($id_usuario, $pdo) {
        
        
        $sql = "SELECT * "
                . "FROM aula a "
                . "INNER JOIN materia m "
                . "on a.id_materia = m.idmateria "                
                . "WHERE a.id_usuario = :id";
       
        //echo 'Alisson';
        
        $sql = $pdo->prepare($sql);
        
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();
        $aulas = [];
        if ($sql->rowCount() > 0) {
            $aulas = $sql->fetchAll();
        }
        return $aulas;
    }
    
    function getPdo() {
        return $this->pdo;
    }



}
