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

    public function adicionarAula($assunto, $id_usuario, $id_materia, $data_da_aula) {


        try {
            $data1 = date('Y-m-d H:i:s', strtotime($data_da_aula));
            //$data1 = "2019-10-31 12:30:30";
            $sql = "insert into aula set assunto = '$assunto', id_usuario = '$id_usuario', "
                    . "id_materia='$id_materia', status = '0', tipo = '1', "
                    . "data = '$data1'";
            $sql = $this->pdo->query($sql);

            $data2 = date('Y-m-d H:i:s', strtotime("+1 days", strtotime($data1)));

            $sql = "insert into aula set assunto = '$assunto', id_usuario = '$id_usuario', "
                    . "id_materia='$id_materia', status = 0, tipo = 2,"
                    . "data = '$data2'";
            $sql = $this->pdo->query($sql);

            $data3 = date('Y-m-d H:i:s', strtotime("+7 days", strtotime($data1)));

            $sql = "insert into aula set assunto = '$assunto', id_usuario = '$id_usuario', "
                    . "id_materia='$id_materia', status = 0, tipo = 3,"
                    . "data = '$data3'";
            $sql = $this->pdo->query($sql);

            $data4 = date('Y-m-d H:i:s', strtotime("+28 days", strtotime($data1)));

            $sql = "insert into aula set assunto = '$assunto', id_usuario = '$id_usuario', "
                    . "id_materia='$id_materia', status = 0, tipo = 4,"
                    . "data = '$data4'";
            $sql = $this->pdo->query($sql);

            return true;
        } catch (PDOException $e) {
            echo "Falhou: " . $e->getTraceAsString();
            echo 'menssagem: ' . $e->getMessage();
            return false;
        }
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

    public static function isAulaAtrasada($id, $pdo) {

        $sql = "select * from aula where data <= now() and"
                . " status = 0 and idaula = '$id'";

        $sql = $pdo->query($sql);

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function atualizarStatus() {
        if ($this->status == 0) {
            $sql = "Update aula set status = 1 where idaula ='$this->idaula'";
        } else {
            $sql = "Update aula set status = 0 where idaula ='$this->idaula'";
        }
        $sql = $this->pdo->query($sql);
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

    public static function temAulaNesteDia($id_usuario, $pdo, $data) {


        $sql = "SELECT * "
                . "FROM aula a "
                . "INNER JOIN materia m "
                . "on a.id_materia = m.idmateria "
                . "WHERE a.id_usuario = '$id_usuario' "
                . "AND data >= '$data 00:00:00' "
                . "AND data <= '$data 23:59:59' "
                . "order by tipo, data";

        //echo 'Alisson';

        $sql = $pdo->query($sql);

        //$sql->bindValue(":id", $id_usuario);
        //$sql->bindValue(":data", $data);
        //$sql->execute();

        $aulas = [];
        if ($sql->rowCount() > 0) {
            $aulas = $sql->fetchAll();
            
            $flag = false;
            foreach ($aulas as $valor) {
                if (Aula::isAulaAtrasada($valor['idaula'], $pdo)) {
                    return 'laranja';
                }
                $flag = true;
            }
            if ($flag){
                return 'verde';
            }
            
            return 'vazio';
        }
        return false;
    }

    public static function listarAulasByIdData($id_usuario, $pdo, $data) {


        $sql = "SELECT * "
                . "FROM aula a "
                . "INNER JOIN materia m "
                . "on a.id_materia = m.idmateria "
                . "WHERE a.id_usuario = :id "
                . "AND data >= '$data 00:00:00' "
                . "AND data <= '$data 23:59:59' "
                . "order by tipo, data";

        //echo 'Alisson';

        $sql = $pdo->prepare($sql);

        $sql->bindValue(":id", $id_usuario);
        //$sql->bindValue(":data", $data);
        $sql->execute();

        $aulas = [];
        if ($sql->rowCount() > 0) {
            $aulas = $sql->fetchAll();
        }
        return $aulas;
    }

    public static function listarAulasByIdData2($id_usuario, $pdo, $data) {


        $sql = "SELECT * "
                . "FROM aula a "
                . "INNER JOIN materia m "
                . "on a.id_materia = m.idmateria "
                . "WHERE a.id_usuario = :id "
                . "AND data >= '$data 00:00:00' "
                . "AND data <= '$data 23:59:59'";

        //echo 'Alisson';

        $sql = $pdo->prepare($sql);

        $sql->bindValue(":id", $id_usuario);
        //$sql->bindValue(":data", $data);
        $sql->execute();

        $aulas = [];
        if ($sql->rowCount() > 0) {
            $aulas = $sql->fetchAll();
        }
        //$data = $data.' 00:00:00';
        $data2 = date("Y-m-d", strtotime("-1 days", strtotime($data)));
        $sql = "SELECT * "
                . "FROM aula a "
                . "INNER JOIN materia m "
                . "on a.id_materia = m.idmateria "
                . "WHERE a.id_usuario = :id "
                . "AND data >= '$data2 00:00:00' "
                . "AND data <= '$data2 23:59:59'";

        $sql = $pdo->prepare($sql);

        $sql->bindValue(":id", $id_usuario);
        //$sql->bindValue(":data", $data2);
        $sql->execute();
        $aulas2 = [];
        if ($sql->rowCount() > 0) {
            $aulas2 = $sql->fetchAll();
        }

        $data3 = date("Y-m-d", strtotime("-7 days", strtotime($data)));
        $sql = "SELECT * "
                . "FROM aula a "
                . "INNER JOIN materia m "
                . "on a.id_materia = m.idmateria "
                . "WHERE a.id_usuario = :id "
                . "AND data >= '$data3 00:00:00' "
                . "AND data <= '$data3 23:59:59'";

        $sql = $pdo->prepare($sql);

        $sql->bindValue(":id", $id_usuario);

        $sql->execute();
        $aulas3 = [];
        if ($sql->rowCount() > 0) {
            $aulas3 = $sql->fetchAll();
        }

        $data4 = date("Y-m-d", strtotime("-28 days", strtotime($data)));
        $sql = "SELECT * "
                . "FROM aula a "
                . "INNER JOIN materia m "
                . "on a.id_materia = m.idmateria "
                . "WHERE a.id_usuario = :id "
                . "AND data >= '$data4 00:00:00' "
                . "AND data <= '$data4 23:59:59'";

        $sql = $pdo->prepare($sql);

        $sql->bindValue(":id", $id_usuario);
        //$sql->bindValue(":data", $data2);
        $sql->execute();
        $aulas4 = [];
        if ($sql->rowCount() > 0) {
            $aulas4 = $sql->fetchAll();
        }

        $todas_as_aulas = [];
        $todas_as_aulas[] = $aulas;
        $todas_as_aulas[] = $aulas2;
        $todas_as_aulas[] = $aulas3;
        $todas_as_aulas[] = $aulas4;

        return $todas_as_aulas;
    }

    function getPdo() {
        return $this->pdo;
    }

}
