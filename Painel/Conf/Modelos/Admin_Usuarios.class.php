<?php

  class Admin_Usuarios extends stdClass {

    private $Data;
    private $Registro;
    private $Error;
    private $Result;
    private $id;
    private $campos;
    private $nome;
    private $where;

    const Entity = 'adm_users';
    const ID = 'id';
    const ID_TEXTO = 'O usuário ';
    const ID_TEXTO_ARTIGO = 'o ';

    public function getConnection() {
      $pdo = null;
      $host = $_SESSION['dbDetails']['host'];
      $db_name = $_SESSION['dbDetails']['db'];
      $username = $_SESSION['dbDetails']['user'];
      $password = $_SESSION['dbDetails']['pass'];

      try {
        $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $exception) {
        $pdo = "Erro de conexão: " . $exception->getMessage();
      }
      return $pdo;
    }

    public function ExeCreate(array $Data) {


      $this->Data = $Data;
      $this->setData();
      $this->Create();
    }

    public function ExeUpdate($Registro_id, array $Data) {
      $this->Registro = (int) $Registro_id;
      $this->Data = $Data;
      $this->setData();
      $this->Update();
    }

    public function ExeUpdate_Ultimo_Login($Registro_id, $ultimo_login) {
      $pdo = $this->getConnection();
      $id = (int) $Registro_id;

      if ($pdo) {
        $sql = "UPDATE adm_users SET ";
        $sql .= " last_login = '{$ultimo_login}'  ";
        $sql .= " WHERE ";
        $sql .= " id = {$id}  ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $sql = "DELETE  FROM adm_second WHERE id_User = {$id} ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
      }
    }

    public function ExeDelete($Registro_id) {
      $this->id = $Registro_id;

      $ReadDados = new Read();
      $ReadDados->ExeRead(self::Entity, "WHERE id = :id", "id={$this->id}");

      if (!$ReadDados->getResult()):
        $this->Error = [self::ID_TEXTO . "que você tentou deletar não existe no sistema!", DS_ERROR];
        $this->Result = false;
      else:
        $deleta = new Delete;
        $deleta->ExeDelete(self::Entity, "WHERE id = :id", "id={$this->id}");
        $this->Result = true;
      endif;
    }

    public function GetNome($Registro_id, $Registro_Nome) {
      $this->nome = $Registro_Nome;
      $this->id = $Registro_id;

      $read = new Read();
      $read->ExeReadCampos(self::Entity, "nome", " WHERE nome='$this->nome' AND id!={$this->id}");
      if ($read->getResult()):
        foreach ($read->getResult() as $dados):
          $this->Error = [self::ID_TEXTO . "que você tentou cadastrar já existe no sistema!", DS_ERROR];
          extract($dados);
          return true;
        endforeach;
      else:
        return false;
      endif;
    }

    public function GetQuantidade($Campos, $where) {
      $this->campos = $Campos;
      $this->where = $where;

      $read = new Read();

      $read->ExeReadCamposTabela(self::Entity, $this->campos, $this->where);

      if ($read->getResult()):
        foreach ($read->getResult() as $dados):
          extract($dados);
          return $TotalRegistros;
        endforeach;
      else:
        return null;
      endif;
    }

    public function Get_Username($ids, $Campos) {
      $this->campos = $Campos;
      $this->id = $ids;

      $read = new Read();
      $read->ExeReadCampos(self::Entity, "id, username", " WHERE username='$this->campos' AND id=$this->id  ");
      if ($read->getResult()):
        foreach ($read->getResult() as $dados):
          extract($dados);
          return 0;
        endforeach;
      else:
        return 1;
      endif;
    }

    public function Username_Unico($ids, $Campos) {
      $this->campos = $Campos;
      $this->id = $ids;

      $read = new Read();
      $read->ExeReadCampos(self::Entity, "id, username", " WHERE username='$this->campos' AND id!=$this->id  ");
      if ($read->getResult()):
        return "O Apelido \'{$this->campos}\' já consta no cadastro1";
      else:
        return 0;
      endif;
    }

    public function Username_Email($ids, $Campo) {
      $this->campos = $Campo;
      $this->id = $ids;
      $read = new Read();
      $read->ExeReadCampos(self::Entity, "id, email", " WHERE email='$this->campos' AND id!=$this->id ");
      if ($read->getResult()):
        return "O E-mail \'{$this->campos}\' já está sendo usado";
      else:
        return 0;
      endif;
    }

    public function GetEmail($ids, $Campo) {
      $this->campos = $Campo;
      $this->id = $ids;

      $read = new Read();
      $read->ExeReadCampos(self::Entity, "id,email", " WHERE email='$this->campos' AND id=$this->id ");

      if ($read->getResult()):
        // foreach ($read->getResult() as $dados):
        //     extract($dados);
        //     
        // endforeach;
        return "O e-mail \'{$this->campos}\' já está sendo usado";
      else:
        return 0;
      endif;
    }

    public function getResult() {
      return $this->Result;
    }

    public function getError() {
      return $this->Error;
    }

    /*
     * ***************************************
     * ***************************************
     */

    private function setData() {
      // $this->Data = array_map('strip_tags', $this->Data);
      $this->Data = array_map('trim', $this->Data);
    }

    private function Create() {
      $Create = new Create;

      $Create->ExeCreate(self::Entity, $this->Data);

      if ($Create->getResult()):
        $this->Error = [self::ID_TEXTO . "foi cadastrad" . self::ID_TEXTO_ARTIGO . "com sucesso no sistema!", DS_ACCEPT];
        $this->Result = $Create->getResult();
      endif;
    }

    private function Update() {
      $Update = new Update;
      $Update->ExeUpdate(self::Entity, $this->Data, "WHERE id = :id", "id={$this->Registro}");
      if ($Update->getResult()):
        $this->Error = [self::ID_TEXTO . "foi atualizad" . self::ID_TEXTO_ARTIGO . "com sucesso!", DS_ACCEPT];
        $this->Result = true;
      endif;
    }

    public function Atualiza($id, array $Data) {
      $pdo = $this->getConnection();

      if ($pdo) {
        $sql = "UPDATE adm_users SET ";
        $sql .= " nome=?, username=?, email=?, password=?,fone=?, adm=? ";
        $sql .= " WHERE id=? ";

        $dados = [
          $Data['nome'], $Data['username'], $Data['email'], $Data['password'],
          $Data['fone'], $Data['adm'],
          $id
        ];

        $stmt = $pdo->prepare($sql);

        $stmt->execute($dados);
      }
    }
  }
  