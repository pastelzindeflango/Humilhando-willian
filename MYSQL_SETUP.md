# Configuração do MySQL

## 📌 Credenciais do Banco de Dados

```
HOST:     127.0.0.1 (localhost)
PORT:     3306
DATABASE: humilhando_db
USERNAME: root
PASSWORD: root
```

## 🚀 Como Criar o Banco de Dados

### Opção 1: MySQL Command Line

1. Abra o MySQL Command Line Client ou Terminal:

```bash
mysql -u root -p
```

2. Digite a senha (padrão: `root`)

3. Execute o comando:

```sql
CREATE DATABASE humilhando_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

4. Verifique se foi criado:

```sql
SHOW DATABASES;
```

5. Saia:

```sql
EXIT;
```

### Opção 2: Deixar o Laravel Criar Automaticamente

Se o banco não existir, você pode deixar o Laravel tentar criar automaticamente durante as migrations:

```bash
cd back-end
php artisan migrate
```

## 🔐 Alterar Credenciais (Opcional)

Se você quiser usar diferentes credenciais, edite o arquivo `.env` na pasta `back-end`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=humilhando_db
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

## 📦 Instalação do MySQL

### Windows
- Download: https://dev.mysql.com/downloads/windows/installer/
- Instalador completo com MySQL Workbench

### macOS
```bash
brew install mysql
brew services start mysql
```

### Linux (Ubuntu/Debian)
```bash
sudo apt-get update
sudo apt-get install mysql-server
sudo mysql_secure_installation
```

## ✅ Verificar Conexão

Para verificar se o banco está acessível:

```bash
cd back-end
php artisan tinker
DB::connection()->getPdo();
# Se retornar um objeto, a conexão está funcionando
```

## 📊 Gerenciar o Banco

### MySQL Workbench
- Download: https://www.mysql.com/products/workbench/
- Use as credenciais acima para conectar

### PHPMyAdmin (Web Interface)
Se você usar Laravel Sail ou Laragon:
- Acesse: http://localhost/phpmyadmin

## 🗄️ Verificar Tabelas

Após rodar as migrations, você pode verificar as tabelas:

```bash
php artisan migrate:status
```

Ou no MySQL:

```sql
USE humilhando_db;
SHOW TABLES;
DESCRIBE users;
```

---

**Todas as configurações estão prontas para uso!**
