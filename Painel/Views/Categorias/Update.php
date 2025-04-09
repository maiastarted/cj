<?php

require_once('Inicio.php');

$Registro_Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$cadastra = new $classe;
$velho = '';

if ($Registro_Data && $Registro_Data['SendPostForm']):

    $novo_nome = $cadastra->GetNome($VarID, $Registro_Data['nome']);

    unset($Registro_Data['SendPostForm']);
    unset($Registro_Data['nome_velho']);

    if ($novo_nome != false):
        DSErro("A categoria <b>{$Registro_Data["nome"]}</b> já existe no sistema!", '', DS_ALERT);
    else:
        $cadastra->ExeUpdate($VarID, $Registro_Data);

        if ($cadastra->getResult()):
            $BL = $Cript->encrypt($semAcentos . ",index,111111");
            DSErro("A categoria <b>{$Registro_Data["nome"]}</b>  foi atualizado com sucesso!", $BL, DS_ACCEPT);
        else:
            DSErro($cadastra->getError()[0], $cadastra->getError()[1]);
        endif;
    endif;
endif;
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$Read_categorias = new Read();
$Read_categorias->ExeRead("categorias", "WHERE id = :id", "id={$VarID}");
if ($Read_categorias->getResult()):
    $Registro_Data = $Read_categorias->getResult()[0];
    $Registro_Data = $Read_categorias->getResult()[0];
endif;

$cadastro = "Atualização";
$botaoSend = 'Atualizar ' . $comAcento;

require_once(PATH_INC . "/Menu.php");

require_once 'Dados.php';
