import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Cpanel from '../dashboard/views/Admin.vue'

import Dashboard from '../dashboard/views/Dashboard.vue'
import Welcome from '../dashboard/views/Welcome.vue'
import AddCategories from '../dashboard/views/AddCategories.vue'
import AddProducts from '../dashboard/views/AddProdcuts.vue'





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
 component: Dashboard,

       // --> childe for Dashboard

    children:[
      {
        path: '/',
        component: Welcome
      },
      {
        path: '/addCategories',
        name: 'AddCategories',
        component: AddCategories
      },
      {
        path: '/addProducts',
        name: 'AddProducts',
        component: AddProducts
        
      }
    ]

},


   /////////////////////////////////  /////////////////////// //////////////// ///////

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
