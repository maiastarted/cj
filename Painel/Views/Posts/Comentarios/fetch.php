<?php
// Database connection info
    session_start();
    
//    $dbDetails = array(
//        'host' => 'localhost',
//        'user' => 'httpfi71_exk_banco',
//        'pass' => 'dKb0}~wi#r_g',
//        'db' => 'httpfi71_exk'
//    );
    
    $dbDetails =   $_SESSION['dbDetails'];

// mysql db table to use 
    $table = 'post';

// Table's primary key 
    $primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
    $columns = array(
        array('db' => 'titulo_post', 'dt' => 0),
        array('db' => 'subtitulo', 'dt' => 1),
        array(
            'db' => 'postagem',
            'dt' => 2,
            'formatter' => function ($d, $row) {
                return date('jS M Y', strtotime($row['postagem']));
            }
        ),
        array(
            'db' => 'id',
            'dt' => 3,
            'formatter' => function ($d, $row) {
                return '<a href="javascript:void(0)" class="btn btn-primary btn-edit" data-id="' . $row['id'] . '"> Edit </a> <a href="javascript:void(0)" class="btn btn-danger btn-delete ml-2" data-id="' . $row['id'] . '"> Delete </a>';
            }
        )
    );

// Include SQL query processing class 
    require 'ssp.class.php';

// Output data as json format 
    echo json_encode(
        SSP1::simple($_GET, $dbDetails, $table, $primaryKey, $columns));