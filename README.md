# ProjetoSelecao
Projeto feito para a prova de Seleção da Secretaria da Saúde

Para que o projeto funcione adequadamente, seguem as orientações:
1- Baixar e instalar o XAMPP, em: https://www.apachefriends.org/pt_br/index.html
- Basta seguir a instalação padrão, sem mexer em nenhuma configuração

2- Ativar os servidores: Apache e MySQL do XAMPP;
- Inicie o xampp-control, localizado na pasta C:\xampp
- Na interface iniciada, iniciar os servidores: Apache e MySQL;

3- Acessar o localhost e, na página apresentada pelo XAMPP, seguir o link "phpMyAdmin"
- Será aberta a interface para comunicação com o banco de dados do servdor XAMPP;
- Criar uma base de dados com nome: projeto_selecao
- Criar duas tabelas:
- Pessoa (ID [bigint] PK com auto-incremento, Nome [varchar], CPF [varchar], dtNasc [date], Email [varchar]);
- Telefone (ID [bigint] PK com auto-incremento, DDD [varchar], Numero [varchar], id_pessoa [varchar]);
conforme os scripts:
script para tabela 'pessoa'
CREATE TABLE `projeto_selecao`.`pessoa` ( `id` BIGINT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(50) NOT NULL , `cpf` VARCHAR(11) NOT NULL , `dtNasc` DATE NOT NULL , `email` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

script para tabela 'telefone'
CREATE TABLE `projeto_selecao`.`telefone` ( `id` BIGINT NOT NULL AUTO_INCREMENT , `ddd` VARCHAR(2) NOT NULL , `numero` VARCHAR(9) NOT NULL , `id_pessoa` BIGINT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

4- Realizadas as etapas anteriores, acesse a pasta: C:\xampp\htdocs;
- Crie uma pasta com nome: projetoselecao;
- Coloque todos os arquivos que se encontram nesse repositório dentro da pasta criada.

5- Digite em seu navegador: localhost/projetoselecao
