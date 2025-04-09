<div class="tab-pane active" id="assinante" style="margin-top: 10px;">

    <div class="row form-group">
        <div class="col-md-8">
            <label><?= $comAcento ?> <i style="color: red">*</i></label>
            <input class="form-control"
                   type = "text"
                   name = "nome"
                   value="<?php if (!empty($Registro_Data['nome'])) echo $Registro_Data['nome']; ?>"
                   title = "Informe o Nome d<?= $artigo ?>"
                   required
                   placeholder="Nome d<?= $artigo ?>" >
            <input type = "hidden"
                   name = "nome_velho"
                   value="<?php if (!empty($Registro_Data['nome'])) echo $Registro_Data['nome']; ?>"
                   >
        </div>
    </div>       
</div>       

