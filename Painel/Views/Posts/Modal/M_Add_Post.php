<?php
    $nome_Modal = 'M_Add_Post';
    $BL = $Cript->encrypt("¬,Painel,<?=$id?>", TEXTO_CHAVE);
?>
<div class="modal modal-container" id="<?= $nome_Modal; ?>" aria-hidden="true">
    <div class="modal-content">
        <h3 class="modal-title" id="closeModalBtn">Post</h3>
        <form id="uploadForm" enctype="multipart/form-data">
            <input type="hidden" id="mode" name="mode" value="enviar">
            <div class="form-group">
                <?php
                    require_once HOME_VIEW . '/Posts/Inicio.php';
                    require_once HOME_VIEW . '/Posts/Modal/Dados.php';
                ?>
            </div>
            <button type="button" class="button" style="width: 150px; margin-left: 100px;" id="enviar">
                Enviar
            </button>
            <div id="div_menssagem" name="div_menssagem" style="margin-left: 20px"></div>
        </form>
        <button class="button" style="width: 150px; margin-left: 100px;" id="fecharModalBtn">
            Fechar
        </button>
        
    </div>
</div>

