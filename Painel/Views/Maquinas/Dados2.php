
<div class="tab-pane active" id="logos" style="margin-top: 10px;">
    <div class="row form-group">
        <div class="col-md-2">
            <a href="#" 
               class="thumbnail" 
               onclick="document.getElementById('upload1').click(); return false"><?php //echo Check::Image(FOTO_PATH . $imagem); ?></a>
        </div>
        <div class="col-md-3">
            <label>Imagem</label>
            <input class="form-control"
                   id="upload1"
                   type = "file"
                   name = "imagem" />
            <p>Tamanho Máximo/Ideal: 250 pixels x 170 pixels</p>
        </div>
    </div>

<!--    <div class="row form-group">
        <div class="col-md-2">
            <a href="#" class="thumbnail" onclick="document.getElementById('upload2').click(); return false">
                <?//= Check::Image('assLogosgr/' . $logo_grande); ?></a>
        </div>
        <div class="col-md-3">
            <label>Logo Grande</label>
            <input class="form-control"
                   id="upload2"
                   type = "file"
                   name = "logo_grande" />
            <p>Tamanho Máximo/Ideal: 564 pixels x 384 pixels</p>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-2">
            <a href="#" class="thumbnail" onclick="document.getElementById('upload3').click(); return false">
            <?//= Check::Image('assLogoTotem/' . $logo_totem); ?></a>
        </div>
        <div class="col-md-3">
            <label>Logo Totem</label>
            <input class="form-control"
                   id="upload3"
                   type = "file"
                   name = "logo_totem" />
            <p>Tamanho Máximo/Ideal: 400 pixels x 400 pixels</p>
        </div>
    </div>-->

</div> 