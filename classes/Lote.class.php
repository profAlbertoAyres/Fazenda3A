<?php

class Lote extends CRUD{
    protected $table = "lote";
    private $id;
    private $descricao;

    public function getId(){
        return $this->id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setId($idLote){
        $this->id = $idLote;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;       
    }

    public function add(){
        $sql = "INSERT INTO {$this->table} (descricao)values(:descricao);";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":descricao",$this->descricao);
        return $stmt->execute();
    }

    public function update(string $campo, int $id){
        $sql = "UPDATE {$this->table} SET descricao = :descricao WHERE {$campo} = :id;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":descricao",$this->descricao);
        $stmt->bindParam(":id",$id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}