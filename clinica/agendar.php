<?php
session_start();
include "includes/conexao.php";
if (!isset($_SESSION['id'])) { header("Location: login.php"); exit; }

$msg = "";

// Carrega médicos
$medicos = mysqli_query($con, "SELECT medico.id, medico.nome, especialidade.nome AS esp 
    FROM medico JOIN especialidade ON medico.especialidade_id = especialidade.id");

if (!empty($_POST)) {
    $paciente_id = $_SESSION['id'];
    $medico_id = $_POST['medico'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];

    // Verificação manual extra (opcional)
    $check = mysqli_query($con, 
        "SELECT * FROM consulta WHERE medico_id=$medico_id AND data='$data' AND hora='$hora'"
    );

    $check2 = mysqli_query($con, 
        "SELECT * FROM consulta WHERE paciente_id=$paciente_id AND data='$data' AND hora='$hora'"
    );

    if (mysqli_num_rows($check) > 0) {
        $msg = "Este horário já está ocupado para este médico.";
    } elseif (mysqli_num_rows($check2) > 0) {
        $msg = "Você já possui uma consulta nesse horário.";
    } else {
        $sql = "INSERT INTO consulta (paciente_id, medico_id, data, hora) 
                VALUES ($paciente_id, $medico_id, '$data', '$hora')";

        if (mysqli_query($con, $sql)) {
            $msg = "Consulta agendada com sucesso!";
        } else {
            $msg = "Erro: " . mysqli_error($con);
        }
    }
}
?>

<?php include "includes/header.php"; ?>

<div class="container">
    <h2>Agendar Consulta</h2>

    <form method="POST">
        <select name="medico" required>
            <option value="">Selecione o médico</option>
            <?php while ($m = mysqli_fetch_assoc($medicos)): ?>
                <option value="<?= $m['id'] ?>"><?= $m['nome'] ?> - <?= $m['esp'] ?></option>
            <?php endwhile; ?>
        </select>

        <input type="date" name="data" required>
        <input type="time" name="hora" required>

        <button type="submit">Agendar</button>
    </form>

    <p><?= $msg ?></p>
</div>
