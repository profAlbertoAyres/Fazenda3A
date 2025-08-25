<?php

abstract class CRUD{
    protected $table;
    protected $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    //Métodos abstratos
    
    abstract public function add();
    abstract public function update(string $campo, int $id);

    //Método para listar todos os registro da tabela
    public function all(){
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Método para buscar um registro pelo Campo

    public function search(string $campo, int $id){
        $sql = "SELECT * FROM $this->table WHERE $campo = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_OBJ) : null;
    }

    //Método para excluir um registro pelo ID.
    public function delete(string $campo, int $id){
        $sql = "DELETE FROM $this->table WHERE $campo = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        try{
            return $stmt->execute();
        }catch(PDOException $e){
            error_log('Erro ao excluir o registro '.$e->getMessage());
            return false;
        }
    }
    public function sp_exibir(string $procedure){
        $sql = "call {$procedure}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}