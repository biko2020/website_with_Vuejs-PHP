<template>
   <v-main>
      <router-view />
    <Dashboard />
    <v-content>
        <LogoReFournisseurApp /> 
    </v-content>
</v-main>
</template>

<script>

import Dashboard from '@/dashboard/views/Dashboard.vue';
import LogoReFournisseurApp from '@/dashboard/components/LogoFournisseurApp.vue';

export default {
    name: 'AddLogoReFournisseur',
    components: {
        Dashboard,
        LogoReFournisseurApp,
       
    }
    
}
</script>