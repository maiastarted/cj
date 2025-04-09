<?php
    
    namespace Conn;
    class Funcoes_Campos1
    {
        function montaCampo($class1,
                            $class2,
                            $class3,
                            $nome,
                            $tipo,
                            $title,
                            $fa,
                            $required,
                            $disabled,
                            $onblur,
                            $place,
                            $valor)
        {
            $campo = "";
//            $pos1 = strpos($campo_nome, "_");
//            $campo_nome1 = trim(substr($campo_nome, 0, $pos1));
            // ------------------------------------------------------------------------------------------
            
            switch ($tipo) {
                case "text":
                    $campo = <<<TEXT
                            <div class='$class1' title='$title'>
                                <div class="$class2 ">
                                   <i class="$fa"></i>
                                </div>
                                <input class="$class3"
                                       type="$tipo"
                                       name="$nome"
                                       id="$nome"
                                       value="$valor"
                                       title="$title"
                                       $required
                                       $disabled
                                       $onblur
                                       placeholder="$place"
                                >
                                </div>
                        TEXT;
                    
                    break;
                case "password":
                    $campo = <<<TEXT
                            <div class='$class1' title='$title'>
                                <div class="$class2 ">
                                   <i class="$fa"></i>
                                </div>
                                <input class="$class3"
                                       type="$tipo"
                                       name="$nome"
                                       id="$nome"
                                       value="$valor"
                                       title="$title"
                                       $required
                                       $disabled
                                       $onblur
                                       placeholder="$place"
                                >
                                </div>
                        TEXT;
                    break;
                case "1":
                    $campo = "Segunda-feira";
                    break;
                case "2":
                    $campo = "Terça-feira";
                    break;
                
            }
            return $campo;
        }
        ##############################################


//            if ($campo_nome1 == "combo") {
//                // echo "<br> ** $campo_valor <br>" ;
//                // echo "<br> ** $campo_nome <br>" ;
//                $campo_nome2 = str_replace($campo_nome1 . "_", "", $campo_nome);
//                // echo "<br> ** $campo_nome1 <br>" ;
//                // echo "<br> ** $campo_nome2 <br>" ;
//                $pos1 = strpos($campo_nome2, "_");
//                // echo "<br> ** $campo_nome2 <br>" ;
//                $campo_nome3 = $campo_nome2; // trim(substr($campo_nome2, 0, $pos1));
//                $campo_nome4 = str_replace("VW", "", $campo_nome3);
//                $campo_nome5 = str_replace("VW", "", $campo_nome3);
//                // echo "<br> 5** $campo_nome5 <br>" ;
//                $campo_nome4 = "nome_" . $campo_nome4;
//
//                // echo "<br> ** $campo_nome3 <br>" ;
//                $query_combo = "
//						SELECT
//							*
//						FROM
//							$campo_nome3
//						ORDER BY
//							$campo_nome4";
//
//                // echo $query_combo;
//                $result_combo = mysql_query($query_combo);
//                $number_combo = mysql_num_rows($result_combo);
//                $i_combo = 0;
//
//                $campo = "
//				<div class='form-group'>
//					<label>$campo_label</label>
//					 <input
//						type='hidden'
//						id='$campo_nome_velho'
//						name='$campo_nome_velho'
//						value='$campo_valor' />\n
//					<div>
//						<select name='$campo_nome' id='$campo_nome' class='select' $disabled>\n ";
//                $campo .= "<option value='' ></option>\n";
//
//                while ($i_combo < $number_combo) {
//                    $id_1 = mysql_result($result_combo, $i_combo, "id_" . $campo_nome5);
//                    // echo "id_ ".$id_1."<br>";
//                    $campo_combo = $campo_valor;
//                    if ($campo_combo == "")
//                        $campo_combo = 1;
//
//                    // echo "id_".$campo_nome1."$campo_combo<br>";
//                    $nome_1 = mysql_result($result_combo, $i_combo, "nome_" . $campo_nome5);
//                    $selecionado = "";
//                    // echo "$campo_combo == $id_1<br>";
//                    if ($campo_combo == $id_1) {
//                        $selecionado = "Selected";
//                    }
//                    $campo .= "<option value='$id_1' $selecionado>$nome_1</option>\n";
//
//                    $i_combo++;
//                }
//
//                $campo .= "
//						</select>
//					</div>
//				</div>";
//                return $campo;
//            }
        // --------------------------------------------------------------------------------------------------------
//        //            // --------------------------------------------------------------------------------------------------------
//            if ($campo_nome1 == "data") {
//
//                $campo_maxlength = $this->montamaxlength($campo_tamanho, $campo_tipo);
//                $campo_tamanho = $this->montaTamanho($campo_tamanho, $campo_tipo);
//
//                $campo = "<div class='form-group'>
//					<label>$campo_label</label>
//							  <input
//						type='hidden'
//						id='$campo_nome_velho'
//						name='$campo_nome_velho'
//						value='$campo_valor' />\n
//					<input
//						type='text'
//
//						class='form-control1'
//						id='$campo_nome'
//						name='$campo_nome'
//						maxlength='$campo_maxlength'
//						$disabled
//						style='width:$campo_tamanho;'
//						value='$campo_valor' />\n ";
//
//                $campo .= " <script>
//								$(document).ready(function () {
//									$('#" . $campo_nome . "').datepicker({
//
//									});
//								  });
//								</script> ";
//
//                if ($obrigatorio == "NO") {
//                    $campo .= "<input class='message-error'
//						id='erro_$campo_nome'
//						style='display:none;'
//						value='Campo não preenchido' />\n";
//                }
//
//                $campo .= "</div>\n";
//                return $campo;
//            }
//            // --------------------------------------------------------------------------------------------------------
//            if ($campo_nome1 == "nulo") {
//
//                $campo = "
//					<input
//						type='hidden'
//						id='$campo_nome'
//						name='$campo_nome'
//						value='$campo_valor' />\n ";
//
//                return $campo;
//            }
//            // --------------------------------------------------------------------------------------------------------
//            if ($campo_nome1 == "id") {
//                $campo = "
//					<input
//						type='hidden'
//						id='$campo_nome'
//						name='$campo_nome'
//						value='$campo_valor' />\n ";
//
//                return $campo;
//            }
//            // --------------------------------------------------------------------------------------------------------
//
//            // $mascarar= $this->MontaMascara($campo_valor, $campo_label);
//            // $campo_valor= $this->MontaMascara($campo_valor, $campo_label);
//            $result = $this->MontaMascara($campo_valor, $campo_label);
//            $campo_maxlength = $this->montamaxlength($campo_tamanho, $campo_tipo);
//            $campo_tamanho = $this->montaTamanho($campo_tamanho, $campo_tipo);
//            $campo_valor = $result[0]; // $var1
//            $mascarar = $result[1]; // $var2
//
//            $campo = "<div class='form-group'>
//					<label>$campo_label</label>
//					    <input
//						type='hidden'
//						id='$campo_nome_velho'
//						name='$campo_nome_velho'
//						value='$campo_valor' />\n
//					<input
//						type='text'
//						class='form-control1'
//						id='$campo_label'
//						name='$campo_nome'
//						style='width:$campo_tamanho;'
//						maxlength='$campo_maxlength'
//						$disabled
//						$mascarar
//						value='$campo_valor' />\n ";
//            if ($obrigatorio == "NO") {
//                $campo .= "<input class='message-error'
//						id='erro_$campo_nome'
//						style='display:none;'
//						value='Campo não preenchido' />\n";
//            }
//
//            $campo .= "</div>\n";
//            return $campo;
    }
    
    // ****************************************************************************************************
//        function montaTamanho($campo_tamanho, $campo_tipo)
//        {
//            $campo_tamanho = trim($campo_tamanho);
//            $campo_tipo = trim($campo_tipo);
//            $valor = "100";
//            // echo "$campo_tamanho -----$campo_tipo---------<br>";
//            if ($campo_tipo != "date" or $campo_tipo != "datetime" or $campo_tipo != "double" or $campo_tipo != "tinyint" or $campo_tipo != "smallint") {
//
//                switch ($campo_tipo) {
//                    case "varchar":
//                        $valor = $campo_tamanho * 10;
//                        break;
//                    case "char":
//                        $valor = $campo_tamanho * 9;
//                        break;
//                    case "int":
//                        $valor = $campo_tamanho * 3;
//                        break;
//                }
//
//                if ($campo_tipo == "double") {
//                    $valor = 250;
//                }
//                if ($campo_tipo == "date") {
//                    $valor = 110;
//                }
//                if ($valor >= 250) {
//                    $valor = 300;
//                }
//
//                if ($valor <= 20) {
//                    $valor = 50;
//                }
//
//                // echo "$campo_tamanho '$campo_valor' $quanto $campo_tipo". $valor."<br>" ;
//                $valor = intval($valor) . "px";
//            }
//            return $valor;
//        }
//
//        // ****************************************************************************************************
//        function montamaxlength($campo_tamanho, $campo_tipo)
//        {
//            $campo_tamanho = trim($campo_tamanho);
//            $campo_tipo = trim($campo_tipo);
//            $valor1 = "100";
//            // echo "$campo_tamanho -----$campo_tipo---------<br>";
//
//            switch ($campo_tipo) {
//                case "date":
//                    $valor1 = 10;
//                    break;
//                case "datetime":
//                    $valor1 = 10;
//                    break;
//                case "varchar":
//                    $valor1 = $campo_tamanho;
//                    break;
//                case "char":
//                    $valor1 = $campo_tamanho;
//                    break;
//                case "int":
//                    $valor1 = $campo_tamanho;
//                    break;
//            }
//            // echo "$campo_tamanho '$campo_valor' $quanto $campo_tipo". $valor."<br>" ;
//            return $valor1;
//        }
//
    // ****************************************************************************************************
//        function MontaMascara($campo_valor, $campo_label)
//        {
//            $mascara = "";
//            $keypress = "";
//            $query = "SELECT
//			mascara, keypress
//		FROM
//			mascara
//		WHERE
//			campo_label = ucase('$campo_label')";
//            $result = mysql_query($query);
//            // echo $query."<br>" ;
//            if (mysql_num_rows($result) > 0) {
//                $num_campo = 0;
//                while ($row = mysql_fetch_assoc($result)) {
//                    $mascara = $row["mascara"];
//                    $keypress = $row["keypress"];
//                    $num_campo++;
//                }
//            }
//            // echo $campo_valor . " ".$mascara."<br>" ;
//            if ($campo_valor != "" and $mascara != "") {
//                $campo_valor = $this->mascara($campo_valor, $mascara);
//            }
//            // return $campo_valor;
//            return array(
//                $campo_valor,
//                $keypress
//            );
//
//            // return $keypress;
//        }
    // ****************************************************************************************************
    // Funcao que faz a mascara
//        function mascara($val, $mask)
//        {
//            $maskared = '';
//            $k = 0;
//            for ($i = 0; $i <= strlen($mask) - 1; $i++) {
//                if ($mask[$i] == '#') {
//                    if (isset($val[$k]))
//                        $maskared .= $val[$k++];
//                } else {
//                    if (isset($mask[$i]))
//                        $maskared .= $mask[$i];
//                }
//            }
//            return $maskared;
//        }

