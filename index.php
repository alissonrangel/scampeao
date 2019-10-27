<?php
session_start();
require './assets/cabecalhoErodape/cabecalho.php';
$_SESSION['nome'] = "Alisson";
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
<body onload="povoar2('<?php echo $aulasString; ?>') <?php echo $modal; ?>">
    <header class="bg-dark" onclick="closeModal()">       
        <nav class="navbar navbar-expand-lg navbar-dark navbar-transparente bg-dark" >
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="assets/imagens/logomarcaac.png" height="30"></a>
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
                                <a href="semTutor/index.php" class="nav-item nav-link">Sem Tutor</a>
                            </li>
                            <li class="nav-item">
                                <a href="comTutor/index.php" class="nav-item nav-link disabled">Com Tutor</a>
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
    </header>
    <div class="calendario">
        <?php
        require './calendario.php';
        ?>
    </div>
    <button class="align-self-center setas" onclick="funcao()"><?php echo $mes; ?></button>
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

        <div class="aula-item bg-dark" style="width: 150px; height: 150px;">
            <div class="aula-item-cabecalho">
                <div class="aula-data"></div>
                <div class="aula-materia"></div>
                <div class="aula-tipo-aula"></div>
            </div>
            <div class="aula-item-conteudo">

            </div>
        </div>

    </div>
    <main class="container">
        <div class="aula-area">

        </div>
    </main>



    <?php
    require './assets/cabecalhoErodape/rodape.php';
    ?>