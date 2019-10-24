<?php
$data = "2019";
if (isset($_POST['mes'])) {
    $me = $_POST['mes'];
    echo "mes: " . $me;
    switch ($me) {
        case "Jan":
            $data = $data . "-01";
            break;
        case "Feb":
            $data = $data . "-02";
            break;
        case "Mar":
            $data = $data . "-03";
            break;
        case "Apr":
            $data = $data . "-04";
            break;
        case "May":
            $data = $data . "-05";
            break;
        case "Jun":
            $data = $data . "-06";
            break;
        case "Jul":
            $data = $data . "-07";
            break;
        case "Aug":
            $data = $data . "-08";
            break;
        case "Sep":
            $data = $data . "-09";
            break;
        case "Oct":
            $data = $data . "-10";
            break;
        case "Nov":
            $data = $data . "-11";
            break;
        case "Dec":
            $data = $data . "-12";
            break;
        default:
            break;
    }
} else {
    $data = date("Y-m", time());
    echo 'dshjgahjadb  ' . $data . "  skdlnds";
}
$dia1 = date('w', strtotime($data . "-01"));
$dia1_neg = -$dia1;
echo '<br>Dia da semana do dia um: ' . $dia1;

$mes = date('F', strtotime($data . "-01"));
$data_enviada = date('Y-m-d', strtotime($data . "-01"));

$dias = date('t', strtotime($data . "-01"));
echo '<br>Dias do mês: ' . $dias;
$diafim = date('w', strtotime(($dias - 1) . " days", strtotime($data . "-01")));
echo '<br>dia da semana do dia fim: ' . $diafim;

$linhas = ceil(($dias + $dia1) / 7);
echo '<br>linhas:' . $linhas;

$dia_um = date('d/m/Y', strtotime($dia1_neg . " days", strtotime($data . "-01")));
//$dia_fim = date('d/m/Y', strtotime(($dias - 1 + (6 - $diafim)) . " days", strtotime($data . "-01")));
$dia_fim = date('d/m/Y', strtotime(($dia1_neg - 1 + (7 * $linhas)) . " days", strtotime($data . "-01")));
echo '<br>dia um:' . $dia_um;
echo '<br> dia fim do calendario' . $dia_fim;
?>


<div class="container d-flex justify-content-center">
    <div class="models" style="display: none;">

    </div>
    <div class="" style="background-color: grey; width: 400px; border: 1px solid #bec2c6; border-radius: 5px;">
        <div class="row justify-content-between" >
            <form method="POST" onclick="">
                <input type="hidden" name="mes" value="<?php echo date('M', strtotime("-1 month", strtotime($data . "-01"))); ?>">
                <button type="submit" class="btn btn-link setas" >
                    <span class="ml-2 setas" ><
                        <?php echo date('M', strtotime("-1 month", strtotime($data . "-01"))); ?>
                    </span>
                </button>
            </form>
            <span class="align-self-center" onclick=""><?php echo $mes; ?></span>
            <form method="POST">
                <input type="hidden" name="mes" value="<?php echo date('M', strtotime("+1 month", strtotime($data . "-01"))); ?>">
                <button type="submit" class="btn btn-link setas" >
                    <span class="mr-2 setas" >
                        <?php echo date('M', strtotime("+1 month", strtotime($data . "-01"))); ?>
                        >
                    </span>
                </button>
            </form>
        </div>
        <table class="table table-bordered table-sm w-100 mb-0" >
            <thead class="" style="background-color: #E9EAEC">
                <tr class="" style="text-align: center;" >
                    <th >DOM</th>
                    <th>SEG</th>
                    <th>TER</th>
                    <th>QUA</th>
                    <th>QUI</th>
                    <th>SEX</th>
                    <th>SAB</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 0;
                for ($i = 0; $i < $linhas; $i++) {
                    echo '<tr>';
                    for ($index = 0; $index < 7; $index++) {
                        $dia_x = date('d-m', strtotime(($dia1_neg + $index + ($i * 7) ) . " days", strtotime($data . "")));
                        $dia_x2 = date('Y-m-d', strtotime(($dia1_neg + $index + ($i * 7) ) . " days", strtotime($data . "")));
                        echo "<td><a class='setas' href='index.php?data=".$dia_x2."'>".$dia_x.'</a></td>';
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

