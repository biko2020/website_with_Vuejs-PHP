<template>
   <v-app>
   <Header />
    <v-main>
      <HeroComponents />
    </v-main>
   <Footer/> 
  </v-app>

</template>

<script>
import Header from "../components/Header.vue";
import HeroComponents from "../components/HeroComponents.vue";
import Footer from "../components/Footer.vue";


export default {
  name: "Home",

  components: {
    Header,
    HeroComponents,
    Footer,
    
   
  },
};
</script>
<style scoped>
</style>