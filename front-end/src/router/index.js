import Vue from 'vue'
import Router from 'vue-router'
import Baju from '@/components/Baju'
import Celana from '@/components/Celana'
import Sepatu from '@/components/Sepatu'
import FormBaju from '@/components/FormBaju'
import FormCelana from '@/components/FormCelana'
import FormSepatu from '@/components/FormSepatu'

import Home from '@/components/Home'

import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/sepatu',
      name: 'Sepatu',
      component: Sepatu
    },
    {
      path: '/sepatu/create',
      name: 'SepatuCreate',
      component: FormSepatu
    },
    {
      path: '/sepatu/:id',
      name: 'SepatuEdit',
      component: FormSepatu
    },
    {
      path: '/celana',
      name: 'Celana',
      component: Celana
    },
    {
      path: '/celana/create',
      name: 'CelanaCreate',
      component: FormCelana
    },
    {
      path: '/celana/:id',
      name: 'CelanaEdit',
      component: FormCelana
    },
    {
      path: '/baju',
      name: 'Baju',
      component: Baju
    },
    {
      path: '/baju/create',
      name: 'BajuCreate',
      component: FormBaju
    },
    {
      path: '/baju/:id',
      name: 'BajuEdit',
      component: FormBaju
    }]
})
