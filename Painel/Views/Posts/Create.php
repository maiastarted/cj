<?php
    
    require_once('Inicio.php');
    $cadastra = new $classe;
    
    $RegistroData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    $gravar = 0;
    if ($RegistroData):
        $RegistroData['user_id'] = $_SESSION['userlogin_SITE']['id'];
        
        
        if (isset($RegistroData['SendTexto'])):
            $dados = $_POST;
            
            $RegistroData['media'] = '';
            $RegistroData['endereco'] = '';
            $RegistroData['postagem'] = date('Y-m-d h:i:s', time());
            $RegistroData['tipo'] = 'text';
            $RegistroData['texto'] = $RegistroData['quem_sou'];
            unset($RegistroData['quem_sou']);
            unset($RegistroData['SendTexto']);
            
            $gravar = 1;
        endif;
        ####################################################################################
        if (isset($RegistroData['SendMidia'])):
            
            $extension = array("jpeg", "jpg", "png", "gif");
            $uploadDir = 'Painel/Imagens/Media/';
            if (!empty($_FILES["media"]["tmp_name"])) {
                extract($_FILES["media"]);
                $error = array();
                
                $ff = $_FILES["media"]["tmp_name"];
                
                $file_name = $_FILES["media"]["name"]; //[$key];
                $file_tmp = $_FILES["media"]["tmp_name"]; //[$key];
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $pasta = $uploadDir;
                
                $foto = $pasta . $file_name;
                if (in_array($ext, $extension)) {
                    if (!file_exists($foto)) {
                        move_uploaded_file($file_tmp = $_FILES["media"]["tmp_name"], $pasta . $file_name);
                    }
                    $Regis_2 = array();
                    $Regis_2['valor'] = $file_name;
                } else {
                    array_push($error, "$file_name, ");
                }
                
                $RegistroData['media'] = '';
                $RegistroData['endereco'] = '';
                $RegistroData['postagem'] = date('Y-m-d h:i:s', time());
                $RegistroData['tipo'] = 'image';
                $RegistroData['texto'] = '';
                
                
                unset($RegistroData['SendMidia']);
                unset($RegistroData['media']);
                $RegistroData['media'] = $file_name;
            }
            
            $gravar = 1;
        endif;
        
        if ($gravar == 1):
            $cadastra->ExeCreate($RegistroData);
            
            if ($cadastra->getResult()):
                $BL = $Cript->encrypt("{$semAcentos},index,12121212", TEXTO_CHAVE);
                DSErro1("A inclusão de \'{$RegistroData['titulo_post']}\' foi realizada com sucesso!", '', $BL, DS_ACCEPT);
            endif;
        
        endif;
    endif;
###################################################################################
    $botaoCR = 'Retornar a Lista';
    $botaoClass = 'fa fa-arrow-left';
    $botaoSend = 'Cadastrar ';
    
    $cadastro = "Inclusão";
    $botaoSend = 'Incluir ' . $comAcento;
    
   
    require_once 'Modal/Dados.php';
 
   
