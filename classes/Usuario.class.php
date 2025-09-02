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

    public function login(){
        $sql = "SELECT * FROM {$this->table} WHERE nome = :nome";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->execute();
        if($stmt->rowCount()>0){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }
            $usuario = $stmt->fetch(PDO::FETCH_OBJ);
            if(password_verify($this->senha, $usuario->senha)){
                $_SESSION['user_id'] = $usuario->id_usuario;
                $_SESSION['user_name'] = $usuario->nome;
                header("Location: dashboard.php");
                exit();
            }
        }
        return "Usuário ou senha incorreta. Por favor, tente novamente.";
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location:index.php");
        exit();
    }

    public function alterarSenha($senhaAtual){
        try{
            $sql = "SELECT * FROM {$this->table} WHERE nome = :nome";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome',$this->nome);
            $stmt->execute();
            if($stmt->rowCount()>0){
                $usuario = $stmt->fetch(PDO::FETCH_OBJ);
                if(password_verify($senhaAtual,$usuario->senha)){
                    $novaSenha = password_hash($this->senha,PASSWORD_DEFAULT);
                    $sql = "UPDATE {$this->table} SET senha = :novaSenha WHERE nome = :nome";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(':novaSenha',$novaSenha);
                    $stmt->bindParam(':nome',$this->nome);
                    return $stmt->execute();
                }
                return false;
            }
            return false;
        }catch(PDOException $e){
            return false;
        }
    }

}
