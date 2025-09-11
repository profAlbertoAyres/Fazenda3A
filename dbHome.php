<?php

spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});

// Criando uma instância da classe Home
$home = new Home();
$imgFile = new Imagem(diretorio:"uploads/home/", prefixo: "home_");
if (filter_has_var(INPUT_POST, "btnGravar")):
    $home->iniciarTransacao();
    try {
        $idHome = filter_input(INPUT_POST, 'idHome');
        $fotoAntiga = filter_input(INPUT_POST, 'fotoAntiga');
        $home->setImagem($fotoAntiga);
        if (!empty($_FILES['imagem']['name'])) {
            $nomeArquivo = $imgFile->upload($_FILES['imagem']);
            $home->setImagem($nomeArquivo);
            if (!empty($fotoAntiga)) {
                $imgFile->deletar($fotoAntiga);
            }
        }
        $home->setTitulo(filter_input(INPUT_POST, 'titulo'));
        $home->setSubtitulo(filter_input(INPUT_POST, 'subtitulo'));
        $home->setMensagem(filter_input(INPUT_POST, 'mensagem'));
        if (empty($idHome)):
            if ($home->add()) {
                $mensagem = 'Conteúdo adicionado com sucesso.';
            } else {
                $mensagem = "Erro ao adicionar o conteúdo";
            }
        else:
            if ($home->update('id_home', $idHome)) {
                $mensagem = 'Conteúdo alterado com sucesso.';
            } else {
                $mensagem = ' Erro ao alterar conteúdo.';
            }
        endif;
        echo "<script>window.alert('$mensagem'); window.location.href='homes.php';</script>";
        $home->confirmarTransacao();
    } catch (\Throwable $th) {
        $imgFile->deletar($nomeArquivo);
        $home->cancelarTransacao();
        $erro = $th->getMessage(); // pega mensagem detalhada
        echo "<script>
        window.alert('Erro: " . addslashes($erro) . "');
        window.open(document.referrer,'_self');
    </script>";
    }
    
elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    try {
        $home->iniciaTrans();
        $idHome = intval(filter_input(INPUT_POST, "idHome"));
        $ftDel = $home->search('id_home',$idHome);
        $imgFile->deletar($ftDel->nome);
        $home->delete("id_home", $idHome);
        $home->confirmaTrans();
        header("location:homes.php'");
    } catch (\Throwable $th) {
        $home->cancelarTrans();
        $erro = $th->getMessage(); // pega mensagem detalhada
        echo "<script>
        window.alert('Erro: " . addslashes($erro) . "');
        window.open(document.referrer,'_self');
    </script>";
    }
endif;