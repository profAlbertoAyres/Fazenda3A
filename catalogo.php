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
        <h2 class="text-center mb-5">Conheça Nossos Animais</h2>
        <div class="d-flex gap-4 justify-content-center flex-wrap">

            <div class="card">
                <!-- iamgens -->

                <div id="carouselAnimal-" class="carousel slide">
                    <div class="carousel-inner">

                        <div class="carousel-item ">
                            <img src="uploads/" class="d-block mx-auto" alt="...">
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselAnimal-"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselAnimal-"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <img src="uploads/semFoto.png" alt="Animal sem foto" class="semFotoC">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nascimento: </li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                </ul>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                        data-bs-target="#animalModal-">
                        Mais informações
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="animalModal-" tabindex="-1" aria-labelledby="animalModalLabel-" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="animalModalLabel-">Animal: </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Sexo:</p>
                        <p class="text-justify">Nascimento:</p>
                        <p class="text-justify">Raça: </p>
                        <p class="text-justify">Lote: </p>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once "_parts/_footer.php" ?>

</body>

</html>