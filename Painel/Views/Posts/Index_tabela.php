<?php

session_start();

require_once('Inicio.php');

$requestData = $_REQUEST;

$columns = array(
    0 => "textos"
);

$ReadDados = new Read();
$cadastra = new $classe;

$Campos = "count(*) as TotalRegistros";
$Condicao = "";
$Where = " WHERE 1=1 ";

$ReadDados->ExeReadCamposTabela($tabela, $Campos, $Where, $Condicao);

if ($ReadDados->getResult()):
    foreach ($ReadDados->getResult() as $dados):
        extract($dados);
        $totalData = $TotalRegistros;
    endforeach;
else:
    DSErro("Ainda não existem" . $comAcentos . " cadastradas!", DS_INFOR);
endif;

$totalFiltered = $totalData;
///////////////////////////////////////////////////////////////////////////////////////////////
$OrderBy = " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'];
$OrderBy .= " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
$Filtro = "";
$Filtro1 = "";

if (!empty($requestData['search']['value'])) :
    $Filtro = " AND (
                    nome LIKE '%" . $requestData['search']['value'] . "%'  
                )";

    $OrderBy = " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'];
    $OrderBy .= " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
    $sql = $Filtro . $OrderBy;

endif;

$ReadDados1 = new Read();
$Where .= $Filtro;

$Condicao = $OrderBy;

$ReadDados1->ExeReadCamposTabela($tabela, $Campos, $Where, $Condicao);

if ($ReadDados1->getResult()):
    foreach ($ReadDados1->getResult() as $dados1):
        extract($dados1);
        $totalData = $TotalRegistros;
    endforeach;
endif;
$totalFiltered = $totalData;

$totalData = 0;

$Campos = " id, nome ";
$Condicao = "";
$Campos1 = "*";
$Condicao = "order by nome ";

$Where .= $Filtro;
$Condicao = $OrderBy;
$data = array();
$ReadDados1->ExeReadCamposTabela($tabela, $Campos, $Where, $Condicao);

if ($ReadDados1->getResult()):

    foreach ($ReadDados1->getResult() as $dados):
        extract($dados);

        $nestedData["DT_RowData"] = array("id" => $id);
        $nestedData["DT_RowId"] = "tr_id_" . $id;

        $titulo = $cadastra->GetTitulo($id);

        $nestedData["nome"] = $nome;
        $nestedData["titulos"] = $titulo;

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $nestedData["acoes"] = "";

        $BL1 = $Cript->encrypt($semAcentos . ',Update,' . $id,TEXTO_CHAVE);
        $nestedData["acoes"] .= '&nbsp;
                <a
                    class = "btn bt_lista_1"
                    href=/?BL=' . $BL1 . ' 
                    title = "Editar">
                    <i class = "fa fa-pencil" ></i>
                </a>';

        $BL2 = $Cript->encrypt($semAcentos . ",Apagar," . $id,TEXTO_CHAVE);
        $nestedData["acoes"] .= ' 
                <a 
                    class = "btn bt_lista"
                    href=/?BL=' . $BL2 . ' 
                    title="Apagar">
                    <i class="fa fa-trash" ></i>
                </a>';

        $data[] = $nestedData;
    endforeach;
endif;

$json_data = array(
    "draw" => intval($requestData['draw']),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data" => $data
);

echo json_encode($json_data);
