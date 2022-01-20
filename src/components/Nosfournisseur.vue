<template>
  <v-main v-if="fournisseurs.length">

        <v-row class="row text-center pt-md-5 aos-init aos-animate ">
          <v-col lg="12" class="col-12 align-self-center py-md-5 ">
            <v-subheader class="text-h4 justify-center"
              >NOS FOURNISSEURS</v-subheader
            >
            <p>
              NOS PRODUITS SONT DISTRIBUÉS PAR LES PLUS GRANDES MARQUES DE
              L’INDUSTRIE
            </p>
          </v-col>
        </v-row>
        <!--- --- --- --- Animation --- --- --- --->

        <div class="container py-5">
            <agile :options="myOptions" class="slide">
              <div v-for="(img, id) in fournisseurs" :key="id">
                <v-img class="box-logo" :src="PhotoPath+'uploadFournisseur/'+img.PhotoFileName"> </v-img>
              </div>
            </agile>
          </div>
        <!--- --- --- --- ------- --- --- --- --->

  </v-main>
</template>
<script>
import { VueAgile } from "vue-agile";
import axios from "axios";

const API_URL = "http://127.0.0.1:8000/";
const PHOTO_URL = "http://127.0.0.1:8000/Vuejs-PHP/src/API/";
export default {
  name: "Nosfournisseur",
  agile: VueAgile,

  data() {
    return {
      myOptions: {
        navButtons: false,
        fade: false,
        autoplaySpeed: 3000,
        centerMode: true,
        initialSlide: 0,
        slidesToShow: 4,
        autoplay: true,
        infinite: true,

        responsive: [
          {
            breakpoint: 600,
            settings: {
              dots: false,
            },
          },

          {
            breakpoint: 900,
            settings: {
              navButtons: true,
              arrows: true,
              dots: true,
              infinite: true,
            },
          },
        ],
      },

      //logo: "logo_Fournisseurs",
      //logo_Fournisseurs: [ ],
      fournisseurs: [],
      id: 0,
      img:"",
      PhotoPath: PHOTO_URL,
      PhotoFileName:"",
  
    };
  },

   methods: {
      // **** Recuperer la liste des Fournisseurs

      getDataFournisseur() {
       axios.get(API_URL + "Vuejs-PHP/src/API/data.model_Fournisseur.php?action=getFournisseur")
         .then((response) => {
           this.fournisseurs = response.data.FournisseurName;
          
         });
     },
  },
  mounted: function () {
    this.getDataFournisseur();
  
  }, 
};
</script>
<style>

.box-logo {
 margin: 1rem;
}
</style>



