<?php
$arqui_email = PATH_VIEWS . '/Email.php';
include $arqui_email;

exit();
?>

<script type="text/javascript">
    $(function() {
        window.setInterval(function() {
            var timeCounter = $("#lblContagem").html();
            var updateTime = eval(timeCounter) - eval(1);
            $("#lblContagem").html(updateTime);

            if (updateTime == 0) {
                $("#lblContagem").html("").html("0");
                window.location = ("<?php echo $raiz ?>../");
            }
        }, 11000);

    });
</script>