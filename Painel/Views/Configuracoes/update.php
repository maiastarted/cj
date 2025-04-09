<?php

$RegistroData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$VarID = filter_input(INPUT_GET, 'VarID', FILTER_VALIDATE_INT);

if ($RegistroData && $RegistroData['SendPostForm']):

    unset($RegistroData['SendPostForm']);

    $cadastra = new $classe();

    $cadastra->ExeUpdate( $RegistroData);

    DSErro($cadastra->getError()[0], $cadastra->getError()[1]);
endif;

$ReadDados = new Read();
$ReadDados->ExeRead($tabela, "WHERE id = :dadoid", "dadoid={$VarID}");
if ($ReadDados->getResult()):
    $RegistroData = $ReadDados->getResult()[0];
endif;

$checkCreate = filter_input(INPUT_GET, 'create', FILTER_VALIDATE_BOOLEAN);
if ($checkCreate && empty($cadastra)):
    DSErro("Registro cadastrado com sucesso no sistema!", DS_ACCEPT);
endif;

$execussao = "Atualização";

require_once 'dados.php';
