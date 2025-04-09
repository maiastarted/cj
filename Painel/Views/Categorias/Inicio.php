<?php


require_once($_SESSION['caminho_config']);
//require_once($_SESSION['caminho_config1']);

$Funcoes = new Funcoes();
$Cript = new Criptografia();
$Funcoes->checa_sessao();
$login = new Login();

if (!$login->CheckLogin()):
    unset($_SESSION['userlogin_SITE']);
    $BL = NULL;
    header('Location: /?BL=' . $BL);
else:
    $userlogin = $_SESSION['userlogin_SITE'];
endif;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$comAcentos="Categorias";
$comAcento="Categoria";

$semAcentos="Categorias";
$senAcento="Categoria";


$classe = "Admin_Categorias";
$tabela = 'categorias';
$artigo='a '.$comAcento;
$ident='A '.$comAcento;

//////////////////////////////////////////////////////////////////////////////////////////////////////


$pagina = $Funcoes->MontaPagina($semAcentos, 'Index_tabela', 'yyyyy');
$url = HOME.'/'.$pagina ;

$botaoCR = 'Retornar a Lista de ' . $comAcentos;

$botaoClass = 'fa fa-arrow-left';