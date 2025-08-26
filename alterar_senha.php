<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">

    <title>Alterar Senha</title>
</head>

<body>
    <?php require_once "_parts/_menu-site.php"; ?>
    <div class="flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="card shadow rounded-3 p-3">
            <form method="post" action="dbUsuario.php" class="row">
                <div class="mb-3 col-12">
                    <label for="senhaAtual" class="form-label">Senha atual</label>
                    <input type="password" class="form-control" id="senhaAtual" placeholder="Senha atual" name="senhaAtual">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Nova Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Nova senha">
                </div>
                <div class="mb-3">
                    <label for="confirma" class="form-label">Confirma Senha</label>
                    <input type="password" class="form-control" id="confirma" name="confirma" placeholder="Confirma senha">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-dark" name="btnAltSenha">Alterar</button>
                </div>
            </form>
        </div>
</div>
    <footer class="footer mt-auto">
        <?php require_once "_parts/_footer.php"; ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>