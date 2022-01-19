<template>
   <v-main>
      <router-view />
    <Dashboard />
    <v-content>
        <LogoReferenceApp /> 
    </v-content>
</v-main>
</template>

<script>

import Dashboard from '@/dashboard/views/Dashboard.vue';
import LogoReferenceApp from '@/dashboard/components/LogoReferenceApp.vue';

export default {
    name: 'AddLogoReference',
    components: {
        Dashboard,
        LogoReferenceApp,
       
    }
    
}
</script>