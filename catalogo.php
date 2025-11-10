<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseSite.css">
    <title>Nossos Animais</title>
</head>

<body>
    <?php
    require_once "_parts/_menu-site.php";
    ?>
    <main class="container mt-5">
        <h2 class="text-center mb-5">Nossos Animais</h2>
        <div class="d-flex gap-4 justify-content-center flex-wrap">
            <?php
            spl_autoload_register(function ($class) {
                require_once "classes/{$class}.class.php";
            });
            $animal = new Animal();
            $foto = new FotoAnimal();
            $animais = $animal->sp_exibir('exibir_animais()');
            foreach ($animais as $anm):#Inicia o laço
                ?>
                <div class="card">
                    <!-- Imagens -->
                    <?php
                    $fotos = $foto->fotosAnimal($anm->id_animal);
                    if (count($fotos) > 0):
                        $primeira = true;
                        ?>
                        <div id="carouselAnimal-<?= $anm->id_animal ?>" class="carousel slide">
                            <div class="carousel-inner">
                                <?php
                                foreach ($fotos as $ft):
                                    ?>
                                    <div class="carousel-item <?= $primeira ? 'active' : null ?>">
                                        <img src="uploads/<?= $ft->nome ?>" class="d-block mx-auto" alt="<?= $ft->alternativo ?>">
                                    </div>
                                    <?php
                                    $primeira = false;
                                endforeach; ?>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselAnimal-<?= $anm->id_animal ?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselAnimal-<?= $anm->id_animal ?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    <?php else: ?>
                        <img src="uploads/semFoto.png" alt="Animal sem foto" class="semFotoC">
                    <?php endif; ?>

                    <div class="card-body">
                        <h5 class="card-title"><?= $anm->identificador ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nascimento: <?= $anm->nascimento ?></li>
                        <li class="list-group-item">Sexo: <?= $anm->sexo ?></li>
                        <li class="list-group-item">Raça: <?= $anm->nome ?></li>
                    </ul>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                            data-bs-target="#animalModal-<?= $anm->id_animal ?>">
                            Mais informações
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <?php
        foreach ($animais as $anm):
            ?>
            <div class="modal fade" id="animalModal-<?= $anm->id_animal ?>" tabindex="-1"
                aria-labelledby="animalModalLabel-<?= $anm->id_animal ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="animalModalLabel-<?= $anm->id_animal ?>">Animal:
                                <?= $anm->identificador ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Sexo: <?= $anm->sexo ?></p>
                            <p class="text-justify">Nascimento: <?= $anm->nascimento ?></p>
                            <p class="text-justify">Raça: <?= $anm->nome ?></p>
                            <p class="text-justify">Lote: <?= $anm->descricao ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </main>
    <?php require_once "_parts/_footer.php" ?>

</body>

</html>