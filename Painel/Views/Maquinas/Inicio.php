<?php

  $incl = $_SESSION['caminho_config1'];

  include_once $incl;
  $Funcoes = new Funcoes();
  $Cript = new Criptografia();
  $login = new Login();
  $Funcoes->checa_sessao();
  $Selecionar = new Select();

  if (!$login->CheckLogin()) :
    unset($_SESSION['userlogin_SITE']);
    $BL = NULL;
    header('Location: /?BL=' . $BL);
  else :
    $userlogin = $_SESSION['userlogin_SITE'];
  endif;

///////////////////////////////////////////////////////////////////////////////////////////////////////////
  $comAcento = "Máquina";
  $comAcentos = "{$comAcento}s";
  $semAcento = "Maquina";
  $semAcentos = "{$semAcento}s";

  $classe = "Admin_Maquinas";
  $cadastra = new $classe();
  $table = 'machines';          //, autores, categoria';
  $artigo = 'o ' . $comAcento;
  $ident = 'O ' . $comAcento;
//////////////////////////////////////////////////////////////////////////////////////////////////////
  $botaoCR = 'Retornar a Lista de ' . $comAcentos;
  $url8 = 'Painel/Assets/Plugins/pt_br.json';
  $url9 = "Painel/Views/{$semAcentos}/lista.php?tabela=" . $table;
  $urlcrud = "Painel/Views/{$semAcentos}/Crud.php";
  $botaoClass = 'fa fa-arrow-left';

  