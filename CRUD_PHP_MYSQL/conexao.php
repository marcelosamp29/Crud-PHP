<?php

$host = 'localhost';
$nome = 'root';
$senha = 'root';
$schema = 'produtos';
$porta = 3307;
$mensagem = '';
$cor = '';

$linha_conexao = mysqli_connect($host, $nome, $senha, $schema, $porta);

if (!$linha_conexao) {
    $mensagem = "Erro: " . mysqli_error($linha_conexao);
    $cor = 'red';
    die;
} else {
    $mensagem = "Sucesso! Conectado ao Banco.";
    $cor = 'green';
}

?>