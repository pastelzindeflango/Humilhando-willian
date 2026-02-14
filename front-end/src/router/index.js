import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Users from '../views/Users.vue'
import Opçao from '../views/Opçao.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/users',
    name: 'Users',
    component: Users
  },
  {
    path: '/curso',
    name: 'Opçao',
    component: Opçao
  },
  // {
  //   path: '/pagamento',
  //   name: 'Pagamento',
  //   component: () => import('../views/Pagamento.vue')
  // }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
