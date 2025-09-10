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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
