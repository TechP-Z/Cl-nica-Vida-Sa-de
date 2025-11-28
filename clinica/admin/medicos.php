<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }
include "../includes/conexao.php";
include "header.php";

$msg = "";

// Cadastrar médico
if (!empty($_POST)) {
    $nome = $_POST['nome'];
    $esp = $_POST['especialidade'];

    $sql = "INSERT INTO medico (nome, especialidade_id) VALUES ('$nome', $esp)";

    if (mysqli_query($con, $sql)) {
        $msg = "Médico cadastrado!";
    } else {
        $msg = "Erro: " . mysqli_error($con);
    }
}

// Carregar especialidades
$esps = mysqli_query($con, "SELECT * FROM especialidade");

// Carregar médicos
$meds = mysqli_query($con, "SELECT medico.*, especialidade.nome AS esp 
                            FROM medico 
                            JOIN especialidade ON medico.especialidade_id=especialidade.id");
?>

<div class="container">
    <h2>Médicos</h2>

    <form method="POST">
        <input type="text" name="nome" placeholder="Nome do médico" required>
        <select name="especialidade" required>
            <?php while ($e = mysqli_fetch_assoc($esps)): ?>
                <option value="<?= $e['id'] ?>"><?= $e['nome'] ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Cadastrar</button>
    </form>

    <p><?= $msg ?></p>

    <h3>Lista de Médicos</h3>
    <table border="1" width="100%">
        <tr><th>Nome</th><th>Especialidade</th></tr>
        <?php while ($m = mysqli_fetch_assoc($meds)): ?>
        <tr>
            <td><?= $m['nome'] ?></td>
            <td><?= $m['esp'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
