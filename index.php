<?php
require './assets/cabecalhoErodape/cabecalho.php';

require './aulasdodia.php';


?>
<body onload="povoar2('<?php echo $aulasString; ?>')">
    <div class="calendario">
        <?php
        require './calendario.php';
        ?>
    </div>
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

        <div class="aula-item">
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