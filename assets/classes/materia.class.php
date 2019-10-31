<?php

class Materia {

    private $pdo;
    private $idmateria;
    private $id_usuario;
    private $nome_materia;

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

    public function adicionarMAteria($id_usuario, $nome) {

        try {
            $sql = "insert into materia set nome_materia = '$nome',"
                    . "id_usuario = '$id_usuario'";
            $sql = $this->pdo->query($sql);
            
            return true;;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function __construct($i = "") {

        $this->constructPdo();

        if (!empty($i)) {
            $sql = "SELECT * FROM materia WHERE idaula = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($i));

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch();
                $this->idmateria = $data["idmateria"];
                $this->id_usuario = $data["id_usuario"];
                $this->nome_materia = $data["nome_materia"];
            }
        }
    }

    public static function listarMateriasByIdUsuario($id_usuario, $pdo) {


        $sql = "SELECT * "
                . "FROM materia m "
                . "INNER JOIN usuario u "
                . "on m.id_usuario = u.idusuario "
                . "WHERE u.idusuario = :id";

//echo 'Alisson';

        $sql = $pdo->prepare($sql);

        $sql->bindValue(":id", $id_usuario);
        $sql->execute();
        $materias = [];
        if ($sql->rowCount() > 0) {
            $materias = $sql->fetchAll();
        }
        return $materias;
    }

    function getPdo() {
        return $this->pdo;
    }

}
