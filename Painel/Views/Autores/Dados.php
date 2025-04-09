<section class="content-header">
    <div class="row">
        <div class="col-md-12" style="width: 100%"></div>

        <div class="col-md-7 op2" style="margin-left:30%;width:550px;">
            <?= $cadastro ?> de <?= $comAcentos ?>
        </div>

        <div class="col-md-1 " ></div>
        <div class="col-md-2 ">
            <div style="font-size: 1.0em;color: red;font-weight: bold;">
                <i class="fa fa-asterisk fa-fw"></i> Campos Obrigatórios
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 "></div>
    </div>
</section>

<!------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------->
<section class="content">
    <form action="" method="post" name="UserCreateForm" enctype="multipart/form-data">
        <div class="boxt">
            <div class="box-body">
                <div class="col-md-8 " style="margin-left: 10%;">
                    <?php
                    require_once 'Dados1.php';
                    ?>
                </div>

                <div class="col-md-3">
                    <div class="row" style="margin-top: 10px;"></div>
                </div>
            </div>
        </div>

        <div class='row g-0'>
            <div class='col-md-5 w-auto ms-auto'>
                <input type="submit" name="SendPostForm" value="<?= $botaoSend ?>" class="bt_interno" />

                <?php $BL = $Cript->encrypt("{$semAcentos},index,99999999999"); ?>
                <a href="/?BL=<?= $BL ?>" class="bt_interno">
                    <?= $botaoCR ?>
                </a>
              
            </div>
        </div>
    </form>
</section>