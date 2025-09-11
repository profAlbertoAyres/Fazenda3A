-- -----------------------------------------------------
-- Schema fazenda
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS fazenda ;

-- -----------------------------------------------------
-- Schema fazenda
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS teste DEFAULT CHARACTER SET utf8mb4 ;
USE fazenda ;

-- -----------------------------------------------------
-- Table raca
-- -----------------------------------------------------
DROP TABLE IF EXISTS raca ;

CREATE TABLE IF NOT EXISTS raca (
  id_raca INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_raca))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table lote
-- -----------------------------------------------------
DROP TABLE IF EXISTS lote ;

CREATE TABLE IF NOT EXISTS lote (
  id_lote INT(11) NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_lote))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table animal
-- -----------------------------------------------------
DROP TABLE IF EXISTS animal ;

CREATE TABLE IF NOT EXISTS animal (
  id_animal INT(11) NOT NULL AUTO_INCREMENT,
  identificador VARCHAR(100) NOT NULL,
  data_nascimento DATE NOT NULL,
  sexo ENUM('M', 'F') NOT NULL,
  id_raca INT(11) NOT NULL,
  id_mae INT(11) NULL DEFAULT NULL,
  id_lote INT(11) NOT NULL,
  PRIMARY KEY (id_animal),
  INDEX id_raca (id_raca ASC) ,
  INDEX id_mae (id_mae ASC),
  INDEX id_lote (id_lote ASC),
  CONSTRAINT animal_ibfk_1
    FOREIGN KEY (id_raca)
    REFERENCES raca (id_raca)
    ON UPDATE CASCADE,
  CONSTRAINT animal_ibfk_2
    FOREIGN KEY (id_mae)
    REFERENCES animal (id_animal)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT animal_ibfk_3
    FOREIGN KEY (id_lote)
    REFERENCES lote (id_lote)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table categoria
-- -----------------------------------------------------
DROP TABLE IF EXISTS categoria ;

CREATE TABLE IF NOT EXISTS categoria (
  id_categoria INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_categoria))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table fornecedor
-- -----------------------------------------------------
DROP TABLE IF EXISTS fornecedor ;

CREATE TABLE IF NOT EXISTS fornecedor (
  id_fornecedor INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  telefone VARCHAR(20) NULL DEFAULT NULL,
  email VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (id_fornecedor))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table compra
-- -----------------------------------------------------
DROP TABLE IF EXISTS compra ;

CREATE TABLE IF NOT EXISTS compra (
  id_compra INT(11) NOT NULL AUTO_INCREMENT,
  data DATE NOT NULL,
  id_fornecedor INT(11) NOT NULL,
  PRIMARY KEY (id_compra),
  INDEX id_fornecedor (id_fornecedor ASC),
  CONSTRAINT compra_ibfk_1
    FOREIGN KEY (id_fornecedor)
    REFERENCES fornecedor (id_fornecedor)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table foto_animal
-- -----------------------------------------------------
DROP TABLE IF EXISTS foto_animal ;

CREATE TABLE foto_animal (
  id_foto int(11) NOT NULL AUTO_INCREMENT,
  fk_animal int(11) NOT NULL,
  nome varchar(255) NOT NULL,
  legenda varchar(255) DEFAULT NULL,
  alternativo varchar(255) DEFAULT NULL,
  data_upload TIMESTAMP DEFAULT current_timestamp(),
  PRIMARY KEY (id_foto),
  KEY id_animal (fk_animal),
  CONSTRAINT foto_animal_ibfk_1 FOREIGN KEY (fk_animal) REFERENCES animal (id_animal) ON DELETE CASCADE ON UPDATE CASCADE
) ;



-- -----------------------------------------------------
-- Table produto
-- -----------------------------------------------------
DROP TABLE IF EXISTS produto ;

CREATE TABLE IF NOT EXISTS produto (
  id_produto INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  id_categoria INT(11) NOT NULL,
  PRIMARY KEY (id_produto),
  INDEX id_categoria (id_categoria ASC),
  CONSTRAINT produto_ibfk_1
    FOREIGN KEY (id_categoria)
    REFERENCES categoria (id_categoria)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table item_compra
-- -----------------------------------------------------
DROP TABLE IF EXISTS item_compra ;

CREATE TABLE IF NOT EXISTS item_compra (
  id_item INT(11) NOT NULL AUTO_INCREMENT,
  id_compra INT(11) NOT NULL,
  id_produto INT(11) NOT NULL,
  quantidade INT(11) NOT NULL,
  preco_unitario DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (id_item),
  INDEX id_compra (id_compra ASC) ,
  INDEX id_produto (id_produto ASC),
  CONSTRAINT item_compra_ibfk_1
    FOREIGN KEY (id_compra)
    REFERENCES compra (id_compra)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT item_compra_ibfk_2
    FOREIGN KEY (id_produto)
    REFERENCES produto (id_produto)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table manejo
-- -----------------------------------------------------
DROP TABLE IF EXISTS manejo ;

CREATE TABLE IF NOT EXISTS manejo (
  id_manejo INT(11) NOT NULL AUTO_INCREMENT,
  data DATE NOT NULL,
  descricao TEXT NOT NULL,
  id_lote INT(11) NOT NULL,
  PRIMARY KEY (id_manejo),
  INDEX id_lote (id_lote ASC),
  CONSTRAINT manejo_ibfk_1
    FOREIGN KEY (id_lote)
    REFERENCES lote (id_lote)
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table usuario
-- -----------------------------------------------------

DROP TABLE IF EXISTS usuario;

CREATE TABLE usuario(
  id_usuario int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  email varchar(255) NOT NULL, 
  senha varchar(255) NOT NULL,
  nivel_acesso INT,
  PRIMARY KEY (id_usuario),
  UNIQUE KEY email (email),
  UNIQUE KEY nome (nome)
) ;


-- -----------------------------------------------------
-- Table home
-- -----------------------------------------------------

DROP TABLE IF EXISTS home;

CREATE TABLE home (
  id_home int(11) NOT NULL AUTO_INCREMENT,
  titulo varchar(255) DEFAULT NULL,
  subtitulo varchar(255) DEFAULT NULL,
  mensagem text DEFAULT NULL,
  imagem varchar(255) DEFAULT NULL,
  PRIMARY KEY (id_home)
);


-- -----------------------------------------------------
-- Table nutricao
-- -----------------------------------------------------

DROP TABLE IF EXISTS nutricao;

CREATE TABLE nutricao (
    id_nutricao INT AUTO_INCREMENT PRIMARY KEY,
    fase_produtiva VARCHAR(100) NOT NULL,   -- Ex: "Bezerro em desmama", "Vaca em lactação"
    titulo VARCHAR(150) NOT NULL,           
    descricao TEXT NOT NULL,                
    data_publicacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    autor VARCHAR(100) DEFAULT 'Admin',
    status TINYINT DEFAULT 1
);

-- -----------------------------------------------------
-- Table Propriedade
-- -----------------------------------------------------

DROP TABLE IF EXISTS propriedade;

CREATE TABLE propriedade (
  id_propriedade int(11) NOT NULL CHECK (id_propriedade = 1),
  nome varchar(150) NOT NULL,
  proprietario varchar(150) NOT NULL,
  telefone varchar(20) DEFAULT NULL,
  email varchar(100) DEFAULT NULL,
  linha varchar(100) DEFAULT NULL,
  gleba varchar(100) DEFAULT NULL,
  lote varchar(100) DEFAULT NULL,
  maps text DEFAULT NULL,
  facebook varchar(255) DEFAULT NULL,
  instagram varchar(255) DEFAULT NULL,
  youtube varchar(255) DEFAULT NULL,
  whatsapp varchar(255) DEFAULT NULL,
  apresentacao text DEFAULT NULL,
  historia text DEFAULT NULL,
  PRIMARY KEY (id_propriedade)
);


-- -----------------------------------------------------
-- procedure exibir_usuarios
-- -----------------------------------------------------

DROP PROCEDURE IF EXISTS  exibir_usuarios;

DELIMITER $$
CREATE PROCEDURE exibir_usuarios()
BEGIN
    select id_usuario,  nome , 
    case 
       WHEN nivel_acesso = 1 THEN "Administrador"
       WHEN nivel_acesso = 2 THEN "Gerente"
       WHEN nivel_acesso = 3 THEN "Funcionário"
	END
       as nivel from usuario; 
END$$
DELIMITER ;

-- -----------------------------------------------------
-- procedure exibir_animal
-- -----------------------------------------------------

DROP PROCEDURE IF EXISTS  exibir_animal;

DELIMITER $$
CREATE PROCEDURE exibir_animal()
begin

	select a.id_animal, a.identificador, if(a.sexo='F','Fêmea','Macho') as sexo,
    date_format(a.data_nascimento,'%d/%m/%y') as nascimento , r.nome, l.descricao, m.identificador as mae from animal a
    left join raca r on a.id_raca = r.id_raca
    left join lote l on a.id_lote = l.id_lote
    left join animal m on a.id_mae = m.id_animal;
    
end$$
DELIMITER ;


-- -----------------------------------------------------
-- procedure exibir_maes
-- -----------------------------------------------------

DROP PROCEDURE IF EXISTS  exibir_maes;

DELIMITER $$
CREATE PROCEDURE exibir_maes()
begin
	SELECT id_animal, identificador, sexo from animal
where sexo = 'F' and timestampdiff(MONTH, data_nascimento,CURDATE())>24;
end$$
DELIMITER ;
