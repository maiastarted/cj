<form action="" method="post" name="UserCreateForm" enctype="multipart/form-data">
    <div class="col-12 ">
        <?php
            require_once 'Dados1.php';
            require_once 'Dados2.php';
            require_once 'Dados3.php';
            require_once 'Dados4.php';
        ?>
    </div>

    <div class="col-12">
        <div class="row">
            <div class="col-2">
                <input type="submit" name="SendPostForm" value="<?= $botaoSend ?>"
                       class="button font_bold">
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</form>

