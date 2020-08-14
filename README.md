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
- Pessoa (ID [bigint] PK com auto-incremento, Nome [varchar], dtNasc [date], Email [varchar]);
- Telefone (ID [bigint] PK com auto-incremento, DDD [varchar], Numero [varchar], id_pessoa [varchar]);

4- Realizadas as etapas anteriores, acesse a pasta: C:\xampp\htdocs;
- Crie uma pasta com nome: projetoselecao;
- Coloque todos os arquivos que se encontram nesse repositório dentro da pasta criada.

5- Digite em seu navegador: localhost/projetoselecao
