<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }
include "../includes/conexao.php";

$id = $_GET['id'];

mysqli_query($con, 
    "UPDATE consulta 
     SET cancelada=1, motivo_cancelamento='Cancelada pelo administrativo', notificado=0 
     WHERE id=$id");

header("Location: consultas.php");
exit;