<p class="label_1" style="color: red"> * Campos Obrigatórios</p>

<div class="row ">
  <div class="">
      <?php
        $qual = 'nome';
        $title = $Lang->logar($idioma, 'informe');
        $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
        $title .= $artigo;
        $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
      ?>
    <div class="input-group input-com-borda">
      <div class="input-group-addon" title="<?= $title; ?>">
        <i class=" fa-solid fa-address-book"></i>
      </div>

      <input class="form-control  "
             type="text"
             name="nome"
             value="<?php if (!empty($RegistroData['nome'])) echo $RegistroData['nome']; ?>"
             title="<?= $title; ?>"
             required
             placeholder="<?= $place; ?>"
             >
      <span class="texto-acima-borda"><?= $title; ?></span>
    </div>

    <div class="input-group input-com-borda">
        <?php
          #################################################################Apelido
          $qual = 'username';
          $title = $Lang->logar($idioma, 'informe');
          $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
          $title .= $artigo;
          if (!empty($RegistroData[$qual])) {
            $valor = '';
          } else {
            $valor = $RegistroData[$qual];
          }
          $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
        ?>
      <div class="input-group-addon" title="<?= $title ?>">
        <i class="fa-brands fa-odnoklassniki"></i>
      </div>
      <input class="form-control "
             type="text"
             name="<?= $qual ?>"
             id="<?= $qual ?>"
             title="<?= $title ?>"
             value="<?php if (!empty($RegistroData[$qual])) echo $RegistroData[$qual]; ?>"
             required
             placeholder="<?= $place ?>"
             >
      <span class="texto-acima-borda"><?= $title; ?></span>
      <?php
        #################################################################  email
        $qual = 'email';
        $title = $Lang->logar($idioma, 'informe');
        $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
        $title .= $artigo;
        if (!empty($RegistroData[$qual])) {
          $valor = '';
        } else {
          $valor = $RegistroData[$qual];
        }
        $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
      ?>
      <div class="input-group-addon" title="<?= $title ?>">
        <i class="fa-solid fa-envelope-circle-check"></i>
      </div>
      <input class="form-control"
             type="text"
             name="<?= $qual ?>"
             id="<?= $qual ?>"
             title="<?= $title ?>"
             required
             value="<?php if (!empty($RegistroData[$qual])) echo $RegistroData[$qual]; ?>"
             placeholder="<?= $place ?>"
             >
      <span class="texto-acima-borda1"><?= $title; ?></span>
    </div>

    <div class="input-group input-com-borda">
        <?php
          ################################################################# password
          $qual = 'password';
          $title = $Lang->logar($idioma, 'informe');
          $title .= $Lang->logar($idioma, 'a_' . $qual . '_d');
          $title .= $artigo;
          if (!empty($RegistroData[$qual])) {
            $valor = '';
          } else {
            $valor = '';
          }
          $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
        ?>
      <div class="input-group ">
        <div class="input-group-addon" title="<?= $title ?>">
          <i class="fa-brands fa-odnoklassniki"></i>
        </div>
        <input class="form-control "
               type="password"
               name="<?= $qual ?>"
               id="<?= $qual ?>"
               title="<?= $title ?>"
               value=""
               placeholder="<?= $place ?>"
               >
        <span class="texto-acima-borda"><?= $title; ?></span>
        <?php
          #################################################################  confirma password
          $qual = 'password_conf';
          $title = $Lang->logar($idioma, 'confime');
          $title .= $Lang->logar($idioma, 'a_' . $qual . '_d');
          $title .= $artigo;
          $valor = '';
          $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
        ?>
        <div class="input-group-addon" title="<?= $title ?>">
          <i class="fa-solid fa-envelope-circle-check"></i>
        </div>
        <input class="form-control"
               type="password"
               name="<?= $qual ?>"
               id="<?= $qual ?>"
               title="<?= $title ?>"
               value=""
               placeholder="<?= $place ?>"
               >
        <span class="texto-acima-borda1"><?= $title; ?></span>
      </div>
      <div style="font-size: 1.0em;color: red;font-weight: bold;">
          <?php echo $aviso_password; ?>
        <p id="mspassword" style="font-size:15px; font-weight: bold;"></p>
      </div>
    </div>

    <div class="input-group input-com-borda">
        <?php
          ################################################################# lemprete
          $qual = 'lembrete';
          $title = $Lang->logar($idioma, 'informe');
          $title .= $Lang->logar($idioma, 'a_' . $qual . '_d');
          $title .= $artigo;
          if (!empty($RegistroData[$qual])) {
            $valor = '';
          } else {
            $valor = '';
          }
          $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
        ?>
      <div class="input-group ">
        <div class="input-group-addon" title="<?= $title ?>">
          <i class="fa-brands fa-odnoklassniki"></i>
        </div>
        <input class="form-control "
               type="text"
               name="<?= $qual ?>"
               id="<?= $qual ?>"
               title="<?= $title ?>"
               value="<?php if (!empty($RegistroData[$qual])) echo $RegistroData[$qual]; ?>"
               placeholder="<?= $place ?>"
               >
        <span class="texto-acima-borda"><?= $title; ?></span>
        <?php
          ################################################################# Fone
          $qual = 'fone';
          $title = $Lang->logar($idioma, 'informe');
          $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
          $title .= $artigo;
          if (!empty($RegistroData[$qual])) {
            $valor = '';
          } else {
            $valor = $RegistroData[$qual];
          }
          $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
        ?>
        <div class="input-group-addon" title="<?= $title ?>">
          <i class="fa-brands fa-odnoklassniki"></i>
        </div>
        <input class="form-control "
               type="text"
               name="<?= $qual ?>"
               id="<?= $qual ?>"
               title="<?= $title ?>"
               value="<?php if (!empty($RegistroData[$qual])) echo $RegistroData[$qual]; ?>"
               placeholder="<?= $place ?>"
               >
        <span class="texto-acima-borda"><?= $title; ?></span>
        <?php
          #################################################################  ultimo_login acesso
          $qual = 'ultimo_login';
          $title = $Lang->logar($idioma, 'Veja');
          $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
          $title .= $artigo;
          $valor = '';
          $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
        ?>
        <div class="input-group-addon" title="<?= $title ?>">
          <i class="fa-solid fa-envelope-circle-check"></i>
        </div>
        <input class="form-control"
               type="text"
               name="<?= $qual ?>"
               id="<?= $qual ?>"
               title="<?= $title ?>"
               readonly
               value="<?php if (!empty($RegistroData[$qual])) echo $RegistroData[$qual]; ?>"
               placeholder="<?= $place ?>"
               >
        <span class="texto-acima-borda1"><?= $title; ?></span>
      </div>
    </div>

    <div class="input-group input-com-borda">
        <?php
          #################################################################  tipo
          $qual = 'tipo';
          $title = $Lang->logar($idioma, 'infome');
          $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
          $title .= $artigo;
          $valor = '';
          $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
        ?>
      <div class="input-group-addon" title="<?= $title ?>">
        <i class="fa-solid fa-envelope-circle-check"></i>
      </div>
        <div style="background-color: #e2f8e3;border: 1px solid #00a7d0;padding-left: 20px; padding-top: 10px">
      <?php
        if ($RegistroData['tipo'] == 'public') {
          echo '
            <input type="radio" name="tipo" value="public"  id="public" checked >Público
             &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="radio" name="tipo" value="private" id="private"> Privado
             &nbsp; &nbsp; &nbsp; &nbsp;';
        } else {
          echo '
            <input type="radio" name="tipo" value="public" id="public" >Público
             &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="radio" name="tipo" value="private" id="private" checked> Privado
             &nbsp; &nbsp; &nbsp; &nbsp;';
        }
      ?>
      &nbsp; &nbsp;
    </div>
      <span class="texto-acima-borda"><?= $title; ?></span>
      <?php
        ################################################################# valor_privado
        $qual = 'valor_privado';
        $title = $Lang->logar($idioma, 'informe');
        $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
        $title .= $artigo;
        if (!empty($RegistroData[$qual])) {
          $valor = $Funcoes->Money($RegistroData[$qual]);
        } else {
          $valor = '0,00';
        }
        $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
      ?>
      <!--<div class="input-group ">-->
      <div class="input-group-addon" title="<?= $title ?>">
        <i class="fa-brands fa-odnoklassniki"></i>
      </div>
      <input class="form-control"
             type="text"
             name="<?= $qual ?>"
             id="<?= $qual ?>"
             title="<?= $title ?>"
             value="<?= $valor ?>"
             placeholder="<?= $place ?>"
             onkeyup="formatarMoeda(this)"
             >
      <span class="texto-acima-borda"><?= $title; ?></span>
      <?php
        #################################################################  valor_vip
        $qual = 'valor_vip';
        $title = $Lang->logar($idioma, 'confime');
        $title .= $Lang->logar($idioma, 'a_' . $qual . '_d');
        $title .= $artigo;
        if (!empty($RegistroData[$qual])) {
          $valor = $Funcoes->Money($RegistroData[$qual]);
        } else {
          $valor = '0,00';
        }
        $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
      ?>
      <div class="input-group-addon" title="<?= $title ?>">
        <i class="fa-solid fa-envelope-circle-check"></i>
      </div>
      <input class="form-control dinheiro"
             type="text"
             name="<?= $qual ?>"
             id="<?= $qual ?>"
             title="<?= $title ?>"
             value="<?= $valor; ?>"
             placeholder="<?= $place ?>"
             onkeyup="formatarMoeda(this)"
             >
      <span class="texto-acima-borda1"><?= $title; ?></span>
    </div>
  </div>
</div>


<div class="input-group input-com-borda"  >





  <?php
    ################################################################# pix
    $qual = 'pix';
    $title = $Lang->logar($idioma, 'informe');
    $title .= $Lang->logar($idioma, 'a_' . $qual . '_d');
    $title .= $artigo;
    if (!empty($RegistroData[$qual])) {
      $valor = '';
    } else {
      $valor = '';
    }
    $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
  ?>
  <div class="input-group ">
    <div class="input-group-addon" title="<?= $title ?>">
      <i class="fa-brands fa-odnoklassniki"></i>
    </div>
    <input class="form-control "
           type="text"
           name="<?= $qual ?>"
           id="<?= $qual ?>"
           title="<?= $title ?>"
           value="<?php if (!empty($RegistroData[$qual])) echo $RegistroData[$qual]; ?>"
           placeholder="<?= $place ?>"
           >
    <span class="texto-acima-borda"><?= $title; ?></span>
  </div>
</div>

<div class="input-group input-com-borda">

  <div style="font-size: 1.0em;color: red;font-weight: bold;">
      <?php echo $aviso_password; ?>
    <p id="mspassword" style="font-size:15px; font-weight: bold;"></p>
  </div>
</div>

<input
    type="hidden"
    name="id"
    value="<?php if (!empty($RegistroData['id'])) echo $RegistroData['id']; ?>">

<input
    type="hidden"
    name="ultimo_login"
    value="<?php if (!empty($RegistroData['ultimo_login'])) echo $RegistroData['ultimo_login']; ?>">

<input
    type="hidden"
    name="nome_velho"
    value="<?php if (!empty($RegistroData['nome'])) echo $RegistroData['nome']; ?>">

<input
    type="hidden"
    name="password_antiga"
    value="<?php if (!empty($RegistroData['password'])) echo $RegistroData['password']; ?>">
<input
    type="hidden"
    name="adm"
    value="<?php if (!empty($RegistroData['adm'])) echo $RegistroData['adm']; ?>">