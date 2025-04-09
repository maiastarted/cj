
<section class="content-header">
    <h1>
        <?= $comAcentos ?>
        <small>Painel de Controle - <?= SITENAME ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="Painel.php?exe=home"><i class="fa fa-dashboard"></i></a></li>
        <li><a href="Painel.php?exe=<?= $semAcentos ?>/index"><?= $comAcentos ?></a></li>
        <li><?= $execussao ?> </li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> <?= $execussao ?> de <?= $comAcentos ?></h3>
        </div>
        <form role="form" action="" method="post" name="UserCreateForm" enctype="multipart/form-data">
            <div class="box-body">
                <div class="row form-group">
                    <div class="col-md-8">
                        <label>SMTP<i class="fa fa-asterisk fa-fw" style="color: red"></i></label>
                        <input class="form-control"
                               type = "text"
                               name = "smtp"
                               value="<?php if (!empty($RegistroData['smtp'])) echo $RegistroData['smtp']; ?>"
                               title = "Informe o SMTP"
                               required
                               placeholder="SMTP" >
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-8">
                        <label>E-mail que aparece como remetente<i class="fa fa-asterisk fa-fw" style="color: red"></i></label>
                        <input class="form-control"
                               type = "text"
                               name = "email_mostrado"
                               value="<?php if (!empty($RegistroData['email_mostrado'])) echo $RegistroData['email_mostrado']; ?>"
                               title = "E-mail que aparece como remetente"
                               required
                               placeholder="E-mail que aparece como remetente" >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-8">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-8">
                        <label>E-mail de conexão<i class="fa fa-asterisk fa-fw" style="color: red"></i></label>
                        <input class="form-control"
                               type = "text"
                               name = "email"
                               value="<?php if (!empty($RegistroData['email'])) echo $RegistroData['email']; ?>"
                               title = "E-mail de conexão"
                               required
                               placeholder="E-mail de conexão" >
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-8">
                        <label>password do e-mail de conexão<i class="fa fa-asterisk fa-fw" style="color: red"></i></label>
                        <input class="form-control"
                               type = "text"
                               name = "password"
                               value="<?php if (!empty($RegistroData['password'])) echo $RegistroData['password']; ?>"
                               title = "password do e-mail de conexão"
                               required
                               placeholder="password do e-mail de conexão" >
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">
                        <label>Porta<i class="fa fa-asterisk fa-fw" style="color: red"></i></label>
                        <input class="form-control"
                               type = "text"
                               name = "porta"
                               value="<?php if (!empty($RegistroData['email_mostrado'])) echo $RegistroData['email_mostrado']; ?>"
                               title = "Porta"
                               required
                               placeholder="Porta" >
                    </div>
             
                    <div class="col-md-2">
                        <label>Autenticação<i class="fa fa-asterisk fa-fw" style="color: red"></i></label>
                           <select class="form-control" name="autenticacao" required <?= $mostrar; ?>>
                            <option value="0" <?php if ($RegistroData['autenticacao'] == '0') 
                                echo 'selected="selected"'; ?>> Não </option>
                            <option value="1" <?php if ($RegistroData['autenticacao'] == '1') 
                                echo 'selected="selected"'; ?>> Sim </option>
                        </select>
                    </div>
                    </div>
                </div>

            </div>
            <div class="box-footer">
                <div class="row form-group col-lg-12">
                    <input type="submit" name="SendPostForm" value="<?= $botaoSend ?>" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>
</section>


