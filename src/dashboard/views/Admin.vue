<template>
    <v-app>
        <router-view></router-view>
        <Header />
    <v-content>
       <Body />
        
    </v-content>
  </v-app>

</template>

<script>
import Header from '@/dashboard/components/Admin/Header.vue';
import Body from '@/dashboard/components/Admin/Body.vue';
export default {
    name: 'Admin',

    components: {
        Header,
        Body,
    },

    data() {
        
        return {
            
        }

    }

}
</script>