<?php
//    if ($tipo != 'Novo') {
  if (isset($_SESSION['userlogin_SITE'])) {
    extract($_SESSION['userlogin_SITE']);
  } else {
    header('Location: /');
    exit();
  }
  $maq_ativa = $cadastra->Conta_Maquinas(1);
  $maq_inativa = $cadastra->Conta_Maquinas(2);
  $maq_bloqueadas = $cadastra->Conta_Maquinas(3);

  $BL = $Cript->encrypt("¬,Painel,<?=$id?>", TEXTO_CHAVE);
  $BL_A = $Cript->encrypt("Maquinas,Maquinas,1", TEXTO_CHAVE);
  $BL_I = $Cript->encrypt("Maquinas,Maquinas,2", TEXTO_CHAVE);
  $BL_B = $Cript->encrypt("Maquinas,Maquinas,3", TEXTO_CHAVE);
  $BL_U = $Cript->encrypt("Usuarios,Lista,0", TEXTO_CHAVE);
//  $BLPerfil = $Cript->encrypt("Usuarios,Update," . $id, TEXTO_CHAVE);
  $BLSair = $Cript->encrypt(",index,logoff", TEXTO_CHAVE);
//  $ident = $_SESSION['userlogin_SITE']['namr'];
?>

<header>
  <div class="mobile-fix-menu"></div>
  <div class="container-fluid custom-padding">
    <div class="header-section">
      <div class="header-left">
        <div class="brand-logo">
          <a href="index.html">
            <img src="<?= PATH_IMG; ?>/icon/logo.png" alt="logo" class="img-fluid lazyload">
          </a>
        </div>
      </div>
      <div class="header-left">
        <div class="post-stats">
          <ul class="btn-group">

            <li class="header-btn home-btn" >
              <a class="main-link" href="/?BL=<?= $BL ?>" title="<?= $Lang->logar($idioma, 'pag_prin'); ?>" >
                <i class="icon-light stroke-width-3 iw-16 ih-16" data-feather="home"></i>
              </a>&nbsp;&nbsp;
            </li>

            <li  >
              <a class="button8" href="/?BL=<?= $BL_A ?>" title="<?= $Lang->logar($idioma, 'pag_prin'); ?>" >
                  <?= $maq_ativa ?>
                <span tyle="color: #fff"><?= $Lang->logar($idioma, 'maquinas') ?> 
                  <?= $Lang->logar($idioma, 'ativas') ?></span>
              </a>&nbsp;&nbsp;
            </li>

            <li  >
              <a class="button8" href="/?BL=<?= $BL_I ?>" title="<?= $Lang->logar($idioma, 'pag_prin'); ?>" >
                  <?= $maq_inativa ?>
                <span tyle="color: #fff"><?= $Lang->logar($idioma, 'maquinas') ?> 
                  <?= $Lang->logar($idioma, 'inativas') ?></span>
              </a>&nbsp;&nbsp;
            </li>

            <li  >
            <li  >
              <a class="button8" href="/?BL=<?= $BL_B ?>" title="<?= $Lang->logar($idioma, 'pag_prin'); ?>" >
                  <?= $maq_bloqueadas ?>
                <span tyle="color: #fff"><?= $Lang->logar($idioma, 'maquinas') ?> 
                  <?= $Lang->logar($idioma, 'bloq') ?></span>
              </a>&nbsp;&nbsp;
            </li>

            <li  >
              <a class="button8" href="/?BL=<?= $BL_U ?>" title="<?= $Lang->logar($idioma, 'pag_prin'); ?>" >
                <span ><?= $Lang->logar($idioma, 'usuarios') ?></span>
              </a>&nbsp;&nbsp;
            </li>
      
            <li  >
              <a class="button8" href="/?BL=<?= $BLSair ?>" title="<?= $Lang->logar($idioma, 'pag_prin'); ?>" >
                <span ><?= $Lang->logar($idioma, 'sair') ?> </span>
              </a>
            </li>
        </div>
      </div>
    </div>
  </div>
</header>

