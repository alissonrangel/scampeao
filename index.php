<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Campeão</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
        <link rel="stylesheet" href="assets/css/estilocampeao.css?idd=123">
        <link rel="shortcut icon" href="assets/imagens/iconeac.ico" type="image/x-icon" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>

    <?php
    session_start();
    require 'assets/classes/aula.class.php';
    require 'assets/classes/materia.class.php';
    require 'assets/classes/usuario.class.php';

    $nome = "ausente";
    if (empty($_SESSION['nome'])) {
        
    } else {
        $nome = $_SESSION['nome'];
    }

//require './assets/cabecalhoErodape/cabecalho.php';

    require './aulasdodia.php';


    $modal = "";
    if (isset($_GET['modal'])) {
        $modal = $_GET['modal'];

        if ($modal == 'mostrar') {
            $modal = ', funcao()';
        } else {
            $modal = ', closeModal()';
        }
    }
    ?>
    <?php //echo $aulasString; ?>
    <body onload="povoar2('<?php echo $aulasString; ?>') <?php echo $modal; ?>">
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
                                        <a href="index.php" class="nav-link active">Home</a>
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
        <div class="container-fluid menu mt-2">
            <a class="btn btn-dark" href="adicionar_materia.php">Adicionar Matéria</a>
            <a class="btn btn-dark" href="adicionar_aula.php">Adicionar Aula</a>
        </div>
        <div class="mt-2" style="background-color: #ddd">
            <div class="calendario container-fluid">
                <?php
                require './calendario.php';
                ?>
            </div>
        </div>
        <!-- <button class="align-self-center setas" onclick="funcao()"><?php echo $mes; ?></button> -->
        <div class="models" style="display: none">

            <?php foreach ($aulas as $valor): ?>
                <div class="aula-item2">
                    <div class="aula-item2-cabecalho">
                        <div class="aula2-data"><?php echo "data:" . $valor['data']; ?></div>
                        <div class="aula2-materia"><?php echo "matéria:" . $valor['nome_materia']; ?></div>
                        <div class="aula2-tipo-aula">Hoje</div>
                    </div>
                    <div class="aula-item2-conteudo">
                        <?php echo "assunto:" . $valor['assunto']; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="aula-item" style="">
                <button class="btmodal btn btn-link" data-toggle="modal" data-target="" >Detalhes</button>
                <a class="btn btn-link" href="">Status</a>
                <div class="bloco">
                    <div class="aula-url" data-url="<?php echo $_GET['data']; ?>" style="display: none"><?php echo $_GET['data']; ?></div>
                    <div class="aula-data"></div>
                    <div class="aula-materia"></div>
                    <div class="aula-tipo-aula"></div>
                    <!-- <div class="aula-conteudo"></div> -->
                </div>

                <div class="modal fade idd" id="">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Titulo da aula</h5>
                                <button class="close" data-dismiss="modal" onclick="mudar()"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col aula-data"></div>
                                    <div class="col aula-materia"></div>
                                </div>
                                <div class="row">
                                    Assunto:<br>
                                    <div class="col aula-conteudo"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" >Salvar</button>
                                <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <main class="container-fluid mt-2">
            <div class="aula-area">

            </div>        
        </main>

        <script type="text/javascript" src="assets/js/jquery-3.4.1.js" ></script>
        <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js" ></script>
        <script type="text/javascript" src="assets/js/script.js"></script>
    </body>
</html>