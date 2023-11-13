# Observações
- Você tem duas opções de executar o projeto, usando docker, com o uso do laravel sail, ou então utilizar sem docker, com o uso do `php artisan serve`, recomendo utilizar com docker, mas você é livre para escolher o que achar melhor.

- Lembre de em qualquer uma das opções preencher corretamente os dados do Banco de dados no `.env`.

## 1ª Opção - Setup inicial de projeto Laravel com Docker

Baixar do git. Criar o arquivo `.env`. Configura-lo, lembrando de colocar os dados de Banco de dados corretamente no `.env`.
Instalar dependências com o Composer, gerar chave. Certifique-se de ter instalado corretamente o docker, para que seja executado o projeto com sucesso.
```
$ git clone <projectname.git>
$ cd <projectname>
$ cp .env.example .env
$ ./vendor/bin/sail up -d
$ ./vendor/bin/sail composer install
$ ./vendor/bin/sail php artisan key:generate
$ ./vendor/bin/sail php artisan migrate
```

## 2ª Opção - Setup inicial de projeto Laravel sem Docker
Baixar do git. Criar o arquivo `.env`. Configura-lo, lembrando de colocar os dados de Banco de dados corretamente no `.env`.
Instalar dependências com o Composer, gerar chave.
```
$ git clone <projectname.git>
$ cd <projectname>
$ cp .env.example .env
$ sudo composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan serve
```

## Rotas importantes
*Caso use o `php artisan serve`*

- http://localhost:8000/register -> Rota destinada ao registro inicial do usuário admin, comece por essa rota para realizar seu cadastro de administrador.

