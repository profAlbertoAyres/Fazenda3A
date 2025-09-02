<nav class="navbar navbar-expand-lg nav-custom" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler ms-auto text-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi bi-list fs-2 text-light "></i>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Atividades">Atividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Estutura">Nossa Estrutura</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Contato">Contato</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php 
                    if(session_status()=== PHP_SESSION_NONE){
                        session_start();
                    }
                    if(isset($_SESSION['user_id'])):
                    ?>
                    <!-- Usuário Logado -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                    echo $_SESSION['user_name']
                                ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" arial-labelledby="userDropdown">
                                <li>
                                    <a href="dashboard.php" class="dropdown-item">Painel de Controle</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a href="alterar_senha.php" class="dropdown-item">Alterar Senha</a>
                                </li>
                                <li>
                                    <a href="alterar_email.php" class="dropdown-item">Alterar E-mail</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a href="logout.php" class="dropdown-item">Sair</a>
                                </li>
                            </ul>
                        </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="login.php" class="nav-link">
                                    <i class="bi bi-person-circle"></i> Entrar</a>
                            </li>
                        <?php endif; ?>
                    </ul>
            </div>
        </div>
    </nav>