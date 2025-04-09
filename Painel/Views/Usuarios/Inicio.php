<?php


require_once($_SESSION['caminho_config']);

$Funcoes    = new Funcoes();
$FC  = new Funcoes_Campos();
$Cript      = new Criptografia();
$Funcoes->checa_sessao();
$login      = new Login();

if ($tipo != 'Novo') {
    if (!$login->CheckLogin()):
        unset($_SESSION['userlogin_SITE']);
        $BL = NULL;
        header('Location: /?BL=' . $BL);
    else:
        $userlogin = $_SESSION['userlogin_SITE'];
    $VarID =$userlogin['id'];
    endif;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$comAcentos = "Usuários";
$comAcento  = "Usuário";

$semAcentos = "Usuarios";
$senAcento  = "Usuario";

$classe     = "Admin_Usuarios";
$tabela     = 'adm_users';
$artigo     = $Lang->logar($idioma, 'o') . $comAcento;
$ident      = $Lang->logar($idioma, 'O') . $comAcento;

//////////////////////////////////////////////////////////////////////////////////////////////////////

$pagina     = $Funcoes->MontaPagina($semAcentos, 'Index_tabela', 'yyyyy');
$url        = HOME . '/' . $pagina;
$botaoCR    = $Lang->logar($idioma, 'retorna_lista_de') . $comAcentos;
$botaoClass = 'fa fa-arrow-left';
