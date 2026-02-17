import { defineStore } from 'pinia'
import api from '../services/api'
import router from '../router'

// keep axios Authorization header if token already in localStorage
const savedToken = localStorage.getItem('token')
if (savedToken) {
  api.defaults.headers.common['Authorization'] = `Bearer ${savedToken}`
}

export const useAuthStore = defineStore('auth', {
  state: () => ({
    token: savedToken || null,
    user: JSON.parse(localStorage.getItem('user') || 'null'),
    loading: false,
    errors: null,
  }),
  actions: {
    setToken(token) {
      this.token = token
      if (token) {
        localStorage.setItem('token', token)
        api.defaults.headers.common['Authorization'] = `Bearer ${token}`
      } else {
        localStorage.removeItem('token')
        delete api.defaults.headers.common['Authorization']
      }
    },
    setUser(user) {
      this.user = user
      if (user) localStorage.setItem('user', JSON.stringify(user))
      else localStorage.removeItem('user')
    },
    async register(payload) {
      this.loading = true
      try {
        const res = await api.post('/register', payload)
        this.setToken(res.data.token)
        this.setUser(res.data.user)
        router.push('/')
      } catch (e) {
        this.errors = e.response?.data?.errors || e.response?.data || { message: e.message }
        throw e
      } finally {
        this.loading = false
      }
    },
    async login(payload) {
      this.loading = true
      try {
        const res = await api.post('/login', payload)
        this.setToken(res.data.token)
        this.setUser(res.data.user)
        router.push('/')
      } catch (e) {
        this.errors = e.response?.data?.errors || e.response?.data || { message: e.message }
        throw e
      } finally {
        this.loading = false
      }
    },
    logout() {
      this.setToken(null)
      this.setUser(null)
      router.push('/login')
    },
    async fetchUser() {
      if (!this.token) return
      try {
        const res = await api.get('/user')
        this.setUser(res.data.user)
      } catch (e) {
        this.logout()
      }
    },
  },
})
