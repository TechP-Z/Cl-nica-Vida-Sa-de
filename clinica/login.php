<?php
session_start();
include "includes/conexao.php";

$msg = "";

if (!empty($_POST)) {
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM paciente WHERE email='$email' AND senha='$senha'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) == 1) {
        $u = mysqli_fetch_assoc($res);
        $_SESSION['id'] = $u['id'];
        $_SESSION['nome'] = $u['nome'];
        header("Location: index.php");
    } else {
        $msg = "Usuário ou senha incorretos!";
    }
}
?>

<?php include "includes/header.php"; ?>

<div class="container">
    <h2>Login</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
    <p><?= $msg ?></p>
</div>