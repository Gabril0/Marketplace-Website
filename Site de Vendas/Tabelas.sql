CREATE TABLE Anunciante (
  codigo INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  nome VARCHAR(255),
  email VARCHAR(255),
  senhaHash VARCHAR(255),
  telefone VARCHAR(255)
) ENGINE=InnoDB;

CREATE TABLE Enderecos (
  cep VARCHAR(255) PRIMARY KEY,
  bairro VARCHAR(255),
  cidade VARCHAR(255),
  estado VARCHAR(255)
) ENGINE=InnoDB;

CREATE TABLE Categoria (
  codigo INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  nome VARCHAR(255),
  descricao VARCHAR(255)
) ENGINE=InnoDB;

CREATE TABLE Anuncio (
  codigo INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  titulo VARCHAR(255),
  descricao VARCHAR(255),
  preco VARCHAR(255),
  dataHora VARCHAR(255),
  cep VARCHAR(255),
  bairro VARCHAR(255),
  cidade VARCHAR(255),
  estado VARCHAR(255),
  codCategoria INT, 
  FOREIGN KEY (codCategoria) REFERENCES Categoria (codigo),
  codAnunciante INT,
  FOREIGN KEY (codAnunciante) REFERENCES Anunciante (codigo)
) ENGINE=InnoDB;



CREATE TABLE Interesse (
  codigo INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  mensagem VARCHAR(255),
  dataHora VARCHAR(255),
  contato VARCHAR(255),
  codAnunciante INT,
  FOREIGN KEY (codAnunciante) REFERENCES Anuncio (codigo)
) ENGINE=InnoDB;

CREATE TABLE Foto (
  codAnunciante INT,
  nomeArqFoto VARCHAR(255),
  FOREIGN KEY (codAnunciante) REFERENCES Anunciante (codigo)
) ENGINE=InnoDB;
