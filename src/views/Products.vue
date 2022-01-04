<template>
   <v-app>
   <Header />
    <v-content>
      <ProductsApp />
    </v-content>
   <Footer/> 
  </v-app>

</template>

<script>

import Header from "../components/Header.vue";
import ProductsApp from "../components/ProductsApp.vue";
import Footer from "../components/Footer.vue";
export default {
  name: "Products",
  components: {
    
    Header,
    ProductsApp,
    Footer,
  },
};
</script>
<style scoped>
</style>