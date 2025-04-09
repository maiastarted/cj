<div class="input-group input-com-borda">
    
    <?php
        ###########################################################################  email
        $qual = 'website';
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
           value="<?php if (!empty($RegistroData[$qual])) echo $RegistroData[$qual]; ?>"
           placeholder="<?= $place ?>"
    >
    <span class="texto-acima-borda"><?= $title; ?></span>
</div>


<?php
    ###########################################################################  email
    $qual = 'quem_sou';
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
<div class="input-group input-com-borda">

    <div id="myNicPanel" style="width: 80%">
            <textarea
                    class="form-control"
                    style="height: 100px;"
                    name="<?= $qual ?>"
                    title="<?= $title ?>"
                    rows="5"
                    cols="80"
                    title="Informe detalhes sobre você"
                    id="<?= $qual ?>"><?php if (!empty($RegistroData['quem_sou'])) echo htmlspecialchars($RegistroData['quem_sou']); ?></textarea>
        <br>
    </div>
    <span class="texto-acima-borda"><?= $title; ?></span>
</div>
</div>

<div class="input-group input-com-borda">
    <div class="input-group ">
        <?php
            ###########################################################################Apelido
            $qual = 'youtube';
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
            ###########################################################################  email
            $qual = 'facebook';
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
               value="<?php if (!empty($RegistroData[$qual])) echo $RegistroData[$qual]; ?>"
               placeholder="Email d<?= $artigo ?>"
        >
        <span class="texto-acima-borda1"><?= $title; ?></span>
    </div>
</div>

<div class="input-group input-com-borda">
    <div class="input-group ">
        <?php
            ###########################################################################Apelido
            $qual = 'instagram';
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
            ###########################################################################  email
            $qual = 'twitter';
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
               value="<?php if (!empty($RegistroData[$qual])) echo $RegistroData[$qual]; ?>"
               placeholder="Email d<?= $artigo ?>"
        >
        <span class="texto-acima-borda1"><?= $title; ?></span>
    </div>
</div>

