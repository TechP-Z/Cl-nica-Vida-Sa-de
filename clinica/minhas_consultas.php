<?php
session_start();
include "includes/conexao.php";
if (!isset($_SESSION['id'])) { header("Location: login.php"); exit; }

$id = $_SESSION['id'];

$sql = "SELECT consulta.data, consulta.hora, medico.nome AS medico, especialidade.nome AS esp
        FROM consulta 
        JOIN medico ON consulta.medico_id = medico.id
        JOIN especialidade ON medico.especialidade_id = especialidade.id
        WHERE paciente_id = $id
        ORDER BY data DESC, hora DESC";

$res = mysqli_query($con, $sql);
?>

<?php include "includes/header.php"; ?>

<div class="container">
    <h2>Minhas Consultas</h2>

    <table border="1" width="100%">
        <tr>
            <th>Data</th>
            <th>Hora</th>
            <th>Médico</th>
            <th>Especialidade</th>
        </tr>

        <?php while ($c = mysqli_fetch_assoc($res)): ?>
            <tr>
                <td><?= $c['data'] ?></td>
                <td><?= $c['hora'] ?></td>
                <td><?= $c['medico'] ?></td>
                <td><?= $c['esp'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>