<?php
  ###########################################################################  email
  $qual = 'textos';
  $title = $Lang->logar($idioma, 'informe');
  $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
  $title .= $artigo;
//        $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
?>
<div class='div_centralizada'>

  <br>
  <div id="myNicPanel" style=" width: 70%;" class="textarea_centralizado ">
    <div  class="">
      <span class=""><?= $title; ?></span>
    </div>  <textarea
        style="height: 100px;"
        name="<?= $qual ?>"
        title="<?= $title ?>"
        rows="6"
        cols="40"
        id="<?= $qual ?>"
        ></textarea>

    <br> <br>
  </div>
</div>





