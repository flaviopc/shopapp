# Desafio Promobit

### Veja como executar o projeto

Clone o Repositório

```sh
git clone https://github.com/flaviopc/shopapp.git
```

```sh
cd shopapp
```

Crie o Arquivo .env

```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env

```dosini
APP_NAME="Shopapp"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=shopapp_db
DB_USERNAME=default
DB_PASSWORD=root
```

Suba os containers do projeto

```sh
docker-compose up -d
```

Acessar o container

```sh
docker-compose exec app bash
```

Instalar as dependências do projeto

```sh
composer install
```

Gerar a key do projeto Laravel

```sh
php artisan key:generate
```

Execute as migrations para criar as tabelas do banco

```sh
php artisan migrate
```

Agora é só acessar a aplicação
[http://localhost](http://localhost)
