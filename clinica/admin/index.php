<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }
include "header.php";
?>
<div class="container">
    <h2>Bem-vindo, <?= $_SESSION['admin_nome'] ?>!</h2>
    <p>Selecione uma opção no menu acima.</p>
</div>