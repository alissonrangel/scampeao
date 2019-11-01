<?php
require './assets/cabecalhoErodape/cabecalho.php';
//require './assets/classes/materia.class.php';
$id_usuario = 0;
if (empty($_SESSION['id'])) {
    header("Location: login.php");
} else {
    $id_usuario = $_SESSION['id'];
}
$materia = new Materia();

$materias = Materia::listarMateriasByIdUsuario($id_usuario, $materia->getPdo());
?>
<body>
    <header class="bg-dark" onclick="closeModal()">
        <div class="w-100">
            <nav class="align-self-center navbar navbar-expand-lg navbar-dark navbar-transparente bg-dark" >
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><img src="assets/imagens/logomarcaac.png" width="200"></a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                        <span class="navbar-toggler-icon" style="color: white"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="navbarMenu">
                        <div>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="semTutor/index.php" class="nav-item nav-link disabled">Sem Tutor</a>
                                </li>
                                <li class="nav-item">
                                    <a href="sair.php" class="nav-item nav-link">Logout</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-item nav-link disabled">Sobre</a>
                                </li>                                
                            </ul>
                        </div>

                        <div class="ml-auto" >
                            <ul class="navbar-nav">                                
                                <li class="nav-item">
                                    <a class="nav-item nav-link" target="_blank" href="https://twitter.com/alissonrangel10"><i class="fab fa-twitter-square fa-lg"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a target="_blank" class="nav-item nav-link" href="https://www.facebook.com/profile.php?id=100006951676951"><i class="fab fa-facebook fa-lg"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a target="_blank" class="nav-item nav-link" href="https://www.instagram.com/alissondicarvalho"><i class="fab fa-instagram fa-lg"></i></a>
                                </li>
                                <li class="nav-item"><a class="nav-item nav-link disabled" href=""><?php echo $_SESSION['nome']; ?></a>
                            </ul>

                        </div>
                    </div>
                </div>
            </nav>      
        </div>
    </header>

    <div class="container-fluid info-barra d-flex justify-content-center align-items-center">
        Cadastrar aula
    </div>

    <div class="container-fluid mt-2">
        <form class="form" method="GET" action="adicionar_aula2.php">
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
            <div class="form-group">
                <label for="materia">Matéria:</label>                
                <select required name="materia">                    
                    <?php
                    foreach ($materias as $valor) {
                        echo '<option value =' . $valor["idmateria"] . '>' . $valor[nome_materia] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="assunto">Assunto:</label>                
                <input class="form-control" id="assunto" type="text" name="assunto">
            </div>
            <div class="form-group">
                <label for="data">Data:</label>                
                <input class="form-control" id="data" type="datetime-local" name="data">
            </div>
            <div class="form-group">
                <input class="form-control btn btn-success" type="submit" value="Cadastrar" >
            </div>
        </form>
    </div>






    <?php
    require './assets/cabecalhoErodape/rodape.php';
    ?>
