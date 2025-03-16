Projeto Laravel com Docker
Este projeto é uma aplicação Laravel que estou desenvolvendo como parte do meu aprendizado nas tecnologias Laravel e Docker. Baseei-me em um repositório do GitLab criado pelo Moacir e, desde então, tenho implementado melhorias e novas funcionalidades.

Tecnologias Utilizadas
Laravel: Framework PHP utilizado para o desenvolvimento da aplicação web.
Docker: Plataforma de containerização que utilizo para criar um ambiente de desenvolvimento isolado e consistente.
MySQL: Sistema de gerenciamento de banco de dados relacional utilizado para armazenar os dados da aplicação.
Composer: Gerenciador de dependências do PHP, essencial para instalar e gerenciar os pacotes necessários.
Estrutura do Projeto
A organização do projeto segue a estrutura padrão do Laravel:

app/: Contém os modelos, controladores e a lógica de negócio.
routes/: Define as rotas da aplicação.
database/: Inclui migrações e seeders para o banco de dados.
config/: Arquivos de configuração da aplicação.
public/: Diretório público que contém os assets como imagens e scripts.
resources/: Contém as views (Blade templates) e arquivos estáticos.
storage/: Armazena logs, cache e arquivos gerados pela aplicação.
Configuração do Ambiente com Docker
Para facilitar o processo de desenvolvimento e garantir a consistência do ambiente, utilizei o Docker para containerizar a aplicação. Abaixo, apresento um exemplo simplificado do arquivo docker-compose.yml utilizado:
version: '3.8'

services:
  app:
    image: php:8.0-fpm
    container_name: laravel_app
    working_dir: /var/www
    volumes:
      - ./:/var/www
    networks:
      - laravel

  webserver:
    image: nginx:alpine
    container_name: laravel_webserver
    working_dir: /var/www
    volumes:
      - ./:/var/www
      - ./docker/nginx/conf.d/:/etc/nginx/conf.d/
    ports:
      - "8000:80"
    networks:
      - laravel

  db:
    image: mysql:5.7
    container_name: laravel_db
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: laravel
      MYSQL_USER: laravel
      MYSQL_PASSWORD: secret
    ports:
      - "3306:3306"
    networks:
      - laravel

networks:
  laravel:
    driver: bridge
Observações:

O serviço app utiliza a imagem oficial do PHP com FPM, configurada para o diretório de trabalho /var/www.
O serviço webserver utiliza a imagem do Nginx e está configurado para servir a aplicação na porta 8000.
O serviço db utiliza a imagem do MySQL 5.7 com as credenciais definidas nas variáveis de ambiente.
Para iniciar os containers, basta executar:
docker-compose up -d
Instalação das Dependências
Após subir os containers, é necessário instalar as dependências do Laravel utilizando o Composer. Com o container da aplicação em execução, execute:
docker-compose exec app composer install
Migrações do Banco de Dados
Com as dependências instaladas e o banco de dados configurado, execute as migrações para criar as tabelas necessárias:
docker-compose exec app php artisan migrate
Exemplos de Código
Abaixo, apresento alguns trechos de código que desenvolvi durante o projeto:

Modelo: App\Models\Post.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];
}
Controlador: App\Http\Controllers\PostController.php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create($validated);

        return redirect()->route('posts.index');
    }
}
Rota: routes/web.php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');


Este README reflete um pouco do meu processo de aprendizado e desenvolvimento com Laravel e Docker.
