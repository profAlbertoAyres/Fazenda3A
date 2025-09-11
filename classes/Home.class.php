<?php

class Home extends CRUD {
    protected $table = "home";
    private $id_home;
    private $titulo;
    private $subtitulo;
    private $mensagem;
    private $imagem;

    // Getters e Setters
    public function getIdHome() {
        return $this->id_home;
    }

    public function setIdHome($id_home) {
        $this->id_home = $id_home;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getSubtitulo() {
        return $this->subtitulo;
    }

    public function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    // Métodos CRUD específicos
    public function add() {
        $sql = "INSERT INTO $this->table (titulo, subtitulo, mensagem, imagem) 
                VALUES (:titulo, :subtitulo, :mensagem, :imagem)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':subtitulo', $this->subtitulo);
        $stmt->bindParam(':mensagem', $this->mensagem);
        $stmt->bindParam(':imagem', $this->imagem);
        return $stmt->execute();
    }

    public function update($campo, $id) {
        $sql = "UPDATE $this->table 
                SET titulo=:titulo, subtitulo=:subtitulo, mensagem=:mensagem, imagem=:imagem 
                WHERE $campo=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':subtitulo', $this->subtitulo);
        $stmt->bindParam(':mensagem', $this->mensagem);
        $stmt->bindParam(':imagem', $this->imagem);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
