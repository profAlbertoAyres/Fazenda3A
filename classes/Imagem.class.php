<?php

class Imagem {
    private $diretorio;
    private $tam_Max;
    private $ext_Perm;
    private $larMax;
    private $altMax;
    private $prefixo;

    public function __construct(
        $diretorio = "uploads/",
        $tam_Max = 5242880, 
        $ext_Perm = ['jpg', 'jpeg', 'png', 'gif'],
        $larMax = 2000,
        $altMax = 2000,
        $prefixo = 'img_'
    ) 
    {
        $this->diretorio = rtrim($diretorio, '/') . '/';
        $this->tam_Max = $tam_Max;
        $this->ext_Perm = $ext_Perm;
        $this->larMax = $larMax;
        $this->altMax = $altMax;
        $this->prefixo = $prefixo;

        if (!file_exists($this->diretorio)) {
            mkdir($this->diretorio, 0755, true);
        }
    }


    public function upload($arquivo) {
        $this->validarErro($arquivo);
        $this->validarTamanho($arquivo);
        $this->validarExtensao($arquivo);
        $this->validarDimensao($arquivo);        
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        $nomeArquivo = uniqid($this->prefixo) . "." . $extensao;
        $caminhoFinal = $this->diretorio . $nomeArquivo;

        if (move_uploaded_file($arquivo['tmp_name'], $caminhoFinal)) {
            return $nomeArquivo;
        }

        throw new Exception("Erro ao salvar a imagem no servidor.");
    }

    /**
     * Exclui imagem do servidor
     */
    public function deletar($nomeArquivo) {
        $caminho = $this->diretorio . $nomeArquivo;
        if (file_exists($caminho)) {
            unlink($caminho);
            return true;
        }
        return false;
    }

    /**
     * Valida se houve erro no upload
     */
    private function validarErro($arquivo) {
        if ($arquivo['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Erro no upload da imagem. Código: " . $arquivo['error']);
        }
    }

    /**
     * Valida tamanho do arquivo
     */
    private function validarTamanho($arquivo) {
        if ($arquivo['size'] > $this->tam_Max) {
            throw new Exception("A imagem excede o tamanho máximo permitido de " . ($this->tam_Max / 1024 / 1024) . "MB.");
        }
    }

    /**
     * Valida extensão do arquivo
     */
    private function validarExtensao($arquivo) {
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        if (!in_array($extensao, $this->ext_Perm)) {
            throw new Exception("Extensão de arquivo não permitida. Permitidas: " . implode(", ", $this->ext_Perm));
        }
    }

    /**
     * Valida dimensões da imagem
     */
    private function validarDimensao($arquivo) {
        $dimensao = getimagesize($arquivo['tmp_name']);
        if ($dimensao[0] > $this->larMax || $dimensao[1] > $this->altMax) {
            throw new Exception("A imagem excede as dimensões máximas de {$this->larMax}x{$this->altMax}px.");
        }
    }
}
