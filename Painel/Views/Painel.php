<?php
if (!isset($_SESSION['origem_disco_SITE'])) {
    header("Location: /");
    exit();
}

$origem = $_SESSION['origem_disco_SITE'];
$login = new Login();
$logoff = filter_input(INPUT_GET, 'logoff', FILTER_VALIDATE_BOOLEAN);

if (!$login->CheckLogin()):
    unset($_SESSION['userlogin_SITE']);
    $BL = NULL;
    header('Location: /?BL=' . $BL);
else:
    $userlogin = $_SESSION['userlogin_SITE'];
    $cadastra = new Admin_Usuarios;
    $Data= date('Y-m-d h:i:s', time());
    $cadastra->ExeUpdate_Ultimo_Login($userlogin['id'], $Data);
   
endif;

if ($logoff):
    unset($_SESSION['userlogin_SITE']);
    header('Location: ' . $_SESSION['origem_disco_SITE'] . '/index.php?exe=logoff');
endif;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Resumo.php';;

