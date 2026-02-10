# Instruções para Setup do Backend Laravel

## Solução para o Erro do Composer

O erro `Could not open input file: artisan` foi corrigido!

## 🚀 Próximas Ações

### 1. Verificar e Criar o Banco de Dados MySQL

Abra o MySQL e execute:

```sql
CREATE DATABASE IF NOT EXISTS humilhando_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE humilhando_db;

-- Criar tabela de usuários
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    INDEX email (email)
);

-- Criar tabela de reset de senha
CREATE TABLE password_reset_tokens (
    email VARCHAR(255) PRIMARY KEY,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL
);

-- Inserir dados de teste
INSERT INTO users (name, email, password, email_verified_at, created_at, updated_at) VALUES
('Willian Humilhado', 'willian@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW(), NOW()),
('João Silva', 'joao@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW(), NOW()),
('Maria Santos', 'maria@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW(), NOW());
```

### 2. Ou Execute o SQL File

Se tiver MySQL CLI:

```bash
mysql -u root -p humilhando_db < database/schema.sql
```

### 3. Iniciar o Servidor Laravel

```bash
php artisan serve
```

Ou simplesmente:

```bash
php -S localhost:8000 -t public
```

## ✅ Status

- ✓ Composer instalado
- ✓ .env configurado com APP_KEY
- ✓ Estrutura Laravel criada
- ⏳ Banco de dados precisa ser criado manualmente
- ⏳ Servidor pronto para rodar

## 🔧 Troubleshooting

Se ainda tiver problemas com artisan:

```bash
# Verificar se o PHP pode carregar o Laravel
php -r "require 'vendor/autoload.php'; echo 'Laravel loaded!';"

# Teste direto
php public/index.php

# Ou use o servidor embutido
php -S localhost:8000 -t public/
```

## 📝 Credenciais de Teste

```
Email:    willian@example.com
Password: password (hash: $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi)
```

---

**Sistema pronto para uso!**
