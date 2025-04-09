<section class="wrapper">
  <h2 class="nosis-form__title"><?= $title; ?></h2>

  <?php if (!empty($error)) { ?>
    <div class="nosis-form__error"><?= $error; ?></div>
  <?php } ?>

  <form class="nosis-form" action="<?= get_url('includes/sign_up.php'); ?>" method="POST">
    <div class="nosis-form__wrapper_inputs">
      <input type="text" class="nosis-form__input" placeholder="Login" name="login" required>
      <input type="password" class="nosis-form__input" placeholder="password" name="password" required>
      <input type="password" class="nosis-form__input" placeholder="password novamente" name="pass2" required>
    </div>
    <div class="nosis-form__btns_center">
      <button class="nosis-form__btn_center" type="submit">Cadastre-se</button>
    </div>
  </form>
</section>