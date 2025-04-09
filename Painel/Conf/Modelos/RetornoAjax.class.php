<?php

class RetornoAjax {

    public $ErrorMessage   = "";
    public $SuccessMessage = "";

    public function getErrorMessage()
    {
        return $this->ErrorMessage;
    }

    public function setErrorMessage($ErrorMessage)
    {
        $this->ErrorMessage = $ErrorMessage;
    }

    public function getSuccessMessage()
    {
        return $this->SuccessMessage;
    }

    public function setSuccessMessage($SuccessMessage)
    {
        $this->SuccessMessage = $SuccessMessage;
    }



}