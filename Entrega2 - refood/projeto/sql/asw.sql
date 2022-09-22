DROP TABLE Disponibilidade;
DROP TABLE Admin;
DROP TABLE Instituicao;
DROP TABLE Voluntario;
DROP TABLE contem;
DROP TABLE Sede;
DROP TABLE Participante;

CREATE TABLE Participante (
    email VARCHAR(255),
    nome CHAR(30),
    morada VARCHAR(255),
    telefone INTEGER(9),
    passwd VARCHAR(255),
    
    CONSTRAINT pk_participante
        PRIMARY KEY (email)
);

CREATE TABLE Sede (
    url VARCHAR(255),
    nome CHAR(30),
    sede VARCHAR(100),

    CONSTRAINT pk_sede
        PRIMARY KEY (url)
);

CREATE TABLE contem (
    email VARCHAR(255),
    url VARCHAR(255),
    data_inicio DATE,

    CONSTRAINT pk_contem
        PRIMARY KEY (email, url),

    CONSTRAINT fk_contem_email
        FOREIGN KEY (email) REFERENCES Participante (email),

    CONSTRAINT fk_contem_url
        FOREIGN KEY (url) REFERENCES Sede (url)
);


CREATE TABLE Voluntario (
	email VARCHAR(255) NOT NULL,
	carta_conducao VARCHAR(20),
    CC CHAR(8),
    data_inicio DATE,
    data_nascimento DATE,
    genero VARCHAR(20),
    pontuacao INTEGER (5),
    
    CONSTRAINT pk_voluntario
		PRIMARY KEY(email),

    CONSTRAINT fk_voluntario_participante
        FOREIGN KEY (email) REFERENCES Participante (email)
);


CREATE TABLE Instituicao (
	email VARCHAR(255) NOT NULL,
	doacoes VARCHAR(255),
    tipo VARCHAR(50),
    pontuacao INTEGER(5),
    hora_recolha TIME,
    
    CONSTRAINT pk_instituicao
		PRIMARY KEY (email),

    CONSTRAINT fk_instituicao_participante
        FOREIGN KEY (email) REFERENCES Participante (email)
);


CREATE TABLE Admin (
	email VARCHAR(255),
    nome CHAR(30),
    telefone INTEGER(9),

    CONSTRAINT pk_admin
        PRIMARY KEY (email)
);

CREATE TABLE Disponibilidade (
    email VARCHAR(255),
    dia_semana VARCHAR(30),
    distrito VARCHAR(255),
    hora_inicio TIME,
    hora_fim TIME,

    CONSTRAINT pk_disponibilidade
        PRIMARY KEY (email, dia_semana),

    CONSTRAINT fk_disponibilidade_voluntario
        FOREIGN KEY (email) REFERENCES Voluntario (email) ON DELETE CASCADE
);
