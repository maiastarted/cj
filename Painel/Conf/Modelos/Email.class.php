<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta class
//require_once("class/class.phpmailer.php");
require_once(getenv('PATH_INCLUDE') . "Conf/Library/PHPMailer/class.phpmailer.php");

CLass Email {

    private $Data;
    private $Destinatario;
    private $password_nova;
    private $nome_usuario;
    private $Mensagem;
    private $Assunto;
    private $Error;
    private $Result;

    public function Enviar_email(array $Data) {
// Inicia a classe PHPMailer
        $mail = new PHPMailer(true);
        $this->Data = $Data;

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsSMTP(); // Define que a mensagem será SMTP
        $email_origem = "contato@started.com.br";
        $email_password = "FRjc8188";
        $email_nome = "<?= CLIENTE ?>";

        $mail->Host = 'mail.started.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
        $mail->SMTPAuth = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
        $mail->Port = 587; //  Usar 587 porta SMTP
        $mail->Username = $email_origem; // Usuário do servidor SMTP (endereço de email)
        $mail->Password = $email_password; // password do servidor SMTP (password do email usado)
        //
        //
//Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
        $mail->SetFrom($email_origem, $email_nome); //Seu e-mail
        $mail->AddReplyTo('contato@started.com.br', 'Nome'); //Seu e-mail
        $mail->Subject = $this->Data['Assunto']; //Assunto do e-mail
//Define os destinatário(s)
//=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->AddAddress($this->Data['email'], $this->Data['nome_usuario']);

//Campos abaixo são opcionais 
//=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
//$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
//$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
//Define o corpo do email
        $mail->MsgHTML($this->Data['Mensagem']);

////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
//$mail->MsgHTML(file_get_contents('arquivo.html'));

        $mail->Send();
        echo "Mensagem enviada com sucesso</p>\n";
    }

}
