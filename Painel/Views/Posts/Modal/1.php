<?php
    session_start();
    include_once $_SESSION['path_classe_Models'] . "/Criptografia.class.php";
    include_once $_SESSION['path_classe_Models'] . "/Admin_Posts.class.php";
    include_once $_SESSION['caminho_config1'];
    $endere3 = $_SESSION['caminho_config1'];
    $endere4 = $_SESSION['origem_disco_SITE'];
    $endere5 = $_SESSION['PATH'];
    $endere6 = $_SESSION['origem_disco_SITE'] . '/Painel/Assets/Inc/Erros.php';
    include_once $endere6;
    ?>
<!--<html>-->


<!--<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">-->
<body>
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
    
    // Seu código PHP que gera o conteúdo da página
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<?php
    alertaSucesso('Entrou.');
?>
</body>
</html>
  
    <?php
//    function alertaSucesso($mensagem) {
//
//        echo "<script>
//          Swal.fire({
//            icon: 'success',
//            title: 'Sucesso!',
//            text: '$mensagem',
//          });
//        </script>";
//    }
    
    alertaSucesso('Entrou.');
    
    
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

</html>