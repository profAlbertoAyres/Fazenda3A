<?php
spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});
$propriedade = new Propriedade();
if (filter_has_var(INPUT_POST, "btnGravar")):
    $propriedade->setNome(filter_input(INPUT_POST, 'nome'));
    $propriedade->setProprietario(filter_input(INPUT_POST, 'proprietario'));
    $propriedade->setLinha(filter_input(INPUT_POST, 'linha'));
    $propriedade->setGleba(filter_input(INPUT_POST, 'gleba'));
    $propriedade->setLote(filter_input(INPUT_POST, 'lote'));
    $propriedade->setMaps(filter_input(INPUT_POST, 'maps'));
    $propriedade->setTelefone(filter_input(INPUT_POST, 'telefone'));
    $propriedade->setEmail(filter_input(INPUT_POST, 'email'));
    $propriedade->setFacebook(filter_input(INPUT_POST, 'facebook'));
    $propriedade->setInstagram(filter_input(INPUT_POST, 'instagram'));
    $propriedade->setYoutube(filter_input(INPUT_POST, 'youtube'));
    $propriedade->setWhatsapp(filter_input(INPUT_POST, 'whatsapp'));
    $propriedade->setApresentacao(filter_input(INPUT_POST, 'apresentacao'));
    $propriedade->setHistoria(filter_input(INPUT_POST, 'historia'));
    $idPropriedade = filter_input(INPUT_POST, 'idPropriedade');
    if (empty($idPropriedade)):
        // Tenta adicionar e exibe mensagens para o usuário
        if ($propriedade->add()) {
            echo "<script>window.alert('Propriedade adicionada com sucesso.');</script>";
        } else {
            echo "<script>window.alert('Erro ao adicionar propriedade.');</script>";
        }
    else:
        if ($propriedade->update('id_propriedade', $idPropriedade)) {
            echo "<script>window.alert('Propriedade alterada com sucesso.');</script>";
        } else {
            echo "<script>window.alert('Erro ao alterar Propriedade.');</script>";
        }
    endif;
     echo "<script>window.location.href='gerPropriedade.php';</script>";
endif;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Gerenciar Propriedade</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>
    <main class="container">
        <div class="titutlo mt-3">
            <h3>Cadastro de raças</h3>
        </div>
        <?php

        $edtProp = new Propriedade;
        $propriedade = $edtProp->search("id_propriedade", 1);

        ?>
        <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="row g-3 mt-3">
            <input type="hidden" name="idPropriedade" value="<?php echo $propriedade->id_propriedade ?? null; ?>">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome da Propriedade" required
                    class="form-control" value="<?php echo $propriedade->nome ?? null; ?>">
            </div>
            <div class="col-md-6">
                <label for="proprietario" class="form-label">Proprietário</label>
                <input type="text" name="proprietario" id="proprietario" placeholder="Digite o nome do Proprietário"
                    required class="form-control" value="<?php echo $propriedade->proprietario ?? null; ?>">
            </div>
            <div class="col-md-4">
                <label for="linha" class="form-label">Linha</label>
                <input type="text" name="linha" id="linha" placeholder="Digite a linha" class="form-control"
                    value="<?php echo $propriedade->linha ?? null; ?>">
            </div>
            <div class="col-md-4">
                <label for="gleba" class="form-label">Gleba</label>
                <input type="text" name="gleba" id="gleba" placeholder="Digite a gleba" class="form-control"
                    value="<?php echo $propriedade->gleba ?? null; ?>">
            </div>
            <div class="col-md-4">
                <label for="lote" class="form-label">Lote</label>
                <input type="text" name="lote" id="lote" placeholder="Digite o lote" class="form-control"
                    value="<?php echo $propriedade->lote ?? null; ?>">
            </div>
            <div class="col-12">
                <label for="maps" class="form-label">Localização do Google maps</label>
                <textarea name="maps" id="maps"
                    class="form-control"><?php echo $propriedade->maps ?? null; ?></textarea>
            </div>
            <div class="col-md-4">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control"
                    value="<?php echo $propriedade->telefone ?? null; ?>">
            </div>
            <div class="col-md-8">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Digite o e-mail " class="form-control"
                    value="<?php echo $propriedade->email ?? null; ?>">
            </div>
            <div class="col-md-6">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="text" name="facebook" id="facebook" placeholder="Digite o Facebook " class="form-control"
                    value="<?php echo $propriedade->facebook ?? null; ?>">
            </div>
            <div class="col-md-6">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="text" name="instagram" id="instagram" placeholder="Digite o nome do " class="form-control"
                    value="<?php echo $propriedade->instagram ?? null; ?>">
            </div>
            <div class="col-md-6">
                <label for="youtube" class="form-label">Youtube</label>
                <input type="text" name="youtube" id="youtube" placeholder="Digite o canal do youtube "
                    class="form-control" value="<?php echo $propriedade->youtube ?? null; ?>">
            </div>
            <div class="col-md-6">
                <label for="whatsapp" class="form-label">Whatsapp</label>
                <input type="text" name="whatsapp" id="whatsapp" placeholder="Digite o Whatsapp " class="form-control"
                    value="<?php echo $propriedade->whatsapp ?? null; ?>">
            </div>
            <div class="col-12">
                <label for="apresentacao" class="form-label">Apresentacao</label>
                <textarea name="apresentacao" id="apresentacao"
                    class="form-control"><?php echo $propriedade->apresentacao ?? null; ?></textarea>
            </div>
            <div class="col-12">
                <label for="historia" class="form-label">História</label>
                <textarea name="historia" id="historia"
                    class="form-control"><?php echo $propriedade->historia ?? null; ?></textarea>
            </div>
            <div class="col-12">
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