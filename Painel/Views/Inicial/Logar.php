
<html lang="<?= $Lang->logar($idioma, 'code'); ?>">
  <!DOCTYPE html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= PATH_PLUGINS; ?>/sweetalert2.all.min.js"></script>
    <link href="<?= PATH_CSS; ?>/sweetalert2.min.css" rel="stylesheet">
  <!--  <link href="<?= PATH_CSS; ?>/Logar.css" rel="stylesheet" />-->
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
                <h1>Welcome Back!</h1>
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
                  <h3>Hello Everyone, Welcome Back</h3>
                  <h4>Welcome to <?= SITENAME; ?>, please login to your account.
                  </h4>
                </div>
                <div class="form-sec">
                  <div>
                    <form class="theme-form" role="form" name="AdminLoginForm" action="" method="post">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="user" id="user"
                               placeholder="Enter email" value='contato@started.com.br'>
                        <i class="input-icon iw-20 ih-20" data-feather="user"></i>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="pass"
                               id="pass" placeholder="Password" value='password'>
                        <i class="input-icon iw-20 ih-20" data-feather="eye"></i>
                        <!-- <i class="input-icon" data-feather="eye-off" width="20" height="20"></i> -->
                      </div>
                      <div class="bottom-sec">
                        <div class="form-check checkbox_animated">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">remember me</label>
                        </div>
                        <a href="#" class="ms-auto forget-password">forget
                          password?</a>
                      </div>

                      <input
                          type="submit"
                          name="Admin_Login"
                          value="login"
                          class="btn btn-solid btn-lg">
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- login section end -->


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
          alert('gggggggggggggggggggg');
      }

    </script>
  </body>