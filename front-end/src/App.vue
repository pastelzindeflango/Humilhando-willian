<template>
  <div id="app">
    <header class="navbar">
      <nav>
        <router-link to="/">Home</router-link>
        <router-link to="/users">Usuários</router-link>
        <router-link to="/cadastro">Cadastro</router-link>
        <router-link v-if="auth.user" to="/perfil">Perfil</router-link>
        <router-link v-if="!auth.user" to="/login">Login</router-link>
        <button v-else class="logout-btn" @click="auth.logout()">Sair</button>
      </nav>
    </header>
    <main class="container">
      <router-view></router-view>
    </main>
  </div>
</template>

<script setup>
import { useAuthStore } from './stores/auth'
const auth = useAuthStore()
</script>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
  background-color: #f5f5f5;
}

#app {
  min-height: 100vh;
}

.navbar {
  background-color: #333;
  padding: 1rem 0;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

nav {
  display: flex;
  gap: 2rem;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
}

nav a {
  color: white;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.3s;
}

nav a:hover {
  color: #4CAF50;
}

nav a.router-link-active {
  color: #4CAF50;
  border-bottom: 2px solid #4CAF50;
  padding-bottom: 0.5rem;
}

.logout-btn {
  background: transparent;
  border: none;
  color: white;
  font-weight: 500;
  cursor: pointer;
}

.container {
  max-width: 1200px;
  margin: 2rem auto;
  padding: 0 1rem;
}
</style>
