<?php

require_once '../Config.inc.php';



$Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pagina = $_POST['pagina'];
    if (isset($_POST['id_projeto']))
        $id_projeto = $_POST['id_projeto'];

    switch ($pagina) {
        case 'cilindro':
            $id = 25;
            $relatorio = 'Cilindro de Gravação';
            include 'cilindro.php';
            break;

        case 'dados':
            $id = 23;
            $relatorio = 'Dados Laboratoriais';

            $tabela = 'dados_laboratoriais dl';
            $Campos = 'dl.id as id_projeto, id_projeto, serie, cbr, unidade, densidade, p.nome as nome_projeto ';
            $Where = 'INNER JOIN  projetos p ON p.id = id_projeto ';
            $Condicao = ' WHERE p.id = ' . $id_projeto . ' ORDER BY serie DESC';

            $ReadDados1 = new Read();

            $ReadDados1->ExeReadCamposTabela($tabela, $Campos, $Where, $Condicao);
            if ($ReadDados1->getResult()):
                $data['result'] = 'success';
                foreach ($ReadDados1->getResult() as $dados):
                    extract($dados);
                    $nestedData["id"] = $id_projeto;
                    $nestedData["nome"] = $nome_projeto;
                    $nestedData["serie"] = $serie;
                    $nestedData["cbr"] = $cbr;
                    $nestedData["unidade"] = $unidade;
                    $nestedData["densidade"] = $densidade;
                    $data[] = $nestedData;
                endforeach;
            endif;
            $data2 = $data;

            break;
        case 'dados_completos':
            $id = 23;
            $relatorio = 'Dados Laboratoriais';

            $tabela = 'dados_laboratoriais dl';
            $Campos = 'dl.id as id_projeto, id_projeto, serie, cbr, unidade, densidade, p.nome as nome_projeto ';
            $Where = 'INNER JOIN  projetos p ON p.id = id_projeto ';
            $Condicao = ' ORDER BY serie DESC';

            $ReadDados1 = new Read();

            $ReadDados1->ExeReadCamposTabela($tabela, $Campos, $Where, $Condicao);
            if ($ReadDados1->getResult()):
                $data['result'] = 'success';
                foreach ($ReadDados1->getResult() as $dados):
                    extract($dados);
                    $nestedData["id"] = $id_projeto;
                    $nestedData["nome"] = $nome_projeto;
                    $nestedData["serie"] = $serie;
                    $nestedData["cbr"] = $cbr;
                    $nestedData["unidade"] = $unidade;
                    $nestedData["densidade"] = $densidade;
                    $data[] = $nestedData;
                endforeach;
            endif;
            $data2 = $data;

            break;

        case 'diario':
            $id = 31;//foto
            $relatorio = 'Diário da obra';
            include 'cilindro.php';
            break;

        case 'moldagem':
            $id = 26;
            $relatorio = 'Ensaio de Moldagem';
            include 'cilindro.php';
            break;

        case 'rompimento':
            $id = 30;
            $relatorio = 'Ensaio de rompimento';
            include 'cilindro.php';
            break;

        case 'frasco':
            $id = 24;
            $relatorio = 'Frasco de Areia';
            include 'cilindro.php';
            break;

        case 'visita'://foto
            $id = 32;
            $relatorio = 'Relatório de visita';
            include 'cilindro.php';
            break;

        case 'construtoras':
            $tabela = 'construtoras';
            $Campos = 'id, nome';
            $Where = '';
            $Condicao = '';

            $ReadDados1 = new Read();

            $ReadDados1->ExeReadCamposTabela($tabela, $Campos, $Where, $Condicao);
            if ($ReadDados1->getResult()):
                $data['result'] = 'success';
                // $nestedData["result"]='success';/

                foreach ($ReadDados1->getResult() as $dados):
                    extract($dados);
                    $nestedData["id"] = $id;
                    $nestedData["nome"] = $nome;
                    $data[] = $nestedData;
                endforeach;
            endif;
            $data2 = $data;

            break;
        //////////////////////////////////////////////////////////////////////////////
        case 'concreteiras':
            $tabela = 'concreteiras';
            $Campos = 'id, nome';
            $Where = '';
            $Condicao = '';

            $ReadDados1 = new Read();

            $ReadDados1->ExeReadCamposTabela($tabela, $Campos, $Where, $Condicao);
            if ($ReadDados1->getResult()):
                $data['result'] = 'success';
                // $nestedData["result"]='success';/

                foreach ($ReadDados1->getResult() as $dados):
                    extract($dados);
                    $nestedData["id"] = $id;
                    $nestedData["nome"] = $nome;
                    $data[] = $nestedData;
                endforeach;
            endif;
            $data2 = $data;

            break;
        //////////////////////////////////////////////////////////////////////////////
        case 'encarregados':
            $tabela = 'encarregados';
            $Campos = 'id, nome, construtora';
            $Where = '';
            $Condicao = '';

            $ReadDados1 = new Read();

            $ReadDados1->ExeReadCamposTabela($tabela, $Campos, $Where, $Condicao);
            if ($ReadDados1->getResult()):
                $data['result'] = 'success';
                // $nestedData["result"]='success';/

                foreach ($ReadDados1->getResult() as $dados):
                    extract($dados);
                    $nestedData["id"] = $id;
                    $nestedData["nome"] = $nome;
                    $nestedData["construtora"] = $nome;
                    $data[] = $nestedData;
                endforeach;
            endif;
            $data2 = $data;

            break;
        //////////////////////////////////////////////////////////////////////////////

        case 'projetos':
            $tabela = 'projetos';
            $Campos = 'id, nome';
            $Where = '';
            $Condicao = '';

            $ReadDados1 = new Read();

            $ReadDados1->ExeReadCamposTabela($tabela, $Campos, $Where, $Condicao);
            if ($ReadDados1->getResult()):
                $data['result'] = 'success';
                // $nestedData["result"]='success';/

                foreach ($ReadDados1->getResult() as $dados):
                    extract($dados);
                    $nestedData["id"] = $id;
                    $nestedData["nome"] = $nome;
                    $data[] = $nestedData;
                endforeach;
            endif;
            $data2 = $data;

            break;
        //////////////////////////////////////////////////////////////////////////////
        case 'login':

            $login = new Login();

            $data1['user'] = $_POST['username'];
            $data1['pass'] = $_POST['password'];

            $login->VerificaLogin($data1);

            if ($login->getResult()):

                $id = $login->getResult()['id'];
                $nome = $login->getResult()['nome'];

                $data2 = [
                    'result' => 'success',
                    'status' => true,
                    'mensagem' => $nome,
                    'id' => $id,
                ];

            else:
                $data2 = [
                    'result' => 'failure',
                    'status' => false,
                    'mensagem' => 'Dados não conferem ' . $data1['user'] . "  " . $data1['pass'],
                    'id' => null,
                ];
            endif;
            break;
        default:
            $data2 = [
                'result' => '',
                'status' => false,
                '' => '',
            ];
            break;
    }
    header('Content-Type: application/json');
    echo json_encode($data2);
}
