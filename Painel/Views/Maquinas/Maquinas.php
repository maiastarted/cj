<?php
  global $comAcentos, $artigo;
  require_once 'Inicio.php';
  require_once PATH_INC . "/Menu.php";

  $RegistroData = filter_input_array(INPUT_GET, FILTER_DEFAULT);

  $gravar = 0;
  if ($RegistroData):

    $dados = $Cript->dencrypt($_REQUEST['BL'], TEXTO_CHAVE);
    $dados4 = explode(',', $dados);
    $qual = $dados4[2];

    $ativa1 = $cadastra->List_Maquinas($qual);
    $dados1 = $Funcoes->adaptarDados($ativa1);
    $Funcoes->gerarTabela(1, $dados1);
  $linhasPorPagina = 10;

  endif;
?>

<script>

  /*  add user model */
  $('.add-modal').click(function () {
      console.log('add-modal');
      $('#add-modal').modal('show');
  });

  // add form submit
  $('#add-form').submit(function (e) {
      e.preventDefault();
      console.log("submit");

      // ajax
      $.ajax({
//          url: "Painel/Views/Titulos/Crud.php",
          type: "POST",
          data: $(this).serialize(), // get all form field value in serialize form
          success: function () {
//              var oTable = $('#usersListTable').dataTable();
              oTable.fnDraw(false);
              $('#add-modal').modal('hide');
              $('#add-form').trigger("reset");
          }
      });
  });

  /* edit user function */
  $('body').on('click', '.btn-edit', function () {
      console.log("edit");

      var id = $(this).data('id');
      // console.log("id ". id);

      $.ajax({
          url: "Painel/Views/Posts/Modal/Crud.php",
          type: "POST",
          data: {
              id: id,
              mode: 'edit'
          },
          dataType: 'json',
          success: function (result) {
              console.log('result ', result);
              preencherInputs(result);
              $('#cole').val(result.colecao_id);
              $('#auto').val(result.autor_id);
              $('#mini1').val(result.miniatura);
              $('#arqui1').val(result.arquivo);
              document.getElementById('miniatu').innerHTML = 'Capa';
              document.getElementById('arquivo').innerHTML = result.arquivo;
              var minia = result.miniatura;
              $('#miniatura2').attr('src', 'Painel/Imagens/' + result.miniatura);

              $('#edit-modal').modal('show');
          }
      });
  });


  function preencherInputs(result) {
      // console.log('data ', result);
      $.each(result, function (key, value) {
          var input = $('input[name="' + key + '"]');
          console.log('input ', input);
          if (input.length) {
              input.val(value);
          } else {

          }
      });
  }


  $('#uploadForm').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
//          url: 'Painel/Views/Titulos/Crud.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
              // alert('Upload bem-sucedido!');
              // Fechar o modal ou atualizar a página conforme necessário
              location.reload();
          },
          error: function (jqXHR, textStatus, errorThrown) {
              alert('Erro no upload: ' + textStatus);
          }
      });
  });
  $('#edit-modal').on('hidden.bs.modal', function () {})


  /* DELETE FUNCTION */
  $('body').on('click', '.btn-delete', function () {
      var id = $(this).data('id');
      if (confirm("Are You sure want to delete !")) {
          $.ajax({
//              url: "Painel/Views/Titulos/Crud.php",
              type: "POST",
              data: {
                  id: id,
                  mode: 'delete'
              },
              dataType: 'json',
              success: function (result) {
//                  var oTable = $('#usersListTable').dataTable();
                  oTable.fnDraw(false);
              }
          });
      }
      return false;
  });


  /* IMAGEM FUNÇÃO */
  $('body').on('click', '.btn-mini', function () {
      console.log("mini");
      var id = $(this).data('id');

      $.ajax({
//          url: "Painel/Views/Titulos/Crud.php",
          type: "POST",
          cache: 'false',
          data: {
              id: id,
              mode: 'mini'
          },
          dataType: 'json',
          success: function (result) {
              console.log("result ", result);
              var imagem = (result);
              console.log("imagem ", imagem);

              $('#miniatura').attr('src', 'Painel/Imagens/Miniatura/' + imagem);
              $('#modal_mini').modal('show');
          },
      });
  });
</script>