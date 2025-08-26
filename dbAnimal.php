<?php
    spl_autoload_register(function ($class) {
        require_once "classes/{$class}.class.php";
    });
    $animal = new Animal();
if (filter_has_var(INPUT_POST, 'btnGravar')):
    $idAnimal = filter_input(INPUT_POST, 'idAnimal');
    $animal->setIdentificador(filter_input(INPUT_POST, 'identificador'));
    $animal->setDataNascimento(filter_input(INPUT_POST, 'nascimento'));
    $animal->setSexo(filter_input(INPUT_POST, 'sexo'));
    $animal->setIdMae(filter_input(INPUT_POST, 'mae'));
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
                window.alert('Animal atualizado com sucesso!');
                window.location.href='animais.php';
            </script>
            ";
        else:
            echo "
            <script>
                window.alert('Erro ao atualizar o animal!');
                window.open(document.referrer,'_self');
            </script>
            ";
        endif;
    endif;
    elseif(filter_has_var(INPUT_POST, 'btnDeletar')):
        $idAnimal = intval(filter_input(INPUT_POST,'idAnimal'));
        if ($animal->delete('id_animal',$idAnimal)):
            echo "
            <script>
                window.alert('Animal excluido com sucesso!');
                window.location.href='animais.php';
            </script>
            ";
        else:
            echo "
            <script>
                window.alert('Erro ao excluir o animal!');
                window.open(document.referrer,'_self');
            </script>
            ";
        endif;
endif;
