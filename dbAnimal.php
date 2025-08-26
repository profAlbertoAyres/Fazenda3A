<?php
if (filter_has_var(INPUT_POST, 'btnGravar')):
    spl_autoload_register(function ($class) {
        require_once "classes/{$class}.class.php";
    });
    $animal = new Animal();
    $idAnimal = filter_input(INPUT_POST, 'idAnimal');
    $animal->setIdentificador(filter_input(INPUT_POST, 'identificador'));
    $animal->setDataNascimento(filter_input(INPUT_POST, 'nascimento'));
    $animal->setSexo(filter_input(INPUT_POST, 'sexo'));
    $animal->setIdMae(filter_input(INPUT_POST, 'mae')) ?: null;
    $animal->setIdRaca(filter_input(INPUT_POST, 'raca'));
    $animal->setIdLote(filter_input(INPUT_POST, 'lote'));
    if (empty($idAnimal)):
        if ($animal->add()):
            echo "
            <script>
                window.alert('Animal cadastrado com sucesso!');
                window.location.href='animais.php';
            </script>
            ";
        else:
            echo "
            <script>
                window.alert('Erro ao cadastrar o animal!');
                window.open(document.referrer,'_self');
            </script>
            ";
        endif;
    else:
        if ($animal->update('id_animal',$idAnimal)):
            echo "
            <script>
                window.alert('Animal cadastrado com sucesso!');
                window.location.href='animais.php';
            </script>
            ";
        else:
            echo "
            <script>
                window.alert('Erro ao cadastrar o animal!');
                window.open(document.referrer,'_self');
            </script>
            ";
        endif;
    endif;
endif;
