CREATE DATABASE pet_care_db;
USE pet_care_db;

CREATE TABLE pets (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(50) NOT NULL,
  especie VARCHAR(50) NOT NULL,
  cor VARCHAR(50) NOT NULL,
  idade INT,
  ultimo_local_visto VARCHAR(100)
  imagem varchar(50)not null,
);

select*from pets;
