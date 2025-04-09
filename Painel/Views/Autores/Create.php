<?php

require_once('Inicio.php');
$cadastra = new $classe;
$erro = '';
$RegistroData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($RegistroData && $RegistroData['SendPostForm']):

    if ($RegistroData['password'] != $RegistroData['password_conf']) {
        DSErro("A password e a confirmação são diferentes", DS_ACCEPT);
        $erro = 1;
    }

    $email = $cadastra->GetEmail($RegistroData['email']);

    if ($email != 0) :
        DSErro($email, DS_ACCEPT);
        $erro = 1;
    endif;

    $password1 = $RegistroData['password'];
    $password2 = $RegistroData['password_conf'];

    if ($password1 === $password2) {
        $password3 = $RegistroData['password_antiga'];
        if ($password2 == '') {
            $Registro_Data['password'] = $password3;
        } else {
            // $password4 =  base64_encode($password2);
            $password4 = $Cript->encrypt_password($password2);
            $RegistroData['password'] = $password4;
        }

        unset($RegistroData['password_antiga']);
        $erro = 9;
    } else {
        DSErro2("A password e a confirmação são diferentes", DS_ERROR);
        $erro = 1;
        goto pulo;
    }
    unset($RegistroData['SendPostForm']);
    unset($RegistroData['password_conf']);
    unset($RegistroData['password_antiga']);
    unset($RegistroData['nome_velho']);
    unset($RegistroData['id']);

    if ($erro == 9):
        $cadastra->ExeCreate($RegistroData);

        if ($cadastra->getResult() and $erro == 9):
            $BL = $Cript->encrypt("{$semAcentos},index,12121212");
            DSErro1("{$artigo1} \'{$RegistroData["nome"]}\'  foi cadastrada com sucesso!", '', $BL, DS_ACCEPT);
        else:
            DSErro($cadastra->getError()[0], $cadastra->getError()[1]);
        endif;
    endif;
endif;

pulo:

$botaoCR = 'Retornar a Lista';
$botaoClass = 'fa fa-arrow-left';
$botaoSend = 'Cadastrar ';

$cadastro = "Inclusão";
$botaoSend = 'Incluir ' . $comAcento;

$RegistroData['password'] = '';

$aviso_password = "Os dois campos acima deve ser preenchidos";

require_once(PATH_INC . "/Menu.php");
require_once 'Dados.php';
