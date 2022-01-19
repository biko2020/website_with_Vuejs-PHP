<template>
   <v-main>
      <router-view />
    <Dashboard />
    <v-content>
        <ReferenceApp /> 
    </v-content>
</v-main>
</template>

<script>

import Dashboard from '@/dashboard/views/Dashboard.vue';
import ReferenceApp from '@/dashboard/components/ReferenceApp.vue';

export default {
    name: 'Products',
    components: {
        Dashboard,
        ReferenceApp,
       
    }
    
}
</script>