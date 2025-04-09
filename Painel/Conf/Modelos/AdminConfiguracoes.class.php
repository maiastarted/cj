<?php

/*
 * AdminBairros.class [ MODEL ADMIN ]
 * Respnsável por gerenciar Bairros no Admin do sistema!
 * @copyright (c) 2014, Marcus Correa
 */

class AdminConfiguracoes {

    private $Data;
    private $Configuracao;
    private $Error;
    private $Result;

    const Entity = 'configuracoes'; 

    public function ExeUpdate(array $Data) {
        $this->Configuracao = 1;
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Error = ["Para atualizar esta Configuracao, preencha todos os campos.", DS_ALERT];
            $this->Result = false;
        else:
            $this->setData();
        endif;

        $this->Update();
    }

    /*
     *
     */

    public function getResult() {
        return $this->Result;
    }

     /*
     *
     */

    public function getError() {
        return $this->Error;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Valida e cria os dados para realizar o cadastro
    private function setData() {
        $this->Data = array_map('trim', $this->Data);
    }

      //Atualiza Link!
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE id = :id", "id=1");
        if ($Update->getResult()):
            $this->Error = ["O registro foi atualizado com sucesso!", DS_ACCEPT];
            $this->Result = true;
        endif;
    }

   
}
