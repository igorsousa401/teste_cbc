Requisitos para executar o projeto: 
- MySQL 8 
- PHP 8

Como instalar o projeto?

Clone o repositório com o comando "git clone" ou então baixe o zip.
Execute dentro da pasta do projeto o comando "cp .env.example .env".
Execute o comando "php artisan key:generate".
Modifique os dados do Banco de dados no arquivo .env: "DB_CONNECTION=mysql", "DB_HOST=127.0.0.1", "DB_PORT=3306", "DB_DATABASE=(Nome do banco de dados)", "DB_USERNAME=(Usuário do banco de dados)", "DB_PASSWORD=(Senha do banco de dados)";
Certifique-se de criar o Banco de dados com o Nome informado no "DB_DATABASE";
Execute o comando no terminal "php artisan migrate";
Execute o comando no terminal "php artisan serve";
Rotas:
- Listar Clubes: http://localhost/api/clubs/get
- Adicionar Clube: http://localhost/api/clubs/create
->parâmetros: "clube" e "saldo_disponivel"
- Consumir Valor: http://localhost/api/clubs/update
- ->parâmetros: "clube_id", "recurso_id" e "valor_consumo".

##Prontinho, Só testar o projeto agora e testar as API'S.
