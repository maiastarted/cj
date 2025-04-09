<script type="text/javascript">
    var bfr = '';
    setInterval(function () {
        // alert("alert");
        fetch(window.location).then((response) => {
            return response.text();
        }).then(r => {
            if (bfr != '' && bfr != r) {
                window.location.reload();
            }
            else {
                bfr = r;
            }
        });
    }, 500); 
</script>



