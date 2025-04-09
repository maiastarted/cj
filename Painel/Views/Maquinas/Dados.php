<hr style="margin-top:1px;">

<div class="col-md-12 ">

    <div class="col-md-3"> </div>

    <div class="col-md-2 ">   </div>

    <div class="col-md-3 op2" style="width:250px;">
        <a href="#" class="op23"> 
            <?= $cadastro ?> de <?= $comAcentos ?>
        </a>
    </div>
    <div class="col-md-2 "></div>
    <div class="col-md-2 ">
        <div style="font-size: 1.0em;color: red;    font-weight: bold;">
            <i class="fa fa-asterisk fa-fw"></i> Campos Obrigatórios
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------------------------------------------------->
<section class="content">
    <div class="boxt">
        <form action = "" method = "post" name="UserCreateForm" enctype="multipart/form-data">

        <div class="box-body">

                 <div class="col-md-12 ">
                    <div class="col-md-3"> 
                        <?php
                        require_once 'Dados2.php';
                        ?>
                    </div>

                    <div class="col-md-8 ">   
                        <?php
                        require_once 'Dados1.php';

                        require_once 'Dados3.php';
                        //require_once 'Dados4.php'; 
                        // require_once 'Dados5.php'; 
                        // require_once 'Dados6.php'; 
                        ?>

                    </div>
                </div>

                <div class="col-md-3"> 
                    <div class="row"  style="margin-top: 10px;"></div>
                </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="row form-group col-lg-12">
            <span class="icon-input-btn">
                <span class="fa fa-hdd-o"></span>
                <input type="submit" name="SendPostForm" value="<?= $botaoSend ?>" class="btn btn-primary" />
            </span>
            <a href="Painel.php?exe=Pessoas/index&tipoPessoa1=" class="btn btn-danger">
                <i class=""></i> <?= $botaoCR ?>
            </a>
        </div>
        </form>
    </div>
</section>