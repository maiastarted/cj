<?php
session_start();

global $comAcentos, $artigo, $table;

$dbDetails = $_SESSION['dbDetails'];

$primaryKey = 'id';

$table = 'View_titulos';

$columns = array(
    array(
        'db' => 'nome',
        'dt' => 0
    ),
    array(
        'db' => 'aut_nome',
        'dt' => 1
    ),
    array(
        'db' => 'col_nome',
        'dt' => 2
    ),
    array(
        'db'        => 'miniatura',
        'dt'        => 3,
        'formatter' => function ($d, $row) {
            return '<a href="javascript:void(0)" class="btn btn-mini" data-id="' . $row['id'] . '">  
            <img src="Painel/Imagens/Miniatura/' . $d . '"  height="42" width="42""> </a>';

        }
    ),
    array(
        'db'        => 'id',
        'dt'        => 4,
        'formatter' => function ($d, $row) {
            return '<a href="javascript:void(0)" class="btn btn-edit bt_novo" data-id="' . $row['id'] . '"> Edit </a> <a href="javascript:void(0)" class="btn bt_novo" data-id="' . $row['id'] . '"> Delete </a>';
        }
    )
);

$ssp1 = $_SESSION['HOME'] . '/Painel/Conf/Library/SSP.class.php';

require_once $ssp1;

echo json_encode(
    SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);
