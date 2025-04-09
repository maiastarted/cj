<div
    class="col-xs-8 coluna_direita">
    <section
        class="content-header">
        <div
            class="row">
            <div
                class="col-md-12"
                style="width: 97%;background-color: #000;">
            </div>

            <div
                class="col-md-5 op2"
                style="margin-left:30%;width:350px;">
                <a
                    href="#"
                    class="op23">
                    <?= $cadastro ?> <?= $Lang->logar($idioma, 'de') ?> <?= $comAcentos ?>
                </a>
            </div>

            <div
                class="col-md-3 ">
            </div>
            <div
                class="col-md-2 ">
                <div
                    style="font-size: 1.0em;color: red; font-weight: bold;">
                    <i
                        class="fa fa-asterisk fa-fw">
                    </i>
                    <?= $cadastro ?> <?= $Lang->logar($idioma, 'campos_obrigado') ?>
                </div>
            </div>
        </div>
        <div
            class="row">
            <div
                class="col-md-12 ">
            </div>
        </div>
    </section>

    <!------------------------------------------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------------------------------------------>

    <section 
    class="content">
        <form 
        action="" 
        method="post" 
        name="UserCreateForm" 
        enctype="multipart/form-data">
            <div 
            class="boxt">
                <div 
                class="box-body">
                    <div 
                    class="col-md-12 ">
                        <?php
                        require_once  PATH_VIEWS . '/Usuarios/Dados1.php';
                        require_once  PATH_VIEWS . '/Usuarios/dados2.php';
                        require_once  PATH_VIEWS . '/Usuarios/dados3.php';
                        require_once  PATH_VIEWS . '/Usuarios/dados4.php';
                        ?>
                    </div>

                    <div 
                    class="col-md-3">
                        <div 
                        class="row" s
                        tyle="margin-top: 10px;"></div>
                    </div>
                </div>
            </div>
            <div 
            class='row g-0'>
                <div 
                class='col-md-5 w-auto ms-auto'>
                    <button 
                    class="btn btn-primary btn-sm">
                        <input 
                        type="submit" 
                        name="SendPostForm" 
                        value="<?=$Lang->logar($idioma, 'cadastrar') ?>"
                        class="btn btn-primary font_bold" />
                    </button>
                </div>
            </div>
        </form>
    </section>
</div>