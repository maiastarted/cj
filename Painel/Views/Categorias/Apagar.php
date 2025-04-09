<?php

require_once('Inicio.php');

$Registro_Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$cadastra = new $classe;

if ($Registro_Data && $Registro_Data['SendPostForm']):

    $titulo = $cadastra->GetTitulo($VarID, $Registro_Data['nome']);
    $nome = $Registro_Data['nome'];

    unset($Registro_Data['SendPostForm']);
    unset($Registro_Data['nome_velho']);

    if ($titulo == true):
        DSErro("{$ident} <b>{$nome}</b> não pode ser excluída, pois está vinculada a um título!", ' ', DS_ALERT);
    else:
        $cadastra->ExeDelete($VarID, $Registro_Data);

        if ($cadastra->getResult()):
            $BL = $Cript->encrypt("{$semAcentos},index,111111");
            DSErro("{$ident} <b>{$nome}</b> foi excluída com sucesso!", $BL, DS_ACCEPT);
        else:
            DSErro($cadastra->getError()[0], $cadastra->getError()[1]);
        endif;
    endif;
endif;
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$ReadUser_Registro = new Read();
$ReadUser_Registro->ExeRead($tabela, "WHERE id = :id", "id={$VarID}");
if ($ReadUser_Registro->getResult()):
    $Registro_Data = $ReadUser_Registro->getResult()[0];
endif;

$cadastro = "Exclusão";
require_once(PATH_INC . "/Menu.php");

$botaoSend = 'Excluir ' . $comAcento;

require_once 'Dados.php';
