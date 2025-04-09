<?php

class Admin_Maquinas extends stdClass
{

    private $Data;
    private $Registro;
    private $nome;
    private $Error;
    private $Result;

    const Entity = 'titulos';

    const TIPO = 'O titulo ';
    const ARTIGO = 'o';

    public function ExeCreate(array $Data)
    {
        $this->Data = $Data;
        $this->setData();
        $this->Create();
    }

    public function ExeUpdate($titulo_id, array $Data)
    {
        $this->Registro = (int) $titulo_id;
        $this->Data = $Data;
        $this->setData();
        $this->Update();
    }

    public function ExeDelete($titulo_id)
    {
        $this->id = $titulo_id;

        $ReadDados = new Read();
        $ReadDados->ExeRead(self::Entity, "WHERE id = :id", "id={$this->id}");

        if (!$ReadDados->getResult()):
            $this->Error = ["{$this->id} que você tentou deletar não existe no sistema!", DS_ERROR];
            $this->Result = false;
        else:
            $deleta = new Delete;
            $deleta->ExeDelete(self::Entity, "WHERE id = :id", "id={$this->id}");
            $this->Result = true;
        endif;
    }

    public function GetNome($titulo_id, $titulo_Nome)
    {
        $this->nome = $titulo_Nome;
        $this->id = $titulo_id;

        $read = new Read();
        $read->ExeReadCampos(self::Entity, "nome", " WHERE nome='$this->nome' AND id={$this->id}");
        if ($read->getResult()):
            foreach ($read->getResult() as $dados):
                $this->Error = [TIPO . "que você tentou cadastrar já existe no sistema!", DS_ERROR];
                extract($dados);
                return true;
            endforeach;
        else:
            return false;
        endif;
    }

    public function GetDados($titulo_id)
    {
        
        $this->id = $titulo_id;
        $read = new Read();

        $Read_titulos = new Read();
        $Read_titulos->ExeRead("categorias", "WHERE id = :id", "id={$VarID}");
        if ($Read_titulos->getResult()):
            $Registro_Data = $Read_titulos->getResult()[0];
            return $Registro_Data;
        else:
            return 'Erro,Registro não encontrado';
        endif;
    }

    public function GetImagem($titulo_id)
    {
        $this->id = $titulo_id;

        $read = new Read();

        $read->ExeReadCampos(self::Entity, " miniatura ", " WHERE id =  $this->id");

        if ($read->getResult()):
            foreach ($read->getResult() as $dados):
                extract($dados);
                return $miniatura;
            endforeach;
        else:
            return 0;
        endif;
    }

    public function getResult()
    {
        return $this->Result;
    }

    public function getError()
    {
        return $this->Error;
    }

    /*
     * ***************************************
     * ***************************************
     */

    private function setData()
    {
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);
    }

    private function Create()
    {
        $Create = new Create;

        $Create->ExeCreate(self::Entity, $this->Data);

        if ($Create->getResult()):
            $this->Error = [TIPO . "foi cadastrad" . ARTIGO . "com sucesso no sistema!", DS_ACCEPT];
            $this->Result = $Create->getResult();
        endif;
    }

    private function Update()
    {
        $Update = new Update;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE id = :id", "id={$this->Registro}");
        if ($Update->getResult()):
            $this->Error = [TIPO . "foi atualizad" . ARTIGO . "com sucesso!", DS_ACCEPT];
            $this->Result = true;
        endif;
    }
}
