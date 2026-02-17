<template>
  <div class="auth-card">
    <h2>Cadastro</h2>
    <form @submit.prevent="submit">
      <label>Nome</label>
      <input v-model="name" type="text" required />

      <label>Email</label>
      <input v-model="email" type="email" required />

      <label>Senha</label>
      <input v-model="password" type="password" required />

      <label>Confirmar senha</label>
      <input v-model="password_confirmation" type="password" required />

      <div class="actions">
        <button class="btn btn-primary" :disabled="loading">Criar conta</button>
        <router-link to="/login" class="btn btn-outline">Voltar para Login</router-link>
      </div>

      <p v-if="error" class="error">{{ error }}</p>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useAuthStore } from '../stores/auth'

const auth = useAuthStore()
const name = ref('')
const email = ref('')
const password = ref('')
const password_confirmation = ref('')
const loading = ref(false)
const error = ref('')

async function submit() {
  error.value = ''
  loading.value = true
  try {
    await auth.register({ name: name.value, email: email.value, password: password.value, password_confirmation: password_confirmation.value })
  } catch (e) {
    error.value = e.response?.data?.message || 'Falha ao criar conta'
  } finally {
    loading.value = false
  }
}
</script>

<style scoped>
.auth-card {
  max-width: 520px;
  margin: 2rem auto;
  padding: 2rem;
  background: white;
  border-radius: 10px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
}

.auth-card h2 {
  margin-bottom: 1rem;
  color: #333;
}

label {
  display: block;
  margin-top: 0.75rem;
  color: #666;
  font-weight: 600;
}

input {
  width: 100%;
  padding: 0.75rem;
  margin-top: 0.4rem;
  border-radius: 8px;
  border: 1px solid #e6e6e6;
}

.actions {
  display: flex;
  gap: 1rem;
  margin-top: 1rem;
}

.error {
  margin-top: 1rem;
  color: #c0392b;
}
</style>
