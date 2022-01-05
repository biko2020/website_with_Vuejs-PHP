<template>
 <v-app>
    <Dashboard />
    <router-view />
   <v-content>
        <CategorieApp />
   </v-content>
 </v-app>
   
</template>
<script>
import Dashboard from '@/dashboard/views/Dashboard.vue';
import CategorieApp from '@/dashboard/components/CategorieApp.vue';
export default {
    name:'Categories',
    components: {
        Dashboard,
        CategorieApp,
    }
    
}
</script>
