<?php
session_start();
include "includes/conexao.php";

$msg = "";

if (!empty($_POST)) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $sql = "INSERT INTO paciente (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if (mysqli_query($con, $sql)) {
        $msg = "Cadastro realizado com sucesso!";
    } else {
        $msg = "Erro: " . mysqli_error($con);
    }
}
?>

<?php include "includes/header.php"; ?>

<div class="container">
    <h2>Cadastrar Paciente</h2>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Cadastrar</button>
    </form>
    <p><?= $msg ?></p>
</div>
