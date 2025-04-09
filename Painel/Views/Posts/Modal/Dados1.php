<!--<div class="row">-->
<!--    <form action="" method="post" name="UserCreateForm" enctype="multipart/form-data">-->
<div>
    <?php
      ###########################################################################  título
      $qual = 'titulo_post';
      $title = $Lang->logar($idioma, 'informe');
      $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
      $title .= $artigo;
      $valor = '';
      $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
    ?>
    <div class="input-group input-com-borda input_post">
        <input
            class="form-control"
            type="hidden"
            name="<?= $qual ?>"
            id="<?= $qual ?>"
            title="<?= $title ?>"
            value="<?php if (!empty($RegistroData[$qual])) echo $RegistroData[$qual]; ?>"
            placeholder="<?= $place ?>"
            >
    <!--        <span class="texto-acima-borda2">--><?php //= $title;  ?><!--</span>-->
    </div>
    <div class="input-group input-com-borda input_post">
        <?php
          ########################################################################### subtitulo
          $qual = 'subtitulo';
          $title = $Lang->logar($idioma, 'informe');
          $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
          $title .= $artigo;
          $valor = '';
          $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
        ?>
        <input
            class="form-control  "
            type="hidden"
            name="<?= $qual ?>"
            id="<?= $qual ?>"
            title="<?= $title ?>"
            value="<?php if (!empty($RegistroData[$qual])) echo $RegistroData[$qual]; ?>"
            placeholder="<?= $place ?>"
            >
    <!--        <span class="texto-acima-borda2">--><?php //= $title;  ?><!--</span>-->
    </div>
    <?php
      ###########################################################################  último acesso
      $qual = 'tipo';
      $title = $Lang->logar($idioma, 'infome');
      $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
      $title .= $artigo;
      $valor = '';
      $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
    ?>


    <input type="radio" name="publico" value="0" checked>Público
    &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="radio" name="publico" value="1" id="private"> Privado
    &nbsp; &nbsp; &nbsp; &nbsp;
    <br>
    <br>
    <?php
      ###########################################################################  email
      $qual = 'texto_post';
      $title = $Lang->logar($idioma, 'informe');
      $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
      $title .= $artigo;
//        $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
    ?>
    <div class="input-group input-com-borda">
        <span class=""><?= $title; ?></span>
        <div id="myNicPanel" style=" width: 70%;" class="col-md-10">
            <textarea
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

    <?php
      ###########################################################################  email
      $qual = 'files[]';
      $title = $Lang->logar($idioma, 'insira');
      $title .= $Lang->logar($idioma, 'o_' . $qual . '_d');
      $title .= $artigo;
      $place = $Lang->logar($idioma, $qual . '_d') . $artigo;
    ?>        <span class=""><?= $title; ?></span>

    <div class="input-group input-com-borda">
        <div id="fileInputsContainer">
            <div class="file-input-container" id="files">
                <input type="file" class="input_file" id="arquivos" multiple>
            </div>
        </div>
        <br>
    </div>
    <button type="button" class="button" id="addFileButton" style=" margin-left: 100px;">
        Adicionar Mais Arquivos
    </button>
    <br>
</div>






