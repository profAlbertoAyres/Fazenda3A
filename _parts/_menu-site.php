<?php

$arquivo = basename($_SERVER['SCRIPT_NAME'], '.php');

?>

<nav class="navbar navbar-expand-lg fixed-top nav-custom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Fazenda Boi Gordo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#historia">História</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#animais">Animais</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#nutricao">Nutrição</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#contato">Contato</a></li>
      </ul>
      <ul class="navbar-nav">
        <?php

        if (session_status() === PHP_SESSION_NONE) {
          session_start();
        }
        if (isset($_SESSION['user_name'])): ?>
          <!-- Usuário Logado -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <?php echo htmlspecialchars($_SESSION['user_name']); ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><a class="dropdown-item text-danger" href="dashboard.php">Dashboard</a></li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-danger" href="logout.php">Sair</a></li>
            </ul>
          </li>
        <?php else: ?>
          <!-- Usuário Não Logado -->
          <li class="nav-item">
            <a class="nav-link" href="login.php"><i class="bi bi-person-circle"></i> Entrar</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>