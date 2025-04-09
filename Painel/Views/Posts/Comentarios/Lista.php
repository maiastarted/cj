<?php
  $postado = new Admin_Posts;
  require_once 'Inicio.php';
  require_once PATH_INC . "/Menu.php";

  $Registro_Data = filter_input_array(INPUT_GET, FILTER_DEFAULT);

  if ($Registro_Data):
    $decri1 = $Registro_Data['BL'];
    $mode = $dados_pagina[2];
    $decri4 = explode('¬', $mode);
    $id_post = $decri4[1];
  endif;
  $erro = 0;
  $Re_Data['postado'] = '';

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Re_Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if ($Re_Data && $Re_Data['SendTexto']) {
      if (($Re_Data['textos'])) {
        unset($Re_Data['SendTexto']);
        $Re_Data['post_user_id'] = $_SESSION['userlogin_SITE']['id'];
        $A_Post = new Admin_Posts();

        $resultado = $A_Post->Adiciona_Comentario($Re_Data);

        if ($resultado):
//          $BL = $Cript->encrypt("Posts/Comentarios,Lista," . $id_post, TEXTO_CHAVE);
          DSAcerto("Comentário foi gravado com sucesso!", DS_ACCEPT);
        else:
          DSErro($resultado->getError()[0], $resultado->getError()[1]);
        endif;
      }
    }
  }
?>

<?php
  $coment = $postado->Lista_Comentarios($id_post, $_SESSION['userlogin_SITE']['id']);
  $linha = 0;
?>
<!--<div class="col-md-12 ">-->
<!---------------------------------------------------------------------------------------->
<section class = "content" >
  <div class="div_centralizada">
    <h3 class=""> Comentários</h3>   
  </div>
  <form action = "" method = "post" name="UserCreateForm" enctype="multipart/form-data">
    <input type="hidden" name="post_id" value="<?= $id_post ?>">
    <?php
      require_once 'Dados1.php';
    ?>
    <div class="div_centralizada">
      <input type="submit" name="SendTexto" value="<?= $botaoSend ?>" class="button" /> 
    </div>
  </form>
  <br>
  <br>
  </div>
</section>

<?php
  echo '</div>';
?>
<div class="div_centralizada">
  <div class="tabela ">
    <div class="linha">
      <div class='coluna_titulo'>
        DATA
      </div>
      <div class='coluna_titulo'>
        COMENTÁRIO
      </div>
      <div class='coluna_titulo'>
        POR
      </div>
    </div>

    <?php
      foreach ($coment as $dados):
        extract($dados);
        $postagem = $Funcoes->DateTimeFormat($postagem);
        echo '<div class="linha">';
        echo '  <div class="coluna">';
        echo $postagem;
        echo '  </div>';
        echo '  <div class="coluna">';
        echo $texto;
        echo '</div>';
        echo '<div class="coluna">';
        echo $username;
        echo ' </div>
              </div >';
      endforeach;
    ?>
  </div>
</div>


