# laravelcadastro

Projeto de cadastro de categorias sendo desenvolvido durante curso da [MPro Consultoria, Desenvolvimento e Treinamento](https://www.udemy.com/course/laravelcompleto/) na Udemy.

## Primeira aula

Na primeira aula nós criamos o projeto em Laravel. Eu utilizei o comando `composer create-project --prefer-dist laravel/laravel laravelcadastro` para criar o projeto.

## Segunda aula

Na segunda aula eu crie o arquivo de layout na pasta `views/layouts`. O nome do arquivo é `app.blade.php`

Nessa aula nós também criamos um arquivo chamado de `index.blade.php` na pasta `views` e, por fim, alteramos o arquivo de rota (`routes/web.php`) para redirecionar o usuário para a nova *view index*.

Eu estou utilizando o Laravel 6.0, por essa razão eu precisei fazer executar esses comandos para conseguir utilizar o framework front-end Bootstrap:

```
composer require laravel/ui
php artisan ui bootstrap
npm install && npm run dev
```

Após instalar o Bootstrap 4.x no projeto eu executei o comando `php artisan serve` na raiz do projeto para executar o programa.

## Terceira aula

Na terceira aula eu tive que adicionar uma meta tag no arquivo de layout para incluir o token CSRF, que é um token para garantir a segurança quando eu estiver trabalhando com formulários.

## Quarta aula

Nessa aula nós adicionamos mais código HTML no arquivo `index.blade.php`

Nós criamos um `.jumbotron` e adicionamos dois *cards* nele. Futuramente um irá redirecionar o usuário para o cadastro de produtos e o outro irá redirecionar o usuário para o cadastro de categorias.

## Quinta aula

Durante a quinta aula eu componentizei o menu de navegação da aplicação.

Dentro da pasta de `views` foi criada uma nova pasta chamada de `components` que contém um arquivo chamado de `navbar.blade.php`

Por enquanto esse arquivo está sendo utilizado pelo `app.blade.php` para apresentar o menu de navegação.

# Sexta aula

Durante essa aula nós utilizamos os comandos abaixo para criar as entidades e as *migrations* de **Categorias** e de **Produtos** com os comandos abaixo:

``` bash
php artisan make:model Categoria -m
php artisan make:model Produto -m
```

Na migration de categorias eu coloquei uma nova coluna para o nome da mesma. E na migration de produtos eu adicionei novas colunas para o nome, quantidade em estoque, preço e id da categoria.

Depois eu abri uma nova instância do terminal no VS Code e me conectei no MariaDB. Criei uma base de dados com o nome de **laravelcadastro** e alterei o arquivo `.env` para informar os dados de conexão com o banco de dados.

Por fim eu executei as migrations com o comando `php artisan migrate`

# Sétima aula

Na sétima aula eu comecei a criar os meus controladores.

Utilizei o comando `php artisan make:controller ControladorProduto --resource` e `php artisan make:controller ControladorCategoria --resource`

Ao final dos comandos foi utilizado o `-- resource` para o Laravel criar os controladores com todos os métodos por padrão.

Eu tive que abrir o arquivo de rotas e criar duas novas rotas para as páginas de categorias e de produtos.

Os métodos de `index` já estão retornando suas views.
