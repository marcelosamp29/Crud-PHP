drop schema if exists produtos;
Create schema produtos; 
use produtos;

Create table produto 
(
	cd_produto INT NOT NULL,
    nm_produto VARCHAR(255),
    qt_produto INT,
    vl_produto DECIMAL(10,2),
	CONSTRAINT pk_produto PRIMARY KEY (cd_produto)
);

INSERT INTO produto VALUES (1, 'Coca-Cola 2L', 10, 15.00);
INSERT INTO produto VALUES (2, 'Doritos', 2, 7.50);
INSERT INTO produto VALUES (3, 'Maça', 5, 8.50);
INSERT INTO produto VALUES (4, 'Churros', 20, 10.50);

DELIMITER $$
DROP PROCEDURE IF EXISTS ListarProdutos$$
CREATE PROCEDURE ListarProdutos()
BEGIN
    SELECT 
        cd_produto AS Código,
        nm_produto AS Produto,
        qt_produto AS Quantidade,
        CONCAT('R$ ', REPLACE(vl_produto, '.', ',')) AS Preço
    FROM produto
	ORDER BY cd_produto ASC;
END$$

DROP PROCEDURE IF EXISTS BuscarProduto$$
CREATE PROCEDURE BuscarProduto(pCodigo INT)
BEGIN
	SELECT 
			cd_produto AS Código,
			nm_produto AS Produto,
			qt_produto AS Quantidade,
			CONCAT('R$ ', REPLACE(vl_produto, '.', ',')) AS Preço        
		FROM produto WHERE cd_produto = pCodigo;
END$$

DROP PROCEDURE IF EXISTS BuscarProximoCodigo$$
CREATE PROCEDURE BuscarProximoCodigo()
BEGIN
	SELECT COALESCE(MAX(cd_produto + 1),1) AS Código FROM PRODUTO;
END$$

DROP PROCEDURE IF EXISTS AdicionarProduto$$
CREATE PROCEDURE AdicionarProduto(pCodigo INT, pNome VARCHAR(255), pQuantidade INT, pValor DECIMAL(10,2))
BEGIN
	INSERT INTO produto VALUES (pCodigo, pNome, pQuantidade, pValor);
END$$

DROP PROCEDURE IF EXISTS EditarProduto$$
CREATE PROCEDURE EditarProduto(pCodigo INT, pNome VARCHAR(255), pQuantidade INT, pValor DECIMAL(10,2))
BEGIN
	UPDATE produto SET nm_produto = pNome, qt_produto = pQuantidade, vl_produto = pValor WHERE cd_produto = pCodigo;
END$$

DROP PROCEDURE IF EXISTS ExcluirProduto$$
CREATE PROCEDURE ExcluirProduto(pCodigo INT)
BEGIN
	DELETE FROM produto WHERE cd_produto = pCodigo;
END$$
DELIMITER ;