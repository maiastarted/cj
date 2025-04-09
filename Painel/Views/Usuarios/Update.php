<?php

  require_once 'Inicio.php';

  $Registro_Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

  if ($Registro_Data && $Registro_Data['SendPostForm']):
    $cadastra = new $classe;

    $nome = $Registro_Data['nome'];
    $password1 = $Registro_Data['password'];
    $password2 = $Registro_Data['password_conf'];

    $Ver_apelido = $cadastra->Username_Unico($VarID, $Registro_Data['username']);
    if ($Ver_apelido) {
      DSErro2("O Apelido \'{$Registro_Data['username']}\' já consta no cadastro!", DS_ERROR);
      $erro = 1;
      goto pilo1;
    }
    // Verifiva e-mail

    $Ver_email = $cadastra->Username_Email($VarID, $Registro_Data['email']);
    if ($Ver_email) {
      DSErro2("O e-mail \'{$Registro_Data['email']}\' já consta no cadastro!", DS_ERROR);
      $erro = 1;
      goto pilo1;
    }

    if ($password1 === $password2) {
      $password3 = $Registro_Data['password_antiga'];
      $password3 = str_replace('*23AE809DDACAF96AF', '', $password3);
      $password4 = $Cript->dencrypt_password($password3, $Registro_Data['email']);

      if ($password2 == '') {
        $Registro_Data['password'] = $password4;
      }

      unset($Registro_Data['password_antiga']);
      $erro = 9;
    } else {
      DSErro2("A password e a confirmação são diferentes", DS_ERROR);
      $erro = 1;
      goto pilo1;
    }
    //    }
    unset($Registro_Data['SendPostForm']);
    unset($Registro_Data['nome_velho']);
    unset($Registro_Data['password_conf']);
    unset($Registro_Data['ultimo_login']);

    $valor_vip = $Funcoes->MoneyDB($Registro_Data['valor_vip']);
    $Registro_Data['valor_vip'] = trim($valor_vip);
    
    $valor_privado = $Funcoes->MoneyDB($Registro_Data['valor_privado']);
    $Registro_Data['valor_privado'] = trim($valor_privado);
//$hhhh=strlen($Registro_Data['valor_privado']);
//    exit();
    if ($erro == 9) {

      #-----------------------------   AVATAR -----------------------------------------------------------
      $error = array();
      $extension = array("jpeg", "jpg", "png", "gif");
      $uploadDir = 'Painel/Imagens/Avatar/';

      if (!empty($_FILES["avatar"]["tmp_name"])) {
        extract($_FILES["avatar"]);
        $error = array();

        $ff = $_FILES["avatar"]["tmp_name"];

        $file_name = $_FILES["avatar"]["name"]; //[$key];
        $file_tmp = $_FILES["avatar"]["tmp_name"]; //[$key];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $pasta = $uploadDir;

        $foto = $pasta . $file_name;
        if (in_array($ext, $extension)) {
          if (!file_exists($foto)) {
            move_uploaded_file($file_tmp = $_FILES["avatar"]["tmp_name"], $pasta . $file_name);
          }
          $Regis_2 = array();
          $Regis_2['valor'] = $file_name;
        } else {
          array_push($error, "$file_name, ");
        }

        $Registro_Data['avatar'] = $file_name;
      }
      #---------------------------- FIM-   AVATAR -----------------------------------------------------
      $Registro_Data['password'] = $Cript->encrypt_password($Registro_Data['password'], $Registro_Data['email']);

      $cadastra->Atualiza($VarID, $Registro_Data);

      if ($cadastra):
        $BL = $Cript->encrypt('Usuarios,Update,' . $id, TEXTO_CHAVE);
        DSErro1("A atualização de \'{$nome}\' foi realizada com sucesso!", '', $BL, DS_ACCEPT);
      else:
        DSErro($cadastra->getError()[0], $cadastra->getError()[1]);
      endif;
    }
  endif;
############################################################################

  pilo1:
  $avatar = 'nopicture.png';
  $ReadUser = new Read();

  $ReadUser->ExeRead("usuarios", "WHERE id = {$VarID}");
  if ($ReadUser->getResult()):
    $RegistroData = $ReadUser->getResult()[0];
  endif;
  $RegistroData['password'] = '*23AE809DDACAF96AF' . $RegistroData['password'];
  $checkCreate = filter_input(INPUT_GET, 'create', FILTER_VALIDATE_BOOLEAN);
  if ($checkCreate && empty($cadastra)):
    DSErro("O cadastrado foi realizado com sucesso!", DS_ACCEPT);
  endif;

  if (($RegistroData['avatar'])) {
    $avatar1 = PATH_FOTO_AVATAR . $RegistroData['avatar'];
  }
  $RegistroData['ultimo_login'] = $Funcoes->DateTimeFormat($RegistroData['ultimo_login']);

  $aviso_password = "Se preencher os dois campos acima, sua password será modificada, senão preencher não havera a alteração da password";

  $cadastro = "Atualização";
  $botaoSend = 'Alterar ' . $comAcento;

  require_once 'Dados.php';
  