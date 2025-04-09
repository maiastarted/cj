<?php

require_once('Inicio.php');

$Registro_Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$cadastra = new $classe;

if ($Registro_Data && $Registro_Data['SendPostForm']):

    $novo_nome = $cadastra->GetNome($VarID, $Registro_Data['nome']);
    unset($Registro_Data['nome_velho']);
    unset($Registro_Data['SendPostForm']);

    if ($novo_nome == false):
        DSErro("{$ident} <b>{$Registro_Data["nome"]}</b> já existe no sistema!", '', DS_ALERT);
    else:
        $cadastra->ExeUpdate($VarID, $Registro_Data);

        if ($cadastra->getResult()):
            $BL = $Cript->encrypt($semAcentos . ",index,111111",TEXTO_CHAVE);
            DSErro("{$ident} <b>{$Registro_Data["nome"]}</b>  foi atualizado com sucesso!", $BL, DS_ACCEPT);
        else:
            DSErro($cadastra->getError()[0], $cadastra->getError()[1]);
        endif;
    endif;
endif;
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$registro = new Read();
$registro->ExeRead("{$tabela}", "WHERE id = :id", "id={$VarID}");
if ($registro->getResult()):
    $Registro_Data = $registro->getResult()[0];
    $Registro_Data = $registro->getResult()[0];
endif;

$cadastro = "Atualização";
$botaoSend = 'Atualizar ' . $comAcento;

require_once(PATH_INC . "/Menu.php");

require_once 'Dados.php';
