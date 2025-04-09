<?php

  #[AllowDynamicProperties]
  class Admin_Maquinas extends stdClass {

    const Entity = 'machines';
    const TIPO = 'A Machine ';
    const ARTIGO = 'o';

    public function ExeCreate(array $Data) {
      $this->Data = $Data;
      $this->setData();
      $this->Create();
    }

    public function ExeUpdate($titulo_id, array $Data) {
      $this->Registro = (int) $titulo_id;
      $this->Data = $Data;
      $this->setData();
      $this->Update();
    }

    public function ExeDelete($titulo_id) {
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

    public function GetNome($titulo_id, $titulo_Nome) {
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

    public function GetDados($titulo_id) {

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

    public function List_Maquina($Parametro) {
      $Selecionar = new Select();

      $Campos = "  SHOW COLUMNS ";
      $Tabel = ' machines  ';
      $where = " CONTAR ";
      $filtros = '';
      $coment1 = $Selecionar->Consulta_Simples($Tabel, $Campos, $where, $filtros);

      $colunas = [];

      $Campos = "  id AS machin_id, name,  status,   credits, time ";

      $where = "id = ?";
      $filtros = [$Parametro];

      $coment = $Selecionar->Consulta_Simples($Tabel, $Campos, $where, $filtros);

      if ($coment) :
        return $coment;
      else:
        return false;
      endif;
    }
    public function List_Maquina_Campos($Parametro) {
      $Selecionar = new Select();

      $Campos = "  SHOW COLUMNS ";
      $Tabel = ' machines  ';
      $where = " CONTAR ";
      $filtros = '';
      $coment = $Selecionar->Consulta_Simples($Tabel, $Campos, $where, $filtros);

     
      if ($coment) :
        return $coment;
      else:
        return false;
      endif;
    }

    public function List_Maquinas($Parametro) {

      $Selecionar = new Select();
      $Campos = "  id AS machin_id, name,  status,   credits, time ";
      $Tabel = ' machines  ';
      $where = "status = ?";
      $filtros = [$Parametro];

      $coment = $Selecionar->Consulta_Simples($Tabel, $Campos, $where, $filtros);

      if ($coment) :
        return $coment;
      else:
        return false;
      endif;
    }

    public function Conta_Maquinas($Parametro) {

      $Selecionar = new Select();
      $Campos = "  COUNT(*) as Total ";
      $Tabel = ' machines ma ';
      $where = "ma.status = ?";
      $filtros = [$Parametro];

      $coment = $Selecionar->Consulta_Simples($Tabel, $Campos, $where, $filtros);

      if ($coment) :
        return $coment[0]['Total'];
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

    private function Create() {
      $Create = new Create;

      $Create->ExeCreate(self::Entity, $this->Data);

      if ($Create->getResult()):
        $this->Error = [TIPO . "foi cadastrad" . ARTIGO . "com sucesso no sistema!", DS_ACCEPT];
        $this->Result = $Create->getResult();
      endif;
    }

    private function Update() {
      $Update = new Update;
      $Update->ExeUpdate(self::Entity, $this->Data, "WHERE id = :id", "id={$this->Registro}");
      if ($Update->getResult()):
        $this->Error = [TIPO . "foi atualizad" . ARTIGO . "com sucesso!", DS_ACCEPT];
        $this->Result = true;
      endif;
    }
  }
  