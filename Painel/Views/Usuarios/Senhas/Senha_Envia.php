<?php

require_once( '../../../../Config.inc.php');

$password = new Adminpasswords();
//$password->ChecaEmail($_REQUEST["email"]);
$password_nova="";
$ReadUser = new Read;
$ReadUser->ExeRead("assinantes", "WHERE email = :email ", "email={$_REQUEST["email"]}");
if ($ReadUser->getResult()):
    $HQData = $ReadUser->getResult()[0];
    unset($HQData['password']);
    $Destinatario = $HQData['email'];
    $nome_usuario = $HQData['nome'];
    $id_usuario = $HQData['id'];
endif;

if (isset($Destinatario)) {
    $password_nova = gerapassword(21, TRUE, TRUE, TRUE);
    $nestedData["email"] = $Destinatario;
    $nestedData["password"] = $password_nova;
    $password->ExeUpdate($id_usuario, $nestedData);

    $origem = $_REQUEST["edtOrigem"];

    if ($origem == "Troca") {
        $Assunto = "<?= CLIENTE ?> - Recupera&ccedil;&atilde;o de password";

        $Titulo = "Recupera&ccedil;&atilde;o de password";

        $Mensagem = "Foi feita uma solicita&ccedil;&atilde;o de recupera&ccedil;&atilde;o de password, "
                . "no site. Abaixo est;&atilde;o os dados de login e nova password. "
                . "Por motivos de seguran&ccedil;a sua password atual foi bloqueada.";
    } else {
        $Assunto = "<?= CLIENTE ?> - Novo Login";
        $Titulo = "Novo Login de Acesso";
        $Mensagem = "Seja bem vindo ao <?= CLIENTE ?>, abaixo est&atilde;o seus dados de acesso ao sistema.";
    }
    $Mensagem = '
    <table cellpadding="0" cellspacing="0" width="600px" align="center" style="background:#fcfcfc;font-family:sans-serif">
        <tbody>
           <tr>
                <td style="padding:20px 0 20px 0;text-align:center">
                    <a href="" target="_blank">
                    <img src="" 
                        alt="HQ" 
                        style="border:0; width: 150px;" class="CToWUd">
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="0" cellspacing="0" width="520px"   
                        align="center" style="background:#ffffff;border:2px solid #f5f5f5">
                        <tbody>
                            <tr>
                                <td style="padding:20px 40px 20px 40px">
                                    <h1 style="color:#c65237;margin:40px 0 0 0; text-align:center;">' . $Titulo . '</h1>
                                    <p style="line-height:22px;color:#2c2c2c">' . $Mensagem . '</p>
                                        <table 
                                            style="background:#fcfcfc;padding:20px;margin-top:40px;margin-bottom:40px;color:#2c2c2c" 
                                            width="480px" align="center">
                                            <tbody>
                                              <!-- <tr>
                                                  <td style="font-weight:bold;padding:5px 0 5px 0; width:60px;">Empresa:</td>
                                                   <td><?= CLIENTE ?></td>
                                              </tr>-->
                                                <tr>
                                                    <td style="font-weight:bold;padding:5px 0 5px 0; width:60px;">Login:</td>
                                                    <td>' . $Destinatario . '</a></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;padding:5px 0 5px 0; width:60px;">password:</td>
                                                    <td>' . $password_nova . '</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p style="line-height:22px;color:#2c2c2c;text-align:center">
                                            Acesse o sistema com a password acima ou clique no bot&atilde;o abaixo para alterar sua password.
                                        </p>
                                        <div style="text-align:center;margin:30px 0 30px 0">
                                            <p style="display:inline-block;background:#c65237;width:250px;
                                                        text-align:center;color:#ffffff">
                                                <a href=' . 
                                                    '?cod=' . $password_nova . ' 
                                                        style="color:#ffffff;text-decoration:none;padding:20px;
                                                            display:block;font-weight:bold;font-size:18px" 
                                                    target="_blank">
                                                    Alterar password
                                                </a>
                                            </p>
                                        </div>
                                        <p style="line-height:22px;color:#2c2c2c;text-align:center">
                                            N&atilde;o responda esse e-mail, e-mail autom&aacutetico.
                                        </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
               </td>
            </tr>
            <tr>
                <td>
                    <table width="520px" align="center" style="margin-top:30px;margin-bottom:30px">
                        <tbody>
                            <tr>
                                <td width="50%" style="vertical-align:top">
                                    <a href="" target="_blank">
                                        <img src="" 
                                            altHQ" 
                                            style="border:0;  width: 90px;" class="CToWUd">
                                        </a>
                                </td>
                                <td style="text-align:right">
                                    <h4 style="color:#2c2c2c;margin:0">Atenciosamente, HQ</h4>
                                    <p style="color:#2c2c2c;margin:5px 0 10px 0;line-height:16px;font-size:12px">
                                        <a href="mailto:contato@HQ.com.br" target="_blank">
                                            contato@HQ.com.br
                                        </a><br>
                                            Cidade: 
                                            <a href="tel:" value="+55XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXx" target="_blank">
                                            (XX) XXXX-XXXX
                                        </a>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
               </td>
            </tr>
        </tbody>
    </table>';

    Enviar_mail($Mensagem, $Assunto, $Destinatario,$password_nova, $nome_usuario);

    //$password->AtualizapasswordNova();
}

//header("location: passwordFinal.php");

function Enviar_mail($Mensagem, $Assunto, $Destinatario,$password_nova, $nome_usuario) {
    $Email = new Email();
//    $Email->setNomeRemetente('HQ');
//    $Email->setEmailRemetente("contato@started.com.br");
//    $Email->setMensagemHtml($Mensagem);
//    $Email->setAssunto($Assunto);

    $dados["email"] = $Destinatario;
    $dados["password"] = $password_nova;
    $dados["nome_usuario"] = $nome_usuario;
    $dados["Mensagem"] = $Mensagem;
    $dados["Assunto"] = $Assunto;



    $Email->Enviar_email($dados);



    if ($Email->getErrorMessage() != "") {
        $Retorno->setErrorMessage($Email->getErrorMessage());
    }
}

function gerapassword($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {
    $lmin = 'abcdefghijklmnopqrstuvwxyz';
    $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $num = '1234567890';
    $simb = '!*-)(';
    $retorno = '';
    $caracteres = '';
    $caracteres .= $lmin;
    if ($maiusculas)
        $caracteres .= $lmai;
    if ($numeros)
        $caracteres .= $num;
    if ($simbolos)
        $caracteres .= $simb;
    $len = strlen($caracteres);
    for ($n = 1; $n <= $tamanho; $n++) {
        $rand = mt_rand(1, $len);
        $retorno .= $caracteres[$rand - 1];
    }
    return $retorno;
}
