<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Gerenciador de Animal</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php" ?>
    </header>
    <?php
    #Função PHP que é executada toda vez que crio um objeto (new). 
        spl_autoload_register(function($class){
            #inclui o arquivo.
            require_once "classes/{$class}.class.php";
        });
        #criando um Objeto de Lote.
        $lote = new Lote();
        #criando um Objeto de Raca.
        $raca = new Raca();
        #Criando um Objeto de Animal para mãe
        $mae = new Animal();
        if(filter_has_var(INPUT_POST,"btnEditar")){
            $idAnimal = intval(filter_input(INPUT_POST,"idAnimal"));
            $edtAnimal = new Animal();
            $eAnimal = $edtAnimal->search('id_animal',$idAnimal);
        }
    ?>
    <main class="container">
        <form action="dbAnimal.php" method="post" class="row g3 mt-3">
            <input type="hidden" name="idAnimal" value="<?php echo $eAnimal->id_animal ?? null; ?>">
            <div class="col-md-6 mt-3">
                <label for="identificador" class="form-label">
                    Identificador
                </label>
                <input type="text" name="identificador" id="identificador" class="form-control" value="<?php echo $eAnimal->identificador ?? null; ?>">
            </div>
            <div class="col-md-3 mt-3">
                <label for="nascimento" class="form-label">Nascimento</label>
                <input type="date" name="nascimento" id="nascimento" class="form-control">
            </div>
            <div class="col-md-3 mt-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-select">
                    <option>Selecione o sexo</option>
                    <?php
                    $sexos = [
                        "F" => "Fêmea",
                        "M" => "Macho"];
                    foreach ($sexos as $valor => $rotulo):
                    ?>
                        <option value="<?php echo $valor ?>"><?php echo $rotulo;?></option>
                    <?php endforeach;?>

                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="mae" class="form-label">Mãe</label>
                <select name="mae" id="mae" class="form-select">
                    <option>Selecione a Mãe</option>
                    <?php
                    $maes = $mae->all();
                    foreach ($maes as $m):
                    ?>
                        <option value="<?php echo $m->id_animal ?>"><?php echo $m->identificador;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="raca" class="form-label">Raça</label>
                <select name="raca" id="raca" class="form-select">
                    <option>Selecione a Raça</option>
                    <?php
                    $racas = $raca->all();
                    foreach ($racas as $r):
                    ?>
                        <option value="<?php echo $r->id_raca ?>"><?php echo $r->nome;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="lote" class="form-label">Lote</label>
                <select name="lote" id="lote" class="form-select">
                    <option>Selecione o Lote</option>

                    <?php
                    $lotes = $lote->all();
                    foreach ($lotes as $l):
                    ?>
                        <option value="<?php echo $l->id_lote ?>"><?php echo $l->descricao;?></option>
                    <?php endforeach;?>


                </select>
            </div>


        </form>

    </main>
    <footer>
        <?php require_once "_parts/_footer.php" ?>
    </footer>
</body>

</html>