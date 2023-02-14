CREATE TABLE premios (
  id_premio  int AUTO_INCREMENT NOT NULL, 
  categoria varchar(70), 
  nome varchar(70),
  PRIMARY KEY (id_premio) 
);

CREATE TABLE jogos (
  id_jogo int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL, 
  genero varchar(70) NOT NULL,
  diretor varchar(70) NOT NULL,
  plataforma varchar(70) NOT NULL,
  ano varchar(6) NOT NULL,
  id_premio int NOT NULL, 
  PRIMARY KEY (id_jogo)
);
ALTER TABLE jogos ADD CONSTRAINT fk_curso FOREIGN KEY (id_premio) REFERENCES premios (id_premio);

INSERT INTO premios (categoria) VALUES ('Jogo do Ano');
INSERT INTO premios (categoria) VALUES ('Melhor Direcao');
INSERT INTO premios (categoria) VALUES ('Melhor Narrativa');
INSERT INTO premios (categoria) VALUES ('Melhor Direcao de Arte');
INSERT INTO premios (categoria) VALUES ('Melhor Musica');
INSERT INTO premios (categoria) VALUES ('Melhor Design de Som');
INSERT INTO premios (categoria) VALUES ('Melhor Design de Jogo');
INSERT INTO premios (categoria) VALUES ('Melhor Jogo Independente');
INSERT INTO premios (categoria) VALUES ('Melhor Jogo de Aventura');
INSERT INTO premios (categoria) VALUES ('Melhor Jogo de Acao');
INSERT INTO premios (categoria) VALUES ('Melhor Jogo de Corrida');
INSERT INTO premios (categoria) VALUES ('Melhor Jogo de Esporte');
INSERT INTO premios (categoria) VALUES ('Melhor Jogo de Estrategia');
INSERT INTO premios (categoria) VALUES ('Melhor Jogo de RPG');
INSERT INTO premios (categoria) VALUES ('Melhor Jogo de Simulacao');
INSERT INTO premios (categoria) VALUES ('Melhor Jogo de Plataforma');
INSERT INTO premios (categoria) VALUES ('Melhor Jogo de Puzzle');
INSERT INTO premios (categoria) VALUES ('Melhor Jogo de Luta');
INSERT INTO premios (categoria) VALUES ('Melhor Jogo de Tiro');


CREATE TABLE usuarios ( 
  id_usuario int AUTO_INCREMENT, 
  nome varchar(70) NOT NULL, 
  login varchar(15) NOT NULL,
  senha varchar(15) NOT NULL, 
  PRIMARY KEY (id_usuario) 
);
ALTER TABLE usuarios ADD CONSTRAINT uk_usuarios UNIQUE KEY (login);

/*Inserts usuarios*/
INSERT INTO usuarios (nome, login, senha) VALUES ('Sr. Administrador', 'admin', 'admin');
INSERT INTO usuarios (nome, login, senha) VALUES ('Sr. Root', 'root', 'root');
