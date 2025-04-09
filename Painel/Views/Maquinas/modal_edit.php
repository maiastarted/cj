<!-- ---------------------------------------------------------- -->
<div class="modal" id="edit-8modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="userCrudModal"></h4>
            </div>
            <div class="modal-body">

                <form id="uploadForm" method="POST" enctype="multipart/form-data">
                    <div class="form-group"></div>
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="mini1" id="mini1">
                    <input type="hidden" name="arqui1" id="arqui1">
                    <input type="hidden" id="mode" name="mode" value="update">


                    <label for="name" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-12">
                        <input type="text" id="nome" name="nome">
                    </div>
                    <?php //---------------------------------------------------------
                    ?>
                    <label for="name" class="col-sm-2 control-label">Coleção</label>

                    <select class="form-control" id="cole" name="cole">
                        <option disabled="disabled" selected="selected">Selecione a coleção</option>
                        <?php

                        $result = $mysqli->query("SELECT id, nome FROM colecoes ");

                        while ($exibe = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$exibe['id']}' ";
                            echo 'selected="selected">';
                            echo "{$exibe['nome']}";
                            echo " </option>";
                        }

                        ?>
                    </select>
                    <?php //-----------------------------------------------------                
                    ?>
                    <label for="name" class="col-sm-2 control-label">Autor</label>

                    <select class="form-control" id="auto" name="auto">
                        <option disabled="disabled" selected="selected">Selecione o Autor</option>
                        <?php

                        $result = $mysqli->query("SELECT id, nome FROM autores ");

                        while ($exibe = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$exibe['id']}' ";
                            echo 'selected="selected">';
                            echo "{$exibe['id']} - ";
                            echo "{$exibe['nome']}";
                            echo " </option>";
                        }

                        ?>
                    </select>
                    <?php //---------------------------------------------------------
                    ?>
                    <br><br>
                    <img id="miniatura2" width="60">
                    <label class="custom-file-label" id="miniatu"></label>

                    <!-- <input type="file" class="form-control custom-file-input" id="miniatura1" name="miniatura1" accept="image/*"> -->
                    <br><br>
                    <label class="custom-file-label" for="arquivo" id="arquivo"></label>
                    <br>
                    <input type="file" name="pdfFile" id="pdfFile" accept="application/pdf*">



                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn bt_novo submitBtn" id='btn_upload' value="create">
                            Gravar
                        </button>
                        <button type="button" class="btn bt_novo" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer"></div>
</div>