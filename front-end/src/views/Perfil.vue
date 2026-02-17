<template>
  <div class="profile-page">
    <header class="profile-hero">
      <h1>Meu Perfil</h1>
      <p class="muted">Veja seus dados, planos comprados e cursos concluídos</p>
    </header>

    <div class="profile-grid">
      <!-- left: informações do usuário -->
      <aside class="profile-card">
        <h2>Informações</h2>
        <div class="info-row"><strong>Nome</strong><span>{{ auth.user?.name || '—' }}</span></div>
        <div class="info-row"><strong>Email</strong><span>{{ auth.user?.email || '—' }}</span></div>

        <div class="card-actions">
          <button class="btn-outline" @click="refresh">Atualizar</button>
          <button class="btn-primary" @click="logout">Sair</button>
        </div>
      </aside>

      <!-- right: planos e cursos -->
      <section class="content-column">
        <div class="card plans-card">
          <h3>Planos comprados</h3>

          <div v-if="hasPlans" class="plan-list">
            <div class="plan-item" v-for="plan in auth.user.plans" :key="plan.id">
              <div>
                <div class="plan-name">{{ plan.name }}</div>
                <div class="muted small">{{ plan.description }}</div>
              </div>
              <div class="plan-price">R$ {{ formatPrice(plan.price) }}</div>
            </div>
          </div>

          <div v-else class="empty-state muted">Nenhum plano comprado.</div>
        </div>

        <div class="card courses-card">
          <h3>Cursos concluídos</h3>

          <ul v-if="hasCourses" class="course-list">
            <li class="course-item" v-for="course in auth.user.courses" :key="course.id">
              <div>
                <strong>{{ course.title }}</strong>
                <div class="muted small">{{ course.description }}</div>
              </div>
              <div class="muted small">{{ course.duration_minutes || '—' }} min</div>
            </li>
          </ul>

          <div v-else class="empty-state muted">Nenhum curso concluído.</div>
        </div>
      </section>
    </div>
  </div>
</template>

<script setup>
import { onMounted, computed } from 'vue'
import { useAuthStore } from '../stores/auth'
const auth = useAuthStore()

onMounted(() => { auth.fetchUser() })

const hasPlans = computed(() => Array.isArray(auth.user?.plans) && auth.user.plans.length > 0)
const hasCourses = computed(() => Array.isArray(auth.user?.courses) && auth.user.courses.length > 0)

function refresh() { auth.fetchUser() }
function logout() { auth.logout() }

function formatPrice(v) {
  if (v === null || v === undefined) return '0,00'
  return Number(v).toFixed(2).replace('.', ',')
}
</script>

<style scoped>
.profile-page { max-width: 1100px; margin: 0 auto; padding: 2rem 1rem; }
.profile-hero h1 { color: #333; margin-bottom: 0.25rem; font-size: 2rem }
.profile-hero .muted { color: #666; margin-bottom: 1.5rem }

.profile-grid { display: grid; grid-template-columns: 320px 1fr; gap: 1.5rem; align-items: start }
.profile-card, .card { background: white; padding: 1.25rem; border-radius: 10px; box-shadow: 0 6px 18px rgba(12,12,12,0.06) }
.profile-card h2 { margin-bottom: 1rem; color: #333 }
.info-row { display: flex; justify-content: space-between; align-items: center; padding: 0.6rem 0; border-bottom: 1px solid #f0f0f0 }
.info-row:last-child { border-bottom: none }
.card h3 { margin: 0 0 1rem 0; color: #333 }

.card-actions { display: flex; gap: 0.75rem; margin-top: 1rem }
.btn-primary, .btn-outline { padding: 0.6rem 1rem; border-radius: 6px; font-weight: 600; cursor: pointer; border: none }
.btn-primary { background: #4CAF50; color: white }
.btn-outline { background: transparent; color: #4CAF50; border: 2px solid #4CAF50 }
.btn-outline:hover { background: #f6fbf6 }

.plan-list { display: flex; flex-direction: column; gap: 0.5rem }
.plan-item { display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; border-radius: 8px; background: #fafafa; border: 1px solid #f0f0f0 }
.plan-name { font-weight: 700; color: #333 }
.plan-price { color: #2a9d8f; font-weight: 700 }
.course-list { list-style: none; padding: 0; margin: 0; display: grid; gap: 0.5rem }
.course-item { display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; border-radius: 8px; background: #fafafa; border: 1px solid #f0f0f0 }
.small { font-size: 0.95rem }
.muted { color: #666 }
.empty-state { padding: 1rem; text-align: center; color: #999 }

@media (max-width: 860px) {
  .profile-grid { grid-template-columns: 1fr; }
  .profile-card { order: 2 }
  .content-column { order: 1 }
}
</style>
