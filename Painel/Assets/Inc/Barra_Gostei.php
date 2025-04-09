<?php
  $BLlike = $Cript->encrypt("¬,Resumo,like¬" . $id, TEXTO_CHAVE);
  $BLmid = $Cript->encrypt("Posts,Create,mid", TEXTO_CHAVE);
?>
<div class="col-12" style="width: 100%;">
  <div>
    <nav class="nav2">
      <ul>
          <?php
            //############################################################# like
            $botao_like = "";
            $botao_like_nome = $dados['id'];
            $botao_like .= "like¬{$dados['id']}¬1¬4587458¬{$_SESSION['userlogin_SITE']['id']}";
            $botao_like = $Cript->encrypt($botao_like, TEXTO_CHAVE);
            if ($dados['user_id'] != $_SESSION['userlogin_SITE']['id']) {
              echo <<<TEXT
                    <li>
                      <button id="like-btn" onclick="dar_Like('$botao_like', '$botao_like_nome', 'like-count_')"
                        class="button" >
                        <span id="like-count_$botao_like_nome">$post_p</span> 👍 Gostei
                      </button>
                    </li>
                    TEXT;
            } else {
              echo <<<TEXT
                    <li>
                      <button id="like-btn" class="button2">
                          <span id="like-count_$botao_like_nome">$post_p</span> 👍 Gostei
                      </button>
                    </li>
                    TEXT;
            }
            //############################################################# nlike
            $botao_nlike_nome = $dados['id'];
            $botao_nlike = "";
            $botao_nlike .= "nlike¬{$dados['id']}¬2¬4587458¬{$_SESSION['userlogin_SITE']['id']}";
            $botao_nlike = $Cript->encrypt($botao_nlike, TEXTO_CHAVE);

            if ($dados['user_id'] != $_SESSION['userlogin_SITE']['id']) {
              echo <<<TEXT
                            <li>
                             <button id="nlike-btn" class="button" onclick="dar_nLike('$botao_nlike', '$botao_nlike_nome','nlike-count_')">
                                 <span id="nlike-count_$botao_nlike_nome">$post_n</span> 
                                 👍 Ruim
                             </button>
                             </li>
                        TEXT;
            } else {
              echo <<<TEXT1
                            <li>
                              <button id="nlike-btn" class="button2">
                                <span id="nlike-count_$botao_nlike_nome">$post_n</span> 
                                  👍 Ruim
                              </button>
                            </li>
                          TEXT1;
            }
            //############################################################# comentario
            $botao_comentario_nome = $dados['id'];
            $botao_comentario = "";
            $botao_comentario .= "comentario¬{$dados['id']}¬0¬458665558¬{$_SESSION['userlogin_SITE']['id']}";
//            $botao_comentario = $Cript->encrypt('Posts/Comentarios', TEXTO_CHAVE);
            $BLComentario = $Cript->encrypt("Posts/Comentarios,Lista," .$botao_comentario, TEXTO_CHAVE);

            if ($dados['user_id'] != $_SESSION['userlogin_SITE']['id']) {
              echo <<<TEXT
                          <li>
                            <a href="/?BL=$BLComentario" class='limpa'>
                              <span>$comentario</span> 
                                Comentários
                            </a>
                          </li>
                      TEXT;
            } else {
              echo <<<TEXT1
                          <li>
                            <button class='button2' id="comentario-btn_$botao_comentario_nome">
                              <span >$comentario</span> 
                                Comentários
                            </button>
                          </li>
                       TEXT1;
            }
          ?>         
      </ul>
    </nav>
  </div>
</div>


