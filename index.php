<?php

  session_start();
  ob_start();
  if (empty($_SESSION['lang'])) {
    $_SESSION['lang'] = 'pt-br';
    global $idioma;
    $idioma = $_SESSION['lang'];
  } else {
    global $idioma;
    $idioma = $_SESSION['lang'];
  }
  require_once 'Painel/Config.php';

  $BLA = "";
  $BLA = $Cript->encrypt("Inicial,Logar,666666666", TEXTO_CHAVE);

  $login = new Login();

  $dataLogin = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  //////////////////////////////////////////////////////////////////  segunda etapa da password
  if (isset($dataLogin['segunda'])) :
    if (isset($_SESSION['chave'])) {
      $chave = $_SESSION['chave'];
    } else {
      $chave = '';
    }

//
    $chave1 = $dataLogin['segunda'];
    if ($chave == $chave1) {
      $dataLogin['Admin_Login'] = '';
      $_SESSION['segunda'] = '1111';
      $_REQUEST['BL'] = $Cript->encrypt(",Painel,0000", TEXTO_CHAVE);
    } else {
      $dataLogin['Admin_Login'] = '';
    }
  endif;
  /////////////////////////////////////////////////////// tesa login
  if (!empty($dataLogin['Admin_Login'])) :

    $coment=$login->ExeLogin($dataLogin);

    unset($_REQUEST['BL']);
    unset($dataLogin);

    if (!$coment) :
      $_REQUEST['logoff'] = "Logouttrue";
    else :
      $_REQUEST['BL'] = $Cript->encrypt("Inicial,Logar1,666666666", TEXTO_CHAVE);
    endif;

  endif;

  $tipo = '';
  $Tipo_pag = 0;
  //////////////////////////////////////////////////////// Examina página
  if (isset($_REQUEST['BL'])) :
    $pagina1 = $Cript->dencrypt($_REQUEST['BL'], TEXTO_CHAVE);
    $dados_pagina = explode(',', $pagina1);

    if ($pagina1 == "" or $dados_pagina[1] == "Logar") :
      $pagina = $Funcoes->MontaPagina('Inicial', 'Logar', 1000);
      $VarID = 1000;
      $Tipo_pag = 1;
    elseif ($dados_pagina[1] == "Logar1"):
      $pagina = $Funcoes->MontaPagina($dados_pagina[0], $dados_pagina[1], $dados_pagina[2]);
      $VarID = $dados_pagina[2];
      $Tipo_pag = 1;
    //////////////////////////////////////////////////////// testa logoff
    elseif ($dados_pagina[2] == "logoff"):
      $_SESSION['userlogin_SITE'] = "";
      session_destroy();
      $pagina = $Funcoes->MontaPagina('Inicial', 'Logar', '00000');
      $Tipo_pag = 1;
    else :
      $pagina = $Funcoes->MontaPagina($dados_pagina[0], $dados_pagina[1], $dados_pagina[2]);
      $VarID = $dados_pagina[2];
      $Tipo_pag = 2;
      require_once PATH_INC . '/Header.php';
    endif;

  else :
    if (!isset($pagina) || $pagina == false) :
      $pagina = $Funcoes->MontaPagina('Inicial', 'Logar', '00000');
    endif;
  endif;

  if (str_contains($pagina, 'Logar')) {
    if (strlen($pagina) > 2) :
      require_once($pagina);
    endif;
  } else {

    if (strlen($pagina) > 2) :
      if ($Tipo_pag == 2) {
//        require_once(PATH_INC . "/Menu.php");
//                echo '<section class="container1">';
        require_once($pagina);
        echo '</section>';
      } else {
        require_once($pagina);
      }

    endif;

    include PATH_INC . '/Footer.php';
    $ident = $_SESSION['userlogin_SITE']['id'];
    $BLVoltar = $Cript->encrypt("¬,Painel,<?=$ident?>", TEXTO_CHAVE);

//    require_once HOME_VIEW . '/Posts/Barra/M_Barra_Post.php';
//    require_once HOME_VIEW . '/Posts/Modal/M_Add_Post.php';
//    require_once HOME_VIEW . '/Posts/Modal/M_Imagem.php';
//    require_once PATH_INC . '/Modal.php';
  }


  ob_end_flush();

  