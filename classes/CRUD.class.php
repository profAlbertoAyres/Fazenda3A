<?php

abstract class CRUD
{
    protected $table;
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    abstract public function add();
    abstract public function update(string $campo, int $id);

    public function all()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método para buscar um registro pelo campo e ID
    public function search(string $campo, int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE $campo = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_OBJ) : null;
    }

    // Método para excluir um registro pelo ID
    public function delete($campo, int $id): bool
    {
        $sql = "DELETE FROM $this->table WHERE $campo = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao excluir registro: " . $e->getMessage());
            return false;
        }
    }

    public function aleatorio(int $quantidade = 0, string $joins = null)
    {
        if ($quantidade > 0) {
            $sql = "SELECT * FROM {$this->table} {$joins} ORDER BY RAND() LIMIT :quantidade";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":quantidade", $quantidade, PDO::PARAM_INT);
        } else {
            $sql = "SELECT * FROM {$this->table} {$joins} ORDER BY RAND()";
            $stmt = $this->db->prepare($sql);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function sp_exibir($procedure)
    {
        $sql = "call $procedure";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function iniciarTransacao()
    {
        $this->db->beginTransaction();
    }

    public function confirmarTransacao()
    {
        $this->db->commit();
    }
    public function cancelarTransacao()
    {
        $this->db->rollBack();
    }

}
