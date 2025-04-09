<?php

class Admin_Autores extends stdClass {

    private $Data;
    private $Registro;
    private $Error;
    private $Result;

    const Entity = 'autores';
    const Entity1 = 'titulos';
    const ID = 'autores_id';
    const ID_TEXTO = 'O autor ';
    const ID_TEXTO_ARTIGO = 'o ';

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

    public function GetTitulo($Registro_id) {
        $this->id = $Registro_id;

        $read = new Read();

        $read->ExeReadCampos(self::Entity1, " count(*) as TotalRegistros ", " WHERE " . self::ID . " ={$this->id}");

        if ($read->getResult()):
            foreach ($read->getResult() as $dados):
                extract($dados);
                return $TotalRegistros;
            endforeach;
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
        $this->Data = array_map('strip_tags', $this->Data);
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
}
