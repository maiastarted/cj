<?php

if (!isset($_SESSION['origem_disco_SITE'])) {
    header("Location: /");
    exit();
}

$origem = $_SESSION['origem_disco_SITE'];
$login = new Login();
$logoff = filter_input(INPUT_GET, 'logoff', FILTER_VALIDATE_BOOLEAN);

if (!$login->CheckLogin()):
    unset($_SESSION['userlogin_SITE']);
    $BL = NULL;
    header('Location: /?BL=' . $BL);
else:
    $userlogin = $_SESSION['userlogin_SITE'];
    $cadastra = new Admin_Usuarios;
    $Data['ultimo_login'] = date('Y-m-d h:i:s', time());
    $cadastra->ExeUpdate_Ultimo_Login($userlogin['id'], $Data);
endif;

if ($logoff):
    unset($_SESSION['userlogin_SITE']);
    header('Location: ' . $_SESSION['origem_disco_SITE'] . '/index.php?exe=logoff');
endif;


$id = $userlogin['id'];
$data['email'] = $userlogin['email'];
$data['nome'] = $userlogin['nome'];

$Registro_Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($Registro_Data)):
    if (!empty($Registro_Data['SendPostForm'])):
        $num = $Registro_Data['numeral'];






    endif;
endif;
############################################################################

$numeros = [];
while (count($numeros) < 4) {
    $numero = sprintf("%02d", rand(10, 99));
    if (!in_array($numero, $numeros)) {
        $numeros[] = $numero;
    }
}
$numero1 = $Funcoes->gera_segunda_2();
$numero2 = $Funcoes->gera_segunda_2();
$numero3 = $Funcoes->gera_segunda_2();

$randomString1 = $Funcoes->gera_segunda();
$randomString2 = $Funcoes->gera_segunda();
$randomString3 = $Funcoes->gera_segunda();

$conn = mysqli_connect(HOST, USER, PASS, DBSA);
$sql = "INSERT INTO segunda (chave, id_Usuario, dia, num) VALUES  ($randomString2 , $id, NOW(), $numero2 )";
mysqli_query($conn, $sql);

$numero39 = rand(0, 100);

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: EXK  <" . EMAIL_PADRAO . ">\r\n";

// echo "EMAIL " . $lembrete;
$EmailFrom = EMAIL_PADRAO;
$EmailTo = $userlogin['email'];
$Subject = 'Autenticação em duas etapas.';
$Name = $userlogin['nome'];
$imageData = file_get_contents(PATH_IMG . '/logop.png');
$base64Image = base64_encode($imageData);
$Body = '
        <!DOCTYPE html>
            <html lang="pt">
                <head>
                    <meta charset="UTF-8">
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f0f0f0;
                            font-size: 14px;
                        }
                        h1 {
                            color: #333;
                        }
                    </style>
                    <title>Autenticação em duas etapas:</title>
                </head>
                <body>
                    <img src="data:image/jpeg;base64,' . $base64Image . '" alt="Minha Imagem">
                    <p>Este é o e-mail do lembrete cadastro.</b>.</p>
                    <table style="width:400px; border: 2px solid #000; ">
                    <tr>
                    <td style="border: 2px solid #000; text-align:center; font-size:20px;">' . $numero1 . '</td>
                      <td style="border: 2px solid #000; text-align:center; font-size:20px;">' . $numero2 . '</td>
                     <td style="border: 2px solid #000; text-align:center; font-size:20px;">' . $numero3 . '</td>
                    </tr>
                    
                    <tr>
                      <td style="border: 2px solid #000; text-align:center; font-size:20px;">' . $randomString1 . '</td>
                      <td style="border: 2px solid #000; text-align:center; font-size:20px;">' . $randomString2 . '</td>
                      <td style="border: 2px solid #000; text-align:center; font-size:20px;">' . $randomString3 . '</td>
                    </tr>
                    </table>
                    <p>Você está recebendo este e-mail, pois está havendo uma tentativa de logar no site: <br>' . PATH . '</p>
                </body>
            </html>';

echo $Body;
// $success = mail($EmailTo, $Subject, $Body, $headers);

?>
<div class="col-xs-12 colunas">
    <div class="col-xs-4 coluna_esquerda">
        <?php
            $BL = $Cript->encrypt(",Segunda,0000",TEXTO_CHAVE);
        ?>
    </div>
    <div class="col-xs-8 coluna_direita fixed-div">
        <section class="content">
            <form action="<?= $BL;?> " method="post" name="UserCreateForm" enctype="multipart/form-data">
                <div class="boxt">
                    <div class="box-body">
                        <div class="col-md-12 ">
                            <div cla0ss="tab-pane act9ive" id="assinante" style="margin-top: 10px;">

                                <div class="row form-group ">
                                    <div class="col-md-6">
                                        <label>
                                            Foi enviado para o e-mail cadastrado uma chave que é necessária
                                            para autenticarmos seu login. Insira os dados enviados
                                        </label>
                                        <input class="form-control"
                                            type="text"
                                            name="numeral"
                                            value=""
                                            title="Informe o código"
                                            required
                                            placeholder="Código">

                                    </div>
                                    <div class="col-md-5">
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row g-0'>
                            <div class='col-md-5 w-auto ms-auto'>
                                <button class="btn btn-primary btn-sm">
                                    <input type="submit" name="SendPostForm" value="Continuar" class="btn btn-primary font_bold" />
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <?php

                                    $BL = ''; //$Cript->encrypt($semAcentos . ",index," . $id,TEXTO_CHAVE);
                                    ?>
                                    <a href="/?BL=<?= $BL ?>" class="btn btn-danger font_bold">
                                        Voltar
                                    </a>
                                    <?php

                                    ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>