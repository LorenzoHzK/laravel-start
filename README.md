# 📌 Projeto Laravel - Estudo e Modificações

## 📖 Visão Geral

Este é um projeto Laravel que estou modificando e estudando, baseado em um repositório do GitLab originalmente criado pelo Moacir. Meu objetivo com este projeto é aprimorar minhas habilidades em **Laravel** e **Docker**, implementando novos recursos, ajustando a estrutura do código e melhorando a performance do sistema.

## 🛠 Tecnologias Utilizadas

- **Laravel** - Framework PHP utilizado para desenvolver a aplicação.
- **MySQL** - Banco de dados relacional utilizado para armazenar informações.
- **Docker** - Ferramenta para containerização do ambiente de desenvolvimento.
- **GitLab** - Plataforma utilizada para controle de versão do projeto.
- **Composer** - Gerenciador de dependências do PHP.

## 📂 Estrutura do Projeto

```
📂 projeto-laravel
│── 📂 app
│   ├── 📂 Http
│   │   ├── 📂 Controllers
│   │   └── 📂 Middleware
│   ├── 📂 Models
│── 📂 bootstrap
│── 📂 config
│── 📂 database
│   ├── 📂 migrations
│   ├── 📂 seeders
│── 📂 public
│── 📂 resources
│   ├── 📂 views
│── 📂 routes
│── 📂 storage
│── 📂 tests
│── 📄 .env
│── 📄 composer.json
│── 📄 Dockerfile
│── 📄 README.md
```

## 🚀 Configuração do Ambiente

### 1️⃣ Clonar o Repositório
```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

### 2️⃣ Instalar Dependências
```bash
composer install
```

### 3️⃣ Configurar o Arquivo `.env`
Copie o arquivo `.env.example` e renomeie para `.env`. Depois, edite as credenciais do banco de dados:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

### 4️⃣ Gerar Chave da Aplicação
```bash
php artisan key:generate
```

### 5️⃣ Executar as Migrações
```bash
php artisan migrate --seed
```

### 6️⃣ Subir o Ambiente com Docker
```bash
docker-compose up -d
```

### 7️⃣ Iniciar o Servidor Laravel
```bash
php artisan serve
```
A aplicação estará disponível em `http://127.0.0.1:8000`.

## 🔧 Exemplos de Código

### 📌 Exemplo de Rota no Laravel
```php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);
```

### 📌 Exemplo de Controller
```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }
}
```
