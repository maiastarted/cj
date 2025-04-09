<?php
$tipo = 'Novo';
require_once PATH_VIEWS . '/Usuarios/Inicio.php';

$cadastra = new $classe;
$erro = '';
$RegistroData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($RegistroData && $RegistroData['SendPostForm']):

    if ($RegistroData['password'] != $RegistroData['password_conf']) {
        DSErro($Lang->logar($idioma, 'password_diferente'), DS_ACCEPT);
        $erro = 1;
    }

    $email = $cadastra->GetEmail($RegistroData['email']);

    if ($email != 0) :
        DSErro($email, DS_ACCEPT);
        $erro = 1;
    endif;

    unset($RegistroData['SendPostForm']);
    unset($RegistroData['password_conf']);
    unset($RegistroData['password_antiga']);
    unset($RegistroData['nome_velho']);
    unset($RegistroData['id']);

    $Registro_Data['password'] = $Cript->encrypt_password($Registro_Data['password'], $Registro_Data['email']);

    if ($erro == ''):
        $cadastra->ExeCreate($RegistroData);

        if ($cadastra->getResult() and $erro == ''):
            $BL = $Cript->encrypt("{$semAcentos},index,12121212");
            DSErro1("{$artigo1} \'{$RegistroData["nome"]}\'  {$Lang->logar($idioma, 'password_diferente')}!", '', $BL, DS_ACCEPT);
        else:
            DSErro($cadastra->getError()[0], $cadastra->getError()[1]);
        endif;
    endif;
endif;
///////////////////////////////////////
$botaoCR = $Lang->logar($idioma, 'retorna_lista');
$botaoClass = 'fa fa-arrow-left';

$cadastro = $Lang->logar($idioma, 'inclusao');
$botaoSend = $Lang->logar($idioma, 'incluir') . $comAcento;

$RegistroData['password'] = '';

$aviso_password = $Lang->logar($idioma, '2_campos_devem');
require_once(PATH_INC . "/Menu.php");



require_once 'Dados.php';
