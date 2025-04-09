<html>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<?php
function alertaSucesso($mensagem)
{
echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Sucesso!',
        text: '$mensagem',
    });
</script>";
}
