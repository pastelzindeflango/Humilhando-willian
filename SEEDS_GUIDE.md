# Dados de Teste e Seeds

## 📋 Usuários de Teste Disponíveis

Após rodar o seeder, você terá os seguintes usuários no banco:

| ID | Nome | Email | Senha |
|---|---|---|---|
| 1 | Willian Humilhado | willian@example.com | password |
| 2 | João Silva | joao@example.com | password |
| 3 | Maria Santos | maria@example.com | password |

## 🚀 Como Popular o Banco com Dados de Teste

### Opção 1: Migrate + Seed (Recomendado)

```bash
cd back-end

# Rodar migrations + seeds
php artisan migrate --seed
```

### Opção 2: Apenas o Seeder

Se já tem as tabelas criadas:

```bash
cd back-end

# Rodar apenas o UserSeeder
php artisan db:seed --class=UserSeeder

# Ou rodar todos os seeders
php artisan db:seed
```

### Opção 3: Refrescar Banco (⚠️ Deleta dados!)

Se quiser limpar tudo e recomeçar:

```bash
cd back-end

# Desfaz todas as migrations e roda novamente com seeds
php artisan migrate:fresh --seed
```

## ✅ Verificar se Funcionou

1. Abra a aplicação Vue em http://localhost:5173
2. Clique em "Usuários"
3. Você deve ver a lista com os 3 usuários de teste

Ou use curl:

```bash
curl http://localhost:8000/api/users
```

## 📝 Adicionar Mais Dados de Teste

Edite o arquivo `back-end/database/seeders/UserSeeder.php` para adicionar mais usuários.

Exemplo:

```php
DB::table('users')->insert([
    [
        'name' => 'Novo Usuário',
        'email' => 'novo@example.com',
        'password' => bcrypt('password'),
        'email_verified_at' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ],
    // ... mais usuários
]);
```

Depois rode novamente:

```bash
php artisan migrate:fresh --seed
```

## 🔄 Resetar Dados

Para voltar ao estado inicial:

```bash
cd back-end

# Opção 1: Fresh (recomendado)
php artisan migrate:fresh --seed

# Opção 2: Apenas rollback
php artisan migrate:rollback
php artisan migrate --seed

# Opção 3: Limpar via SQL
mysql -u root -p humilhando_db < < EOF
DELETE FROM users;
EOF
```

## 💡 Dicas

- **Senha padrão**: `password` (em texto plano antes de bcrypt)
- **Senhas com hash**: Use `bcrypt('sua_senha')` no seeder
- **Timestamps**: `now()` ou `now()->subDays(10)` para datas antigas
- **Faker**: Você pode usar `\Faker\Factory::create()` para dados aleatórios

Exemplo com Faker:

```php
$faker = \Faker\Factory::create();

DB::table('users')->insert([
    'name' => $faker->name,
    'email' => $faker->email,
    'password' => bcrypt('password'),
]);
```

---

**Pronto para testar a aplicação!**
