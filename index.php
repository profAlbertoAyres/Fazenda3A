<?php
spl_autoload_register(function ($class) {
  require_once "classes/{$class}.class.php";
});

$nuticao = new Nutricao();
$seachProp = new Propriedade();
$animal = new Animal();
$foto = new FotoAnimal();
$propriedade = $seachProp->search("id_propriedade", 1);
$home = new Home();

$nomePropriedade = $propriedade->nome;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fazenda Boi Gordo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="CSS/baseSite.css">
  <link rel="stylesheet" href="CSS/index.css">
</head>

<body>
  <!-- Navbar -->
  <?php require_once "_parts/_menu-site.php" ?>

  <main>

    <!-- Destaques Iniciais -->
    <section class="py-5" id="home">
      <div class="container">
        <h2 class="text-center mb-5">Destaques</h2>
        <div>
          <?php
          $homes = $home->all();
          foreach ($homes as $h):
            ?>
            <div class="row g-0 position-relative mt-4 align-items-center">
              <div class="col-md-6 mb-md-0 p-md-4">
                <img src="uploads/Home/<?= $h->imagem; ?>" class="w-100" alt="...">
              </div>
              <div class="col-md-6 p-4 ps-md-0">
                <?php if (!empty($h->titulo)): ?>
                  <h5 class="mt-0"><?= $h->titulo ?></h5>
                <?php endif; ?>
                <?php if (!empty($h->subtitulo)): ?>
                  <h6 class="mt-0"><?= $h->subtitulo ?></h6>
                <?php endif; ?>
                <p class="text-justify"><?= $h->mensagem ?></p>
              </div>
            </div>
          <?php endforeach; ?>

        </div>

      </div>
    </section>

    <!-- Sobre a Empresa -->
    <section class="py-5 bg-light" id="historia">
      <div class="container">
        <div class="row align-items-center">
          <h2 class="mb-3 text-center">Quem Somos</h2>
          <!-- Imagem -->
          <div class="col-md-6 mb-4 mb-md-0">
            <img src="Images/touro.png" class="img-fluid rounded shadow" alt="Nossa Fazenda">
          </div>
          <!-- Texto -->
          <div class="col-md-6">
            <?= $propriedade->historia ?>
          </div>
        </div>
        <div class="text-center mt-4">
          <a href="empresa.php" class="btn btn-primary btn-lg rounded-pill shadow">Saiba Mais</a>
        </div>
      </div>
    </section>


    <!-- Apresentação de Animais -->
    <section class="py-5" id="animais">
      <div class="container">
        <h2 class="text-center mb-5">Conheça Nossos Animais</h2>
        <div class="d-flex gap-4 justify-content-center flex-wrap">
          <?php
          $join = "LEFT JOIN raca on animal.id_raca = raca.id_raca";
          $animais = $animal->aleatorio(6, $join);
          ?>
          <?php
          foreach ($animais as $anm):
            ?>
            <div class="card">
              <!-- iamgens -->
              <?php
              $fotos = $foto->fotosAnimal($anm->id_animal);
              $primeira = true;
              if (count($fotos) > 0):
                ?>
                <div id="carouselAnimal-<?= $anm->id_animal ?>" class="carousel slide">
                  <div class="carousel-inner">
                    <?php
                    foreach ($fotos as $ft):
                      ?>
                      <div class="carousel-item <?= $primeira ? 'active' : null ?>">
                        <img src="uploads/<?= $ft->nome ?>" class="d-block w-100" alt="...">
                      </div>
                      <?php
                      $primeira = false;
                    endforeach;
                    ?>
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
                <img src="uploads/semFoto.png" alt="Animal sem foto">
              <?php endif; ?>
              <div class="card-body">
                <h5 class="card-title"><?= $anm->identificador ?></h5>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Nascimento: <?= date("d/m/Y", strtotime($anm->data_nascimento)) ?> </li>
                <li class="list-group-item"><?= $anm->sexo === 'F' ? 'Fêmea' : 'Macho' ?></li>
                <li class="list-group-item">Raça: <?= $anm->nome ?></li>
              </ul>
              <div class="card-body">
                <div class="d-flex justify-content-center gap-1">
                  <a href="animais.php" class="btn btn-primary btn-sm px-4 shadow-sm">
                    Saiba informações
                  </a>
                </div>

              </div>
            </div>
          <?php endforeach; ?>
    </section>


    <!-- Nutrição Animal -->
    <section class="py-5" id="nutricao">
      <div class="container">
        <h2 class="text-center mb-5">Nutrição Animal</h2>
        <div class="div-carousel">
          <div class="list-card">

            <?php
            $nuticoes = $nuticao->aleatorio(6);
            foreach ($nuticoes as $nut):
              ?>
              <div class="card ">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title"><?= $nut->titulo ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $nut->fase_produtiva ?></h6>
                  <p class="card-text"><?= $nut->descricao ?></p>

                  <div class="d-flex justify-content-between flex-column mt-auto">
                    <small class="text-muted">Autor: <?= $nut->autor ?></small>
                    <small class="text-muted">
                      Publicado: <?= date("d/m/Y", strtotime($nut->data_publicacao)) ?>
                    </small>
                  </div>
                  <div class="mt-auto">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal"
                      data-bs-target="#nutricaoModal-<?= $nut->id_nutricao ?>">
                      Leia mais...
                    </button>
                  </div>
                </div>

              </div>


            <?php endforeach; ?>
          </div>

        </div>

        <!-- Modal -->
        <?php
        foreach ($nuticoes as $nut):
          ?>
          <div class="modal fade" id="nutricaoModal-<?= $nut->id_nutricao ?>" tabindex="-1"
            aria-labelledby="nutricaoModalLabel-<?= $nut->id_nutricao ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="nutricaoModalLabel-<?= $nut->id_nutricao ?>"><?= $nut->titulo ?></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h6><?= $nut->fase_produtiva ?></h6>
                  <p class="text-justify"><?= $nut->descricao ?></p>

                </div>
                <div class="modal-footer ">
                  <small class="text-muted">Autor: <?= $nut->autor ?>.</small>
                  <small class="text-muted">
                    Publicado: <?= date("d/m/Y", strtotime($nut->data_publicacao)) ?>.
                  </small>

                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Contato -->
    <section class="py-5 bg-dark text-light" id="contato">
      <div class="container text-center">
        <h2 class="mb-4">Entre em Contato</h2>
        <p class="mb-5">Estamos sempre à disposição para atender você!</p>

        <div class="row justify-content-center mb-4">
          <!-- Email -->
          <div class="col-md-5 mb-3">
            <div class="card bg-transparent border-0 text-light">
              <div class="card-body">
                <i class="bi bi-envelope-fill fs-2 mb-2"></i>
                <p class="mb-0"><?= $propriedade->email?></p>
              </div>
            </div>
          </div>
          <!-- Telefone -->
          <div class="col-md-3 mb-3">
            <div class="card bg-transparent border-0 text-light">
              <div class="card-body">
                <i class="bi bi-telephone-fill fs-2 mb-2"></i>
                <p class="mb-0"><?= $propriedade->telefone?></p>
              </div>
            </div>
          </div>
          <!-- Redes Sociais -->
          <div class="col-md-3 mb-3">
            <div class="card bg-transparent border-0 text-light">
              <div class="card-body">
                <i class="bi bi-share-fill fs-2 mb-2"></i>
                <p class="mb-0">
                  <a href="<?= $propriedade->facebook?>" class="text-light me-2"><i class="bi bi-facebook"></i></a>
                  <a href="<?= $propriedade->instagram?>" class="text-light me-2"><i class="bi bi-instagram"></i></a>
                  <a href="<?= $propriedade->youtube?>" class="text-light me-2"><i class="bi bi-youtube"></i></a>
                  <a href="<?= $propriedade->whatsapp?>" class="text-light"><i class="bi bi-whatsapp"></i></a>
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Botão -->
        <a href="contato.php" class="btn btn-success btn-lg px-5 rounded-pill shadow">
          Fale Conosco
        </a>
      </div>
    </section>


  </main>
  <!-- Footer -->
  <?php require_once "_parts/_footer.php" ?>
  <script src="JS/exibir.js"></script>
</body>

</html>