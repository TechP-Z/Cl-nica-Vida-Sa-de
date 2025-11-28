<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "clinica";

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Erro na conexão: " . mysqli_connect_error());
}

mysqli_set_charset($con, "utf8");
?>