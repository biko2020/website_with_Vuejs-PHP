<template>
 <v-main>
    <container>
    <Dashboard />
    <router-view />
     <CategorieApp />
    </container>
 </v-main>
   
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
