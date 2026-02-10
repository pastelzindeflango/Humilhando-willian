# 🚀 Quick Start Guide

## Estrutura Criada

```
HUMILHANDO-WILLIAN/
├── back-end/          (Laravel 10 API)
├── front-end/         (Vue 3 + Vite)
├── README.md          (Documentação completa)
└── MYSQL_SETUP.md     (Guia de setup do MySQL)
```

---

## 📋 Credenciais do MySQL

```
Host:     localhost (127.0.0.1)
Port:     3306
Database: humilhando_db
User:     root
Password: root
```

---

## ⚡ Começar Rápido

### 1. Setup do Backend

```bash
cd back-end

# Instalar dependências
composer install

# Gerar chave
php artisan key:generate

# Migrations (cria tabelas)
php artisan migrate

# Iniciar servidor
php artisan serve
```

Backend rodando em: **http://localhost:8000**

### 2. Setup do Frontend

```bash
cd front-end

# Instalar dependências
npm install

# Iniciar desenvolvimento
npm run dev
```

Frontend rodando em: **http://localhost:5173**

---

## 📦 Requisitos

- PHP 8.1+
- Composer
- Node.js 16+
- npm ou yarn
- MySQL 5.7+ ou MariaDB 10.2+

---

## 🎯 Funcionalidades Incluídas

✅ **Backend:**
- API RESTful com Laravel
- Migrations de banco de dados
- Controller de Usuários (CRUD)
- CORS configurado
- Validação básica

✅ **Frontend:**
- Interface Vue 3 moderna
- Roteamento com Vue Router
- Chamadas HTTP com Axios
- Gerenciamento de estado com Pinia
- Design responsivo

✅ **Database:**
- MySQL pronto para usar
- Tabelas de usuários pré-configuradas
- Migrations versionadas

---

## 🔧 Próximas Ações

1. **Criar banco de dados MySQL** (ver MYSQL_SETUP.md)
2. **Instalar dependências** do back-end e front-end
3. **Rodar migrations** do Laravel
4. **Iniciar ambos os servidores**
5. **Acessar** http://localhost:5173 no navegador

---

## 📚 Documentação

- [README.md](./README.md) - Documentação completa
- [MYSQL_SETUP.md](./MYSQL_SETUP.md) - Setup do banco de dados
- [Laravel Docs](https://laravel.com/docs)
- [Vue 3 Docs](https://vuejs.org/)

---

**Tudo pronto para começar! 🎉**
