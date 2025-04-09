<?php

  function my_autoloader($Class) {
    $cDir = ['Conn', 'Helpers', 'Modelos', 'Library'];
    $iDir = null;
    foreach ($cDir as $dirName) :

      $arquivo = PATH_INCLUDE1 . "Conf/" . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php';

      if (!$iDir && file_exists($arquivo) && !is_dir($arquivo)) :
        require_once($arquivo);
        $iDir = true;
      endif;
    endforeach;
    if (!$iDir) :
      trigger_error("Não foi possível incluir {$Class}.class.php", E_USER_ERROR);
      die;
    endif;
  }

  spl_autoload_register('my_autoloader');

// TRATAMENTO DE ERROS #####################
//CSS constantes :: Mensagens de Erro
  define('DS_ACCEPT', 'alert alert-success');
  define('DS_INFOR', 'alert alert-info');
  define('DS_ALERT', 'alert alert-warning');
  define('DS_ERROR', 'alert alert-danger');

//DSErro :: Exibe erros lançados :: Front
  function DSErro($ErrMsg, $ErrNo, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? DS_INFOR : ($ErrNo == E_USER_WARNING ? DS_ALERT : ($ErrNo == E_USER_ERROR ? DS_ERROR : $ErrNo)));
    ?>
    <script type="text/javascript">
      function alerta(type, title, mensagem) {
          Swal.fire({
              type: type,
              title: title,
              text: mensagem,
              icon: "error",
              showConfirmButton: true,
              timer: 5500
          });
      }

      alerta("error", "Erro", "<?= $ErrMsg; ?>");
    </script>
    <?php
    if ($ErrDie) :
    //die;
    endif;
  }

//DSErro1 :: Exibe erros lançados :: Front
  function DSErro1($ErrMsg, $ErrNo, $BLv, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? DS_INFOR : ($ErrNo == E_USER_WARNING ? DS_ALERT : ($ErrNo == E_USER_ERROR ? DS_ERROR : $ErrNo)));
    ?>
    <script type="text/javascript">
      function alerta(type, title, mensagem) {
          Swal.fire({
              type: type,
              title: title,
              text: mensagem,
              icon: "sucess",
              showConfirmButton: true,
              timer: 5500
          }).then(function (result) {
              if (true) {
                  window.location = '/?BL=<?= $BLv; ?>';
              }
          });
      }

      alerta("success", "SUCESSO", "<?= $ErrMsg; ?>");
    </script>
    <?php
    if ($ErrDie) :
    //die;
    endif;
  }

  function DSAcerto($ErrMsg, $ErrNo, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? DS_INFOR : ($ErrNo == E_USER_WARNING ? DS_ALERT : ($ErrNo == E_USER_ERROR ? DS_ERROR : $ErrNo)));
    ?>
    <script type="text/javascript">
      function alerta(type, title, mensagem) {
      Swal.fire({
      type: type,
              title: title,
              text: mensagem,
              icon: "sucess",
              showConfirmButton: true,
              timer: 5500
      }

      alerta("success", "SUCESSO", "<?= $ErrMsg; ?>");
    </script>
    <?php
    if ($ErrDie) :
    //die;
    endif;
  }

//PHPErro :: personaliza o gatilho do PHP
  function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    $ErrFile1 = str_replace('C:', "", $ErrFile);
    $ErrFile1 = str_replace('\\', " ", $ErrFile1);
    $ErrFile1 = str_replace('xampp ', "", $ErrFile1);
    $ErrFile1 = str_replace('htdocs ', "", $ErrFile1);
    $ErrFile1 = str_replace('exk ', "", $ErrFile1);
//        $ErrFile1 = str_replace(HOME, " ", $ErrFile1);
    $CssClass = ($ErrNo == E_USER_NOTICE ? DS_INFOR : ($ErrNo == E_USER_WARNING ? DS_ALERT : ($ErrNo == E_USER_ERROR ? DS_ERROR : $ErrNo)));
    $mensagem = "{$ErrMsg}  | {$ErrFile1} | {$ErrLine} "; //
    ?>
    <script type="text/javascript">
              function alerta(type, title, mensagem) {
              Swal.fire({
              type: type,
                      title: title,
                      text: mensagem,
                      icon: "error",
                      showConfirmButton: true,
                      timer: 15500
              });
              }
//       alert('<?php echo $mensagem; ?>');
      alerta("Erro", "Erro", "<?php echo $mensagem; ?>");
              //console.log('erro =' + "<?php // echo $mensagem;  ?>////");
                      //alert('<?php // echo $mensagem;  ?>//');

    </script>
    <?php
//        if ($ErrNo == E_USER_ERROR) :
    die;
//        endif;
  }

  function DSErro2($ErrMsg, $ErrNo, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? DS_INFOR : ($ErrNo == E_USER_WARNING ? DS_ALERT : ($ErrNo == E_USER_ERROR ? DS_ERROR : $ErrNo)));
    ?>
    <script type="text/javascript">
                              function alerta(type, title, mensagem) {
                              Swal.fire({
                              type: type,
                                      title: title,
                                      text: mensagem,
                                      icon: "error",
                                      showConfirmButton: true,
                                      timer: 5500
                              });
                              }

                      alerta("ERRO!", "Erro", "<?= $ErrMsg; ?>");
    </script>

    <?php
    if ($ErrDie):
    // die;
    endif;
  }

  set_error_handler('PHPErro');

  function alertaSucesso($mensagem) {

    echo "<script>
          Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: '$mensagem',
          });
        </script>";
  }
  