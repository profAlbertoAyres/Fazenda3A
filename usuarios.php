<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Usuários</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>
    <main class="container mt-3">
        <div class="mt-3">
            <h3>Usuários</h3>
        </div>
        <div class="mb-3 mt-3">
            <a href="gerUsuario.php" class="btn btn-outline-success"><i class="bi bi-plus-circle"></i> Novo Usuário</a>
        </div>
        <table class="table">
            <thead>
                <tr class="table-secondary table-striped table-hover">
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Nível</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>

                <!-- Código php para spl_autoload_register -->
                <?php
                spl_autoload_register(function ($class) {
                    require_once "classes/{$class}.class.php";
                });
                $usu = new Usuario();
                $usuarios = $usu->sp_exibir('exibir_usuarios()');
                foreach ($usuarios as $usuario):
                    ?>
                    <tr>
                        <td scope="row" class="text-center"><?php echo $usuario->id_usuario ?></td>
                        <td><?php echo $usuario->nome ?></td>
                        <td><?php echo $usuario->nivel ?></td>
                        <td class="d-flex justify-content-center gap-1">
                            <form action="<?php echo htmlspecialchars("gerUsuario.php") ?>" method="post" class="d-flex">
                                <input type="hidden" name="idUsuario" value="<?php echo $usuario->id_usuario ?>">
                                <button name="btnEditar" class="btn btn-primary btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja editar o usuário?');">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>
                            <form action="<?php echo htmlspecialchars("dbUsuario.php") ?>" method="post" class="d-flex">
                                <input type="hidden" name="idUsuario" value="<?php echo $usuario->id_usuario ?>">
                                <button name="btnDeletar" class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja deletar o usuário?');">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
    <?php require_once "_parts/_footer.php"; ?>
</body>

</html>