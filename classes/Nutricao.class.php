<?php
class Nutricao extends CRUD {
    protected $table = "nutricao";

    private $id_nutricao;
    private $fase_produtiva;
    private $titulo;
    private $descricao;
    private $data_publicacao;
    private $autor;
    private $status;

    // Getters e Setters
    public function getId() {
        return $this->id_nutricao;
    }

    public function setId($id_nutricao) {
        $this->id_nutricao = $id_nutricao;
    }

    public function getFaseProdutiva() {
        return $this->fase_produtiva;
    }

    public function setFaseProdutiva($fase_produtiva) {
        $this->fase_produtiva = $fase_produtiva;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDataPublicacao() {
        return $this->data_publicacao;
    }

    public function setDataPublicacao($data_publicacao) {
        $this->data_publicacao = $data_publicacao;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    // Métodos CRUD específicos
    public function add() {
        $sql = "INSERT INTO $this->table 
                (fase_produtiva, titulo, descricao, data_publicacao, autor, status) 
                VALUES 
                (:fase_produtiva, :titulo, :descricao, :data_publicacao, :autor, :status)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':fase_produtiva', $this->fase_produtiva);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':data_publicacao', $this->data_publicacao);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':status', $this->status, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($campo, $id) {
        $sql = "UPDATE $this->table SET 
                    fase_produtiva = :fase_produtiva,
                    titulo = :titulo,
                    descricao = :descricao,
                    data_publicacao = :data_publicacao,
                    autor = :autor,
                    status = :status
                WHERE $campo = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':fase_produtiva', $this->fase_produtiva);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':data_publicacao', $this->data_publicacao);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':status', $this->status, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
