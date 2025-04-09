<?php

  class Login {

    private $Email;
    private $password;
    private $Error;
    private $Result;

    const Entity = 'adm_users';

    public function ExeLogin(array $UserData) {
      $this->Email = (string) strip_tags(trim($UserData['user']));
      $this->password = (string) strip_tags(trim($UserData['pass']));

      $dd=$this->getUser();
      $_SESSION['userlogin_SITE'] = $dd[0];
      return $dd;
      
      
    }

    public function getResult() {
      return $this->Result;
    }

    public function getError() {
      return $this->Error;
    }

    public function CheckLogin() {
      if (empty($_SESSION['userlogin_SITE'])):
        unset($_SESSION['userlogin_SITE']);
        return false;
      else:
        return true;
      endif;
    }

    public function VerificaLogin(array $UserData) {
      $this->Email = (string) strip_tags(trim($UserData['user']));
      $this->password = (string) strip_tags(trim($UserData['pass']));

      $Cript = new Criptografia();
      $this->password = $Cript->encrypt_password($this->password, $this->Email);

      $read = new Read();
      $read->ExeRead(self::Entity, "WHERE email = :e AND password = :p", "e={$this->Email}&p={$this->password}");

      if ($read->getResult()):
        $this->Result = $read->getResult()[0];
        $_SESSION['userlogin_SITE'] = $this->Result;
        return true;
      else:
        return false;
      endif;
    }

    private function setLogin() {
      if (!$this->Email || !$this->password || !$this->Email):
        $this->Error = ['Informe seu E-mail e password para efetuar o login!', DS_INFOR];
        $this->Result = false;
      elseif (!$this->getUser()):
        // limpa sessão
        session_unset(); // limpa a sessão
        $_SESSION = [];
        $this->Error = ['Os dados informados não são compatíveis!', DS_ALERT];
        $this->Result = false;
      else:
        return $coment[0]['id'];
      endif;
    }

    private function getUser() {
      $Cript = new Criptografia();
      $this->password = $Cript->encrypt_password($this->password, $this->Email);

      $Selecionar = new Select();
      $where = "email=? AND password=?";
      $filtros = [
        'email' => $this->Email,
        'pass' => $this->password
      ];

      $coment = $Selecionar->Consulta_Simples(self::Entity, " * ", $where, $filtros);

      if ($coment) :
        return $coment;
      else:
        return false;
      endif;
    }

    private function Execute() {
      if (!session_id()):
      // session_start();
      endif;

      $read = new Read();
      $read->ExeRead(self::Entity, "WHERE id = :id", "id = {$this->Result['id']}");

      if ($read->getResult()):
        $this->Result = $read->getResult()[0];
        $_SESSION['userlogin_SITE'] = $this->Result;
        return true;
      else:
        return false;
      endif;
      // $this->Error = ["Olá {$this->Result['nome']}, seja bem vindo(a). Aguarde redirecionamento!"];
      // $this->Result = true;
    }
  }
  