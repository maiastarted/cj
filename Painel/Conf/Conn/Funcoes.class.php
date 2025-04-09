<?php

  class Funcoes {

    protected $prefix;
    protected $cost = '$10$';
    protected $cipher = 'aes-256-gcm';
    protected $iv;
    protected $encryption_key;

    public function __construct() {
      $this->prefix = (version_compare(PHP_VERSION, '5.3.7') < 0) ? '$2a' : '$2y';
      $this->encryption_key = base64_encode(openssl_random_pseudo_bytes(32));
      $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
    }

    public function DiaSemana($diasemana) {
      switch ($diasemana) {
        case "0":
          $diasemana = "Selecione uma data";
          break;
        case "1":
          $diasemana = "Segunda-feira";
          break;
        case "2":
          $diasemana = "Terça-feira";
          break;
        case "3":
          $diasemana = "Quarta-feira";
          break;
        case "4":
          $diasemana = "Quinta-feira";
          break;
        case "5":
          $diasemana = "Sexta-feira";
          break;
        case "6":
          $diasemana = "Sábado";
          break;
        case "7":
          $diasemana = "Domingo";
          break;
      }
      return $diasemana;
    }

    //    function StrZero($value, $lenght) {
    //        return str_pad($value, $lenght, "0", STR_PAD_LEFT);
    //    }

    public function Money($value) {
      $value = (float) $value;
      return number_format($value, 2, ',', '.');
    }

    public function mascaraTelefone($numero) {
      $numero = str_pad($numero, 8, '0', STR_PAD_LEFT);
      return trim(chunk_split($numero, 4, '-'), '-');
    }

    public function Float($value) {
      $value = (float) $value;
      return number_format($value, 6, ',', '.');
    }

    public function MoneyDB($value) {
      $value = str_replace(".", "", $value);
      $value = str_replace(",", ".", $value);
      $value = trim($value);
      $hhhh = strlen($value);

      return $value;
    }

    public function Inteiro($value) {
      $value = (float) $value;
      return number_format($value, 0, '', '.');
    }

    public function InteiroDB($value) {
      $value = str_replace("_", "", $value);
      if ($value == "")
        $value = 0;
      $value = str_replace(".", "", $value);
      $value = str_replace(", ", "", $value);
      return $value;
    }

    public function FormataBotao($value) {
      if ($value < 10)
        $value = "0" . $value;
      return $value;
    }

    //
    //    function Percentual($value, $length) {
    //        $value = (double) $value;
    //        return number_format($value, $length, ', ', '.');
    //    }
    //
    public function DateFormat($value1) {
      if (!empty($value1)) {
        $value = date('d/m/Y', strtotime($value1));
        $dia = $value[0] . $value[1];
        $mes = $value[3] . $value[4];
        $ano = $value[6] . $value[7] . $value[8] . $value[9];
        $value1 = $dia . '/' . $mes . '/' . $ano . ' ';
        $value1 = date('d/m/Y', strtotime($value1));
      } else {
        $value1 = "";
      }
      return $value1;
    }

    public function DateTimeFormat($value) {
      $tamPalavra = strlen($value);
      for ($i = 0; $i < $tamPalavra; $i++) {
        //            echo 'Caracter ' . $i . ' = ' . $value[$i] . '<br />';
      }
      if (!empty($value)) {
        $value = date('d/m/Y H:i', strtotime($value));
      } else {
        $value = "";
      }
      return $value;
    }

    public function DateTimeFormatDB($value) {
      $tamPalavra = strlen($value);
      for ($i = 0; $i < $tamPalavra; $i++) {
        //            echo 'Caracter ' . $i . ' = ' . $value[$i] . '<br />';
      }
      $dia = $value[0] . $value[1];
      $mes = $value[3] . $value[4];
      $ano = $value[6] . $value[7] . $value[8] . $value[9];
      $hora = $value[11] . $value[12] . $value[13] . $value[14] . $value[15];

      $value = "$ano-$mes-$dia $hora";

      return $value;
    }

    public function DateDbFormat($data) {
      if (empty($data)) {
        $data = date("d/m/Y");
      }
      $date = DateTime::createFromFormat('d/m/Y', $data);
      return $date->format('Y-m-d');
    }

    function checa_sessao() {
      if (isset($_SESSION['LAST_ACTIVITY'])) :
        $x = time() - $_SESSION['LAST_ACTIVITY'];

        if ((time() - $_SESSION['LAST_ACTIVITY'] > 1800)):
          session_unset();     // unset $_SESSION variable for the run-time
          session_destroy();   // destroy session data in storage
          $BL = base64_encode("Inicial, Logar, 1000");
        endif;
      else:
        $BL = base64_encode("Inicial, Logar, 1000");
      endif;

      $_SESSION['LAST_ACTIVITY'] = time();
    }

    function contaLinhas($text, $maxwidth) {
      $lines = 0;
      if ($text == '') {
        $cont = 1;
      } else {
        $cont = strlen($text);
      }
      if ($cont < $maxwidth) {
        $lines = 1;
      } else {
        if ($cont % $maxwidth > 0) {
          $lines = ($cont / $maxwidth) + 1;
        } else {
          $lines = ($cont / $maxwidth);
        }
      }
      //        $lines = $lines + substr_count(nl2br($text), '');
      $lines = round($lines);
      return $lines;
    }

    function ConfereMenor($valor_1, $valor_2) {
      if ($valor_2 <= $valor_1):
        $retorno = "";
      else:
        $retorno = true;
      endif;
      return $retorno;
    }

    public
        function _getIv() {
      //    return md5($this->_getSalt());
    }

    public
        function _getSalt() {
      // return md5($this->drupal->drupalGetHashSalt());
    }

    function MontaPagina($parametro1, $parametro2, $parametro3) {
      $retorno = "";
      if ($parametro1 != '¬') {
        $var1 = $parametro1;
      } else {
        $var1 = '';
      }

      $var2 = $parametro2;
      $var3 = $parametro3;
      if ($var1 == '') {
        $retorno = PATH_VIEWS . $var1 . '/' . $var2 . '.php';
      } else {
        $retorno = PATH_VIEWS . '/' . $var1 . '/' . $var2 . '.php';
      }
      return $retorno;
    }

    function gera_segunda() {
      $characters = '1234567890';
      $length = 6;
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      $randomString = 77; //aky
      return $randomString;
    }

    function gera_segunda_2() {
      $characters = '1234567890';
      $length = 2;
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }

    function gerarTabela($idTabela, $dados) {
      $Lang = new Lang();
      $Funcoes = new Funcoes();
      $Cript = new Criptografia();
      $tex_id = $Lang->logar('en', 'id');
      $tex_name = $Lang->logar('en', 'name');
      $tex_tempo = $Lang->logar('en', 'time');
      $tex_valor = $Lang->logar('en', 'credits');
      $tex_anterior = $Lang->logar('en', 'anterior');
      $tex_proximo = $Lang->logar('en', 'proximo');
      $tex_pesquisar = $Lang->logar('en', 'pesquisar');
      $tex_pag = $Lang->logar('en', 'pag');

      if ($idTabela == '1') {
        $tex_tabela = $Lang->logar('en', 'ativa');
      } elseif ($idTabela == '2') {
        $tex_tabela = $Lang->logar('en', 'inativa');
      } else {
        $tex_tabela = $Lang->logar('en', 'bloqueada');
      }
      $title = $Lang->logar('en', 'ver_maquina');
      echo <<<HTML
        <div id="table-container-$idTabela" class="tabela-box" data-tabela="$idTabela">
          <label>$tex_tabela</label>
          <input type="text" id="search-input-$idTabela" placeholder="$tex_pesquisar" oninput="filterTable($idTabela)">
          <div class="table-header">
            <div class="colu1" onclick="sortTable($idTabela, 0)">$tex_id </div>
            <div class="colu2" onclick="sortTable($idTabela, 1)">$tex_name</div>
            <div class="colu3" onclick="sortTable($idTabela, 2)">$tex_valor</div>
            <div class="colu4" onclick="sortTable($idTabela, 2)">$tex_tempo</div>
            <div class="colu5" ></div>
          </div>
          <div class="table-body" id="table-body-$idTabela">\n
      HTML;
      foreach ($dados as $linha) {
        $BL = $Cript->encrypt("Maquinas,Maquina,{$linha['machin_id']}", TEXTO_CHAVE);
        echo "<div class='table-row'>\n";
        echo "<div class='celu1'>{$linha['machin_id']}</div>\n";
        echo "<div class='celu2'>{$linha['name']}</div>\n";
        echo "<div class='celu3'>{$Funcoes->Money($linha['credits'])}</div>\n";
        echo "<div class='celu4'>{$linha['time']}</div>\n";
        echo <<<HTML
               <a class='celu5' href="/?BL={$BL}" > 
                   <i class="" style="color: #0389c9;" data-feather="eye"></i>
                \n </a>
              HTML;
        echo "</div>\n";
      }

      echo <<<HTML
              </div>
                <div class="pagination" id="pagination-$idTabela">
                  <button class='button8' onclick="changePage($idTabela, -1)">$tex_anterior</button>
                    <span class="page-number" id="page-number-$idTabela">$tex_pag 1</span>
                  <button class='button8' onclick="changePage($idTabela, 1)">$tex_proximo</button>
                </div>
              </div>
          HTML;
    }

    function adaptarDados($lista) {
      $adaptado = [];
      foreach ($lista as $item) {
        $adaptado[] = [
          'machin_id' => $item['machin_id'], // ou 'machine_id'
          'name' => $item['name'],
          'time' => $item['time'],
          'credits' => $item['credits'],
          'value1' => $item['value1'] ?? '0'   // ou outro campo de valor
        ];
      }
      return $adaptado;
    }
  }
  