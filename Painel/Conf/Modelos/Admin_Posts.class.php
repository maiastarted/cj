<?php

  #[AllowDynamicProperties]
  class Admin_Posts {

    private $tamanhoMax;
    private $extensoesPermitidas;
    private $Error;
    private $Result;
    public $Connect = NULL;

    const Entity = 'post';
    const Entity1 = 'post_likes';
    const Entity2 = 'post_likes_usu';
    const ID = 'post_id';
    const ID_TEXTO = 'O post ';
    const ID_TEXTO_ARTIGO = 'o ';

    private static $host;
    private static $username;
    private static $Pass;
    private static $password;

    public function __construct($tamanhoMax = 5 * 1024 * 1024, $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'mov', 'avi']) {
      $this->tamanhoMax = $tamanhoMax;
      $this->extensoesPermitidas = $extensoesPermitidas;
    }

    public function getConnection() {
      $pdo = null;
      $host = $_SESSION['dbDetails']['host'];
      $db_name = $_SESSION['dbDetails']['db'];
      $username = $_SESSION['dbDetails']['user'];
      $password = $_SESSION['dbDetails']['pass'];

      try {
        $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $exception) {
        $pdo = "Erro de conexão: " . $exception->getMessage();
      }
      return $pdo;
    }

    public function Lista_Comentarios($Data) {
      $pdo = $this->getConnection();
      $this->post_id = $Data;
      $Contagem = 0;
      $resultado = 0;

      if ($pdo) {
        $ql = "SELECT pc.texto, pc.postagem, u.username ";
        $ql .= "FROM post_comentarios pc ";
        $ql .= "inner join adm_users u on u.id= pc.post_user_id ";
        $ql .= "WHERE pc.post_id=:post_id ";
        $ql .= "ORDER BY pc.postagem DESC ";

        $stmt = $pdo->prepare($ql);
        $stmt->bindParam(':post_id', $this->post_id);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      return $resultado;
    }

    public function Lista_Post_Usu($Data) {
      $pdo = $this->getConnection();
      $this->post_id_usu = $Data;
      $Contagem = 0;
      $resultado = 0;

      if ($pdo) {
        $ql = "SELECT p.id as id_post, p.textos, p.postagem, u.username ";
        $ql .= "FROM post p ";
        $ql .= "inner join adm_users u on u.id= p.user_id ";
        $ql .= "WHERE p.user_id=:post_id_usu ";
        $ql .= "ORDER BY p.postagem DESC ";

        $stmt = $pdo->prepare($ql);
        $stmt->bindParam(':post_id_usu', $this->post_id_usu);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      return $resultado;
    }

    public function Busca_Comentarios($post_id) {
      $pdo = $this->getConnection();
      $this->post_id = $post_id;
      $texto = "";
      if ($pdo) {
        $ql = "SELECT COUNT(*)  FROM post_comentarios WHERE post_id = :post_id; ";
        $stmt = $pdo->prepare($ql);
        $stmt->bindParam(':post_id', $this->post_id);
        $stmt->execute();
        $resultado = $stmt->fetchColumn();

        $texto = $resultado;
      }
      return $texto;
    }

    public function Adiciona_Comentario($Data) {
      $this->Data = $Data;
      $this->Data['type'] = 'text';
      $Contagem = 0;
      $retorno = 0;

      $sql = "INSERT INTO post_comentarios ";
      $sql .= "(post_id, post_user_id, texto, type)";
      $sql .= "VALUES (";
      $sql .= ":post_id,:post_user_id,:texto,:type)";

      $params = [':post_id' => $this->Data['post_id'], ':post_user_id' => $this->Data['post_user_id'], ':texto' => $Data['textos'], ':type' => $this->Data['type']];

      try {
        $db = $this->getConnection();
        if (is_array($db) && !$db['success']) {
          return 0; // $db; // Retorna o erro de conexão
        }

        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $post_id = $db->lastInsertId();
        $retorno = $post_id;
      } catch (PDOException $exception) {
        $retorno = 0;
      }
      return $retorno;
    }

    public function Adiciona($Data) {
      $this->Data = $Data;
      $Contagem = 0;
      $retorno = 0;
      $Contagem = strlen($Data['titulo_post']) + strlen($Data['subtitulo']) + strlen($Data['textos']);

      if ($Contagem > 0) {

        $sql = "INSERT INTO post ";
        $sql .= "(user_id, titulo_post, subtitulo, textos, publico)";
        $sql .= "VALUES (";
        $sql .= ":user_id, :titulo_post, :subtitulo, :textos, :publico)";

        $params = [':user_id' => $Data['user_id'], ':titulo_post' => $Data['titulo_post'], ':subtitulo' => $Data['subtitulo'], ':textos' => $Data['textos'], ':publico' => $Data['publico']];

        try {
          $db = $this->getConnection();
          if (is_array($db) && !$db['success']) {
            return 0; // $db; // Retorna o erro de conexão
          }

          $stmt = $db->prepare($sql);
          $stmt->execute($params);
          $post_id = $db->lastInsertId();
          $retorno = $post_id;
        } catch (PDOException $exception) {
          $retorno = 0;
        }
      }
      return $retorno;
    }

    public function Adiciona_1($Data) {
      $this->Data = $Data;

      $sql = "INSERT INTO post ";
      $sql .= "(user_id, publico)";
      $sql .= "VALUES (";
      $sql .= ":user_id, :publico)";

      $params = [':user_id' => $Data['user_id'], ':publico' => $Data['publico']];
      try {
        $db = $this->getConnection();
        if (is_array($db) && !$db['success']) {
          return 0; // $db; // Retorna o erro de conexão
        }

        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $post_id = $db->lastInsertId();

        $retorno = $post_id;
      } catch (PDOException $exception) {
        $retorno = 0;
      }

      return $retorno;
    }

    public function Adiciona_Imagens($arquivos, $post_id, $usUario, $diretorio) {
      $this->diretorio = $diretorio . $usUario . '/';

      foreach ($arquivos["name"] as $key => $nomeOriginal) {
        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
        $tamanho = $arquivos["size"][$key];
        $tmpName = $arquivos["tmp_name"][$key];

        if (!in_array($extensao, $this->extensoesPermitidas)) {
          $resultados[] = "Erro: Extensão '$extensao' não permitida!";
          continue;
        }

        if ($tamanho > $this->tamanhoMax) {
          $resultados[] = "Erro: O arquivo '$nomeOriginal' excede o tamanho máximo!";
          continue;
        }

//                $novoNome = uniqid() . "." . $extensao;
        $novo = time();
        $novo .= str_pad($usUario, 5, '0', STR_PAD_LEFT);
        $novoNome = $novo . "." . $extensao;
        $caminhoFinal = $this->diretorio . $novoNome;

        if (!is_dir($this->diretorio)) {
          mkdir($this->diretorio, 0777, true);
        }

        if (move_uploaded_file($tmpName, $caminhoFinal)) {
          $resultados[] = "Sucesso: '$nomeOriginal' foi salvo como '$novoNome'!";
        } else {
          $resultados[] = "Erro ao mover o arquivo '$nomeOriginal'!";
        }


        $sql1 = "INSERT INTO post_media";
        $sql1 .= "(post_id, media)";
        $sql1 .= "VALUES (";
        $sql1 .= ":post_id, :media)";

        $params = [':post_id' => $post_id, ':media' => $novoNome];

        try {
          $db = $this->getConnection();
          if (is_array($db) && !$db['success']) {
            return $db; // Retorna o erro de conexão
          }

          $stmt = $db->prepare($sql1);
          $stmt->execute($params);
          $retorno = 1;
        } catch (PDOException $exception) {
          $retorno = 0;
        }
      }//FIM DO FOREACH

      return $retorno;
    }

    public function Grava_Post($novoNome, $usUario) {


      $sql = "INSERT INTO post_media ";
      $sql .= "(user_id, titulo_post, subtitulo, textos, publico)";
      $sql .= "VALUES (";
      $sql .= ":user_id, :titulo_post, :subtitulo, :textos, :publico)";

      $dados = "'{$Data['user_id']}', ";
      $dados .= "'{$Data['titulo_post']}', ";
      $dados .= "'{$Data['subtitulo']}', ";
      $dados .= "'{$Data['textos']}', ";
      $dados .= "'{$Data['publico']}'";
      $dados .= ")";
      $params = [':user_id' => $Data['user_id'], ':titulo_post' => $Data['titulo_post'], ':subtitulo' => $Data['subtitulo'], ':textos' => $Data['textos'], ':publico' => $Data['publico']];

      try {
        $db = $this->getConnection();
        if (is_array($db) && !$db['success']) {
          return $db; // Retorna o erro de conexão
        }

        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $retorno = ['success' => true, 'message' => "Dados inseridos com sucesso."];
      } catch (PDOException $exception) {
        $retorno = ['success' => false, 'message' => "Erro na inserção: " . $exception->getMessage()];
      }
      return $retorno;
    }

    public function Grava_Imagens($novoNome, $usUario) {


      $sql = "INSERT INTO post_media ";
      $sql .= "(user_id, titulo_post, subtitulo, textos, publico)";
      $sql .= "VALUES (";
      $sql .= ":user_id, :titulo_post, :subtitulo, :textos, :publico)";

      $dados = "'{$Data['user_id']}', ";
      $dados .= "'{$Data['titulo_post']}', ";
      $dados .= "'{$Data['subtitulo']}', ";
      $dados .= "'{$Data['textos']}', ";
      $dados .= "'{$Data['publico']}'";
      $dados .= ")";
      $params = [':user_id' => $Data['user_id'], ':titulo_post' => $Data['titulo_post'], ':subtitulo' => $Data['subtitulo'], ':textos' => $Data['textos'], ':publico' => $Data['publico']];

      try {
        $db = $this->getConnection();
        if (is_array($db) && !$db['success']) {
          return $db; // Retorna o erro de conexão
        }

        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $retorno = ['success' => true, 'message' => "Dados inseridos com sucesso."];
      } catch (PDOException $exception) {
        $retorno = ['success' => false, 'message' => "Erro na inserção: " . $exception->getMessage()];
      }
      return $retorno;
    }

    public function Adiciona_Like(array $Data) {
      $pdo = $this->getConnection();

      $this->post_id = $Data['post_id'];
      $this->post_usu_id = $Data['post_usu_id'];
      $this->voto = "post_id_p";
      $resultado = null;
      $this->post = 0;

      if ($pdo) {
        $ql = "SELECT post_id_p FROM post_likes_pos WHERE post_id = :post_id AND post_usu_id = :post_usu_id;";
        $stmt = $pdo->prepare($ql);
        $stmt->bindParam(':post_id', $this->post_id);
        $stmt->bindParam(':post_usu_id', $this->post_usu_id);
        $stmt->execute();
        $resultado1 = $stmt->fetch(PDO::FETCH_ASSOC);
        $resultado = $resultado1['post_id_p'];

        if (is_null($resultado)) {
          $this->post = 1;
          $sql = "INSERT INTO post_likes_pos ";
          $sql .= "( $this->voto, post_id, post_usu_id) VALUES ";
          $sql .= "($this->post=1, $this->post_id, $this->post_usu_id) ";
          $stmt = $pdo->prepare($sql);
        } else if ($resultado == 0) {
          $this->post = 1;
          $sql = "UPDATE post_likes_pos SET ";
          $sql .= "$this->voto = :voto WHERE ";
          $sql .= "post_id = :post_id AND ";
          $sql .= "post_usu_id = :post_usu_id ";
          $stmt = $pdo->prepare($sql);

          $stmt->bindParam('voto', $this->post);
          $stmt->bindParam('post_id', $this->post_id);
          $stmt->bindParam('post_usu_id', $this->post_usu_id);
        } else {
          $sql = "UPDATE post_likes_pos SET ";
          $sql .= "$this->voto = :voto WHERE ";
          $sql .= "post_id = :post_id AND ";
          $sql .= "post_usu_id = :post_usu_id ";
          $stmt = $pdo->prepare($sql);

          $stmt->bindParam('voto', $this->post);
          $stmt->bindParam('post_id', $this->post_id);
          $stmt->bindParam('post_usu_id', $this->post_usu_id);
        }

        $stmt->execute();

        return $this->post;
      }
    }

    public function Adiciona_nLike(array $Data) {
      $pdo = $this->getConnection();

      $this->post_id = $Data['post_id'];
      $this->post_usu_id = $Data['post_usu_id'];
      $this->voto = "post_id_n";
      $resultado = null;
      $this->post = 0;

      if ($pdo) {
        $ql = "SELECT post_id_n FROM post_likes_neg WHERE post_id = :post_id AND post_usu_id = :post_usu_id;";
        $stmt = $pdo->prepare($ql);
        $stmt->bindParam(':post_id', $this->post_id);
        $stmt->bindParam(':post_usu_id', $this->post_usu_id);
        $stmt->execute();
        $resultado1 = $stmt->fetch(PDO::FETCH_ASSOC);
        $resultado = $resultado1['post_id_n'];

        if (is_null($resultado)) {
          $this->post = 1;
          $sql = "INSERT INTO post_likes_neg ";
          $sql .= "( $this->voto, post_id, post_usu_id) VALUES ";
          $sql .= "($this->post=1, $this->post_id, $this->post_usu_id) ";
          $stmt = $pdo->prepare($sql);
        } else if ($resultado == 0) {
          $this->post = 1;
          $sql = "UPDATE post_likes_neg SET ";
          $sql .= "$this->voto = :voto WHERE ";
          $sql .= "post_id = :post_id AND ";
          $sql .= "post_usu_id = :post_usu_id ";
          $stmt = $pdo->prepare($sql);

          $stmt->bindParam('voto', $this->post);
          $stmt->bindParam('post_id', $this->post_id);
          $stmt->bindParam('post_usu_id', $this->post_usu_id);
        } else {
          $sql = "UPDATE post_likes_neg SET ";
          $sql .= "$this->voto = :voto WHERE ";
          $sql .= "post_id = :post_id AND ";
          $sql .= "post_usu_id = :post_usu_id ";
          $stmt = $pdo->prepare($sql);

          $stmt->bindParam('voto', $this->post);
          $stmt->bindParam('post_id', $this->post_id);
          $stmt->bindParam('post_usu_id', $this->post_usu_id);
        }

        $stmt->execute();

        return $this->post;
      }
    }

    public function Busca_Like($post_id, $post_usu_id) {
      $pdo = $this->getConnection();
      $this->post_id = $post_id;
      $this->post_usu_id = $post_usu_id;

      if ($pdo) {
//                $sql = "SELECT {$this->voto} FROM post_likes_usu WHERE post_id = :post_id AND post_usu_id = :post_usu_id LIMIT 1";
//                $stmt = $pdo->prepare($sql);
//                $stmt->bindParam(":post_id", $this->post_id);
//                $stmt->bindParam(":post_usu_id", $this->post_usu_id);
//                $stmt->execute();
//                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = $pdo->prepare("SELECT $this->voto FROM post_likes_usu WHERE post_id = :post_id AND post_usu_id = post_usu_id ");
        $stmt->bindParam(':post_id', $this->post_id);
        $stmt->bindParam(':post_usu_id', $this->post_usu_id);

        $id = 1; // Substitua pelo ID desejado
        $stmt->execute();
      }

      if ($resultado == false) {
        $sql = "INSERT INTO post_likes ";
        $sql .= "({ $this->voto}) VALUES ";
        $sql .= "({ $this->voto}) ";
        $params = [':post_id_p' => 1, ':post_id' => $this->post_id];
      } else {
        $sql = "UPDATE post_likes SET ";
        if ($this->vt == 1) {
          $resultado += 1;
          $sql .= "{ $this->voto} = {$resultado} WHERE ";
          $sql .= "post_id = :post_id ";
          $params = [':post_id' => $this->post_id];
        } else {
          $resultado -= 1;
          $sql .= "{ $this->voto} = {$resultado} WHERE ";
          $sql .= "post_id = :post_id ";
          $params = [':post_id' => $this->post_id];
        }
      }
      $stmt = $pdo->prepare($sql);
      $stmt->execute($params);
      $post_id = $pdo->lastInsertId();

      $retorno = $post_id;

      $params = '';
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
      $ReadDados->ExeRead(self::Entity, "WHERE id = :id", "id = {$this->id}");

      if (!$ReadDados->getResult()):
        $this->Error = [self::ID_TEXTO . "que você tentou deletar não existe no sistema!", DS_ERROR];
        $this->Result = false;
      else:
        $deleta = new Delete;
        $deleta->ExeDelete(self::Entity, "WHERE id = :id", "id = {$this->id}");
        $this->Result = true;
      endif;
    }

    public function GetNome($Registro_id, $Registro_Nome) {
      $this->nome = $Registro_Nome;
      $this->id = $Registro_id;

      if ($this->id == 0):
        $buscador = " WHERE nome = '$this->nome'";
      else:
        $buscador = " WHERE nome = '$this->nome' AND id = {$this->id}";
      endif;
      $read = new Read();
      $read->ExeReadCampos(self::Entity, "nome", $buscador);
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

      $read->ExeReadCampos(self::Entity1, " count(*) as TotalRegistros ", " WHERE " . self::ID . " = {$this->id}");

      if ($read->getResult()):
        foreach ($read->getResult() as $dados):
          extract($dados);
          return $TotalRegistros;
        endforeach;
      else:
        return 0;
      endif;
    }

    public function Conta_like($Registro_id, $usu_id) {
      $pdo = $this->getConnection();

      $this->post_id = $Registro_id;
      $this->usu_id = $usu_id;
      $dados = array();

      $ql = "SELECT COALESCE(SUM(post_id_p), 0) FROM post_likes_pos WHERE post_id=:post_id ;";
      $stmt = $pdo->prepare($ql);
      $stmt->bindParam(':post_id', $this->post_id);
      $stmt->execute();
      $resultado2 = (int)$stmt->fetchColumn();
      $dados['post_id_p'] =$resultado2;

      $ql = "SELECT COALESCE(SUM(post_id_n), 0) AS neg FROM post_likes_neg WHERE post_id=:post_id ;";
      $stmt = $pdo->prepare($ql);
      $stmt->bindParam(':post_id', $this->post_id);
      $stmt->execute();
      $resultado3 = (int)$stmt->fetchColumn();
      $dados['post_id_n'] = $resultado3;

      return $dados;
    }

    public function Conta_like_usu($Registro_id, $usu_id) {
      $this->id = $Registro_id;
      $this->usu_id = $usu_id;

      $read = new Read();

      $read->ExeReadCampos(self::Entity2, " * ", " WHERE post_id = {$this->id} AND usu_id = {$this->usu_id}");

      if ($read->getResult()):
        return '1';
      else:
        return '0';
      endif;
    }

    public function Busca_Posts($Registro_id, $publico) {
      $this->id_user = $Registro_id;
      $this->publico = $publico;

      $read = new Read();

      $filtro = " AND publico IN ({$this->publico}) ";
      $tabela = ' post as p';
      $tabela .= ' INNER JOIN adm_users as u on p.user_id = u.id ';

      $Campos = "p.*, ";
      $Campos .= "u.nome, u.quem_sou ";
      $OrderBy = "ORDER BY postagem DESC ";

      $Where = "WHERE 1 = 1 {$filtro}";
      $Condicao = '';
      $Condicao .= $OrderBy;
      $read->ExeReadCamposTabela($tabela, $Campos, $Where, $Condicao);

      if ($read->getResult()):
        $dados = $read->getResult();
        return $dados;
      else:
        return 0;
      endif;
    }

    public function Get_Posts_Imagem($id, $pasta, $usu) {
      $this->id = $id;
      $this->diretorio = $pasta . $usu . '/';

      $read = new Read();

      $filtro = " AND post_id = " . $id; //AND publico IN ({$this->publico}) ";
      $tabela = ' post_media as p';
//            $tabela .= ' INNER JOIN adm_users as u on p.user_id = u.id ';

      $Campos = "* ";
      $OrderBy = "ORDER BY p.id DESC ";

      $Where = "WHERE 1=1 {$filtro}";
      $Condicao = '';
      $Condicao .= $OrderBy;
      $read->ExeReadCamposTabela($tabela, $Campos, $Where, $Condicao);

      $retorno = '';
      if ($read->getResult()):
//        $retorno .= "<div class='container2'>";
       
        $retorno = $read->getResult();
      else:
        return $retorno;
      endif;
      return $retorno;
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
  