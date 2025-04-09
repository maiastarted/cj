<script type="text/javascript">
    // Função para abrir o modal
    
    function abrirModal() {
        $('#modalInserir').modal('show');
    }

    function fecharModal() {
        $('#uploadForm')[0].reset();
        $('#M_Add_Post').modal('hide');
        $('#div_menssagem').html('');
        window.location.href = "/?BL=<?php echo $BLVoltar; ?>";
    }

    $('#fecharModalBtn').click(function () {
        setTimeout(fecharModal, 30);
    });

    $(document).ready(function () {
        $('#addFileButton').click(function () {
            var input = '<input type="file" class="form-control mt-2" name="arquivos[]">';
            $('#arquivos').after(input);
        });

        // Função para salvar dados e fazer upload
        $('#enviar').click(function () {
            var formData = new FormData($('#uploadForm')[0]);
            console.log('999 ' + formData);
            $('#div_menssagem').html('Post inserido com sucesso!');

            $.ajax({
                type: 'POST',
                url: 'Painel/Views/Posts/Modal/Crud.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log('Resposta completa: ', response); // Inspeciona a resposta completa
                    if (response === "1") {
                        console.log('Sucesso: ', response);
                        $('#div_menssagem').html('Post incluído no banco de Dados com sucesso!!');
                        setTimeout(fecharModal, 3000);
                        window.location.href = "/?BL=<?php echo $BLVoltar; ?>";
                    } else {
                        console.log('Erro no sucesso: ', response);
                        $('#div_menssagem').html('Ocorreu um erro, verifique os dados informados!');
                        window.location.href = "/?BL=<?php echo $BLVoltar; ?>";
                    }
                },
                error: function (xhr, status, error) {
                    console.log('Erro AJAX: ', xhr, status, error); // Inspeciona o objeto xhr
                    $('#div_menssagem').html('Erro na requisição: ' + status + ' - ' + error);
                    window.location.href = "/?BL=<?php echo $BLVoltar; ?>";
                }
            });
        });
    });

    $('#verModalBtn').click(function () {
        var url = "Painel/Views/Posts/Modal/Crud.php";

        fetch(url, {method: 'HEAD'})
            .then(response => {
                if (response.ok) {
                    console.log("O arquivo existe:", url);
                } else {
                    console.log("O arquivo não existe:", url);
                }
            })
            .catch(error => console.error("Erro ao verificar o arquivo:", error));
    });


</script>
