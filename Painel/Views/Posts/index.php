<?php
    require('Inicio.php');
    require_once(PATH_INC . "/Menu.php");
?>
<section class="content-header">
    <div class="row">
        <div class="col-md-12 "></div>

        <div class="col-md-7">
            <h1>
                <?= $comAcentos ?>
            </h1>
        </div>
        <?php
            require_once("Dados.php");
        ?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <?php
            $BL = $Cript->encrypt("{$semAcentos},Create,1111",TEXTO_CHAVE);
        ?>
        <div class="col-md-5" style="text-align: right; margin-top:8px;">
            <a href="/?BL=<?= $BL ?>"
               title="Cadastrar <?= $comAcento ?>"
               class="btn  bt_novo">
                Nov<?= $artigo ?>
            </a>
        </div>
    </div>
</section>

<section style=" width: 100%; text-align: center;padding-top: 10px;">
    <table class="cell-border compact stripe" id="<?= $semAcentos ?>Table">
        <thead>
        <tr>
            <th> Nome</th>
            <th> Títulos</th>
            th> Ações </th>
        </tr>
        </thead>
    </table>
</section>


<script type="text/javascript">
    $(function () {

        $('#<?= $semAcentos ?>Table').DataTable({
            "processing": false,
            "serverSide": true,
            "language": {
                "url": "Painel/Assets/JS/Portuguese-Brasil.json"
            },
            "ajax": {
                url: "<?= $url ?>",
                type: "post",
                error: function (jqXHR, exception) {
                    $(".<?= $semAcentos ?>Table-grid-error").html("");
                    $("#<?= $semAcentos ?>Table").append('<tbody class="<?= $semAcentos ?>Table-grid-error"><tr><th colspan="6">Ocorreu um erro ao executar a consulta</th></tr></tbody>');
                }
            },
            "columns": [{
                "data": "nome",
                "class": "text-center"
            },
                {
                    "data": "titulos",
                    "orderable": false,
                    "class": "text-center",
                    "width": '5%'
                },
                {
                    "data": "acoes",
                    "orderable": false,
                    "class": "text-center",
                    "width": '20%'
                }
            ]
        });
    });
</script>