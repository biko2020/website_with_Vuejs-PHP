<template>
   <v-app>
   <Header />
    <v-content>
      <ServicesApp />
    </v-content>
   <Footer/> 
  </v-app>

</template>

<script>

import Header from "../components/Header.vue";
import ServicesApp from "../components/ServicesApp.vue";
import Footer from "../components/Footer.vue";

export default {
  name: "Services",
  components: {
   
    Header,
    ServicesApp,
    Footer,
  },
};
</script>
<style scoped>
</style>