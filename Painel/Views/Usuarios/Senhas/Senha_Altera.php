<?php
require PATH_VIEWS . '/Usuarios/Inicio.php';

$Registro_Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($Registro_Data && $Registro_Data['SendPostForm']):

    $nome   = $Registro_Data['nome'];
    $val    = strlen($Registro_Data['password']);
    $password1 = $Registro_Data['password'];
    $password2 = $Registro_Data['password_conf'];

    if ($password1 === $password2) {
        $password3 = $Registro_Data['password_antiga'];
        if ($password2 == '') {
            $Registro_Data['password'] = $password3;
        } else {
            $password4 =   $Cript->encrypt($Registro_Data['password_conf'],TEXTO_CHAVE);
            $Registro_Data['password'] = $password4;
        }

        unset($Registro_Data['password_antiga']);
        $erro = 9;
    } else {
        DSErro2($Lang->logar($idioma, 'password_diferente'), DS_ERROR);
        $erro = 1;
    }
    unset($Registro_Data['SendPostForm']);
    unset($Registro_Data['nome_velho']);
    unset($Registro_Data['password_conf']);

    if ($erro == 9) {
        $cadastra = new $classe;
        $cadastra->ExeUpdate($VarID, $Registro_Data);

        if ($cadastra->getResult()):
            $BL = $Cript->encrypt(",index,12121212");
            DSErro1($Lang->logar($idioma, 'atualizacao_de') . ' \ ' . $nome . ' \ ' . $Lang->logar($idioma, 'atualizacao_de') . '!', '', $BL, DS_ACCEPT);
        else:
            DSErro($cadastra->getError()[0], $cadastra->getError()[1]);
        endif;
    }
endif;
#---------------------------------------------------------------------------------------------------
?>
<div
    class="col-md-4"
    style="background-color: #EAEAEA">
    <label>
        password d<?= $artigo ?>
    </label>
    <input
        class="form-control font_bold"
        type="password"
        name="password"
        value=""
        placeholder="password d<?= $artigo ?>">
</div>

<div
    class="col-md-4">
    <label>
        Confirmação de password d<?= $artigo ?>
    </label>
    <input
        class="form-control font_bold"
        type="password"
        name="password_conf"
        value=""
        title="Informe novamente a password d<?= $artigo ?>"
        placeholder="password de confirmação">
</div>

<div
    class="col-md-5">
</div>
<div
    class="col-md-6"
    style="font-size: 1.0em;color: red;font-weight: bold;">
    <?php
    echo $aviso_password; ?>
</div>

<div
    class="col-md-9">

</div>

<div
    class="col-md-4">
    <label>
        Texto para lembrar a password
    </label>
    <input
        class="form-control font_bold"
        type="password"
        name="recupera_password"
        value=""
        title="Informe o texto para lembrar a password"
        placeholder="Informe o texto para lembrar a password">
</div>

<form
    role="form"
    name="formpasswordAltera"
    id="formpasswordAltera"
    method="post">
    <div
        class="box-body">
        <div
            class="row">
            <div
                class="form-group col-lg-12">
                <label
                    for="edtpasswordAcesso">
                    Nova password
                    <span
                        class="symbol required">
                    </span>
                </label>
                <input
                    type="password"
                    class="form-control"
                    id="edtpasswordAcesso"
                    name="edtpasswordAcesso"
                    required
                    value=""
                    placeholder="Informe a nova password">
            </div>
            <div
                class="form-group col-lg-12">
                <label
                    for="edtConfirmapassword">
                    Redigite a nova password
                    <span
                        class="symbol required">
                    </span>
                </label>
                <input
                    type="password"
                    class="form-control"
                    id="edtConfirmapassword"
                    required
                    equals="edtpasswordAcesso"
                    name="edtConfirmapassword"
                    value=""
                    placeholder="Repita a nova password">

                <input
                    type="hidden"
                    id="acao"
                    name="acao"
                    value="<?php echo $acao; ?>">
            </div>
        </div>
    </div>
    <div
        class="box-footer">
        <div
            class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <a href="<?php echo $raiz ?>../" type="button" value="epassword" class="btn btn-default">Cancelar</a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: right;">
                <button type="submit" class="btn btn-primary">Proceder</button>
            </div>
        </div>
    </div>
    <input type="hidden" id="edtpasswordAntiga" name="edtpasswordAntiga" value="<?php echo $passwordEnviada; ?>">
</form>
</div>
</div>
</div>
</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="<?php echo $raiz ?>js/bootstrap.js" type="text/javascript"></script>
<script src="<?php echo $raiz ?>plugins/validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo $raiz ?>plugins/validation/localization/messages_pt_BR.js" type="text/javascript"></script>
<script src="<?php echo $raiz ?>plugins/validation/validacao.js" type="text/javascript"></script>
</body>
<script type="text/javascript">
    $(function() {
        Validacao.init($('#formpasswordAltera'));
    });
</script>

</html>