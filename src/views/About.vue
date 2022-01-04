<template>
   <v-app>
   <Header />
    <v-content>
       <AboutApp />
    </v-content>
   <Footer/> 
  </v-app>

</template>

<script>

import Header from "../components/Header.vue";
import AboutApp from "../components/AboutApp.vue";
import Footer from "../components/Footer.vue";

export default {
  name: "About",
  components: {
    Header,
    AboutApp,
    Footer,
  },
};
</script>
<style scoped>
</style>
