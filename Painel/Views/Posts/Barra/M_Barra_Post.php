<?php
    $nome_Modal = 'M_Barra_Post';
    $BL = $Cript->encrypt("¬,Painel,<?=$id?>", TEXTO_CHAVE);
?>
<!-- Modal -->
<div id="dados" name="dados" style="margin-left: 20px"></div>

<div class="modal fade" id="postModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Criar Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="postForm">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuário</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Comentário</label>
                        <textarea class="form-control" id="comentario" name="comentario" required></textarea>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success">Postar</button>
                </form>
            </div>
        </div>
    </div>
</div>
