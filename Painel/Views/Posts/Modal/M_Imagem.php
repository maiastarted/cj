<?php ?>

<div class="modal " id="M_Imagem" tabindex="-1" role="dialog" 
     aria-labelledby="M_ImagemLabel" aria-hidden="true" style="max-width: 90%; overflow-y: auto;">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="M_ImagemLabel">Visualizar Imagem</h5>-->
<!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
      <div class="modal-body" style="max-height: 80vh; overflow-y: auto;">
        <img src="" alt="Imagem no modal" id="imagem-modal" class="img-fluid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script>

  $(document).ready(function () {
      $('#M_Imagem').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Botão que acionou o modal
          var imageUrl = button.data('imagem-url'); // Obtém o valor do atributo data-imagem-url
          var modal = $(this); // Modal que está sendo exibido

          // Atualiza o atributo src da imagem no modal
          modal.find('#imagem-modal').attr('src', imageUrl);
      });

      $('#imagem-modal').on('click', function () {
          $('#M_Imagem').modal('hide'); // Fecha o modal com o ID 'M_Imagem'
      });
  });

</script>
