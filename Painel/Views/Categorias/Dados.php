<section class="content-header">
    <hr style="margin-top:1px;">
    <div class="row">
        <div class="col-md-12" style="width: 97%;background-color: #000;"></div>


        <div class="col-md-5 op2" style="margin-left:30%;width:350px;">
            <a href="#" class="op23">
                <?= $cadastro ?> de <?= $comAcentos ?>
            </a>
        </div>

        <div class="col-md-3 "></div>
        <div class="col-md-2 ">
            <div style="font-size: 1.0em;color: red;    font-weight: bold;">
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
                <div class="col-md-8 ">
                    <?php
                    require_once 'Dados1.php';

                    //  require_once 'dados3.php';
                    //require_once 'dados4.php'; 
                    // require_once 'dados5.php'; 
                    // require_once 'dados6.php'; 
                    ?>
                </div>

                <div class="col-md-3">
                    <div class="row" style="margin-top: 10px;"></div>
                </div>
            </div>
        </div>
        <div class='row g-0'>
            <div class='col-md-5 w-auto ms-auto'>
                <button class="btn btn-primary btn-sm">
                    <input type="submit" name="SendPostForm" value="<?= $botaoSend ?>" class="btn btn-primary font_bold" />
                </button>
                <button class="btn btn-danger btn-sm">
                    <?php $BL = $Cript->encrypt($semAcentos . ",index," . $id); ?>
                    <a href="/?BL=<?= $BL ?>" class="btn btn-danger font_bold">
                        <?= $botaoCR ?>
                    </a>
                </button>
            </div>
        </div>

    </form>
</section>