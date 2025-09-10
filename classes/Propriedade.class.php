<?php

class Propriedade extends CRUD {
    protected $table = "propriedade";

    private $id = 1;
    private $nome;
    private $proprietario;
    private $telefone;
    private $email;
    private $linha;
    private $gleba;
    private $lote;
    private $maps;
    private $facebook;
    private $instagram;
    private $youtube;
    private $whatsapp;
    private $apresentacao;
    private $historia;

    // --- GETTERS e SETTERS ---
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }

    public function getProprietario() { return $this->proprietario; }
    public function setProprietario($proprietario) { $this->proprietario = $proprietario; }

    public function getTelefone() { return $this->telefone; }
    public function setTelefone($telefone) { $this->telefone = $telefone; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getLinha() { return $this->linha; }
    public function setLinha($linha) { $this->linha = $linha; }

    public function getGleba() { return $this->gleba; }
    public function setGleba($gleba) { $this->gleba = $gleba; }

    public function getLote() { return $this->lote; }
    public function setLote($lote) { $this->lote = $lote; }

    public function getMaps() { return $this->maps; }
    public function setMaps($maps) { $this->maps = $maps; }

    public function getFacebook() { return $this->facebook; }
    public function setFacebook($facebook) { $this->facebook = $facebook; }

    public function getInstagram() { return $this->instagram; }
    public function setInstagram($instagram) { $this->instagram = $instagram; }

    public function getYoutube() { return $this->youtube; }
    public function setYoutube($youtube) { $this->youtube = $youtube; }

    public function getWhatsapp() { return $this->whatsapp; }
    public function setWhatsapp($whatsapp) { $this->whatsapp = $whatsapp; }
    public function getApresentacao() { return $this->apresentacao; }
    public function setApresentacao($apresentacao) { $this->apresentacao = $apresentacao; }
    public function getHistoria() { return $this->historia; }
    public function setHistoria($historia) { $this->historia = $historia; }

    // --- CRUD ---
    public function add() {
        $sql = "INSERT INTO $this->table 
                (id_propriedade, nome, proprietario, telefone, email, linha, gleba, lote, maps, facebook, instagram, youtube, whatsapp, apresentacao, historia) 
                VALUES 
                (:id_propriedade, :nome, :proprietario, :telefone, :email, :linha, :gleba, :lote, :maps, :facebook, :instagram, :youtube, :whatsapp, :apresentacao, :historia)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_propriedade', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':proprietario', $this->proprietario);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':linha', $this->linha);
        $stmt->bindParam(':gleba', $this->gleba);
        $stmt->bindParam(':lote', $this->lote);
        $stmt->bindParam(':maps', $this->maps);
        $stmt->bindParam(':facebook', $this->facebook);
        $stmt->bindParam(':instagram', $this->instagram);
        $stmt->bindParam(':youtube', $this->youtube);
        $stmt->bindParam(':whatsapp', $this->whatsapp);
        $stmt->bindParam(':apresentacao', $this->apresentacao);
        $stmt->bindParam(':historia', $this->historia);
        
        return $stmt->execute();
    }

    public function update($campo, $id) {
        $sql = "UPDATE $this->table SET 
                    nome = :nome,
                    proprietario = :proprietario,
                    telefone = :telefone,
                    email = :email,
                    linha = :linha,
                    gleba = :gleba,
                    lote = :lote,
                    maps = :maps,
                    facebook = :facebook,
                    instagram = :instagram,
                    youtube = :youtube,
                    whatsapp = :whatsapp,
                    apresentacao = :apresentacao,
                    historia = :historia
                WHERE $campo = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':proprietario', $this->proprietario);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':linha', $this->linha);
        $stmt->bindParam(':gleba', $this->gleba);
        $stmt->bindParam(':lote', $this->lote);
        $stmt->bindParam(':maps', $this->maps);
        $stmt->bindParam(':facebook', $this->facebook);
        $stmt->bindParam(':instagram', $this->instagram);
        $stmt->bindParam(':youtube', $this->youtube);
        $stmt->bindParam(':whatsapp', $this->whatsapp);
        $stmt->bindParam(':apresentacao', $this->apresentacao);
        $stmt->bindParam(':historia', $this->historia);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
