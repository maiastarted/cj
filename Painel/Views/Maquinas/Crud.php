<?php
session_start();

include 'Inicio.php';

$dbDetails = $_SESSION['dbDetails'];
$ff = $_SESSION['origem_disco_SITE'];

$arquivo = $ff . '/Painel/Config.php';
$inicio = $ff . '/Painel/Views/Titulos/Inicio.php';

$dbDetails = $_SESSION['dbDetails'];
$mysqli = new mysqli($dbDetails['host'], $dbDetails['user'], $dbDetails['pass'], $dbDetails['db']);


########################################################### ADD
if ($_POST['mode'] === 'add') {

    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn, "INSERT INTO titulos (nome,colecao_id, autor_id, arquivo)
     VALUES ('$name','$email')");

    echo json_encode(true);
}
########################################################### EDIT
if ($_POST['mode'] === 'edit') {
    $id = $_POST['id'];
    $result = $mysqli->query("SELECT * FROM titulos WHERE id={$id}");
    $row = $result->fetch_assoc();
    echo json_encode($row);
}
########################################################### UPDATE
if ($_POST['mode'] === 'update') {

    $values = "nome='{$_POST['nome']}', ";

    if (empty($_POST['colecao_id'])) $_POST['colecao_id'] = $_POST['cole'];
    $values .= "colecao_id='{$_POST['colecao_id']}', ";

    if (empty($_POST['autor_id'])) $_POST['autor_id'] = $_POST['auto'];
    $values .= "autor_id='{$_POST['autor_id']}', ";



    if (isset($_FILES['pdfFile']) && $_FILES['pdfFile']['error'] == 0) {

        $uploadDir = $_SESSION['HOME'] . '/Painel/Imagens/';
        $arquivo = $_FILES['pdfFile'];

        $filename = $_FILES['pdfFile']['name'];
        $location = $uploadDir . $filename;

        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        $image_ext = array("jpg", "pdf", "cbz", "png", "jpeg", "gif");

        $response = 0;

        if (in_array($file_extension, $image_ext)) {
            // Upload file


            $temp = explode(".", $filename);
            $newfilename = round(microtime(true)) . '.' . end($temp);

            if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $uploadDir . $newfilename)) {
                $response = $uploadDir . $newfilename;
            }
        }
        // Gerar imagem da capa #######################################################
        $imagick = new Imagick();
        // $imagick->setResolution(300, 300);
        $imagick->setSize(200, 200);

        $imagick->readImage($response . '[0]'); // Lê apenas a primeira página
        $imagick->setImageFormat('png');
        $cover_image = $uploadDir . 'Miniatura/capa_' . basename($newfilename, '.pdf') . '.png';
        $capa = 'capa_' . basename($newfilename, '.pdf') . '.png';
        $imagick->writeImage($cover_image);
    } else {
        echo 'Nenhum arquivo enviado ou erro no upload.';
    }

    if (empty($filename)) {
        $values .= "arquivo='{$_POST['arqui1']}', ";
        $values .= "miniatura='{$_POST['mini1']}' ";
    } else {
        $values .= "arquivo='{$newfilename}', ";
        $values .= "miniatura='{$capa}' ";
    }

    $values .= "WHERE id={$_POST['id']}";

    $mysqli->query("UPDATE titulos set $values");

    echo json_encode(true);
}
########################################################### DELETE
if ($_POST['mode'] === 'delete') {
    $cadastra->ExeDelete($_POST["id"], $Registro_Data);
    echo json_encode(true);
}
########################################################### MINI
if ($_POST['mode'] === 'mini') {
    $id = $_POST['id'];
    $result1 = $mysqli->query("SELECT miniatura FROM titulos WHERE id={$id}");
    $result = mysqli_fetch_array($result1);
    echo json_encode($result[0]);
}
