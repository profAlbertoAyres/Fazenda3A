<?php

spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});

// Criando uma instância da classe Raca
$foto = new FotoAnimal();
$imgFile = new Imagem(prefixo: "anim_");
if (filter_has_var(INPUT_POST, "btnGravar")):
    $foto->iniciarTransacao();
    try {   
        $idFoto = filter_input(INPUT_POST, 'idFoto');
        $idAnimal = filter_input(INPUT_POST, 'idAnimal');
        $foto->setAnimal( $idAnimal);
        $nomeArquivo = $imgFile->upload($_FILES['foto']);
        $foto->setNome($nomeArquivo);
        $foto->setAlternativo(filter_input(INPUT_POST, 'textoAlt'));
        $foto->setLegenda(filter_input(INPUT_POST, 'legenda'));
        if(empty($idFoto)){
            if($foto->add()){
                $mensagem = 'Foto adicionada com sucesso.';
            }
        }
        $foto->confirmarTransacao();
        echo "<script>window.alert('$mensagem'); window.location.href='fotoAnimal.php?idAnimal=$idAnimal';</script>";
    } catch (\Throwable $th) {
        $foto->cancelarTransacao();
        $imgFile->deletar($nomeArquivo);
        $erro = $th->getMessage();
        echo "<script>window.alert('Erro: $erro.'); window.open(document.referrer,'_self');</script>";
    }

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    
endif;