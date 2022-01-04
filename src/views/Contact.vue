
<template>
   <v-app>
   <Header />
    <v-content>
        <ContactApp />
    </v-content>
   <Footer/> 
  </v-app>

</template>

<script>
import Header from "../components/Header.vue";
import ContactApp from "../components/ContactApp.vue";
import Footer from "../components/Footer.vue";


export default {
  name: "Contact",
  components: {
    Header,
    ContactApp,
    Footer,
  },
  
};
</script>
<style scoped>
</style>
