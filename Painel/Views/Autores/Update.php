<?php

require_once('Inicio.php');

$Registro_Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($Registro_Data && $Registro_Data['SendPostForm']):

    $nome = $Registro_Data['nome'];
    $val = strlen($Registro_Data['password']);
    $password1 = $Registro_Data['password'];
    $password2 = $Registro_Data['password_conf'];

    if ($password2 == '' and $password1 != '') {
        $Registro_Data['password'] = $Registro_Data['password_antiga'];
        $password2 = $Registro_Data['password_antiga'];
    }
    if ($password1 === $password2) {
        $password3 = $Registro_Data['password_antiga'];
        // if ($password2 == '') {
        //     $Registro_Data['password'] = $password3;
        // } else {
        // $password4 = base64_encode($Registro_Data['password_conf']);
        $password4 = $Cript->encrypt_password($Registro_Data['password_conf']);

        $Registro_Data['password'] = $password4;
        // }

        unset($Registro_Data['password_antiga']);
        $erro = 9;
    } else {
        DSErro2("A password e a confirmação são diferentes", DS_ERROR);
        $erro = 1;
        goto pulo;
    }

    unset($Registro_Data['SendPostForm']);
    unset($Registro_Data['nome_velho']);
    unset($Registro_Data['password_conf']);


    if ($erro == 9) {
        $cadastra = new $classe;
        $cadastra->ExeUpdate($VarID, $Registro_Data);

        if ($cadastra->getResult()):
            $BL = $Cript->encrypt("{$semAcentos},index,12121212");
            DSErro1("A atualização de \'{$nome}\' foi realizada com sucesso!", '', $BL, DS_ACCEPT);
        else:
            DSErro($cadastra->getError()[0], $cadastra->getError()[1]);
        endif;
    }
endif;


pulo:

$ReadUser = new Read();
$ReadUser->ExeRead("adm_users", "WHERE id = {$VarID}");
if ($ReadUser->getResult()):
    $RegistroData = $ReadUser->getResult()[0];
endif;

$checkCreate = filter_input(INPUT_GET, 'create', FILTER_VALIDATE_BOOLEAN);
if ($checkCreate && empty($cadastra)):
    DSErro("O cadastrado foi realizado com sucesso!", DS_ACCEPT);
endif;

$aviso_password = "Se preencher os dois campos acima, sua password será modificada";

$cadastro = "Atualização";
$botaoSend = 'Alterar ' . $comAcento;
require_once(PATH_INC . "/Menu.php");

require_once 'Dados.php';
