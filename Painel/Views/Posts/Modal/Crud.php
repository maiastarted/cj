<?php

  session_start();
  error_reporting(0); // Evita warnings
  ini_set('display_errors', 0); // Impede erros na saída


  include $_SESSION['path_classe_Models'] . "/Criptografia.class.php";
  require $_SESSION['path_classe_Models'] . "/Admin_Posts.class.php";

  $Cript = new Criptografia();
  $A_Post = new Admin_Posts();

  $host = $_SESSION['dbDetails']['host'];
  $dbname = $_SESSION['dbDetails']['db'];
  $username = $_SESSION['dbDetails']['user'];
  $password = $_SESSION['dbDetails']['pass'];

  $conn = mysqli_connect($host, $username, $password, "$dbname");

  $Registro_Data_G = filter_input_array(INPUT_GET, FILTER_DEFAULT);

  if ($Registro_Data_G):
    if ($Registro_Data_G['abrir_modal'] === 'add_Post') {
      $modal_Ref = $Cript->dencrypt($Registro_Data_G['abrir_modal'], $_SESSION['Texto_Chave']);
      $modal_Ref = str_replace("LiXo_", "", "$modal_Ref");
      ?>
      <script type="text/javascript">
        window.onload = function () {
            document.getElementById("M_Add_Post").style.display = "block";
        }
      </script>
      <?php

    }
  endif;
///////////////////////////////////////////////////////////////////////////////////
  $Registro_Data['postado'] = '';
  $Registro_Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

  if ($Registro_Data):
    if (isset($Registro_Data['postado'])) {
      $decri1 = $Registro_Data['postado'];
      $decri1q = $_SESSION['Texto_Chave'];
      $decri1 = $Cript->dencrypt($Registro_Data['postado'], $_SESSION['Texto_Chave']);
      $decri2 = explode('¬', $decri1);
      $Registro_Data["mode"] = $decri2[0];
      $Registro_Data["post_id"] = $decri2[1];
      $Registro_Data["voto"] = $decri2[2];
      $Registro_Data["post_usu_id"] = $decri2[4];
    }
    if ($Registro_Data['param1']) {
      $decri1 = $Registro_Data['param1'];
      $decri1q = $_SESSION['Texto_Chave'];
      $decri1 = $Cript->dencrypt($Registro_Data['param1'], $_SESSION['Texto_Chave']);
      $decri2 = explode('¬', $decri1);
      $Registro_Data["mode"] = $decri2[0];
      $Registro_Data["post_id"] = $decri2[1];
      $Registro_Data["post_usu_id"] = $decri2[4];
    }

//        $nn = $Registro_Data["mode"];
//        $nn = $Registro_Data["titulo_post"];
//        
    //######################################################- comentario ##########
    if ($Registro_Data['mode'] == 'comentario') {

      $Registro_Data["post_id"] = $decri2[1];

      unset($Registro_Data['param1']);
      unset($Registro_Data['param2']);
      unset($Registro_Data['nome']);
      unset($Registro_Data['mode']);

      $resultado = $A_Post->Adiciona_Comentario($Registro_Data);

//      $result = (int) $resultado;
//      $resultado = 23;
//     
      $resultado = [
        'success' => true,
        'likes' => $resultado,
        'message' => 'Operação realizada com sucesso'
      ];
      echo json_encode($resultado);
      exit;
//######################################################- enviar ##########
    } else if ($Registro_Data["mode"] == "enviar") {
      $usUario = $Cript->dencrypt($Registro_Data["Cod"], $_SESSION['Texto_Chave']);
      $resultado = 0;

      $Registro_Data['user_id'] = $usUario;
      $Registro_Data['textos'] = $Registro_Data['texto_post'];
      unset($Registro_Data['mode']);
      unset($Registro_Data['Cod']);
      unset($Registro_Data['texto_post']);

      $id_post = $A_Post->Adiciona($Registro_Data);
      if (!$id_post) {
        $resultado = 0;
      } else {
        $resultado = $id_post;
      }

      if (isset($_FILES['files']) && !empty($_FILES['files']['name'][0])) {
        if ($id_post > 0) {
          $uploadDirectory = $_SESSION['HOME_FOTO_MEDIA'];
          $resultado = $A_Post->Adiciona_Imagens($_FILES['files'], $id_post, $usUario, $uploadDirectory);
          $resultado = $id_post;
        } else {
          $id_post = $A_Post->Adiciona_1($Registro_Data);
          $uploadDirectory = $_SESSION['HOME_FOTO_MEDIA'];
          $resultado = $A_Post->Adiciona_Imagens($_FILES['files'], $id_post, $usUario, $uploadDirectory);
          $resultado = $id_post;
        }
      }


      if ($resultado > 0) {
        $resultado = 1; //'success';
      } else {
        // DSErro1("Ocorreu um erro, revise os dados a serem inseridos", '', '', DS_ACCEPT);
        $resultado = 0; // 'erro';
      }

      echo json_encode($resultado);

      //###################################################### like ##########
    } else if ($Registro_Data['mode'] == 'like') {

      $Registro_Data["post_id"] = $decri2[1];
      $Registro_Data["voto"] = $decri2[2];

      unset($Registro_Data['postado']);
      unset($Registro_Data['mode']);

      $resultado = $A_Post->Adiciona_Like($Registro_Data);

      $bot = 'like-count_' . $decri2[1];
      echo json_encode(['success' => true, 'likes' => $resultado]);

      //###################################################### nlike ##########
    } else if ($Registro_Data['mode'] == 'nlike') {

      $Registro_Data["post_id"] = $decri2[1];
      $Registro_Data["voto"] = $decri2[2];

      if ($Registro_Data["voto"] == 1) {
        $campos = "MAX(post_id_n) FROM post_likes) + 1)";
        $Registro_Data["voto"] = 1;
      } else {
        $campos = "MAX(post_id_n) FROM post_likes) + 1)";
        $Registro_Data["voto"] = 2;
      }

      unset($Registro_Data['postado']);
      unset($Registro_Data['mode']);

      $resultado = $A_Post->Adiciona_nLike($Registro_Data);
//      $resultado = 127;
//            like-count_
      $bot = 'nlike-count_' . $decri2[1];
      echo json_encode(['success' => true, 'likes' => $resultado]);


      //######################################################- edit ##########
    } else if ($_POST['mode'] === 'edit') {
      $id = $_POST['id'];
      $result = $mysqli->query("SELECT * FROM titulos WHERE id={$id}");
      $row = $result->fetch_assoc();
      echo json_encode($row);

      //###################################################### mini ##########
    } else if ($_POST['mode'] === 'mini') {
      $id = $_POST['id'];
      $result1 = $mysqli->query("SELECT miniatura FROM titulos WHERE id={$id}");
      $result = mysqli_fetch_array($result1);
      echo json_encode($result[0]);
    }

  // $cadastra = new $classe;
//        $nome = $Registro_Data['titulo_post'];
  endif;
  