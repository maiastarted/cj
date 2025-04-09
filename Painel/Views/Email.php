<?php

// Cabeçalhos
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: EXK  <" . EMAIL_PADRAO . ">\r\n";

// echo "EMAIL " . $lembrete;
$EmailFrom = EMAIL_PADRAO;
$EmailTo = "contato@exk.started.com.br";
$Subject = $assunto;
$Name = $nome;


$success = mail($EmailTo, $Subject, $Body, $headers);

// ---- redirect to success page ----

if ($success) {
    $BL = '';
    DSErro1("E-mail enviado com sucesso! Verifique a caixa de entrada e/ou Spam.", '', $BL, DS_ACCEPT);
} else {
    //print "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";
    print "Erro!";
}
