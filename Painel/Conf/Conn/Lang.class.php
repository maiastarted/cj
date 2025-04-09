<?php

class Lang
{
    public function Logar($viewName, $viewData)
    {
        include PATH_FUNCOES.'/Language/' . $viewName . '/' . $viewName . '.php';
        return $viewData;
    }
}
