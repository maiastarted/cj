<?php
session_start();

// $dbDetails = $_SESSION['dbDetails'];
// $ff = $_SESSION['origem_disco_SITE'];

// $arquivo = $ff . '/Painel/Config.php';
// $inicio = $ff . '/Painel/Views/Titulos/Inicio.php';

$dbDetails = $_SESSION['dbDetails'];
$mysqli = new mysqli($dbDetails['host'], $dbDetails['user'], $dbDetails['pass'], $dbDetails['db']);

########################################################### DELETE
// File upload folder 
$uploadDir = 'Painel/Imagens/';
$arquivo = $_FILES['file'];
if ($arquivo['type'] == 'application/pdf') {
}
// file name
$filename = $_FILES['file']['name'];
$location = $uploadDir . $filename;

$file_extension = pathinfo($location, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);

$image_ext = array("jpg", "pdf", "png", "jpeg", "gif");

$response = 0;
if (in_array($file_extension, $image_ext)) {
    // Upload file
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
        $response = $location;
    }
}


// Gerar imagem da capa
$imagick = new Imagick();
$imagick->setResolution(300, 300);
$imagick->readImage($upload_file . '[0]'); // Lê apenas a primeira página
$imagick->setImageFormat('jpeg');
$cover_image = $upload_dir . 'Miniatura/capa_' . basename($file['name'], '.pdf') . '.jpg';
$imagick->writeImage($cover_image);


echo $response;
