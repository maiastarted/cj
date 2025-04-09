<?php
  
?>

<!--<div id="MD_COMENT" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
     background: rgba(0,0,0,0.5);">-->
<div class="modal modal-container" id="MD_COMENT" aria-hidden="true" style="width: 30%; height: 40%;">
    <div class="modal-content">
         <h3 class="modal-title" id="closeModalBtn">Comentários</h3>
        <form id="Form_Comentario">
            <input type="hidden" id="mode" name="mode" value="comentario">
            <input type="hidden" id="param1" name="param1" value="">
            <input type="hidden" id="param2" name="param2" value="">
            <div class="form-group">
                <div>
                    <?php
                    
                      #################################################################### texto
                    ?>
                    <div class="input-group input-com-borda">
                        <span class="">Texto do comentário</span>
                        
                        <div id="myNicPanel" style=" width: 70%;" class="col-md-10">
                            <textarea
                                style="height: 100px;"
                                name="comentario_texto"
                                title="Texto do comentário"
                                rows="6"
                                cols="40"
                                id="comentario_texto"
                                ></textarea>
                            <br> <br>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <button type="button" class="button" style="width: 150px; margin-left: 100px;" id="enviar2">
                Enviar
            </button>
            <div id="div_menssagem" name="div_menssagem" style="margin-left: 20px"></div>
        </form>
        <button class="button" style="width: 150px; margin-left: 100px;" id="fechar_Comentario">
            Fechar
        </button>

    </div>
</div>


<script>

  function abrir_MD_COMENT(param1, param2) {
      // Exibe o modal
      document.getElementById('MD_COMENT').style.display = 'block';
      document.getElementById('param1').value = param1;
      document.getElementById('param2').value = param2;
  }

  // Função para fechar o modal
  function fechar_Comentario() {
      console.log('fechar');
      $('#Form_Comentario')[0].reset();
      $('#MD_COMENT').modal('hide');
      $('#comentario_texto').html('');
       $('#div_menssagem').html('')
      window.location.href = "/?BL=<?php echo $BLVoltar; ?>";
      document.getElementById('MD_COMENT').style.display = 'none';
  }
  $('#fechar_Comentario').click(function () {
      setTimeout(fechar_Comentario, 30);
  });
</script>
<script>
 $(document).ready(function () {
    $('#enviar2').click(function (e) {
        e.preventDefault(); // Impede o comportamento padrão do botão
        
        var formData = new FormData($('#Form_Comentario')[0]);
        
        $.ajax({
            type: 'POST',
            url: 'Painel/Views/Posts/Modal/Crud.php',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json', // Adicione para forçar o parse como JSON
            success: function (response) {
                console.log('Resposta completa:', response);
                
                if (response.success) {
//                    alert('Sucesso: ' + response.message);
                    $('#div_menssagem').html('Likes atualizados: ' + response.likes);
                    console.log('response.success:', response.likes);
                } else {
                    $('#div_menssagem').html('Erro: ' + response.message);
                    console.log('response.success:', response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Erro completo:', xhr.responseText);
                $('#div_menssagem').html('Erro técnico. Detalhes no console (F12)');
            }
        });
    });
});

</script>
