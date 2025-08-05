<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Animais</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php" ?>
    </header>
    <main class="container mt-3">
        <div class="mt-3 mb-3">
            <a href="gerAnimal.php" class="btn btn-outline-success"><i class="bi bi-plus-circle"></i> Novo Animal</a>
        </div>
        <table class="table table-striped table-primary table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">#</th>
                    <th>Identificador</th>
                    <th>Mãe</th>
                    <th>Raça</th>
                    <th>Lote</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
            spl_autoload_register(function ($class) {
                require_once "classes/{$class}.class.php";
            });

            $o_animal = new Animal();
            // Variável para receber os registros do banco de dados
            $animais = $o_animal->all();
            ?>
            <tbody>
                <?php
                foreach ($animais as $animal):
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $animal->id_animal; ?></td>
                        <td><?php echo $animal->identificador; ?></td>
                        <td><?php echo $animal->id_mae; ?></td>
                        <td><?php echo $animal->id_raca; ?></td>
                        <td><?php echo $animal->id_lote; ?></td>
                        <td>
                            <form action="gerAnimal.php" method="post">
                                <input type="hidden" name="idAnimal">
                                <button type="submit" name="btnEditar" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php
                endforeach
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <?php require_once "_parts/_footer.php" ?>

    </footer>
</body>

</html>