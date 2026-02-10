<template>
  <div class="home">
    <h1>Bem-vindo ao Humilhando Willian</h1>
    <p>Sistema de gerenciamento de usuários</p>
    <div class="features">
      <div class="feature-card">
        <h2>Vue 3</h2>
        <p>Framework progressivo para interfaces de usuário</p>
      </div>
      <div class="feature-card">
        <h2>Laravel</h2>
        <p>Framework PHP poderoso e elegante</p>
      </div>
      <div class="feature-card">
        <h2>MySQL</h2>
        <p>Banco de dados relacional confiável</p>
      </div>
    </div>
  </div>
</template>

<script setup>
</script>

<style scoped>
.home {
  text-align: center;
  padding: 3rem 0;
}

h1 {
  color: #333;
  margin-bottom: 1rem;
}

p {
  color: #666;
  font-size: 1.1rem;
  margin-bottom: 3rem;
}

.features {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
  margin-top: 2rem;
}

.feature-card {
  background: white;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
}

.feature-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.feature-card h2 {
  color: #4CAF50;
  margin-bottom: 1rem;
}

.feature-card p {
  color: #666;
  font-size: 1rem;
}
</style>
