<?php
  require_once 'Inicio.php';
  require_once PATH_INC . "/Menu.php";
  $postado = new Admin_Posts;
  $id_post_usu = $dados_pagina[2];

  $cadastra = new $classe;
  $classe = "Admin_Usuarios";

  $ReadUser = new Read();

  $ReadUser->ExeRead("adm_users", "WHERE id = {$VarID}");
  if ($ReadUser->getResult()):
    $RegistroData = $ReadUser->getResult()[0];
  endif;

  echo '<div class="row ">';
  echo ' <div class="">';
  $avatar1 = PATH_FOTO_AVATAR . $RegistroData['avatar'];
  echo Check::ImageUserAvatarMini($avatar1);

  echo '</div>';
  echo '<div>';
  echo $RegistroData['username'];
  echo '</div>';
  echo '<div>';
  echo $RegistroData['desde'];
  echo '</div>';
  echo '<hr>';
  
  
  echo '<div class="col-md-12"></div>';
  $coment = $postado->Lista_Post_Usu($id_post_usu);

  $linha = 0;

  foreach ($coment as $dados):
    extract($dados);
    $postagem = $Funcoes->DateTimeFormat($postagem);
   
      echo '  <div class="quadro ">';
      ?>
<!--<div class="qua8dro_Lista" >-->
    <div class="quadro1" style=" width: 10%;border: 1px solid #000;padding: 5px;">
        <?= $postagem ?>
    </div>
    <div class="quadro1" style="width: 80%;text-align:justify; border: 1px solid #000;padding: 5px;"> 
        <?= $textos ?>
    </div>
     </div>  
     <div class="quad1" style="width: 90%;padding: 5px;"> 


    <?php
     $rr= HOME_VIEW.'/Posts/Comentarios/Lista.php';
     require_once $rr;
      
      
     $rr=44; 
      
    ?>
    </div>

    <?php
  endforeach;
//  echo "</> <br>";
?>
