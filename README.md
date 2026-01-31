<p align="center"> <a href="https://laravel.com" target="_blank"> <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"> </a> </p> <p align="center"> <img src="https://img.shields.io/badge/Laravel-12.x-red"> <img src="https://img.shields.io/badge/PHP-8.2-blue"> <img src="https://img.shields.io/badge/TailwindCSS-3.x-cyan"> <img src="https://img.shields.io/badge/MySQL-Database-orange"> </p>

Sistema de Cadastro de Produtos

Sistema simples de cadastro e gerenciamento de produtos e categorias, desenvolvido como desafio técnico utilizando Laravel 12, Blade, MySQL e Tailwind CSS.

O projeto contempla validações, relacionamento entre entidades, interface estilizada e funcionalidades diferenciais solicitadas no desafio.

Tecnologias Utilizadas:

Laravel 12
PHP 8.2
MySQL
Blade
Tailwind CSS
Vite

Funcionalidades:

Produtos:
Listagem de produtos com paginação
Cadastro de produto
Edição de produto
Exclusão de produto

Validações:
Nome obrigatório
SKU único
Preço maior que zero
Quantidade em estoque maior ou igual a zero
Relacionamento com categorias
Busca por nome ou SKU 
Filtro por categoria 
Confirmação antes de excluir 
Soft delete 

Como executar o projeto?
git clone <url-do-repositorio>
cd desafio

Instalar dependências:
composer install
npm install
npm run build

Configurar o ambiente: 
cp .env.example .env

Gerar a chave da aplicação
php artisan key:generate

Rodar migrations e seeders
php artisan migrate --seed

Iniciar o servidor
php artisan serve

Estrutura do Projeto:
app/Models → Models Eloquent
app/Http/Controllers → Controllers
app/Http/Requests → Validações
resources/views → Views Blade
database/migrations → Migrations
database/seeders → Seeders

Ps. > O Tailwind CSS foi integrado utilizando Vite, conforme padrão recomendado pelo Laravel 12.

