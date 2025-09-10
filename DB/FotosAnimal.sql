drop table if exists foto_animal;


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
