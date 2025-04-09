<?php

require_once('Inicio.php');
$cadastra = new $classe;

$Registro_Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($Registro_Data && $Registro_Data['SendPostForm']):

    $velho = $cadastra->GetNome(0, $Registro_Data['nome']);

    unset($Registro_Data['SendPostForm']);
    unset($Registro_Data['nome_velho']);

    if ($velho != false):
        DSErro("{$ident} <b>{$Registro_Data["nome"]}</b> já existe no sistema!", '', DS_ALERT);
    else:
        $cadastra->ExeCreate($Registro_Data);

        if ($cadastra->getResult()):
            $BL = $Cript->encrypt("{$semAcentos},index,111111");
            DSErro("{$ident} <b>{$Registro_Data["nome"]}</b>  foi cadastrada com sucesso!", $BL, DS_ACCEPT);
        else:
            DSErro($cadastra->getError()[0], $cadastra->getError()[1]);
        endif;
    endif;
endif;

$botaoCR = 'Retornar a Lista';
$botaoClass = 'fa fa-arrow-left';
$botaoSend = 'Cadastrar ';

$cadastro = "Inclusão";
$botaoSend = 'Incluir ' . $comAcento;

require_once(PATH_INC . "/Menu.php");
require_once 'Dados.php';
