<template>
  <div class="users-container">
    <h1>Gerenciar Usuários</h1>
    
    <div class="form-section">
      <form @submit.prevent="addUser">
        <div class="form-group">
          <label for="name">Nome:</label>
          <input 
            v-model="form.name" 
            type="text" 
            id="name" 
            required
          >
        </div>
        
        <div class="form-group">
          <label for="email">Email:</label>
          <input 
            v-model="form.email" 
            type="email" 
            id="email" 
            required
          >
        </div>
        
        <button type="submit" class="btn-primary">Adicionar Usuário</button>
      </form>
    </div>

    <div class="users-list">
      <h2>Lista de Usuários</h2>
      <div v-if="users.length === 0" class="empty-state">
        <p>Nenhum usuário cadastrado</p>
      </div>
      <table v-else>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>
              <button @click="editUser(user)" class="btn-edit">Editar</button>
              <button @click="deleteUser(user.id)" class="btn-delete">Deletar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const users = ref([])
const form = ref({
  name: '',
  email: ''
})

onMounted(() => {
  fetchUsers()
})

const fetchUsers = async () => {
  try {
    const response = await axios.get('/api/users')
    users.value = response.data || []
  } catch (error) {
    console.error('Erro ao buscar usuários:', error)
  }
}

const addUser = async () => {
  try {
    await axios.post('/api/users', form.value)
    form.value = { name: '', email: '' }
    fetchUsers()
  } catch (error) {
    console.error('Erro ao adicionar usuário:', error)
  }
}

const editUser = (user) => {
  form.value = { ...user }
}

const deleteUser = async (id) => {
  if (confirm('Tem certeza que deseja deletar este usuário?')) {
    try {
      await axios.delete(`/api/users/${id}`)
      fetchUsers()
    } catch (error) {
      console.error('Erro ao deletar usuário:', error)
    }
  }
}
</script>

<style scoped>
.users-container {
  background: white;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

h1 {
  color: #333;
  margin-bottom: 2rem;
  border-bottom: 2px solid #4CAF50;
  padding-bottom: 1rem;
}

h2 {
  color: #333;
  margin-bottom: 1rem;
  margin-top: 2rem;
}

.form-section {
  background: #f9f9f9;
  padding: 1.5rem;
  border-radius: 6px;
  margin-bottom: 2rem;
}

form {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 1rem;
  align-items: flex-end;
}

.form-group {
  display: flex;
  flex-direction: column;
}

label {
  color: #333;
  font-weight: 500;
  margin-bottom: 0.5rem;
}

input {
  padding: 0.75rem;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 1rem;
}

input:focus {
  outline: none;
  border-color: #4CAF50;
  box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
}

.btn-primary {
  padding: 0.75rem 1.5rem;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: 500;
  transition: background-color 0.3s;
}

.btn-primary:hover {
  background-color: #45a049;
}

.users-list {
  margin-top: 2rem;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 1rem;
}

thead {
  background-color: #f0f0f0;
}

th {
  padding: 1rem;
  text-align: left;
  font-weight: 600;
  color: #333;
  border-bottom: 2px solid #ddd;
}

td {
  padding: 1rem;
  border-bottom: 1px solid #ddd;
}

tr:hover {
  background-color: #f9f9f9;
}

.btn-edit,
.btn-delete {
  padding: 0.5rem 1rem;
  margin-right: 0.5rem;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 0.9rem;
  transition: opacity 0.3s;
}

.btn-edit {
  background-color: #2196F3;
  color: white;
}

.btn-edit:hover {
  opacity: 0.8;
}

.btn-delete {
  background-color: #f44336;
  color: white;
}

.btn-delete:hover {
  opacity: 0.8;
}

.empty-state {
  text-align: center;
  padding: 2rem;
  color: #999;
}
</style>
