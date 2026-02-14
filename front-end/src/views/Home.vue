<template>
  <div class="home">
    <h1>Bem-vindo ao Humilhando Willian</h1>
    <p>Sistema de gerenciamento de usuários</p>
    
    <!-- Toggle Mensal/Anual -->
    <div class="billing-toggle">
      <span :class="{ active: billingPeriod === 'monthly' }">Mensal</span>
      <button 
        class="toggle-btn"
        @click="billingPeriod = billingPeriod === 'monthly' ? 'annual' : 'monthly'"
      >
        <span class="toggle-switch"></span>
      </button>
      <span :class="{ active: billingPeriod === 'annual' }">Anual (Save 20%)</span>
    </div>

    <!-- Planos de Cursos -->
    <div class="pricing-section">
      <div class="pricing-card basic">
        <div class="plan-header">
          <h2>Plano Básico</h2>
          <p class="description">Perfeito para iniciantes</p>
        </div>
        
        <div class="price">
          <span class="currency">R$</span>
          <span class="amount">{{ basicPrice[billingPeriod] }}</span>
          <span class="period">{{ billingPeriod === 'monthly' ? '/mês' : '/ano' }}</span>
        </div>

        <ul class="features-list">
          <li>✓ 5 cursos básicos</li>
          <li>✓ Acesso por 1 mês</li>
          <li>✓ Suporte por email</li>
          <li>✗ Certificados</li>
          <li>✗ Comunidade exclusiva</li>
        </ul>

        <router-link to="/curso">
          <button class="btn btn-outline">Escolher Plano</button>
        </router-link>
      </div>

      <div class="pricing-card premium">
        <div class="popular-badge">Popular</div>
        <div class="plan-header">
          <h2>Plano Premium</h2>
          <p class="description">Experiência completa</p>
        </div>
        
        <div class="price">
          <span class="currency">R$</span>
          <span class="amount">{{ premiumPrice[billingPeriod] }}</span>
          <span class="period">{{ billingPeriod === 'monthly' ? '/mês' : '/ano' }}</span>
        </div>

        <ul class="features-list">
          <li>✓ Todos os cursos disponíveis</li>
          <li>✓ Acesso vitalício</li>
          <li>✓ Suporte por chat 24/7</li>
          <li>✓ Certificados reconhecidos</li>
          <li>✓ Comunidade exclusiva</li>
        </ul>

        <router-link to="/curso">
          <button class="btn btn-primary">Escolher Plano</button>
        </router-link>
      </div>
    </div>

    <!-- Features da plataforma -->
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
import { ref } from 'vue';

const billingPeriod = ref('monthly');

const basicPrice = {
  monthly: '29.90',
  annual: '299.00'
};

const premiumPrice = {
  monthly: '99.90',
  annual: '999.00'
};
</script>

<style scoped>
.home {
  padding: 3rem 2rem;
  max-width: 1200px;
  margin: 0 auto;
}

h1 {
  color: #333;
  margin-bottom: 0.5rem;
  font-size: 2.5rem;
  text-align: center;
}

p {
  color: #666;
  font-size: 1.1rem;
  margin-bottom: 3rem;
  text-align: center;
}

/* Billing Toggle */
.billing-toggle {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1.5rem;
  margin: 3rem 0 4rem;
}

.billing-toggle span {
  font-size: 1rem;
  color: #999;
  font-weight: 500;
  transition: color 0.3s;
}

.billing-toggle span.active {
  color: #4CAF50;
  font-weight: 700;
}

.toggle-btn {
  position: relative;
  width: 60px;
  height: 32px;
  background-color: #e0e0e0;
  border: none;
  border-radius: 20px;
  cursor: pointer;
  transition: background-color 0.3s;
  padding: 0;
  display: flex;
  align-items: center;
  padding: 2px;
}

.billing-toggle span:last-child.active ~ .toggle-btn,
.toggle-btn:has(+ span.active) {
  background-color: #4CAF50;
}

.toggle-switch {
  width: 28px;
  height: 28px;
  background-color: white;
  border-radius: 50%;
  transition: transform 0.3s;
  display: block;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.billing-toggle:has(span:last-child.active) .toggle-switch {
  transform: translateX(28px);
}

/* Pricing Section */
.pricing-section {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
  margin-bottom: 5rem;
}

.pricing-card {
  background: white;
  border-radius: 12px;
  padding: 2.5rem;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  position: relative;
  transition: transform 0.3s, box-shadow 0.3s;
}

.pricing-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.pricing-card.premium {
  border: 2px solid #4CAF50;
  transform: scale(1.05);
}

.pricing-card.premium:hover {
  transform: scale(1.05) translateY(-8px);
}

.popular-badge {
  position: absolute;
  top: -12px;
  right: 20px;
  background: #4CAF50;
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 700;
}

.plan-header {
  margin-bottom: 1.5rem;
}

.plan-header h2 {
  color: #333;
  margin-bottom: 0.5rem;
  font-size: 1.8rem;
}

.description {
  color: #999 !important;
  margin: 0 !important;
  font-size: 0.95rem;
}

/* Price Display */
.price {
  display: flex;
  align-items: baseline;
  justify-content: center;
  margin: 2rem 0;
  padding: 1.5rem;
  background: #f9f9f9;
  border-radius: 8px;
}

.currency {
  font-size: 1.2rem;
  color: #4CAF50;
  margin-right: 0.3rem;
}

.amount {
  font-size: 2.5rem;
  font-weight: 700;
  color: #333;
}

.period {
  color: #999;
  margin-left: 0.5rem;
  font-size: 1rem;
}

/* Features List */
.features-list {
  list-style: none;
  padding: 0;
  margin: 2rem 0;
  text-align: left;
}

.features-list li {
  padding: 0.75rem 0;
  color: #666;
  border-bottom: 1px solid #f0f0f0;
  font-size: 0.95rem;
}

.features-list li:last-child {
  border-bottom: none;
}

/* Buttons */
.btn {
  width: 100%;
  padding: 0.9rem;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
  margin-top: 1.5rem;
}

.btn-primary {
  background: #4CAF50;
  color: white;
}

.btn-primary:hover {
  background: #45a049;
  transform: scale(1.02);
}

.btn-outline {
  background: white;
  color: #4CAF50;
  border: 2px solid #4CAF50;
}

.btn-outline:hover {
  background: #f0f7f0;
  transform: scale(1.02);
}

/* Platform Features */
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
  text-align: center;
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
  text-align: center !important;
}

a {
  text-decoration: none;
}

a .btn {
  width: 100%;
}

/* Responsivo */
@media (max-width: 768px) {
  .pricing-card.premium {
    transform: scale(1);
  }

  .pricing-card.premium:hover {
    transform: translateY(-8px);
  }

  .pricing-section {
    grid-template-columns: 1fr;
  }

  h1 {
    font-size: 1.8rem;
  }

  .price {
    flex-direction: column;
  }

  .currency,
  .amount,
  .period {
    display: block;
    margin: 0.25rem 0;
  }
}
</style>
