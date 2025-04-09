<div class="tab-pane active" id="assinante" style="margin-top: 10px;">

    <div class="row form-group">
        <div class="col-md-8">
            <label><?= $comAcento ?> <i style="color: red">*</i></label>
            <input class="form-control"
                   type = "text"
                   name = "nome"
                   value="<?php if (!empty($RegistroData['nome'])) echo $RegistroData['nome']; ?>"
                   title = "Informe o Nome d<?= $artigo ?>"
                   required
                   placeholder="Nome d<?= $artigo ?>" >
        </div>
        <div class="row form-group">
            <div class="col-md-4">
                <label>Categoria </label><i style="color: red">*</i>
                <select class="form-control" id="cat1" required onchange="buscasubcat(1)">
                    <option disabled="disabled" selected="selected">Selecione a Primeira Categoria</option>
                    <?php
                    $getCategoria1 = new AdminClientes();
                    $categorias = new Read;
                    $categorias->ExeRead('categorias', 'ORDER BY titulo');
                    if ($categorias->getResult()):
                        foreach ($categorias->getResult() as $dados):
                            extract($dados);
                            ?>
                            <option value="<?= $id; ?>" <?php
                            if ($id == $getCategoria1->getCategoria($ClienteData['subCat1'])): $idcat1 = $id;
                                echo 'selected="selected"';
                            endif;
                            ?>> <?= $titulo ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                </select>
            </div>

        </div>
        <div class="col-md-3">
            <label>Bloquear <?= $artigo ?> ? <i style="color: red"></i></label>
            <select class="form-control" name="bloqueado" required <?= $mostrar; ?>>
                <option value="0" <?php if ($RegistroData['bloqueado'] == 0) echo 'selected="selected"'; ?>> Não </option>
                <option value="1" <?php if ($RegistroData['bloqueado'] == 1) echo 'selected="selected"'; ?>> Sim </option>
            </select>
        </div>

        <div class="row form-group">
            <div class="col-md-2">
                <label>CEP </label>
                <input class="form-control"
                       type = "text"
                       name = "cep"
                       id = "campoCep"
                       value="<?php if (!empty($RegistroData['cep'])) echo $RegistroData['cep']; ?>"
                       title = "CEP do Endereço d<?= $artigo ?>"
                       placeholder="CEP" >
            </div>

            <div class="col-md-8">
                <label>Endereço d<?= $artigo ?></label>
                <input class="form-control"
                       type = "text"
                       name = "endereco"
                       id = "campoEndereco"
                       value="<?php if (!empty($RegistroData['endereco'])) echo $RegistroData['endereco']; ?>"
                       title = "Informe o Endereço d<?= $artigo ?>"
                       placeholder="Endereço d<?= $artigo ?>" >
            </div>
            <div class="col-md-2">
                <label>Número </label>
                <input class="form-control"
                       type = "text"
                       name = "numero"
                       value="<?php if (!empty($RegistroData['numero'])) echo $RegistroData['numero']; ?>"
                       title = "Informe o Número do Endereço d<?= $artigo ?>"
                       placeholder="Número" >
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3">
                <label>Complemento do Endereço</label>
                <input class="form-control"
                       type = "text"
                       name = "complemento"
                       value="<?php if (!empty($RegistroData['complemento'])) echo $RegistroData['complemento']; ?>"
                       title = "Informe o Complemento do Endereço d<?= $artigo ?>"
                       placeholder="Complemento" >
            </div>
            <div class="col-md-3">
                <label>Bairro </i></label>
                <input class="form-control"
                       type = "text"
                       name = "bairro"
                       id = "campoBairro"
                       value="<?php if (!empty($RegistroData['bairro'])) echo $RegistroData['bairro']; ?>"
                       title = "Informe o Bairro do Endereço do Usuário"
                       placeholder="Bairro d<?= $artigo ?>" >
            </div>


            <div class="col-md-4">
                <label>Cidade </label> 
                <input class="form-control"
                       type = "text"
                       name = "cidade"
                       id = "campoCidade"
                       value="<?php if (!empty($RegistroData['cidade'])) echo $RegistroData['cidade']; ?>"
                       title = "Informe a Cidade do Endereço d<?= $artigo ?>"
                       placeholder="Cidade do Endereço do" >
            </div>
            <div class="col-md-2">
                <label>UF</label>
                <input class="form-control"
                       type = "text"
                       name = "uf"
                       id = "campoUF"
                       value="<?php if (!empty($RegistroData['uf'])) echo $RegistroData['uf']; ?>"
                       title = "Estado do Endereço d<?= $artigo ?>"
                       placeholder="Estado" >
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3">
                <label>Telefone d<?= $artigo ?> <i style="color: red"></i></label>
                <input class="form-control telefone"
                       type = "text"
                       name = "tel1"
                       value="<?php if (!empty($RegistroData['tel1'])) echo $RegistroData['tel1']; ?>"
                       title = "Informe o Telefone d<?= $artigo ?>"
                       required
                       placeholder="Telefone d<?= $artigo ?>" >
            </div>
            <div class="col-md-3">
                <label>CPF d<?= $artigo ?> <i style="color: red"></i></label>
                <input class="form-control cpf"
                       type = "text"
                       name = "cpf"
                       value="<?php if (!empty($RegistroDataFisica['cpf'])) echo $RegistroDataFisica['cpf']; ?>"
                       title = "Informe o CPF d<?= $artigo ?>"
                       required
                       placeholder="CPF d<?= $artigo ?>" >
            </div>

        </div>

        <div class="row form-group">
            <div class="col-md-5">
                <label>E-email d<?= $artigo ?>  <i style="color: red"></i>
                    <div class="col-md-12" style="font-size: 12px;color: red;">
                        (O mesmo do Login para acesso a conta)
                    </div>
                </label>
                <input class="form-control"
                       type = "text"
                       name = "email"
                       value="<?php if (!empty($RegistroDatapassword['login'])) echo $RegistroDatapassword['login']; ?>"
                       title = "Informe o E-email d<?= $artigo ?>"
                       required
                       placeholder="E-mail d<?= $artigo ?>" >
            </div>

            <div class="col-md-4">
                <label>password <br>
                    <div class="col-md-12" style="font-size: 12px;color: red;">
                        (Só preencher se for para alterar)
                    </div>
                </label>
                <input class="form-control"
                       type = "password"
                       name = "password"
                       value=""
                       title = "Informe a password do Cliente [ de 6 a 12 caracteres! ]"
                       pattern = ".{6,12}"
                       placeholder="password d<?= $artigo ?>" >
            </div>
        </div>
    </div>       


<!--<input  type = "hidden"  name = "IdSistema"  value="<?//= IDSISTEMA; ?>" >--> 
<!--<input  type = "hidden"  name = "id_password"  value="<?= $RegistroDatapassword['id']; ?>" >
<input  type = "hidden"  name = "id_fisica"  value="<?= $RegistroDataFisica['id']; ?>" >
<input  type = "hidden"  name = "password1"  value="<?= $RegistroDatapassword['password']; ?>" >-->
