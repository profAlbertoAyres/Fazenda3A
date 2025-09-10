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



