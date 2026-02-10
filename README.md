# Humilhando Willian - Full Stack Application

Sistema completo de gerenciamento de usuários com Vue 3, Laravel e MySQL.

## 🚀 Tecnologias

- **Frontend**: Vue 3 + Vite + Vue Router + Pinia
- **Backend**: Laravel 10 + PHP 8.1+
- **Database**: MySQL 8.0+

---

## 📋 Credenciais do Banco de Dados

```
Host: 127.0.0.1 (localhost)
Port: 3306
Database: humilhando_db
Username: root
Password: root
```

---

## 🔧 Instalação

### Backend (Laravel)

1. Navegue até a pasta `back-end`:
```bash
cd back-end
```

2. Instale as dependências do Composer:
```bash
composer install
```

3. Gere a chave da aplicação:
```bash
php artisan key:generate
```

4. Execute as migrations para criar as tabelas:
```bash
php artisan migrate
```

5. Inicie o servidor Laravel:
```bash
php artisan serve
```

O backend estará disponível em: `http://localhost:8000`

### Frontend (Vue 3)

1. Em uma nova aba do terminal, navegue até a pasta `front-end`:
```bash
cd front-end
```

2. Instale as dependências do npm:
```bash
npm install
```

3. Inicie o servidor de desenvolvimento:
```bash
npm run dev
```

O frontend estará disponível em: `http://localhost:5173`

---

## 📦 Estrutura do Projeto

```
HUMILHANDO-WILLIAN/
├── back-end/
│   ├── app/
│   │   └── Http/Controllers/UserController.php
│   ├── database/
│   │   └── migrations/
│   │       ├── 2024_01_01_000000_create_users_table.php
│   │       └── 2024_01_01_000001_create_password_reset_tokens_table.php
│   ├── routes/
│   │   └── api.php
│   ├── .env
│   ├── composer.json
│   └── [arquivos do Laravel]
│
└── front-end/
    ├── src/
    │   ├── views/
    │   │   ├── Home.vue
    │   │   └── Users.vue
    │   ├── router/
    │   │   └── index.js
    │   ├── App.vue
    │   └── main.js
    ├── index.html
    ├── vite.config.js
    ├── package.json
    └── [arquivos do Vite]
```

---

## 🔌 Endpoints da API

### Users (Usuários)

- `GET /api/users` - Listar todos os usuários
- `POST /api/users` - Criar novo usuário
- `GET /api/users/{id}` - Obter usuário específico
- `PUT /api/users/{id}` - Atualizar usuário
- `DELETE /api/users/{id}` - Deletar usuário

---

## 🌐 Configuração do Banco de Dados

Certifique-se de que você tem um banco de dados MySQL com a seguinte configuração:

```sql
CREATE DATABASE humilhando_db;
```

Ou use o comando Laravel para criar automaticamente ao rodar as migrations.

---

## 📝 Variáveis de Ambiente

O arquivo `.env` já está configurado com as credenciais padrão. Se precisar alterar, edite o arquivo `.env` no diretório `back-end`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=humilhando_db
DB_USERNAME=root
DB_PASSWORD=root
```

---

## 🛠️ Scripts Disponíveis

### Backend
```bash
php artisan serve              # Inicia o servidor
php artisan migrate            # Executa as migrations
php artisan migrate:rollback   # Desfaz as migrations
php artisan tinker             # Shell interativo
```

### Frontend
```bash
npm run dev      # Inicia servidor de desenvolvimento
npm run build    # Compila para produção
npm run preview  # Visualiza build de produção
npm run lint     # Valida o código
```

---

## 💡 Próximos Passos

1. Implemente autenticação (Sanctum)
2. Adicione validações mais robustas
3. Implemente testes unitários
4. Configure CORS adequadamente
5. Adicione paginação e filtros
6. Configure o ambiente de produção

---

## 📞 Suporte

Para dúvidas ou problemas, consulte a documentação oficial:
- Laravel: https://laravel.com/docs
- Vue 3: https://vuejs.org/
- Vite: https://vitejs.dev/

---

**Desenvolvido com ❤️**
