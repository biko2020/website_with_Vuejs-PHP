<template>
<v-app>
  
     <router-view></router-view>
    <Dashboard />
    <v-content>
        <ProductApp /> 
    </v-content>
    
</v-app>
   
</template>

<script>

import Dashboard from '@/dashboard/views/Dashboard.vue';
import ProductApp from '@/dashboard/components/ProductApp.vue';

export default {
    name: 'Products',
    components: {
        Dashboard,
        ProductApp,
       
    }
    
}
</script>