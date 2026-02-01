<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-red">
  <img src="https://img.shields.io/badge/PHP-8.2-blue">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-cyan">
  <img src="https://img.shields.io/badge/MySQL-Database-orange">
</p>

# Sistema de Cadastro de Produtos

Sistema simples de cadastro e gerenciamento de produtos e categorias, desenvolvido como **desafio técnico** utilizando **Laravel 12, Blade, MySQL e Tailwind CSS**.

O projeto possui validações, relacionamento entre entidades, interface estilizada e funcionalidades diferenciais solicitadas no desafio.

---

## Tecnologias Utilizadas

- **Laravel 12**
- **PHP 8.2**
- **MySQL**
- **Blade**
- **Tailwind CSS**
- **Vite**

---

## Funcionalidades

### Produtos
- Listagem de produtos com paginação
- Cadastro, edição e exclusão de produtos
- Validações:
  - Nome obrigatório
  - SKU único
  - Preço > 0
  - Quantidade em estoque ≥ 0
- Relacionamento com categorias
- Busca por nome ou SKU
- Filtro por categoria
- Confirmação antes de excluir
- Soft delete (restauração de produtos)

### Categorias
- CRUD completo de categorias
- Não permite excluir categoria com produtos vinculados
- Validação de nome obrigatório

---

## Screenshots da Aplicação

### Dashboard
<p align="center">
  <img src="public/prints/principal.png" alt="Dashboard" width="700">
</p>

### Cadastro de Novo Produto
<p align="center">
  <img src="public/prints/novo_produto.png" alt="Novo Produto" width="700">
</p>

### Listagem de Categorias
<p align="center">
  <img src="public/prints/categorias.png" alt="Categorias" width="700">
</p>

### Cadastro de Nova Categoria
<p align="center">
  <img src="public/prints/nova_categoria.png" alt="Nova Categoria" width="700">
</p>

---

## Como executar o projeto

```bash
# Clonar o repositório
git clone https://github.com/larissa-bonasina/desafio-laravel-produtos.git
cd desafio-laravel-produtos

# Instalar dependências PHP
composer install

# Configurar ambiente
cp .env.example .env
# Ajuste as variáveis do banco de dados MySQL no arquivo .env

# Gerar a chave da aplicação
php artisan key:generate

# Rodar migrations e seeders 
php artisan migrate --seed

# Rodar o servidor local
php artisan serve

# No VSCode rode para Tailwind e Vite
npm install
npm run dev
