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

