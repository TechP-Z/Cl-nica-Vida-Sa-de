<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }
include "../includes/conexao.php";
include "header.php";

$msg = "";

if (!empty($_POST)) {
    $nome = $_POST['nome'];
    $sql = "INSERT INTO especialidade(nome) VALUES('$nome')";
    
    if (mysqli_query($con, $sql)) {
        $msg = "Especialidade cadastrada!";
    } else {
        $msg = "Erro: " . mysqli_error($con);
    }
}

$res = mysqli_query($con, "SELECT * FROM especialidade");
?>

<div class="container">
    <h2>Especialidades</h2>

    <form method="POST">
        <input type="text" name="nome" placeholder="Nome da especialidade" required>
        <button type="submit">Cadastrar</button>
    </form>

    <p><?= $msg ?></p>

    <table border="1" width="100%">
        <tr><th>Nome</th></tr>
        <?php while ($r = mysqli_fetch_assoc($res)): ?>
            <tr><td><?= $r['nome'] ?></td></tr>
        <?php endwhile; ?>
    </table>
</div>
