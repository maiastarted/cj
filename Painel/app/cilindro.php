<?php
    
    $Registro__Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    if ($Registro__Data) {
        //   $output = print_r($Registro__Data, true);
        //   file_put_contents('file.txt', $output);
        
        // exit();
        
        $classe = "Admin_Relatorios";
        $cadastra = new $classe;
        $classe1 = "Admin_Subquestoes";
        
        $into = "";
        $into1 = "";
        $into31 = "";
        $pasta = '';
        $file_name = '';
        
        $subq = new $classe1;
        include "Funcoes1.class.php";
        $Regis = array();
        // Relatório--------------------------------------------------------
        
        $id_questao = $id;
        $Regis['id_questao'] = $id;
        $Regis['dia'] = $Registro__Data['dia'];
        $Regis['id_projeto'] = $Registro__Data['id_projeto'];
        $Regis['id_usuario'] = $Registro__Data['id_usuario'];
        if ($id == 24) {
            $Regis['serie_lab'] = $Registro__Data['serie_lab'];
            $Regis['unidade'] = $Registro__Data['unidade'];
            $Regis['densidade'] = $Registro__Data['densidade'];
            unset($Registro__Data['serie_lab']);
            unset($Registro__Data['unidade']);
            unset($Registro__Data['densidade']);
        }
        
        unset($Registro__Data['dia']);
        unset($Registro__Data['id_projeto']);
        unset($Registro__Data['id_usuario']);
        
        $cadastra->ExeCreate($Regis);
        
        if ($cadastra->getResult()) {
            $Registro_Tabela_1 = $cadastra->getResult();
            $id_relatorio = $Registro_Tabela_1;
        }
        
        $Keys = current($Registro__Data);
        $Key = key($Registro__Data);
        
        if (isset($Registro__Data['id_questao']))
            unset($Registro__Data['id_questao']);
        if (isset($Registro__Data['dia']))
            unset($Registro__Data['dia']);
        if (isset($Registro__Data['id_relatorio']))
            unset($Registro__Data['id_relatorio']);
        if (isset($Registro__Data['id_projeto']))
            unset($Registro__Data['id_projeto']);
        if (isset($Registro__Data['pagina']))
            unset($Registro__Data['pagina']);
        if (isset($Registro__Data['totalm']))
            unset($Registro__Data['totalm']);
        if (isset($Registro__Data['inicioff']))
            unset($Registro__Data['inicioff']);
        if (isset($Registro__Data['novo']))
            unset($Registro__Data['novo']);
        if (isset($Registro__Data['id_usuario']))
            unset($Registro__Data['id_usuario']);
        if (isset($Registro__Data['SendPostForm']))
            unset($Registro__Data['SendPostForm']);
        
        // Dados do relatório--------------------------------------------------------
        $Regis_1 = array();
        
        $ff = 1;
        $totalff = count($Registro__Data);  //['totalm'] + 1;
        
        $Read_Tabela_2 = new Read();
        
        if (isset($_FILES["files"])) {
            extract($_FILES["files"]);
            $error = array();
            $extension = array("jpeg", "jpg", "png", "gif");
            
            foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                $file_name = $_FILES["files"]["name"][$key];
                $file_tmp = $_FILES["files"]["tmp_name"][$key];
                
                $Read_Tabela_2->ExeRead('subquestoes', "WHERE `app` ='$key' ");
                if ($Read_Tabela_2->getResult())                :
                    foreach ($Read_Tabela_2->getResult() as $dados1):
                        extract($dados1);
                        $id_campo = $id;
                    endforeach;
                endif;
                $id__campo = $subq->GetId($Key, $id_questao);
                
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                if (in_array($ext, $extension)) {
                    
                    $pasta = PATH_IMG_ARTIGOS;
                    if (!file_exists($pasta . $file_name)) {
                        $file_name = str_replace(" ", "_", $file_name);
                        move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], $pasta . $file_name);
                    }
                    
                    $Regis_2 = array();
                    $Regis_2['valor'] = $file_name;
                    $Regis_2['id_campo'] = $id_campo;
                    $Regis_2['id_relatorio'] = $id_relatorio;
                    
                    if (!empty($Regis_2['id_relatorio'])) {
                        $cadastra->ExeCreate_Campos($Regis_2);
                    }
                } else {
                    array_push($error, "$file_name, ");
                }
                
                if (isset($Registro__Data['chk'][$key])) {
                    unset($Regis_2);
                    if ($Registro__Data['chk'][$key]) {
                        $Regis_2['valor'] = NULL;
                        $Regis_2['id_campo'] = $key;
                        $Regis_2['id_relatorio'] = $id_relatorio;
                        
                        if (!empty($Regis_2['id_relatorio'])) {
                            $cadastra->ExeCreate_Campos($Regis_2);
                        }
                    }
                }
            }
        }
        
        
        for ($ff = 1; $ff <= $totalff; $ff++) {
            $Keys = current($Registro__Data);
            $Key = key($Registro__Data);
            
            $id__campo = $subq->GetId($Key, $id_questao);
            $tipo__campo = $subq->GetTipo($id__campo);
            
            if ($tipo__campo != 5) {
                $Regis_1['id_campo'] = $id__campo;
                $Regis_1['valor'] = $Keys;
                $Regis_1['id_relatorio'] = $id_relatorio;
            } else {
                if ($Keys == 'on' or $Keys == 'true') {
                    $Regis_1['id_campo'] = $id__campo;
                    $Regis_1['valor'] = 'on';
                    $Regis_1['id_relatorio'] = $id_relatorio;
                } else {
                    $Regis_1['id_campo'] = $id__campo;
                    $Regis_1['valor'] = 'false';
                    $Regis_1['id_relatorio'] = $id_relatorio;
                }
            }
            
            // if (!empty($Regis_1['valor'])) {
            $cadastra->ExeCreate_Campos($Regis_1);
            // }
            
            next($Registro__Data);
            unset($Regis_1);
        }
    }
    //////////////////////////////////////////////////////////////
    if ($cadastra->getResult()) {
        $data2 = [
            'result' => 'Sucesso',
            'status' => true,
            'mensagem' => 'Dados gravados' . $pasta . $file_name,
            'id' => null,
        ];
    } else {
        $data2 = [
            'result' => 'failure',
            'status' => false,
            'mensagem' => 'Dados não conferem ' . $pasta . $file_name,
            'id' => null,
        ];
    }





