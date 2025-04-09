<?php
    
    class Funcoes_Campos
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
                                <div class="$class2 " title='$title'>
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
                                <div class="$class2 " title="$title">
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
                    
                case "email":
                    $campo = <<<TEXT1
                                <div class="$class2 " title="$title">
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
                            TEXT1;
                    break;
                case "radio":
                    $campo = <<<TEXT2
                                <div class="$class2 " title="$title">
                                   <i class="$fa"></i>
                                </div>
                                <input
                                    type="$tipo"
                                    name="$nome"
                                    id="$nome"
                                    value="$valor"
                                    title="$title"
                                >
                                    Sim
                                     <br />
                                 <input
                                    type="$tipo"
                                    name="$nome"
                                    id="$nome"
                                    value="$valor"
                                    title="$title"
                                >
                                    nao
                                     <br />
                                </div>
                            TEXT2;
                    break;
                
            }
            return $campo;
        }
        ##############################################
    }
    