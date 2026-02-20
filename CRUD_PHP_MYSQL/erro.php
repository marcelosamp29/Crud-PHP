<?php
session_start();
$mensagem = $_SESSION["mensagem"] ?? "Sem mensagem de erro!";
$cor = $_SESSION["cor"] ?? "#a3a39c";

unset($_SESSION["mensagem"], $_SESSION["cor"]);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images\logosite.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="css/erro.css">
    <title>Erro - Produto</title>
</head>

<body>
    <section>

        <div class="barra-navegacao-2">
            <a href="index.php" class="btn-voltar-pagina">
                <i class="fas fa-home"></i>
                <span>Página Inicial</span>
            </a>
        </div>

        <h1>Página de Erro</h1>

        <p
            style="text-align:center; margin-top: 30px; margin-bottom: 30px; font-weight: bold; color:<?php echo $cor ?>">
            <?php echo $mensagem ?>
        </p>
    </section>
</body>

</html>