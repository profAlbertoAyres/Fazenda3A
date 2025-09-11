CREATE TABLE home (
  id_home int(11) NOT NULL AUTO_INCREMENT,
  titulo varchar(255) DEFAULT NULL,
  subtitulo varchar(255) DEFAULT NULL,
  mensagem text DEFAULT NULL,
  imagem varchar(255) DEFAULT NULL,
  PRIMARY KEY (id_home)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
