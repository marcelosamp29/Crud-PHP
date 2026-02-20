# CRUD de Produtos - PHP & MySQL 

Este projeto é um sistema de gerenciamento de produtos desenvolvido em **PHP**, que evoluiu de um armazenamento temporário (Sessões) para a persistência real de dados utilizando o banco de dados **MySQL**.



---

💡 **Como funciona**

O sistema realiza as quatro operações fundamentais de um banco de dados (CRUD):

1.  **Adicionar produto:** Os dados são enviados via formulário e salvos permanentemente no MySQL via `INSERT`.
2.  **Consultar produtos:** O sistema realiza um `SELECT` no banco e renderiza os itens em uma tabela dinâmica.
3.  **Editar produto:** Permite buscar um produto pelo ID, carregar seus dados e atualizar as informações (`UPDATE`).
4.  **Excluir produto:** Remove o registro selecionado do banco de dados de forma definitiva (`DELETE`).

---

🛠️ **Tecnologias Utilizadas**

* **Linguagem:** PHP 8.x
* **Banco de Dados:** MySQL
* **Ambiente Local:** XAMPP (Apache)
* **Gestão de Banco:** MySQL Workbench / phpMyAdmin

---

🖥️ **Como testar na sua máquina**

O projeto já conta com uma **classe/arquivo de conexão configurado** para ambientes locais padrão (XAMPP). Siga os passos:

1.  **Instale o XAMPP:** Baixe e instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html).
2.  **Inicie os Serviços:** No Painel de Controle do XAMPP, inicie o **Apache** e o **MySQL**.
3.  **Prepare os Arquivos:**
    * Clone ou baixe este repositório.
    * Mova a pasta do projeto para `C:\xampp\htdocs`.
4.  **Configure o Banco de Dados:**
    * Acesse `http://localhost/phpmyadmin`.
    * Crie um novo banco de dados (o nome deve ser o mesmo definido no seu arquivo de conexão).
    * Importe o arquivo `.sql` disponível na raiz deste repositório para criar a tabela automaticamente.
5.  **Acesse o Projeto:** * No navegador, digite: `http://localhost/NOME_DA_SUA_PASTA/`.

> Experimente cadastrar alguns produtos, fechar o navegador ou até reiniciar o Apache/MySQL. Ao voltar, você verá que todos os dados continuam salvos na tabela, demonstrando a persistência real do banco de dados em ação!
