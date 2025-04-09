<?php
    $BLtex = $Cript->encrypt("Posts,Create,tex", TEXTO_CHAVE);
    $BLmid = $Cript->encrypt("Posts,Create,mid", TEXTO_CHAVE);
?>
    <div class="col-12" style=" width: 97%;">
        <div>
            <div>
            </div>
            <div>
                <?php
                    require_once 'Dados1.php';
                    $usUario = $Cript->encrypt($_SESSION['userlogin_SITE']['id'], TEXTO_CHAVE);
                ?>
                <input type="hidden" id="Cod" name="Cod" value="<?= $usUario; ?>">
            </div>
        </div>
    </div>

<?php

