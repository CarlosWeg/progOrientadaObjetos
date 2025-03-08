CREATE SCHEMA confin;

CREATE SEQUENCE confin.seq_tbpessoa START WITH 1 INCREMENT BY 1; CREATE SEQUENCE confin.seq_tbcidade START WITH 1 INCREMENT BY 1;

CREATE TABLE confin.tbestado( estsigla VARCHAR(2) NOT NULL, estnome VARCHAR(100) NOT NULL);

CREATE TABLE confin.tbcidade( cidcodigo BIGINT NOT NULL DEFAULT NEXTVAL('confin.seq_tbcidade'), cidnome VARCHAR(100) NOT NULL, estsigla VARCHAR(2) NOT NULL );

CREATE TABLE confin.tbpessoa( pescodigo BIGINT NOT NULL DEFAULT NEXTVAL('confin.seq_tbpessoa'), pesnome VARCHAR(100) NOT NULL, pesidade INTEGER NOT NULL, pesemail VARCHAR(120), cidcodigo BIGINT NOT NULL );

CREATE TABLE confin.tbconta( connro BIGINT NOT NULL, condesc VARCHAR(120), condata DATE DEFAULT CURRENT_DATE, convalor NUMERIC (10,2) NOT NULL DEFAULT 0, contipo VARCHAR(1), consituacao VARCHAR(1), pescodigo BIGINT NOT NULL );

ALTER TABLE confin.tbcidade ADD CONSTRAINT pk_cidcodigo PRIMARY KEY(cidcodigo);

ALTER TABLE confin.tbestado ADD CONSTRAINT pk_estsigla PRIMARY KEY(estsigla);

ALTER TABLE confin.tbconta ADD CONSTRAINT pk_connro PRIMARY KEY (connro);

ALTER TABLE confin.tbpessoa ADD CONSTRAINT pk_pescodigo PRIMARY KEY (pescodigo);

ALTER TABLE confin.tbcidade ADD CONSTRAINT fk_cidade_estado FOREIGN KEY (estsigla) REFERENCES confin.tbestado(estsigla);

ALTER TABLE confin.tbpessoa ADD CONSTRAINT fk_pessoa_cidade FOREIGN KEY (cidcodigo) REFERENCES confin.tbcidade(cidcodigo);

ALTER TABLE confin.tbconta ADD CONSTRAINT fk_conta_pessoa FOREIGN KEY (pescodigo) REFERENCES confin.tbpessoa(pescodigo);

CREATE INDEX idx_cidade_estado ON confin.tbcidade(estsigla); CREATE INDEX idx_pessoa_cidade ON confin.tbpessoa(cidcodigo); CREATE INDEX idx_conta_pessoa ON confin.tbconta(pescodigo);