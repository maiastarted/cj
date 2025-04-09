<script type="text/javascript">

    // Modal control
    var modal = document.getElementById("M_Add_Post");
    var botaoFechar = document.getElementById("fecharModalBtn");
    var inputs = modal.querySelectorAll("input, textarea");

    function fecharModal() {
        modal.style.display = "none";
        inputs.forEach(input => input.value = "");
    }

    // Adiciona um ouvinte de evento ao botão de fechar
    botaoFechar.onclick = fecharModal;


    // Exibir modal ao clicar no botão
    document.getElementById('uploadBtn').addEventListener('click', function () {
        document.getElementById('M_Add_Post').style.display = 'block';
    });

    // Adicionar mais campos de arquivo
    document.getElementById('addFileButton').addEventListener('click', function () {
        var newFileInput = document.createElement('input');
        newFileInput.type = 'file';
        newFileInput.name = 'files[]';
        newFileInput.accept = 'video/*,image/*';
        document.getElementById('fileInputsContainer').appendChild(newFileInput);
    });

    // Enviar arquivos via AJAX
    document.getElementById('uploadForm').addEventListener('submit', function (e) {
        e.preventDefault(); // Impede o envio padrão do formulário

        var formData = new FormData(this); // Cria o FormData com todos os arquivos selecionados
        var url = "Painel/Views/Posts/Modal/Crud.php";

        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true); // Envia para o script PHP

        // Exibir progresso do upload (opcional)
        xhr.upload.onprogress = function (e) {
            if (e.lengthComputable) {
                var percent = (e.loaded / e.total) * 100;
                console.log('Progresso: ' + percent + '%');
            }
        };

        // Quando o upload terminar
        xhr.onload = function () {
            if (xhr.status === 200) {

                // Lidar com a resposta do servidor (miniaturas geradas)
                var response = JSON.parse(xhr.responseText);
                console.log('response + ' + response);
                if (response && response.success) {
                    console.log('deu certo');
                } else {
                    console.warn('O campo "success" não é verdadeiro:', response.success);
                }
                if (response.succeooooss) {
                    console.error('deu certo');
                    modal.style.display = "none";
                    inputs.forEach(input => input.value = "");
                    // response.thumbnails.forEach(function (thumbnail) {
                       
                        // var img = document.createElement('img');
                        // img.src = thumbnail;
                        // img.style.width = '200px';
                        // img.style.height = '200px';
                        // document.getElementById('thumbnailPreview').appendChild(img);
                      
                    // });
                }
                if (response.erro) {
                    alert('sssssssss');
                    document.getElementById("div_menssagem").innerHTML = "Ocorreu um erro, revise o preenchimento!";
                    console.error('Ocorreu um erro, revise o preenchimento');
                }
            } else {
                console.error('Erro no upload');
            }
        };

        xhr.send(formData); // Envia os arquivos para o servidor
    });

</script>