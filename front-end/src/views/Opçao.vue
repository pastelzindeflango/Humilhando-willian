<template>
  <div class="course-details">
    <button class="back-btn" @click="$router.back()">← Voltar</button>
    
    <div class="course-container">
      <!-- Hero Section -->
      <div class="course-hero">
        <img :src="course.image" :alt="course.name" class="course-image">
        <div class="course-info">
          <h1>{{ course.name }}</h1>
          <p class="course-category">{{ course.category }}</p>
          <div class="rating">
            <span class="stars">★★★★★</span>
            <span class="rating-text">{{ course.rating }} ({{ course.reviews }} avaliações)</span>
          </div>
          <p class="course-price">{{ course.price }}</p>
        </div>
      </div>

      <div class="course-body">
        <!-- Conteúdo Principal -->
        <div class="main-content">
          <!-- Descrição -->
          <section class="section">
            <h2>Sobre o Curso</h2>
            <p>{{ course.description }}</p>
          </section>

          <!-- O que você aprenderá -->
          <section class="section">
            <h2>O que você aprenderá</h2>
            <ul class="learning-list">
              <li v-for="(item, index) in course.learningPoints" :key="index">
                ✓ {{ item }}
              </li>
            </ul>
          </section>

          <!-- Requisitos -->
          <section class="section">
            <h2>Requisitos</h2>
            <ul class="requirements-list">
              <li v-for="(req, index) in course.requirements" :key="index">
                • {{ req }}
              </li>
            </ul>
          </section>

          <!-- Conteúdo do Curso -->
          <section class="section">
            <h2>Conteúdo do Curso ({{ course.sections.length }} seções)</h2>
            <div class="sections-list">
              <div v-for="(section, index) in course.sections" :key="index" class="section-item">
                <h3>{{ section.title }}</h3>
                <p>{{ section.lessons }} aulas • {{ section.duration }}</p>
              </div>
            </div>
          </section>

          <!-- Instrutor -->
          <section class="section instructor-section">
            <h2>Seu Instrutor</h2>
            <div class="instructor-card">
              <img :src="course.instructor.image" :alt="course.instructor.name" class="instructor-image">
              <div class="instructor-info">
                <h3>{{ course.instructor.name }}</h3>
                <p>{{ course.instructor.title }}</p>
                <p>{{ course.instructor.bio }}</p>
              </div>
            </div>
          </section>
        </div>

        <!-- Sidebar Conversão -->
        <aside class="sidebar">
          <div class="enrollment-card">
            <p class="price-display">{{ course.price }}</p>
            <button class="btn btn-primary" @click="goToPayment">
              Comprar Agora
            </button>
            <button class="btn btn-outline">
              Adicionar à Lista de Desejos
            </button>
            
            <div class="course-benefits">
              <h3>Inclui</h3>
              <div class="benefits-list">
                <div class="benefit" v-for="(benefit, index) in course.includes" :key="index">
                  <span class="icon">{{ benefit.icon }}</span>
                  <span>{{ benefit.text }}</span>
                </div>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const course = ref({
  name: 'Vue 3 Avançado - Do Zero ao Profissional',
  category: 'Desenvolvimento Web',
  rating: 4.8,
  reviews: 1250,
  price: 'R$ 199,90',
  image: 'https://via.placeholder.com/800x400?text=Vue+3+Course',
  description: 'Domine Vue 3, Composition API, TypeScript e muito mais. Este curso completo oferece tudo que você precisa para se tornar um desenvolvedor Vue profissional. Aprenda desde os conceitos básicos até técnicas avançadas usadas em produção por grandes empresas.',
  learningPoints: [
    'Dominar os fundamentos de Vue 3 e Composition API',
    'Trabalhar com TypeScript em projetos Vue',
    'Implementar state management com Pinia',
    'Criar componentes reutilizáveis e escaláveis',
    'Integrar APIs REST e GraphQL',
    'Otimizar performance de aplicações',
    'Implementar testes com Vitest e Cypress',
    'Fazer deploy de aplicações Vue em produção'
  ],
  requirements: [
    'Conhecimento básico de JavaScript',
    'Familiaridade com HTML e CSS',
    'Editor de código (VS Code recomendado)',
    'Node.js instalado na máquina'
  ],
  sections: [
    { title: 'Introdução e Setup', lessons: 5, duration: '45 min' },
    { title: 'Fundamentos de Vue 3', lessons: 12, duration: '3h 20min' },
    { title: 'Composition API', lessons: 15, duration: '4h 10min' },
    { title: 'Roteamento e SPA', lessons: 10, duration: '2h 50min' },
    { title: 'State Management com Pinia', lessons: 8, duration: '2h 20min' },
    { title: 'Integração com APIs', lessons: 10, duration: '3h' },
    { title: 'Testes Automatizados', lessons: 8, duration: '2h 45min' },
    { title: 'Deploy e Performance', lessons: 6, duration: '1h 50min' }
  ],
  instructor: {
    name: 'João Silva',
    title: 'Desenvolvedor Full Stack | Instructor Certificado',
    image: 'https://via.placeholder.com/100?text=Instructor',
    bio: 'Com mais de 10 anos de experiência em desenvolvimento web, João já trabalhou em projetos de grande escala e agora dedica seu tempo a ensinar os melhores práticas da indústria.'
  },
  includes: [
    { icon: '⏱️', text: 'Acesso vitalício' },
    { icon: '📱', text: 'Acesso mobile' },
    { icon: '📥', text: 'Materiais para download' },
    { icon: '🎓', text: 'Certificado de conclusão' },
    { icon: '💬', text: 'Comunidade de alunos' },
    { icon: '🔄', text: 'Atualizações grátis' }
  ]
})

const goToPayment = () => {
  router.push('/pagamento')
}
</script>

<style scoped>
.course-details {
  min-height: 100vh;
  background: #f5f5f5;
  padding: 1rem;
}

.back-btn {
  background: white;
  border: 1px solid #ddd;
  padding: 0.75rem 1.5rem;
  border-radius: 6px;
  cursor: pointer;
  font-size: 1rem;
  margin-bottom: 2rem;
  transition: all 0.3s;
}

.back-btn:hover {
  background: #f5f5f5;
  border-color: #999;
}

.course-container {
  max-width: 1200px;
  margin: 0 auto;
}

/* Hero Section */
.course-hero {
  background: white;
  border-radius: 12px;
  overflow: hidden;
  margin-bottom: 2rem;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
  padding: 2rem;
  align-items: center;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.course-image {
  width: 100%;
  height: 400px;
  object-fit: cover;
  border-radius: 8px;
}

.course-info h1 {
  font-size: 2.2rem;
  color: #333;
  margin-bottom: 0.5rem;
}

.course-category {
  color: #4CAF50;
  font-weight: 600;
  font-size: 0.95rem;
  margin-bottom: 1rem;
}

.rating {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 1.5rem;
}

.stars {
  font-size: 1.2rem;
  color: #ffc107;
}

.rating-text {
  color: #666;
  font-size: 0.95rem;
}

.course-price {
  font-size: 2rem;
  font-weight: 700;
  color: #4CAF50;
  margin: 0;
}

/* Course Body */
.course-body {
  display: grid;
  grid-template-columns: 1fr 380px;
  gap: 2rem;
}

.main-content {
  background: white;
  border-radius: 12px;
  padding: 2.5rem;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.section {
  margin-bottom: 3rem;
}

.section:last-child {
  margin-bottom: 0;
}

.section h2 {
  color: #333;
  font-size: 1.5rem;
  margin-bottom: 1.5rem;
  border-bottom: 2px solid #4CAF50;
  padding-bottom: 0.75rem;
}

.section p {
  color: #666;
  line-height: 1.6;
  margin-bottom: 1rem;
}

.learning-list,
.requirements-list {
  list-style: none;
  padding: 0;
}

.learning-list li,
.requirements-list li {
  padding: 0.75rem 0;
  color: #555;
  line-height: 1.6;
}

.learning-list li {
  border-bottom: 1px solid #f0f0f0;
}

.sections-list {
  display: grid;
  gap: 1rem;
}

.section-item {
  background: #f9f9f9;
  padding: 1.5rem;
  border-radius: 8px;
  border-left: 4px solid #4CAF50;
}

.section-item h3 {
  color: #333;
  margin-bottom: 0.5rem;
}

.section-item p {
  color: #999;
  font-size: 0.9rem;
  margin: 0;
}

.instructor-section {
  margin-top: 3rem;
}

.instructor-card {
  display: flex;
  gap: 1.5rem;
  background: #f9f9f9;
  padding: 1.5rem;
  border-radius: 8px;
}

.instructor-image {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  object-fit: cover;
}

.instructor-info h3 {
  color: #333;
  margin-bottom: 0.25rem;
}

.instructor-info p {
  color: #666;
  font-size: 0.9rem;
  margin: 0.25rem 0;
}

/* Sidebar */
.sidebar {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.enrollment-card {
  background: white;
  border-radius: 12px;
  padding: 1.5rem;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  position: sticky;
  top: 20px;
}

.price-display {
  font-size: 1.8rem;
  font-weight: 700;
  color: #4CAF50;
  text-align: center;
  margin-bottom: 1rem;
}

.btn {
  width: 100%;
  padding: 0.9rem;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
  margin-bottom: 0.75rem;
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
}

.course-benefits {
  margin-top: 1.5rem;
  padding-top: 1.5rem;
  border-top: 1px solid #e0e0e0;
}

.course-benefits h3 {
  color: #333;
  font-size: 0.95rem;
  margin-bottom: 1rem;
}

.benefits-list {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.benefit {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  color: #666;
  font-size: 0.9rem;
}

.icon {
  font-size: 1.2rem;
}

/* Responsivo */
@media (max-width: 1024px) {
  .course-body {
    grid-template-columns: 1fr;
  }

  .sidebar {
    order: -1;
  }

  .enrollment-card {
    position: static;
  }
}

@media (max-width: 768px) {
  .course-hero {
    grid-template-columns: 1fr;
    padding: 1.5rem;
  }

  .course-image {
    height: 250px;
  }

  .course-info h1 {
    font-size: 1.6rem;
  }

  .main-content {
    padding: 1.5rem;
  }

  .section h2 {
    font-size: 1.2rem;
  }

  .instructor-card {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
}
</style>