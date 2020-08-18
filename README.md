<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Controle de estoque

[Postman Collection](https://documenter.getpostman.com/view/4149600/T1LSA5NB?version=latest#8af036b8-e7a2-4173-9c60-bc55c1535db8)

## Baixar o projeto
Primeiro passo, clonar o projeto:
``` bash
# Clonar
git clone https://github.com/mattcsilva/laravel_estoque.git

# Acessar
cd laravel_estoque
```

## Configuração

``` bash
# Instalar dependências do projeto
composer install

# Configurar variáveis de ambiente
ren .env.example .env
php artisan key:generate
```

``` bash
# Criar banco de dados
php artisan db:create

# Criar migrations
php artisan migrate
```

## Aplicação
``` bash
# Rodar aplicação
php artisan serve
```