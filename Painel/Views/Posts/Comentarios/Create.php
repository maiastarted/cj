<?php

  require_once('Inicio.php');
  $cadastra = new $classe;

  $RegistroData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  $postado = new Admin_Posts;
  $id_post = $dados_pagina[2];

  
  if ($RegistroData):
    $RegistroData['post_user_id'] = $_SESSION['userlogin_SITE']['id'];

     unset($RegistroData['SendTexto']);

       ####################################################################################
    $postado = new Admin_Posts;  
    $ReadDados1='';
    $ReadDados1 = $postado->Adiciona_Comentario($RegistroData);

      if ($ReadDados1):
        $BL = $Cript->encrypt("Posts/Comentarios,Create,$id_post", TEXTO_CHAVE); 
        DSErro1("A inclusão foi realizada com sucesso!", '', $BL, DS_ACCEPT);
      endif;
  endif;
###################################################################################
  $botaoCR = 'Retornar a Lista';
  $botaoClass = 'fa fa-arrow-left';
  $botaoSend = 'Cadastrar ';

  $cadastro = "Inclusão";
  $botaoSend = 'Incluir ' . $comAcento;

  $t = $id_post;
  require_once 'Dados.php';

  