<?php
session_start();
global $cadastra;
include $_SESSION['cripto'];
$Cript = new Criptografia();


$dbDetails = $_SESSION['dbDetails'];


if ($_POST['mode'] === 'add') {

    $semAcentos = $_POST['semAcent'];
    $BL1 = $Cript->encrypt("{$semAcentos},Create,{$id}");

    echo json_encode($BL1);
}

if ($_POST['mode'] === 'edit') {

    $id = $_POST['id'];
    $semAcentos = $_POST['semAcent'];
    $BL1 = $Cript->encrypt("{$semAcentos},Update,{$id}");

    echo json_encode($BL1);
}

if ($_POST['mode'] === 'update') {

    // mysqli_query($conn, "UPDATE users set  name='" . $_POST['name'] . "', email='" . $_POST['email'] . "' WHERE id='" . $_POST['id'] . "'");
    // echo json_encode(true);
}

if ($_POST['mode'] === 'delete') {

    $id = $_POST['id'];
    $semAcentos = $_POST['semAcent'];
    $BL2 = $Cript->encrypt("{$semAcentos},Apagar,{$id}");

    echo json_encode($BL2);
}
