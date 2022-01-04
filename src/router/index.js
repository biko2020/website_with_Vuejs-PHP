import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Cpanel from '../dashboard/views/Admin.vue'




Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
   
  },
  
  {
   path:'/products',
   name:'Products',
   component: () => import(/* webpackChunkName: "Products" */ '../views/Products.vue')
  },
  {
   path:'/services',
   name:'Services',
   component: () => import(/* webpackChunkName: "Services" */ '../views/Services.vue')

  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  {
    path:'/contact',
    name:'Contact',
    component: () => import(/* webpackChunkName: "Contact" */ '../views/Contact.vue')
  
   },


   //////////////////----------- dashboard Administration -------------////////////////
{
  path: '/admin',
  name:'Admin',
  component:Cpanel,
},
{
 path: '/dashboard',
 name: 'Dashboard',
 component: () => import(/* webpackChunkName: "Dashboard" */ '@/dashboard/views/Dashboard.vue')
},
{
  
  path: '/addCategories',
  name: 'AddCategories',
  component: () => import(/* webpackChunkName: "Categories" */ '@/dashboard/views/AddCategories.vue')
},
{
  path: '/addProducts',
  name: 'AddProducts',
  component: () => import(/* webpackChunkName: "Products" */ '@/dashboard/views/AddProdcuts.vue')
},
   /////////////////////////////////  /////////////////////// //////////////// ///////

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
