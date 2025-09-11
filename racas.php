<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Raças</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>
    <main class="container mt-3">
        <div class="mt-3">
            <h3>Raças</h3>
        </div>
        <div class="mt-3 mb-3">
            <a href="gerRaca.php" class="btn btn-outline-success">Nova raça</a>
        </div>
        <table class="table">
            <thead class="table-secondary">
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">Raça</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "classes/{$class}.class.php";
                });
                $r = new Raca();
                $racas = $r->all();
                foreach ($racas as $raca):
                    ?>
                    <tr>
                        <td><?php echo $raca->id_raca ?></td>
                        <td><?php echo $raca->nome ?></td>
                        <td class="d-flex gap-1 justify-content-center">
                            <form action="<?php echo htmlspecialchars("gerRaca.php") ?>" method="post" class="d-flex">
                                <input type="hidden" name="idRaca" value="<?php echo $raca->id_raca ?>"><button
                                    name="btnEditar" class="btn btn-primary btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja editar a raça?');"><i
                                        class="bi bi-pencil-square"></i>
                                </button>
                            </form>
                            <form action="<?php echo htmlspecialchars("dbRaca.php") ?>" method="post" class="d-flex">
                                <input type="hidden" name="idRaca" value="<?php echo $raca->id_raca ?>"><button
                                    name="btnDeletar" class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja deletar a raça?');"><i
                                        class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

    <?php require_once "_parts/_footer.php"; ?>
</body>

</html>