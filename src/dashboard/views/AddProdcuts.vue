<template>
<v-amin>
      <router-view />
    <Dashboard />
    <v-content>
        <ProductApp /> 
    </v-content>
</v-amin>
   
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