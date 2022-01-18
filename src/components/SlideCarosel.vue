<template>
<!--condition pour recherger le slide -->
    <main v-if="slides.length">
          <v-row>
            <v-col>
              <carousel-3d 
                :height="600"
                :width="500"
                :border=1
                @load="slideHeight()"
              >
                <slide v-for="(slid, i) in slides" :key="i" :index="i">
                  <figure >
                    <v-img :src="PhotoPath+'uploadSlide/'+slid.PhotoFileName"> </v-img>
                  </figure>
                  <hr />
                  <h5 class="txt-slide-titre">{{ slid.titre }}</h5>
                  <figcaption>
                    <p>{{ slid.description }}</p>
                  </figcaption>
                </slide>
              </carousel-3d>
            </v-col>
  </v-row>         
   
    </main>

</template>

<script>
import { Carousel3d, Slide } from "vue-carousel-3d";
import axios from "axios";

const API_URL = "http://127.0.0.1:8000/";
const PHOTO_URL = "http://127.0.0.1:8000/Vuejs-PHP/src/API/";

export default {
  name: "SlideAccueil", 
   
  components: {
    Carousel3d,
    Slide
  },

  data() {
    return {
      /** Tableau slide */
      slides: [],
      slid:"",
      PhotoPath: PHOTO_URL,
      PhotoFileName:"",

    };
  
  },
  
  methods: {
    // **** Recuperer la liste des Slide

       getDataSlide() {
       axios.get(API_URL + "Vuejs-PHP/src/API/data.model_Slide.php?action=getSlide")
         .then((response) => {
           this.slides = response.data.NameSlide;
         });
       },
   
   },
   mounted: function () {
    this.getDataSlide();
    
  }, 

  computed: {
    slideHeight() {
      const sw = parseInt(this.width, 10) + parseInt(this.border, 10) * 2;
      const sh = parseInt(parseInt(this.height) + this.border * 2, 10);
      const ar = this.calculateAspectRatio(sw, sh);
      return this.slideWidth / ar;
    },
  },
};
</script>

<style src="@/assets/css/style.css"></style>
