<?php

class AdminPessoas {

    private $Data;
    private $User;
    private $Subcategoria;
    private $Error;
    private $Result;

    const Entity = 'pessoas';

    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        $this->checkEmail();
        if (!$this->Error[0]) {
            $this->Create();
        }
    }

    public function ExeUpdate($UserId, array $Data) {
        $this->User = (int) $UserId;
        $this->Data = $Data;
        $this->setData();
        $this->Update();
    }

    public function ExeDelete($UserId) {
        $this->User = $UserId;

        $ReadDados = new Read();
        $ReadDados->ExeRead(self::Entity, "WHERE id = :user", "user={$this->User}");

        if (!$ReadDados->getResult()):
            $this->Error = ["O Representante que você tentou deletar não existe no sistema!", DS_ERROR];
            $this->Result = false;
        else:
            $deleta = new Delete;
            $deleta->ExeDelete(self::Entity, "WHERE id = :user", "user={$this->User}");
            $this->Result = true;
        endif;
    }
    
     public function GetNome($id_usuario) {
        $this->id = $id_usuario;

        $read = new Read();
       $read->ExeReadCampos(self::Entity, "nome", " WHERE id=".$this->id ) ;
        if ($read->getResult()):
             foreach ($read->getResult() as $dados):
                extract($dados);
                return $this->Result = $nome;
            endforeach;
        else:
            return false;
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
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);

    }

    private function checkEmail() {

        $readUser = new Read();
        $readUser->ExeRead(self::Entity, "WHERE email = :email", "email={$this->Data['email']}");

        if ($readUser->getRowCount()):
            $this->Error = ["O e-email informado já consta em nosso cadastrado! Informe outro e-mail!", DS_ERROR];
            $this->Result = false;
        else:
            $this->Result = true;
        endif;
    }

    private function Create() {
        $Create = new Create;

        $Create->ExeCreate(self::Entity, $this->Data);

        if ($Create->getResult()):
            $this->Error = ["O Representante foi cadastrado com sucesso no sistema!", DS_ACCEPT];
            $this->Result = $Create->getResult();
        endif;
    }

    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE id = :id", "id={$this->User}");
        if ($Update->getResult()):
            $this->Error = ["O Representante foi atualizado com sucesso!", DS_ACCEPT];
            $this->Result = true;
        endif;
    }

}
