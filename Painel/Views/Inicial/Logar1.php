<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="<?= PATH_PLUGINS; ?>/sweetalert2.all.min.js"></script>
  <link href="<?= PATH_CSS; ?>/sweetalert2.min.css" rel="stylesheet">
  <link href="<?= PATH_CSS; ?>/Logar.css" rel="stylesheet" />
  <link href="<?= PATH_CSS; ?>/fontware/font-awesome.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= PATH_IMG; ?>/favicon.png">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= SITENAME; ?>">
  <meta name="keywords" content="<?= SITENAME; ?>">
  <meta name="author" content="<?= SITENAME; ?>">
  <link rel="icon" href="<?= PATH_IMG; ?>/favicon.png" type="image/x-icon" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Theme css -->
  <link id="change-link" rel="stylesheet" type="text/css" href="<?= PATH_CSS; ?>/style-1.css"><!-- comment -->
</head>
<html lang="<?= $Lang->logar($idioma, 'code'); ?>">

  <?php
    $numeros = [];
    while (count($numeros) < 4) {
      $numero = sprintf("%02d", rand(10, 99));
      if (!in_array($numero, $numeros)) {
        $numeros[] = $numero;
      }
    }
    $numero1 = $Funcoes->gera_segunda_2();
    $numero2 = $Funcoes->gera_segunda_2();
    $numero3 = $Funcoes->gera_segunda_2();

    $randomString1 = $Funcoes->gera_segunda();
    $randomString2 = $Funcoes->gera_segunda();
    $randomString3 = $Funcoes->gera_segunda();

//$conn = mysqli_connect(HOST, USER, PASS, DBSA);
//$sql = "INSERT INTO segunda (chave, id_Usuario, dia, num) VALUES  ($randomString2 , $id, NOW(), $numero2 )";

    $_SESSION['chave'] = $randomString2;
//mysqli_query($conn, $sql);

    $numero39 = rand(0, 100);

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: EXK  <" . EMAIL_PADRAO . ">\r\n";

// echo "EMAIL " . $lembrete;
    $EmailFrom = EMAIL_PADRAO;
//$EmailTo = $email;
    $Subject = 'Autenticação em duas etapas.';
//$Name = $nome;
    $imageData = file_get_contents(PATH_IMG . '/logop.png');
    $base64Image = base64_encode($imageData);
    $Body = '
        <!DOCTYPE html>
            <html lang=' . $Lang->logar($idioma, 'code') . '>
                <head>
                    <meta charset="UTF-8">
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f0f0f0;
                            font-size: 14px;
                        }
                        h1 {
                            color: #333;
                        }
                    </style>
                    <title>' . $Lang->logar($idioma, 'autentica') . ':</title>
                </head>
                <body>
                    <img src="data:image/jpeg;base64,' . $base64Image . '" alt="Minha Imagem">
                    <p>' . $Lang->logar($idioma, 'lembrete') . '.</b>.</p>
                    <table style="width:400px; border: 2px solid #000; ">
                    <tr>
                        <td style="border: 2px solid #000; text-align:center; font-size:20px;">' . $numero1 . '</td>
                        <td style="border: 2px solid #000; text-align:center; font-size:20px;">' . $numero2 . '</td>
                        <td style="border: 2px solid #000; text-align:center; font-size:20px;">' . $numero3 . '</td>
                    </tr>
                    
                    <tr>
                        <td style="border: 2px solid #000; text-align:center; font-size:20px;">' . $randomString1 . '</td>
                        <td style="border: 2px solid #000; text-align:center; font-size:20px;">' . $randomString2 . '</td>
                        <td style="border: 2px solid #000; text-align:center; font-size:20px;">' . $randomString3 . '</td>
                    </tr>
                    </table>
                    <p>' . $Lang->logar($idioma, 'recebendo_email') . ': <br>' . PATH . '</p>
                </body>
            </html>';

// $success = mail($EmailTo, $Subject, $Body, $headers);
  ?>

  <body>
    <!-- loader start -->
    <div class="loading-text">
      <div>
        <h1 class="animate">Loading</h1>
      </div>
    </div>
    <!-- loader end -->


    <!-- login section start -->
    <section class="login-section">
      <div class="header-section">
        <div class="logo-sec">
          <a href="index.html">
            <img src="<?= PATH_IMG; ?>/icon/logo.png" alt="logo" class="img-fluid blur-up lazyload">
          </a>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-5 d-none d-lg-block">
            <div class="login-welcome">
              <div>
                <img src="<?= PATH_IMG; ?>/login/charcter.png" class="img-fluid blur-up lazyload"
                     alt="charcter">

              </div>
            </div>
          </div>         

          <div class="col-xl-6 col-lg-7 col-md-10 col-12 m-auto">
            <div class="login-form">
              <div>
                <div class="login-title">
                  <h2>Login</h2>
                </div>
                <div class="login-discription">
                  <h4>Second login step.<br>
                    The code was sent to the email provided. Choose the number below 
                  </h4>
                </div>
                <div class="form-sec">
                  <div>
                    <form class="theme-form" role="form" name="AdminLoginForm1" action="" method="post">

                      <p style="text-align: center;">
                        Isso é provisório: <?= $Lang->logar($idioma, 'sob'); ?>
                        <b><?= $numero2 ?></b>
                      </p>

                  </div>
                  <br>
                  <br>
                  <div class="col-sm-10" style="text-align: center;">
                    <label for="name" style="text-align: center;padding-bottom: 20px;"> 
                      <input
                          style="text-align: center;"
                          type="text"
                          placeholder="<?= $Lang->logar($idioma, 'codigo'); ?>"
                          required
                          value="77"
                          name="segunda"
                          id="segunda"
                          autofocus>
                    </label>
                  </div>

                  <div class="quadro text-center">
                    <div class="row justify-content-center">
                      <div class="col-auto">
                        <form method="post">
                          <input
                              type="submit"
                              name="Admin_Login"
                              value="<?= $Lang->logar($idioma, 'continuar'); ?>"
                              class="btn btn-solid btn-lg">
                        </form>
                      </div>

                      <div class="col-auto">
                        <a href="/?BL=/" class="">
                          <button type="button" class="btn btn-solid btn-lg">
                              <?= $Lang->logar($idioma, 'voltar'); ?>
                          </button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- latest jquery-->
    <script src="<?= PATH_JS; ?>/jquery-3.6.0.min.js"></script>

    <!-- popper js-->
    <script src="<?= PATH_JS; ?>/popper.min.js"></script>

    <!-- slick slider js -->
    <script src="<?= PATH_JS; ?>/slick.js"></script>
    <script src="<?= PATH_JS; ?>/custom-slick.js"></script>

    <!-- feather icon js-->
    <script src="<?= PATH_JS; ?>/feather.min.js"></script>

    <!-- emoji picker js-->
    <script src="<?= PATH_JS; ?>/emojionearea.min.js"></script>

    <!-- Bootstrap js-->
    <script src="<?= PATH_JS; ?>/bootstrap.js"></script>

    <!-- chatbox js -->
    <script src="<?= PATH_JS; ?>/chatbox.js"></script>

    <!-- lazyload js-->
    <script src="<?= PATH_JS; ?>/lazysizes.min.js"></script>

    <!-- theme setting js-->
    <script src="<?= PATH_JS; ?>/theme-setting.js"></script>

    <!-- Theme js-->
    <script src="<?= PATH_JS; ?>/script.js"></script>

    <script>
      feather.replace();
      $(".emojiPicker ").emojioneArea({
          inline: true,
          placement: 'absleft',
          pickerPosition: "top left ",
      });
    </script>





    <script>
      function alerta(type, title, mensagem) {
          Swal.fire({
              icon: "error",
              type: "warning",
              title: title,
              html: '<h3>' + mensagem + '</h3>',
              showConfirmButton: true,
              timer: 5500
          });
          //        alert('gggggggggggggggggggg');
      }

    </script>
  </body>
</body>
