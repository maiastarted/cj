<head>
    <meta charset="utf-8">
    <link href="<?= PATH_CSS; ?>/Logar.css" rel="stylesheet"/>
</head>

<?php

$RegData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$ReadUser = new Read();
$Cript = new Criptografia();
$Lang=new Lang();

if ($RegData && $RegData['Userpassword']):
    $Lang=new Lang();
    $email = $RegData['email'];
    $assunto = $Lang->logar($idioma, 'lembrete');


    $ReadUser->ExeRead("usuarios", "WHERE email = '{$email}'");
    if ($ReadUser->getResult()):
        $Data = $ReadUser->getResult()[0];
    endif;
    $id = $Data['id'];
    $email_para = $Data['email'];
    $nome = $Data['nome'];
    $lembrete = $Data['lembrete'];

    $imageData = file_get_contents(PATH_IMG . '/logop.png');
    $base64Image = base64_encode($imageData);

    $Body = '
        <!DOCTYPE html>
            <html lang="pt-BR">
                <head>
                    <meta charset="UTF-8">
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f0f0f0;
                            font-size: 16px;
                        }
                        h1 {
                            color: #333;
                        }
                    </style>
                    ' . $Lang->logar($idioma, 'lembrete') . '<title>:</title>
                </head>
                <body>
                    <img src="data:image/jpeg;base64,' . $base64Image . '" alt="Minha Imagem">
                    <p>Este é o e-mail do lembrete cadastro.</b>.</p>
                    <h1>' . $lembrete . '</h1>
                    <p> ' . $Lang->logar($idioma, 'lembrete') . ': <br>' . PATH . '</p>
                </body>
            </html>';

  include 'password_Lembrete.php';
//echo $Body;
    exit();
endif;
###################################################################################
if ($RegData && $RegData['Userpassword1']):

    $email = $RegData['email1'];

    $ReadUser->ExeRead("usuarios", "WHERE email = '{$email}'");
    if ($ReadUser->getResult()):
        $RegistroData = $ReadUser->getResult()[0];
    endif;
    include 'password_Cadastra.php';
    $BL5 = $Cript->encrypt("Usuarios/passwords,password_Cadastra,$email",TEXTO_CHAVE);
    exit();
endif;
?>


<div class="row">
    <div class="col-md-12 main">
        <div class="projeto">
            <div class="div_centro">
                <img src="<?php echo PATH_IMG ?>/logop.png" class="logo"/>
            </div>
            <h2> <?= $Lang->logar($idioma, 'recu_password') ?></h2>
            <hr>
            <div class='quadro'>
                <div class="col-md-12"></div>
                <div class="col-md-10 quadro1">
                    <br>
                    <form
                            action=""
                            method="post"
                            name="Userpassword"
                            enctype="multipart/form-data">

                        <label for="email">
                            <?= $Lang->logar($idioma, 'Recu_informe_email') ?>.
                        </label>

                        <input
                                type="text"
                                placeholder="<?= $Lang->logar($idioma, 'email') ?>"
                                required
                                value="contato@started.com.br"
                                id="email"
                                name="email"
                                autocomplete="email"
                                autofocus
                        />
                        <input
                                type="submit"
                                name="Userpassword"
                                value="<?= $Lang->logar($idioma, 'proceder') ?>"
                                class="btn_submit font_bold"
                        />
                    </form>
                </div>

                <div class="col-md-12 quadro1">
                    <hr>
                </div>

                <div class="col-md-12 quadro1">
                    <form
                            action=""
                            method="post"
                            name="Userpassword1"
                            enctype="multipart/form-data"
                    >
                        <label for="email1">
                            <?= $Lang->logar($idioma, 'Recu_clicando') ?>.
                        </label>
                        <input
                                type="text"
                                id="email1"
                                name="email1"
                                value="contato@started.com.br"
                                placeholder="<?= $Lang->logar($idioma, 'email') ?>"
                                required
                        />

                        <input
                                type="submit"
                                name="Userpassword1"
                                value=" <?= $Lang->logar($idioma, 'proceder') ?>"
                                class="font_bold"/>
                    </form>
                </div>
                <div class="col-md-12 quadro1">
                    <hr>
                    <a href="/?BL=/" >
                        <button class="buitton">
                            <?= $Lang->logar($idioma, 'voltar') ?>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>