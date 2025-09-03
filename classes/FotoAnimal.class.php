<?php
class FotoAnimal extends CRUD {
    protected $table = 'foto_animal';
    private $idFoto;
    private $animal;       // objeto Animal ou apenas o ID
    private $nome;
    private $legenda;
    private $alternativo;
    private $dataUpload;

    // Getters e Setters
    public function getIdFoto() {
        return $this->idFoto;
    }

    public function setIdFoto($idFoto) {
        $this->idFoto = $idFoto;
    }

    public function getAnimal() {
        return $this->animal;
    }

    public function setAnimal($animal) {
        $this->animal = $animal; 
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getLegenda() {
        return $this->legenda;
    }

    public function setLegenda($legenda) {
        $this->legenda = $legenda;
    }

    public function getAlternativo() {
        return $this->alternativo;
    }

    public function setAlternativo($alternativo) {
        $this->alternativo = $alternativo;
    }

    public function getDataUpload() {
        return $this->dataUpload;
    }

    public function setDataUpload($dataUpload) {
        $this->dataUpload = $dataUpload;
    }

    public function add() {
            $sql = "INSERT INTO foto_animal (fk_animal, nome, legenda, alternativo, data_upload) 
                    VALUES (:animal, :nome, :legenda, :alternativo, :dataUpload)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":animal", $this->animal);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":legenda", $this->legenda);
            $stmt->bindValue(":alternativo", $this->alternativo);
            $stmt->bindValue(":dataUpload", $this->dataUpload);
            return $stmt->execute();
        
        }
    public function update(string $campo, int $id){
        $sql = "UPDATE foto_animal 
                    SET fk_animal = :animal, nome = :nome, legenda = :legenda, alternativo = :alternativo 
                    WHERE id_foto = :idFoto";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":animal", $this->animal);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":legenda", $this->legenda);
            $stmt->bindValue(":alternativo", $this->alternativo);
            $stmt->bindValue(":idFoto", $id);
            return $stmt->execute();
    }

    public function fotosAnimal(int $idAnimal) {
        $sql = "SELECT * FROM $this->table where fk_animal = :fk_animal";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':fk_animal',$idAnimal);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
