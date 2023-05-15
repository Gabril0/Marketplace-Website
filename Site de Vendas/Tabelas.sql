CREATE TABLE Anunciante (
  codigo int PRIMARY KEY,
  nome varchar(255),
  email varchar(255),
  senhaHash varchar(255),
  telefone varchar(255)
)ENGINE=InnoDB;

CREATE TABLE Enderecos (
  cep varchar(255) PRIMARY KEY,
  bairro varchar(255),
  cidade varchar(255),
  estado varchar(255)
)ENGINE=InnoDB;

CREATE TABLE Anuncio (
  codigo int PRIMARY KEY,
  titulo varchar(255),
  descricao varchar(255),
  preco int,
  dataHora date,
  cep varchar(255),
  bairro varchar(255),
  cidade varchar(255),
  estado varchar(255),
  codCategoria varchar(255),
  FOREIGN KEY (codCategoria) REFERENCES Categoria (codigo),
  codAnunciante varchar(255),
  FOREIGN KEY (codAnunciante) REFERENCES Anunciante (codigo)
)ENGINE=InnoDB;

CREATE TABLE Categoria (
  codigo int PRIMARY KEY,
  nome varchar(255),
  descricao int
)ENGINE=InnoDB;

CREATE TABLE Interesse (
  codigo int PRIMARY KEY,
  mensagem varchar(255),
  dataHora date,
  contato varchar(255),
  codAnunciante int,
  FOREIGN KEY (codAnunciante) REFERENCES Anuncio (codigo)
)ENGINE=InnoDB;

CREATE TABLE Foto (
  codAnunciante int,
  nomeArqFoto varchar(255),
  FOREIGN KEY (codAnunciante) REFERENCES Anunciante (codigo)
)ENGINE=InnoDB;