<template>
  <v-main>
        <!-- slide barre nos partenaires-->
        <h4 class="txt-bleu text-uppercase">
          <span>Ils nous ont fait confiance :</span>
        </h4>
        <v-row>
          <div class="container py-5">
            <agile :options="myOptions" class="slide">
              <div v-for="(img, index) in img_Barre" :key="index">
                <v-img :src="PhotoPath+'uploadPartenaire/'+img.PhotoFileName"> </v-img>
              </div>
              <template slot="prevButton">prev</template>
              <template slot="nextButton">next</template>
            </agile>
          </div>
        </v-row>

        <!-- --------------------- -->
  </v-main>
</template>
<script>
import { VueAgile } from "vue-agile";
import axios from "axios";

const API_URL = "http://127.0.0.1:8000/";
const PHOTO_URL = "http://127.0.0.1:8000/Vuejs-PHP/src/API/";

export default {
  name: "Nosreference",
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

      //slide_Barre: "img_Barre",
      img_Barre: [],
      img:"",
      PhotoPath: PHOTO_URL,
      PhotoFileName:"",
    };
  },

  methods: {
      // **** Recuperer la liste des Partenaires

     getDataPartenaire() {
       axios.get(API_URL + "Vuejs-PHP/src/API/data.model_Partenaire.php?action=getPartenaire")
         .then((response) => {
           this.img_Barre = response.data.NamePartenaire;
          
         });
     },
  },
  mounted: function () {
    this.getDataPartenaire();
  
  }, 
};
</script>
<style src="@/assets/css/style.css"></style>
