<?php


require_once 'Painel/Config.php';

$Funcoes = new Funcoes();
$Cript   = new Criptografia();
$login   = new Login();
$Funcoes->checa_sessao();


if (!$login->CheckLogin()) :
    unset($_SESSION['userlogin_SITE']);
    $BL = NULL;
    header('Location: /?BL=' . $BL);
else :
    $userlogin = $_SESSION['userlogin_SITE'];
endif;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$comAcentos = "Autores";
$comAcento  = "Autor";
$semAcentos = "Autores";
$senAcento  = "Autor";
$classe     = "Admin_Autores";
$tabela     = 'autores';
$artigo     = 'o '.$comAcento;
$ident      = 'O '.$comAcento;
//////////////////////////////////////////////////////////////////////////////////////////////////////
$botaoClass = 'fa fa-arrow-left';
$botaoCR    = 'Retornar a Lista de ' . $comAcentos;
$url8       = 'Painel/Assets/Plugins/pt_br.json';
$url9       = "Painel/Views/{$semAcentos}/lista.php?tabela=" . $tabela;
$urlcrud    = "Painel/Views/{$semAcentos}/Crud.php";
$botaoClass = 'fa fa-arrow-left';
