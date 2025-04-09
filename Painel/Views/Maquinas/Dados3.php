<div class="tab-pane" id="descricao" style="margin-top: 10px;">

    <div class="row form-group">
        <div class="col-md-8">
            <label>Descrição Curta</label>
            <textarea 
                class="form-control"
                name = "descricaoCurta"
                rows="5"
                title = "Informe a Descrição Curta"
                ><?php if (!empty($ClienteData['descricaoCurta'])) echo htmlspecialchars($ClienteData['descricaoCurta']); ?></textarea>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-8">
            <label>Descrição Completa</label>
            <textarea 
                class="form-control"
                name = "descricao"
                rows="8"
                title = "Informe a Descrição Completa"><?php if (!empty($ClienteData['descricao'])) echo htmlspecialchars($ClienteData['descricao']); ?>
            </textarea>
        </div>
    </div>
</div>          