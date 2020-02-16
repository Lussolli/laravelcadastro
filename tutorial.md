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

## Aula 3

Na terceira aula eu tive que adicionar uma meta tag no arquivo de layout para incluir o token CSRF, que é um token para garantir a segurança quando eu estiver trabalhando com formulários.

## Aula 4

Nessa aula nós adicionamos mais código HTML no arquivo `index.blade.php`

Nós criamos um `.jumbotron` e adicionamos dois *cards* nele. Futuramente um irá redirecionar o usuário para o cadastro de produtos e o outro irá redirecionar o usuário para o cadastro de categorias.
