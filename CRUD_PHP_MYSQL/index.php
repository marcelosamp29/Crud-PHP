<?php
include 'conexao.php';

$mensagem = "Não há produtos a serem listados.";
$cor = "black";
$Query = mysqli_query($linha_conexao, "call ListarProdutos();");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images\logosite.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>CRUD - PHP</title>
</head>

<body>
    <section>
        <header class="divAdicionar">
            <h1>Tabela de Preços</h1>

            <a href="adicionar.php">
                <i class="fa-solid fa-plus"></i> Adicionar
            </a>
        </header>

        <div class="scroll-table">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                    <td>1</td>
                    <td>Coca-Cola 2L</td>
                    <td>10</td>
                    <td>15,00</td>
                    <td class="Editar">
                        <a href="editar.php">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </td>
                    <td class="Excluir">
                        <a href="excluir.php">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr> -->

                    <?php
                    if ($Query) {
                        while ($produto = mysqli_fetch_assoc($Query)) {

                            $mensagem = "";

                            echo '<tr>';
                            echo '<td>' . $produto["Código"] . '</td>';
                            echo '<td>' . $produto["Produto"] . '</td>';
                            echo '<td>' . $produto["Quantidade"] . '</td>';
                            echo '<td class="valor">' . $produto["Preço"] . '</td>';
                            echo '<td class="Editar">
                                    <a href="editar.php?codigo=' . $produto["Código"] . '">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </td>';
                            echo '<td class="Excluir">
                                    <a href="excluir.php?codigo=' . $produto["Código"] . '">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>';
                            echo '</tr>';
                        }
                    } else {
                        $mensagem = 'Não foi possível listar os produtos!';
                        $cor = 'black';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <p style="text-align:center; margin-top: 30px; font-weight: bold; color:<?php echo $cor ?>">
            <?php echo $mensagem ?>
        </p>
    </section>

    <script src="js/index.js"></script>
</body>

</html>