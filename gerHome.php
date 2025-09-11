<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Gerenciar Conteúdo</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>
    <main class="container">
        <div class="titutlo mt-3">
            <h3>Adicionar Conteúdo</h3>
        </div>
        <?php
        spl_autoload_register(function ($class) {
            require_once "classes/{$class}.class.php";
        });
        $idHome;
        if (filter_has_var(INPUT_POST, "btnEditar")) :
            $h = new Home();
            $idHome = intval(filter_input(INPUT_POST, "idHome"));
            $home = $h->search("id_home", $idHome);
        endif;
        ?>
        <form method="post" action="dbHome.php" enctype="multipart/form-data" class="row g-3 mt-3">
            <input type="hidden" name="idHome" value="<?php echo $home->id_home ?? null; ?>">
            <input type="hidden" name="fotoAntiga" value="<?php echo $home->imagem ?? null; ?>">
            <div class="col-md-6 mt-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" id="titulo" placehoader="Digite o titulo do conteúdo" required
                    class="form-control" value="<?php echo $home->titulo ?? null; ?>">
            </div>
            <div class="col-md-6 mt-3">
                <label for="subtitulo" class="form-label">Subtítulo</label>
                <input type="text" name="subtitulo" id="subtitulo" placehoader="Digite o subtítulo do conteúdo" required
                    class="form-control" value="<?php echo $home->subtitulo ?? null; ?>">
            </div>
            <div class="col-12">
                <label for="mensagem" class="form-label">Mensagem</label>
                <textarea name="mensagem" id="mensagem" class="form-control"><?php echo $home->mensagem ?? null; ?></textarea>
            </div>
            <div class="col-12 mt-3">
                <label for="imagem" class="form-label">Foto</label>
                <input type="file" name="imagem" id="imagem" class="form-control" accept=".png, .jpg, .jpeg" <?php echo empty($home->id_home) ? 'required' : null; ?>>
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="btnGravar" class="btn btn-success">Gravar</button>
            </div>
        </form>
    </main>
    <footer>
        <?php require_once("_parts/_footer.php"); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>