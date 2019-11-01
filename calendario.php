<?php
//$data = "2019";
//echo 'dshjgahjadb2  ' . $data . "  2skdlnds";
$data2 = date('Y-m', strtotime($data));
//echo 'dshjgahjadb3  ' . $data2 . "  3skdlnds";
$dia1 = date('w', strtotime($data2 . "-01"));
$dia1_neg = -$dia1;
//echo '<br>Dia da semana do dia um: ' . $dia1;

$mes = date('F-Y', strtotime($data2 . "-01"));
$data_enviada = date('Y-m-d', strtotime($data2 . "-01"));

$dias = date('t', strtotime($data2 . "-01"));
//echo '<br>Dias do mês: ' . $dias;
$diafim = date('w', strtotime(($dias - 1) . " days", strtotime($data2 . "-01")));
//echo '<br>dia da semana do dia fim: ' . $diafim;

$linhas = ceil(($dias + $dia1) / 7);
//echo '<br>linhas:' . $linhas;

$dia_um = date('d/m/Y', strtotime($dia1_neg . " days", strtotime($data2 . "-01")));
//$dia_fim = date('d/m/Y', strtotime(($dias - 1 + (6 - $diafim)) . " days", strtotime($data . "-01")));
$dia_fim = date('d/m/Y', strtotime(($dia1_neg - 1 + (7 * $linhas)) . " days", strtotime($data2 . "-01")));
//echo '<br>dia um:' . $dia_um;
//echo '<br> dia fim do calendario' . $dia_fim;
?>
<div class="calendario3 d-flex justify-content-center">
    <div class="dropdown menu-calendar d-flex justify-content-center pl-1 pr-1" style="">
        <div class="calendar pb-1 pt-1 d-flex justify-content-between" style="">
            <form method="GET" >
                <input type="hidden" name="flag" value="<?php echo 'mostrar'; ?>">
                <input type="hidden" name="data" value="<?php echo date('Y-m', strtotime("-1 month", strtotime($data2 . "-01"))); ?>">
                <input type="hidden" name="modal" value="mostrar">
                <button type="submit" class="btn btn-link setas" >
                    <span class="ml-2 setas" ><
                        <?php echo date('M', strtotime("-1 month", strtotime($data2 . "-01"))); ?>
                    </span>
                </button>
            </form>
            <button data-toggle="dropdown" class="dropdown-toggle btn btn-link align-self-center setas" onclick="alternar()"><?php echo $mes; ?></button>
            <form method="GET"> 
                <input type="hidden" name="flag" value="<?php echo 'mostrar'; ?>">
                <input type="hidden" name="data" value="<?php echo date('Y-m', strtotime("+1 month", strtotime($data2 . "-01"))); ?>">
                <input type="hidden" name="modal" value="mostrar">
                <button type="submit" class="btn btn-link setas" onclick="funcao('<?php echo date('Y-m', strtotime("+1 month", strtotime($data2 . "-01"))); ?>')"  >
                    <span class="mr-2 setas" >
                        <?php echo date('M', strtotime("+1 month", strtotime($data2 . "-01"))); ?>
                        >
                    </span>
                </button>
            </form>
        </div>
        <div class="dropdown-menu table-calendar2" id="dropdown-menu">
            <table id="" class="table-calendar table table-bordered table-sm mb-0 table-dark"  >
                <thead class="" style="">
                    <tr class="" style="text-align: center;" >
                        <th >DOM</th>
                        <th>SEG</th>
                        <th>TER</th>
                        <th>QUA</th>
                        <th>QUI</th>
                        <th>SEX</th>
                        <th class="">SAB</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $x = 0;
                    for ($i = 0; $i < $linhas; $i++) {
                        echo '<tr>';
                        for ($index = 0; $index < 7; $index++) {

                            $dia_x = date('d-m', strtotime(($dia1_neg + $index + ($i * 7) ) . " days", strtotime($data2 . "")));
                            $dia_x2 = date('Y-m-d', strtotime(($dia1_neg + $index + ($i * 7) ) . " days", strtotime($data2 . "")));
                            echo "<td><span class='data-calendar'>" . $dia_x . "</span>" . ((Aula::temAulaNesteDia($usuario->getIdusuario(), $aula->getPdo(), $dia_x2)) ? "<a class='icone-calendar' onclick='closeModal()' href='index.php?data=" . $dia_x2 . "'> <i class='fab fa-twitter-square fa-xg'></i></a>" : "") . "</td>";
                        }
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
$flag = 'nao';
if (isset($_GET['flag']) && !empty($_GET['flag'])) {
    $flag = $_GET['flag'];
}
if ($flag == 'mostrar') {
    echo "<script>let elemento2 = document.getElementById('dropdown-menu');"
    . " elemento2.classList.add('mostrar');</script>";
}
?>

<!-- <div class="calendar" id="calenda" >
    <table id="" class="table-calendar table table-bordered table-sm mb-0 table-dark"  >
        <thead class="" style="">
            <tr class="" style="text-align: center;" >
                <th >DOM</th>
                <th>SEG</th>
                <th>TER</th>
                <th>QUA</th>
                <th>QUI</th>
                <th>SEX</th>
                <th class="">SAB</th>
            </tr>
        </thead>
        <tbody>
<?php
$x = 0;
for ($i = 0; $i < $linhas; $i++) {
    echo '<tr>';
    for ($index = 0; $index < 7; $index++) {

        $dia_x = date('d-m', strtotime(($dia1_neg + $index + ($i * 7) ) . " days", strtotime($data2 . "")));
        $dia_x2 = date('Y-m-d', strtotime(($dia1_neg + $index + ($i * 7) ) . " days", strtotime($data2 . "")));
        echo "<td><span class='data-calendar'>" . $dia_x . "</span>" . ((Aula::temAulaNesteDia($usuario->getIdusuario(), $aula->getPdo(), $dia_x2)) ? "<a class='icone-calendar' onclick='closeModal()' href='index.php?data=" . $dia_x2 . "'> <i class='fab fa-twitter-square fa-xg'></i></a>" : "") . "</td>";
    }
    echo '</tr>';
}
?>
        </tbody>
    </table>
</div>
-->