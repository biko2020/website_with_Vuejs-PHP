<template>
<v-app>
  
     <router-view></router-view>
    <Dashboard />
    <v-content>
        <SlideApp /> 
    </v-content>
    
</v-app>
   
</template>

<script>

import Dashboard from '@/dashboard/views/Dashboard.vue';
import SlideApp from '@/dashboard/components/SlideApp.vue';

export default {
    name: 'Slides',
    components: {
        Dashboard,
        SlideApp,
       
    }
    
}
</script>