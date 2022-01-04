<template>
<v-app>
  
     <router-view></router-view>
    <Header />
    <v-content>
        <ProductApp /> 
    </v-content>
    
</v-app>
   
</template>

<script>

import Header from '@/dashboard/components/Admin/Header.vue';
import ProductApp from '@/dashboard/components/ProductApp.vue';

export default {
    name: 'Products',
    components: {
        Header,
        ProductApp,
       
    }
    
}
</script>