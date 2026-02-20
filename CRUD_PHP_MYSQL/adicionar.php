<?php
session_start();
include 'conexao.php';

$Query = mysqli_query($linha_conexao, "call BuscarProximoCodigo();");

if ($Query) {
    $produto = mysqli_fetch_assoc($Query);
    $codigoProduto = $produto["Código"];

    if ($codigoProduto == "") {
        Header("Location: erro.php");
        $_SESSION["mensagem"] = "Código não localizado!";
        $_SESSION["cor"] = "red";
        die;
    } else {
        mysqli_free_result($Query);
        mysqli_next_result($linha_conexao);
    }
} else {
    $mensagem = 'Não foi possível buscar o código!';
    $cor = 'black';
}

if (isset($_POST["botao_adicionar"])) {

    $codigoProduto = $_POST["id"];
    $nomeProduto = $_POST["nome"];
    $quantidadeProduto = $_POST["quantidade"];
    $valorProduto = $_POST["valor"];
    $valorProduto = str_replace([".", ","], ["", "."], $valorProduto);

    $Query = mysqli_query($linha_conexao, "call AdicionarProduto(" . $codigoProduto . ", " . "'$nomeProduto'" . ", " . $quantidadeProduto . ", " . $valorProduto . ");");

    if ($Query) {
        Header("Location: index.php");
        mysqli_free_result($Query);
        mysqli_next_result($linha_conexao);
        die;
    } else {
        Header("Location: erro.php");
        $_SESSION["mensagem"] = "A adição do produto de código: " . $codigoProduto . ", nome: '" . $nomeProduto . "' não foi bem sucedida!";
        $_SESSION["cor"] = "red";

    }
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images\logosite.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="css/editar.css">
    <title>Adição - Produto</title>
</head>

<body>
    <section>

        <div class="barra-navegacao-2">
            <a href="index.php" class="btn-voltar-pagina">
                <i class="fas fa-home"></i>
                <span>Página Inicial</span>
            </a>
        </div>

        <h1>Adicionar Produto</h1>
        <form method="post" action="">
            <div class="campo">
                <label for="id">ID:</label>
                <input type="number" id="id" name="id" value="<?php echo $codigoProduto ?>" readonly>
            </div>

            <div class="campo">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required value="" maxlength="255">
            </div>

            <div class="campo">
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" min="0" required value="">
            </div>

            <div class="campo">
                <label for="valor">Valor (R$):</label>
                <input type="text" id="valor" name="valor" required value="">
            </div>

            <button id="botaoAdicionar" type="submit" name="botao_adicionar">Salvar</button>
        </form>
    </section>

    <script src="js/editar_adicionar.js"></script>
</body>

</html>