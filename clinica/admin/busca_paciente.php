<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }
include "../includes/conexao.php";
include "header.php";

$nome = "";
$res = null;

if (!empty($_POST)) {
    $nome = $_POST['nome'];
    $res = mysqli_query($con, 
        "SELECT * FROM paciente WHERE nome LIKE '%$nome%'");
}
?>

<div class="container">
    <h2>Buscar Paciente</h2>

    <form method="POST">
        <input type="text" name="nome" placeholder="Digite parte do nome" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if ($res): ?>
    <table border="1" width="100%">
        <tr><th>Nome</th><th>Email</th></tr>
        <?php while ($p = mysqli_fetch_assoc($res)): ?>
        <tr>
            <td><?= $p['nome'] ?></td>
            <td><?= $p['email'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php endif; ?>
</div>