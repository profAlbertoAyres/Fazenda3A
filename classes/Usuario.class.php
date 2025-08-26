<?php

class Usuario extends CRUD
{
    protected $table = "usuario";
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $nivel;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function getNivel()
    {
        return $this->nivel;
    }

    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }

    public function add()
    {
        try {
            $sql = "INSERT INTO {$this->table} (nome, email, senha, nivel_acesso) 
                VALUES (:nome, :email, :senha, :nivel_acesso)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':senha', $this->senha);
            $stmt->bindParam(':nivel_acesso', $this->nivel);

            $stmt->execute();
            return true;

        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $msg = $e->getMessage();

                if (strpos($msg, 'emailusuario') !== false) {
                    return "Erro: este e-mail já está cadastrado!";
                } elseif (strpos($msg, 'nomeusuario') !== false) {
                    return "Erro: este usuário já está cadastrado!";
                } else {
                    return "Erro: dado duplicado em campo único!";
                }
            }
            return "Erro inesperado: " . $e->getMessage();
        }
    }



    public function update($campo, $id)
    {
         try {
        $sql = "UPDATE $this->table SET nome=:nome, nivel_acesso=:nivel_acesso WHERE $campo=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':nivel_acesso', $this->nivel);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;

        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $msg = $e->getMessage();

                if (strpos($msg, 'nomeusuario') !== false) {
                    return "Erro: este usuário já está cadastrado!";
                } else {
                    return "Erro: dado duplicado em campo único!";
                }
            }
            return "Erro inesperado: " . $e->getMessage();
        }
    }
}
