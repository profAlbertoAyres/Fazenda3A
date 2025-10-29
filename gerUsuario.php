<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Gerenciar Usuário</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>
    <main class="container">
        <div class="titutlo mt-3">
            <h3>Gerenciar Usuário</h3>
        </div>
        <?php
        spl_autoload_register(function ($class) {
            require_once "classes/{$class}.class.php";
        });

        if (filter_has_var(INPUT_POST, "btnEditar")) {
            $edtUsuario = new Usuario;
            $idUsuario = intval(filter_input(INPUT_POST, "idUsuario"));
            $usuario = $edtUsuario->search("id_usuario", $idUsuario);
        }
        ?>
        <form method="post" action="dbUsuario.php" class="row g-3 mt-3">
            <input type="hidden" name="idUsuario" value="<?php echo $usuario->id_usuario ?? null; ?>">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome do usuário" required
                    class="form-control" value="<?php echo $usuario->nome ?? null; ?>">
            </div>
            <div class="col-md-6">
                <label for="nivel" class="form-label">Nível de acesso</label>
                <select name="nivel" id="nivel" class="form-select">
                    <option>Selecione o nível de acesso</option>
                    <?php
                    $niveis = [
                        1 => "Administrador",
                        2 => "Gerente",
                        3 => "Funcionário"
                    ];

                    $nivel_selecionado = $usuario->nivel_acesso ?? null;
                    foreach ($niveis as $valor => $rotulo):
                        ?>
                        <option value="<?php echo $valor ?>" <?php if ($nivel_selecionado == $valor)
                               echo 'selected' ?>>
                            <?php echo $rotulo; ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>
            <?php if (empty($idUsuario)): ?>
                <div class="col-md-6">
                    <label for="senha" class="form-label">Senha</label>
                    <div class="input-group">
                        <input type="password" id="senha" class="form-control">
                        <button type="button" id="toggleSenha" class="btn btn-outline-secondary">
                            👁️
                        </button>
                    </div>
                    <p id="forcaSenha" class="fw-bold"></p>
                    <ol id="requisitos" class="mb-3 mt-3">
                        <li id="minChar" class="invalido">Mínimo 8 caracteres</li>
                        <li id="maiuscula" class="invalido">Pelo menos uma letra maiúscula</li>
                        <li id="minuscula" class="invalido">Pelo menos uma letra minúscula</li>
                        <li id="numero" class="invalido">Pelo menos um número</li>
                        <li id="especial" class="invalido">Pelo menos um caractere especial (!@#$%^&*...)</li>
                    </ol>

                </div>
                <div class="col-md-6">
                    <label for="confirma" class="form-label">confirma</label>
                    <div class="input-group">
                        <input type="password" id="confirmar" class="form-control">
                        <button type="button" id="toggleConfirmar" class="btn btn-outline-secondary">
                            👁️
                        </button>
                    </div>
                    <small id="msgConfirmacao"></small>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" placeholder="Digite o e-mail" required class="form-control">
                </div>
            <?php endif; ?>
            <div class="col-12">
                <button type="submit" name="btnGravar" id="btnSalvar" class="btn btn-success" disabled>Gravar</button>
            </div>
        </form>
    </main>
    <?php require_once "_parts/_footer.php"; ?>
    <script src="JS/senha.js"></script>
</body>

</html>