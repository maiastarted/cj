<?php

require_once('Inicio.php');

$RegistroData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$cadastra = new $classe;

if ($RegistroData && $RegistroData['SendPostForm']):

    $nome = $RegistroData['nome'];

    unset($RegistroData['SendPostForm']);

    $BL = $Cript->encrypt("{$semAcentos},index,977777",TEXTO_CHAVE);

    $cadastra->ExeDelete($VarID, $RegistroData, $BL);

    if ($cadastra->getResult()):
        $BL = $Cript->encrypt("{$semAcentos},index,12121212",TEXTO_CHAVE);
        DSErro1("{$artigo1} \'{$nome}\' foi excluído com sucesso!", '', $BL, DS_ACCEPT);
    else:
        DSErro($cadastra->getError()[0], $cadastra->getError()[1]);
    endif;
endif;
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$ReadUser_Autores = new Read();
$ReadUser_Autores->ExeRead($tabela, "WHERE id = :id", "id={$VarID}");
if ($ReadUser_Autores->getResult()):
    $RegistroData = $ReadUser_Autores->getResult()[0];
endif;

$cadastro = "Exclusão";
require_once(PATH_INC . "/Menu.php");

$botaoSend = 'Excluir ' . $comAcento;
$aviso_password = "";

require_once 'Dados.php';
