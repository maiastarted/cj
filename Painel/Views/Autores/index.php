<?php

global $comAcentos, $artigo;
require_once 'Inicio.php';
require_once PATH_INC . "/Menu.php";

?>

<table style="width: 97%">
    <tr>
        <td style=" text-align: center;">
            <p class="nome_pagina">
                <?= mb_strtoupper($comAcentos) ?>
            </p>
        </td>
    </tr>
    <tr>
        <td style="height: -20px;">
            <a href="javascript:void(0)" class="btn bt_novo float-right add-modal">
                Nov<?= $artigo ?>
            </a>
        </td>
    </tr>
    <tr>
        <td style=" background-color:#fff;">
            <table id="usersListTable" name="usersListTable" class="table-stri000ped"
                style="width:100%;position: relative; margin-top: -10px;">
                <thead>
                    <tr>
                        <th>Nome d<?= $artigo ?> </th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Nome d<?= $artigo ?> </th>
                    <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
        </td>
    </tr>
</table>

</body>

<?php


?>

<script>
    $(document).ready(function () {
        $('#usersListTable').DataTable({
            'processing': true,
            'serverSide': true,
            'pageLength': 10,
            'bLengthChange': false,
            'bInfo': false,
            language: {
                url: '<?= $url8; ?>',
            },
            order: [],
            ajax: '<?= $url9; ?>'

        });
    });

    /*  add user model */
    $('.add-modal').click(function () {
        console.log('add-modal');
        var semAcent = '<?php echo $semAcentos; ?>';

        $.ajax({
            url: "<?= $urlcrud; ?>",
            type: "POST",
            data: {
                mode: 'add',
                semAcent: semAcent
            },
            dataType: 'json',
            success: function (result) {
                console.log("final ", result);
                var BL1 = '/?BL=' + result;
                console.log("BL ", BL1);
                window.location.href = BL1;
            }
        });
    });

    // add form submit
    $('#add-form').submit(function (e) {
        e.preventDefault();
        console.log("submit");

        // ajax
        $.ajax({
            url: "<?= $urlcrud; ?>",
            type: "POST",
            data: $(this).serialize(), // get all form field value in serialize form
            success: function () {
                var oTable = $('#usersListTable').dataTable();
                oTable.fnDraw(false);

            }
        });
    });

    /* edit user function */
    $('body').on('click', '.btn-edit', function () {

        var id = $(this).data('id');
        var semAcent = '<?php echo $semAcentos; ?>';

        $.ajax({
            url: "<?= $urlcrud; ?>",
            type: "POST",
            data: {
                id: id,
                mode: 'edit',
                semAcent: semAcent
            },
            dataType: 'json',
            success: function (result) {
                var BL1 = '/?BL=' + result;
                window.location.href = BL1;
            }
        });
    });

    // add form submit
    $('#update-form').submit(function (e) {

        e.preventDefault();
        console.log("update-form");
        // ajax
        $.ajax({
            url: "<?= $urlcrud; ?>",
            type: "POST",
            data: $(this).serialize(), // get all form field value in serialize form
            success: function () {
                var oTable = $('#usersListTable').dataTable();
                oTable.fnDraw(false);
                $('#edit-modal').modal('hide');
                $('#update-form').trigger("reset");
            }
        });
    });

    /* DELETE FUNCTION */
    $('body').on('click', '.btn-delete', function () {
        console.log("delete");

        var id = $(this).data('id');
        var semAcent = '<?php echo $semAcentos; ?>';

        $.ajax({
            url: "<?= $urlcrud; ?>",
            type: "POST",
            data: {
                id: id,
                mode: 'delete',
                semAcent: semAcent
            },
            dataType: 'json',
            success: function (result) {
                console.log("final ", result);
                var BL3 = '/?BL=' + result;
                console.log("BL3 ", BL3);
                window.location.href = BL3;
            }
        });

    });
</script>