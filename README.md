# Entrega TCC
#### Requisitos
- PHP >= 7.3 com as seguintes extensões instaladas
  - BCMath
  - Ctype
  - Fileinfo
  - JSON
  - Mbstring
  - OpenSSL
  - PDO PHP
  - Tokenizer
  - XML
- Mysql 5.7
- Composer >= 1.10.13

#### Passos para executar o projeto
- Após baixar o projeto e já com o ambiente configurado, entrar na raiz do projeto
- Executar composer install
- Fazer uma cópia de .env.example, salvar como .env e alterar nesse arquivo as informações do banco conforme seu ambiente (DB_DATABASE, DB_USERNAME, DB_PASSWORD)
- Executar php artisan key:generate
- Executar php artisan migrate --seed
- Executar php artisan serve
- Acesse o endereço http://localhost:8000   
