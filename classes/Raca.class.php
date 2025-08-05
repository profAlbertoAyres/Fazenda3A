<?php

class Raca extends CRUD{
    protected $table = "raca";
    private $id;
    private $nome;

    public function setId($id){
        $this->id = $id;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getId(){
        return $this->id;
    }

    public function getNome(){  
        return $this->nome;
    }
    public function add() {
        $sql = "INSERT INTO $this->table (nome) VALUES (:nome)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update(string $campo, int $id) {
        $sql = "UPDATE $this->table SET nome=:nome WHERE $campo=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}