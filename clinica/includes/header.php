<header>
    <h1>Clínica Vida Saúde</h1>
    <nav>
        <a href="index.php">Início</a>
        <?php if (isset($_SESSION['id'])): ?>
            <a href="agendar.php">Agendar Consulta</a>
            <a href="minhas_consultas.php">Minhas Consultas</a>
            <a href="logout.php">Sair</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="cadastrar.php">Cadastrar</a>
        <?php endif; ?>
    </nav>
</header>
<link rel="stylesheet" href="css/estilo.css">
