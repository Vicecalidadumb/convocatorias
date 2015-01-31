<?php
$array_horarioumb = array(
    1 => 1,
    2 => 1,
    3 => 3,
    4 => 3,
    5 => 5,
    6 => 5,
    7 => 7,
    8 => 7,
    9 => 9,
    10 => 9,
    11 => 11,
    12 => 11,
    13 => 13,
    14 => 13,
    15 => 15,
    16 => 15
);

$array_horarioumb_texto = array(
    1 => '06AM--08AM',
    3 => '08AM--10AM',
    5 => '10AM--12M ',
    7 => '12M --02PM',
    9 => '02PM--04PM',
    11 => '04PM--06PM',
    13 => '06PM--08PM',
    15 => '08PM--10PM',
);

$array_pro_ok = array('BIOM', 'CDEP', 'ELE', 'FONO', 'INDU', 'SIST', 'TALT', 'TOCU', 'TRES');


//echo print_y($grupos);
$array_asigna_grupo = array();

$array_asig_gru_ins = array();

$array_asig_gru_ins_ = array();

foreach ($asignaturas as $asignatura) {
    if ($asignatura->tipo != 'P') {
        foreach ($grupos as $grupo) {
            if ($asignatura->codigo == $grupo->MatCod) {
                //
                //
                //CONTAR INSCRITOS POR MATERIA
                if (!isset($array_asigna_grupo[$grupo->MatCod]['inscritos'])) {
                    // $array_asigna_grupo[$grupo->MatCod]['inscritos'] = 0;
                }
                //$array_asigna_grupo[$grupo->MatCod]['inscritos'] +=$grupo->SecInscritos;
                //
                //
                //CONTAR INSCRITOS POR PROGRAMA
                if (!isset($array_asigna_grupo[$asignatura->programa]['inscritos']))
                    $array_asigna_grupo[$asignatura->programa]['inscritos'] = 0;
                $array_asigna_grupo[$asignatura->programa]['inscritos'] +=$grupo->SecInscritos;
                //
                //
                //CONTAR INSCRITOS POR PROGRAMA - POR TIPO
                if (!isset($array_asigna_grupo[$asignatura->programa][$asignatura->tipo]['inscritos']))
                    $array_asigna_grupo[$asignatura->programa][$asignatura->tipo]['inscritos'] = 0;
                $array_asigna_grupo[$asignatura->programa][$asignatura->tipo]['inscritos'] +=$grupo->SecInscritos;
                //
                //
                //
                //
                //CONTAR GRUPOS POR PROGRAMA
                if (!isset($array_asigna_grupo[$asignatura->programa]['GRUPOS']))
                    $array_asigna_grupo[$asignatura->programa]['GRUPOS'] = 0;
                $array_asigna_grupo[$asignatura->programa]['GRUPOS'] ++;


                $array_asig_gru_ins[$grupo->MatCod . '|' . $grupo->SecMatSeccion . '|' . 'TOTAL' . '|' . $asignatura->programa] = $grupo->SecInscritos;
                $array_asig_gru_ins[$grupo->MatCod . '|' . $grupo->SecMatSeccion . '|' . $asignatura->tipo . '|' . $asignatura->programa] = $grupo->SecInscritos;

                //
                //
                //CONTAR GRUPOS POR PROGRAMA
                if (!isset($array_asigna_grupo[$asignatura->programa][$asignatura->tipo]['GRUPOS']))
                    $array_asigna_grupo[$asignatura->programa][$asignatura->tipo]['GRUPOS'] = 0;
                $array_asigna_grupo[$asignatura->programa][$asignatura->tipo]['GRUPOS'] ++;
                //
            //
            }
        }
        if (!isset($array_asigna_grupo[$asignatura->programa]['ASIGNATURAS']))
            $array_asigna_grupo[$asignatura->programa]['ASIGNATURAS'] = 0;
        $array_asigna_grupo[$asignatura->programa]['ASIGNATURAS'] ++;

        if (!isset($array_asigna_grupo[$asignatura->programa][$asignatura->tipo]['ASIGNATURAS']))
            $array_asigna_grupo[$asignatura->programa][$asignatura->tipo]['ASIGNATURAS'] = 0;
        $array_asigna_grupo[$asignatura->programa][$asignatura->tipo]['ASIGNATURAS'] ++;
    }
}
//echo print_y($array_asigna_grupo);
?>
<table class="table">
    <tr>
        <td>
            PROGRAMA
        </td>
        <td>
            ALUMNOS INSCRITOS
        </td>
        <td>
            GRUPOS
        </td> 
        <td>
            ASIGNATURAS
        </td>
        <td>
            --
        </td>  
        <td>
            TP ALUMNOS INSCRITOS
        </td>
        <td>
            TP GRUPOS
        </td> 
        <td>
            TP ASIGNATURAS
        </td>
        <td>
            --
        </td>  
        <td>
            T ALUMNOS INSCRITOS
        </td>
        <td>
            T GRUPOS
        </td> 
        <td>
            T ASIGNATURAS
        </td> 
    </tr>
    <?php
    foreach ($array_asigna_grupo as $key => $array) {
        //echo print_y($array);
        ?>
        <tr>
            <td>
                <?php echo $key ?>
            </td>
            <td>
                <?php echo (isset($array['inscritos'])) ? $array['inscritos'] : '0'; ?>
            </td>
            <td>
                <?php echo (isset($array['GRUPOS'])) ? $array['GRUPOS'] : '0'; ?>
            </td> 
            <td>
                <?php echo (isset($array['ASIGNATURAS'])) ? $array['ASIGNATURAS'] : '0'; ?>
            </td>
            <td>
                --
            </td>
            <td>
                <?php echo (isset($array['TP']['inscritos'])) ? $array['TP']['inscritos'] : '0'; ?>
            </td>
            <td>
                <?php echo (isset($array['TP']['GRUPOS'])) ? $array['TP']['GRUPOS'] : '0'; ?>
            </td> 
            <td>
                <?php echo (isset($array['TP']['ASIGNATURAS'])) ? $array['TP']['ASIGNATURAS'] : '0'; ?>
            </td>  
            <td>
                --
            </td>
            <td>
                <?php echo (isset($array['T']['inscritos'])) ? $array['T']['inscritos'] : '0'; ?>
            </td>
            <td>
                <?php echo (isset($array['T']['GRUPOS'])) ? $array['T']['GRUPOS'] : '0'; ?>
            </td> 
            <td>
                <?php echo (isset($array['T']['ASIGNATURAS'])) ? $array['T']['ASIGNATURAS'] : '0'; ?>
            </td>             
        </tr>
        <?php
    }
    ?>
</table>

<?php
//echo print_y($array_asig_gru_ins);

$array_horario = array();
$array_horario_2 = array();
$array_horario_3 = array();

$_array_horario = array();
$_array_horario_2 = array();
$_array_horario_3 = array();

foreach ($array_asig_gru_ins as $key => $data) {
    $valida = 0;
    foreach ($horarios as $horario) {
        $horario->HoraBloque = $array_horarioumb[$horario->HoraBloque];
        $array_id = explode('|', $key);
        if ($horario->MatCod == $array_id[0] && $horario->SecMatSeccion == $array_id[1]) {
            switch ($array_id[2]) {
                case 'TOTAL':

                    if (!isset($array_horario[$horario->HoraDia][$horario->HoraBloque]))
                        $array_horario[$horario->HoraDia][$horario->HoraBloque] = 0;
                    $array_horario[$horario->HoraDia][$horario->HoraBloque]+=$data;

                    if (in_array($array_id[3], $array_pro_ok)) {
                        if (!isset($_array_horario[$horario->HoraDia][$horario->HoraBloque]))
                            $_array_horario[$horario->HoraDia][$horario->HoraBloque] = 0;
                        $_array_horario[$horario->HoraDia][$horario->HoraBloque]+=$data;
                    }
                    break;
                case 'TP':

                    if (!isset($array_horario_2[$horario->HoraDia][$horario->HoraBloque]))
                        $array_horario_2[$horario->HoraDia][$horario->HoraBloque] = 0;
                    $array_horario_2[$horario->HoraDia][$horario->HoraBloque]+=$data;

                    if (in_array($array_id[3], $array_pro_ok)) {
                        if (!isset($_array_horario_2[$horario->HoraDia][$horario->HoraBloque]))
                            $_array_horario_2[$horario->HoraDia][$horario->HoraBloque] = 0;
                        $_array_horario_2[$horario->HoraDia][$horario->HoraBloque]+=$data;
                    }


                    break;
                case 'T':

                    if (!isset($array_horario_3[$horario->HoraDia][$horario->HoraBloque]))
                        $array_horario_3[$horario->HoraDia][$horario->HoraBloque] = 0;
                    $array_horario_3[$horario->HoraDia][$horario->HoraBloque]+=$data;

                    if (in_array($array_id[3], $array_pro_ok)) {
                        if (!isset($_array_horario_3[$horario->HoraDia][$horario->HoraBloque]))
                            $_array_horario_3[$horario->HoraDia][$horario->HoraBloque] = 0;
                        $_array_horario_3[$horario->HoraDia][$horario->HoraBloque]+=$data;
                    }


                    break;
            }
            $valida++;
        }
    }
    echo ($valida == 0) ? '<br>ERROR EN: ' . $key . ' - ' . $data . '<br>' : '';
}

echo print_y($array_horario);
//echo print_y($array_asig_gru_ins);
?>

<table class="table">
    <tr>
        <td>HORARIO</td>
        <td colspan="3">LUNES</td>
        <td colspan="3">MARTES</td> 
        <td colspan="3">MIERCOLES</td>
        <td colspan="3">JUEVES</td>  
        <td colspan="3">VIERNES</td>
        <td colspan="3">SABADO</td>
        <td colspan="3">DOMINGO</td>
    </tr>
    <?php
    for ($b = 1; $b < 16; $b = $b + 2) {
        ?>
        <tr>
            <td>
                <?php echo $array_horarioumb_texto[$b]; ?>
            </td>


            <td>
                <?php echo $array_horario[1][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_2[1][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_3[1][$b]; ?>
            </td>


            <td>
                <?php echo $array_horario[2][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_2[2][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_3[2][$b]; ?>
            </td>


            <td>
                <?php echo $array_horario[3][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_2[3][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_3[3][$b]; ?>
            </td>


            <td>
                <?php echo $array_horario[4][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_2[4][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_3[4][$b]; ?>
            </td>



            <td>
                <?php echo $array_horario[5][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_2[5][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_3[5][$b]; ?>
            </td>


            <td>
                <?php echo $array_horario[6][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_2[6][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_3[6][$b]; ?>
            </td>

            <td>
                <?php echo $array_horario[7][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_2[7][$b]; ?>
            </td>
            <td>
                <?php echo $array_horario_3[7][$b]; ?>
            </td>            

        </tr>
        <?php
        //}
    }
    ?>
</table>

<table class="table">
    <tr>
        <td>HORARIO 2</td>
        <td colspan="3">LUNES</td>
        <td colspan="3">MARTES</td> 
        <td colspan="3">MIERCOLES</td>
        <td colspan="3">JUEVES</td>  
        <td colspan="3">VIERNES</td>
        <td colspan="3">SABADO</td>
        <td colspan="3">DOMINGO</td>
    </tr>
    <?php
    for ($b = 1; $b < 16; $b = $b + 2) {
        ?>
        <tr>
            <td>
                <?php echo $array_horarioumb_texto[$b]; ?>
            </td>


            <td>
                <?php echo (isset($_array_horario[1][$b]))?$_array_horario[1][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_2[1][$b]))?$_array_horario_2[1][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_3[1][$b]))?$_array_horario_3[1][$b]:'0'; ?>
            </td>


            <td>
                <?php echo (isset($_array_horario[2][$b]))?$_array_horario[2][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_2[2][$b]))?$_array_horario_2[2][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_3[2][$b]))?$_array_horario_3[2][$b]:'0'; ?>
            </td>


            <td>
                <?php echo (isset($_array_horario[3][$b]))?$_array_horario[3][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_2[3][$b]))?$_array_horario_2[3][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_3[3][$b]))?$_array_horario_3[3][$b]:'0'; ?>
            </td>


            <td>
                <?php echo (isset($_array_horario[4][$b]))?$_array_horario[4][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_2[4][$b]))?$_array_horario_2[4][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_3[4][$b]))?$_array_horario_3[4][$b]:'0'; ?>
            </td>



            <td>
                <?php echo (isset($_array_horario[5][$b]))?$_array_horario[5][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_2[5][$b]))?$_array_horario_2[5][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_3[5][$b]))?$_array_horario_3[5][$b]:'0'; ?>
            </td>


            <td>
                <?php echo (isset($_array_horario[6][$b]))?$_array_horario[6][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_2[6][$b]))?$_array_horario_2[6][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_3[6][$b]))?$_array_horario_3[6][$b]:'0'; ?>
            </td>
            

            <td>
                <?php echo (isset($_array_horario[7][$b]))?$_array_horario[7][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_2[7][$b]))?$_array_horario_2[7][$b]:'0'; ?>
            </td>
            <td>
                <?php echo (isset($_array_horario_3[7][$b]))?$_array_horario_3[7][$b]:'0'; ?>
            </td>          

        </tr>
        <?php
        //}
    }
    ?>
</table>

<?php ?>

LISTADO DE GRUPOS:

<table class="table">
    <tr>
        <td>
            ASIGNATURA
        </td>
        <td>
            GRUPO
        </td>
        <td>
            INSCRITOS
        </td>
    </tr>
    <?php
    foreach ($array_asig_gru_ins as $grupo => $inscritos) {
        $array_id = explode('|', $grupo);
        ?>
        <tr>
            <td>
                <?php echo $array_id[0]; ?>
            </td>
            <td>
                <?php echo $array_id[1]; ?>
            </td>
            <td>
                <?php echo $inscritos; ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<?php ?>
 