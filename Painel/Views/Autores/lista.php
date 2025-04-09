<?php
session_start();

global $comAcentos, $artigo, $table;

$dbDetails = $_SESSION['dbDetails'];

$primaryKey = 'id';

$table = $_GET['tabela'];

$columns = array(
    array('db' => 'nome', 'dt' => 0),
    array(
        'db' => 'id',
        'dt' => 1,
        'formatter' => function ($d, $row) {
            return '<a href="javascript:void(0)" class="bt_novo1 btn-edit" data-id="' . $row['id'] . '"> Editar</a> 
             <a href="javascript:void(0)" class="bt_novo1 btn-delete" style="margin-right: 1px;" data-id="' . $row['id'] . '"> Apagar </a>';
        }
    )
);

$ssp1 = $_SESSION['HOME'] . '/Painel/Conf/Library/SSP.class.php';

require_once $ssp1;

echo json_encode(
    SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);

