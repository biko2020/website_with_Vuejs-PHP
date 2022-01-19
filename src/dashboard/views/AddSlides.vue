<template>
 <v-main>
    <container>
    <Dashboard />
    <router-view />
     <SlideApp />
    </container>
 </v-main>

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