<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }
include "../includes/conexao.php";
include "header.php";

$sql = "SELECT consulta.*, 
               paciente.nome AS paciente,
               medico.nome AS medico,
               especialidade.nome AS esp
        FROM consulta
        JOIN paciente ON consulta.paciente_id=paciente.id
        JOIN medico ON consulta.medico_id=medico.id
        JOIN especialidade ON medico.especialidade_id=especialidade.id
        ORDER BY data DESC, hora DESC";

$res = mysqli_query($con, $sql);
?>

<div class="container">
    <h2>Consultas Agendadas</h2>

    <table border="1" width="100%">
        <tr>
            <th>Data</th><th>Hora</th>
            <th>Paciente</th>
            <th>Médico</th>
            <th>Especialidade</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>

        <?php while ($c = mysqli_fetch_assoc($res)): ?>
        <tr>
            <td><?= $c['data'] ?></td>
            <td><?= $c['hora'] ?></td>
            <td><?= $c['paciente'] ?></td>
            <td><?= $c['medico'] ?></td>
            <td><?= $c['esp'] ?></td>
            <td>
                <?= $c['cancelada'] ? "<b style='color:red;'>Cancelada</b>" : "Ativa" ?>
            </td>
            <td>
                <?php if (!$c['cancelada']): ?>
                    <a href="cancelar.php?id=<?= $c['id'] ?>">Cancelar</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>