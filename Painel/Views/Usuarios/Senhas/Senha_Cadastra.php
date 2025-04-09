<head>
    <meta charset="utf-8">
    <link href="<?= PATH_CSS; ?>/Login.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="<?= PATH_IMG; ?>/favicon.png">

</head>
<?php
require PATH_VIEWS . '/Usuarios/Inicio.php';
if ($RegData && $RegData['cad_password']):

    $ReadUser = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if ($ReadUser && $ReadUser['SendPostForm']):

        $nome = $ReadUser['nome'];
        $val = strlen($ReadUser['password']);
        $password1 = $ReadUser['password'];
        $password2 = $ReadUser['password_conf'];
        $lembrete = $ReadUser['lembrete'];

        //    if ($password1 == "" and $password2 == "") {
        if ($password1 === $password2) {
            $password3 = $Registro_Data['password_antiga'];
            if ($password2 == '') {
                $ReadUser['password'] = $password3;
            } else {
                // $password4 =  base64_encode($Registro_Data['password_conf']);;
                $password4 = $Cript->encrypt($Registro_Data['password_conf']);
                $ReadUser['password'] = $password4;
            }


            unset($ReadUser['password_antiga']);
            $erro = 9;
        } else {
            DSErro2("A password e a confirmação são diferentes", DS_ERROR);
            $erro = 1;
        }
        //    }
        unset($ReadUser['SendPostForm']);
        unset($ReadUser['nome_velho']);
        unset($ReadUser['password_conf']);


        if ($erro == 9) {


            $cadastra = new $classe;
            $cadastra->ExeUpdate($VarID, $ReadUser);

            if ($cadastra->getResult()):

                $BL = $Cript->encrypt(",index,12121212");
                DSErro1("A atualização de \'{$nome}\' foi realizada com sucesso!", '', $BL, DS_ACCEPT);
            else:
                DSErro($cadastra->getError()[0], $cadastra->getError()[1]);
            endif;
        }
    endif;
endif;

$BL3 = $Cript->encrypt("Usuarios/passwords,password_Recuperar,666666666");
?>

<div class="row">
    <div class="col-md-12 main">
        <div class="projeto">
            <div class="div_centro">
                <img src="<?php echo PATH_IMG ?>/logo.png" class="logo"/>
            </div>
            <h2> <?= $Lang->logar($idioma, 'cadastra_password') ?></h2>
            <hr>
            <form
                    action=""
                    method="post"
                    name="Userpassword"
                    enctype="multipart/form-data">
                <div class='quadro'>
                    <div class="col-md-12"></div>


                    <div class="col-md-10 quadro1">
                        <label for="password">
                            <?= $Lang->logar($idioma, 'password_usu') ?>
                        </label>
                        <input
                                class="font_bold"
                                type="password"
                                name="password"
                                id="password"
                                value=""
                                title="<?= $Lang->logar($idioma, 'password_inform') ?>"
                                placeholder="<?= $Lang->logar($idioma, 'password_usu') ?>">
                    </div>
                    <div class="col-md-10 quadro1">
                        <br>
                    </div>
                    <div class="col-md-10 quadro1">
                        <label id="password_conf">
                            <?= $Lang->logar($idioma, 'password_confirma') ?>
                        </label>
                        <input
                                class="font_bold"
                                type="password"
                                name="password_conf"
                                id="password_conf"
                                value=""
                                title="<?= $Lang->logar($idioma, 'password_repete') ?>"
                                placeholder="<?= $Lang->logar($idioma, 'password_confirma') ?>">
                    </div>


                    <div class="col-md-10 quadro1">
                        <input
                                type="submit"
                                value=" <?= $Lang->logar($idioma, 'proceder') ?>"
                                class="font_bold"/>
                    </div>



                    <div class="col-md-10 quadro1">
                        <br>
                        <hr>
                    </div>

                    <div class="col-md-10 quadro1">
                        <label>Texto para lembrar a password </label>
                        <p class="font_bold"><?php if (!empty($RegistroData['lembrete'])) echo $RegistroData['lembrete']; ?> </p>



                                    <a href="/?BL=<?= $BL3 ?>/>">
                                        <button class="buitton">
                                            <?= $Lang->logar($idioma, 'voltar') ?>
                                        </button>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>