<?php
require './assets/cabecalhoErodape/cabecalho.php';
?>
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
                                    <a href="index.php" class="nav-item nav-link">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="cadastrar.php" class="nav-item nav-link active">Cadastrar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="login.php" class="nav-item nav-link">Login</a>
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
                                <li class="nav-item"><a class="nav-item nav-link disabled" href=""><?php echo $nome; ?></a>
                            </ul>

                        </div>
                    </div>
                </div>
            </nav>      
        </div>
    </header>
    <div class="barra-lateral">
        <div class="container-fluid w-100 h-100 d-flex justify-content-center align-items-center">
            <h3>Cadastrar Usuário</h3>
        </div>
    </div>
    <div class="container-fluid mt-2">
        <form class="form" method="POST" action="cadastrar_submit.php">
            <div class="form-group">
                <label for="nome">Nome:</label>                
                <input class="form-control" id="nome" type="text" name="nome">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>                
                <input class="form-control" id="email" type="email" name="email">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>                
                <input class="form-control" id="senha" type="password" name="senha">
            </div>
            <div class="form-group">
                <input class="form-control btn btn-success" type="submit" value="Cadastrar" >
            </div>
        </form>
    </div>




    <?php
    require './assets/cabecalhoErodape/rodape.php';
    ?>