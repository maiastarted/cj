<div class="tab-paned active" id="assinante" style="margin-top: 10px;">

    <div class="row form-group">
        <div class="col-md-8 dados1">
            <label>Nome d<?= $artigo ?> <i style="color: red">*</i></label>
            <input class="form-control font_bold"
                   type = "text"
                   name = "nome"
                   value="<?php if (!empty($RegistroData['nome'])) echo $RegistroData['nome']; ?>"
                   title = "Informe o Nome d<?= $artigo ?>"
                   required
                   placeholder="Nome d<?= $artigo ?>" >

            <input 
                type = "hidden"
                name = "id"
                value="<?php if (!empty($RegistroData['id'])) echo $RegistroData['id']; ?>"
                >

            <input type = "hidden"
                   name = "nome_velho"
                   value="<?php if (!empty($RegistroData['nome'])) echo $RegistroData['nome']; ?>"
                   >
        </div>

        <div class="col-md-8 dados1">
            <label>Email d<?= $artigo ?> <i style="color: red">*</i></label>
            <input class="form-control font_bold"
                   type = "text"
                   name = "email"
                   value="<?php if (!empty($RegistroData['email'])) echo $RegistroData['email']; ?>"
                   title = "Informe o email d<?= $artigo ?>"
                   placeholder="Email d<?= $artigo ?>" >
        </div>

        <div class="row  dados1" style="background-color: #EAEAEA">
            <div class="col-md-6" style="background-color: #EAEAEA">
                <label>password d<?= $artigo ?> </label>
                <input class="form-control font_bold"
                       type = "password"
                       name = "password"
                       value=""
                       placeholder="password d<?= $artigo ?>" >

                <input 
                    type = "hidden"
                    name = "password_antiga"
                    value="<?php if (!empty($RegistroData['password'])) echo $RegistroData['password']; ?>"
                    >
            </div>

            <div class="col-md-6">
                <label>Confirmação de password d<?= $artigo ?> </label>
                <input class="form-control font_bold"
                       type = "password"
                       name = "password_conf"
                       value=""
                       title = "Informe novamente a password d<?= $artigo ?>"
                       placeholder="password de confirmação" >
            </div>
            <div style="font-size: 1.0em;color: red;font-weight: bold;">
                <?php echo $aviso_password; ?> 
            </div>   
        </div>
    </div>       
</div>       


