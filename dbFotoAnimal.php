<?php

spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});

// Criando uma instância da classe Raca
$foto = new FotoAnimal();
$imgFile = new Imagem(prefixo: "anim_");
if (filter_has_var(INPUT_POST, "btnGravar")):
        $idAnimal = filter_input(INPUT_POST, 'idAnimal');
        $foto->setAnimal( $idAnimal);
        $foto->setNome($nomeArquivo);
        $foto->setAlternativo(filter_input(INPUT_POST, 'textoAlt'));
        $foto->setLegenda(filter_input(INPUT_POST, 'legenda'));
        $idFoto = filter_input(INPUT_POST, 'idFoto');

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    
endif;