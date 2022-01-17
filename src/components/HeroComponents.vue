<template>
  <v-app>
    <v-main>
      <v-content>
        <v-container fill-height fluid class="my-15">
          <v-row>
            <v-col>
              <carousel-3d
                :height="600"
                :width="500"
                :border="1"
                @load="slideHeight(),
                Upload_Image_Slide"
              >
                <slide v-for="slidImg in slid3dImg" :key="slidImg.id" >
                  <figure>
                    <v-img :src="PhotoPath +'uploadSlide/'+ slidImg.PhotoFileName"> </v-img>
                  </figure>
                  <hr />
                  <h5 class="txt-slide-titre">{{ slidImg.titre }}</h5>
                  <figcaption>
                    <p>{{ slidImg.description }}</p>
                  </figcaption>
                </slide>
              </carousel-3d>
            </v-col>
          </v-row>

          <v-row
            class="grid about-hero"
            align-content="center"
            justify="center"
          >
            <v-col lg="10">
              <div class="container py-5">
                <div
                  class="row py-md-5 aos-init aos-animate"
                  data-aos="fade-up"
                >
                  <div class="col text-center">
                    <h3 class="txt-bleu text-uppercase">
                      Livrer la performance attendue
                    </h3>
                    <p>
                      La mauvaise conception du système est souvent la première
                      cause d’un problème lié au pneumatique. Nous nous faisons
                      un point d’honneur de livrer des solutions dotées d’une
                      ingéniosité solide et qui satisfont vos attentes de
                      performance et permettent de maximiser votre retour sur
                      investissement.
                    </p>
                  </div>
                </div>
              </div>
            </v-col>
          </v-row>

          <!-- composant nos partenaires-->
          <Nosrefence />
          <!-- --------------------- -->

          <v-row class="grid about-hero">
            <v-col>
              <div class="container py-5">
                <div
                  class="row pt-md-5 aos-init aos-animate"
                  data-aos="fade-up"
                >
                  <div class="col text-center mb-4">
                    <h4 class="txt-bleu text-uppercase">
                      L’extension parfaite de votre R&amp;D pour :
                    </h4>
                  </div>
                </div>
                <div
                  class="row mt-4 pb-md-5 aos-init aos-animate"
                  data-aos="fade-up"
                >
                  <div class="col-md-4 separateur-v-bf">
                    <h3 class="txt-bleu font-weight-bold">CONCEVOIR</h3>
                    <p class="small">
                      Nouveau système avec fonctions simples ou sophistiquées
                    </p>
                  </div>
                  <div class="col-md-4 separateur-v-bf">
                    <h3 class="txt-bleu font-weight-bold">OPTIMISER</h3>
                    <p class="small">
                      Contrôle précis de la vitesse du système pneumatique et
                      productivité optimale
                    </p>
                  </div>
                  <div class="col-md-4 m-0">
                    <h3 class="txt-bleu font-weight-bold">RÉPARER</h3>
                    <p class="small">
                      Analyse des performances et amélioration de la durabilité
                    </p>
                  </div>
                </div>
              </div>
            </v-col>
          </v-row>
          <v-row>
            <div class="row-gris-fonce bloc-gris">
              <div class="container py-5">
                <div
                  class="row pt-md-5 aos-init aos-animate"
                  data-aos="fade-up"
                >
                  <div class="col-12 col-sm-6 col-md-4 px-4 mb-5">
                    <img
                      class="mb-3 mb-sm-5 img-fluid"
                      src="@/assets/images/img_home/1.jpg"
                    />
                    <h4 class="txt-bleu-ciel separateur-left">
                      INGÉNIERIE PERFORMANTE
                    </h4>
                    <p class="txt-blanc">
                      La qualité et la rigueur dans la conception de nos
                      systèmes vous assurent une combinaison parfaite
                      sollicitant les capacités maximales de chaque composante
                    </p>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 px-4 mb-5">
                    <img
                      class="mb-3 mb-sm-5 img-fluid"
                      src="@/assets/images/img_home/2.jpg"
                    />
                    <h4 class="txt-bleu-ciel separateur-left">
                      ASSEMBLAGE FIABLE ET PRÉCIS
                    </h4>
                    <p class="txt-blanc">
                      Bien assemblé. Parfaitement calibré. Nos systèmes
                      pneumatiques sont fabriqués avec un souci du détail qui
                      vous procure des gains d’efficacité.
                    </p>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 px-4 mb-5">
                    <img
                      class="mb-3 mb-sm-5 img-fluid"
                      src="@/assets/images/img_home/3.jpg"
                    />
                    <h4 class="txt-bleu-ciel separateur-left">
                      INSTALLATION IRRÉPROCHABLE
                    </h4>
                    <p class="txt-blanc">
                      La mise en route de vos systèmes pneumatiques est
                      profitable. Nos experts sont sur place et collaborent avec
                      vous jusqu’à la toute fin, et même après.
                    </p>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 px-4 mb-5">
                    <img
                      class="mb-3 mb-sm-5 img-fluid"
                      src="@/assets/images/img_home/4.jpg"
                    />
                    <h4 class="txt-bleu-ciel separateur-left">
                      SERVICE TECHNIQUE EFFICACE
                    </h4>
                    <p class="txt-blanc">
                      Rapidité. Fiabilité. Disponibilité. Notre service de haut
                      calibre offre tout ce que vous êtes en droit de vous
                      attendre d’un service efficace.
                    </p>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 mr-auto-sm px-4 mb-5">
                    <img
                      class="mb-3 mb-sm-5 img-fluid"
                      src="@/assets/images/img_home/5.jpg"
                    />
                    <h4 class="txt-bleu-ciel separateur-left">
                      PIÈCES LIVRÉES RAPIDEMENT
                    </h4>
                    <p class="txt-blanc">
                      Le plus grand inventaire de pièces pneumatiques dans l’est
                      du Canada, prêtes à être livrées rapidement.
                    </p>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 mr-auto-sm px-4 mb-5">
                    <img
                      class="mb-3 mb-sm-5 img-fluid"
                      src="@/assets/images/img_home/6.png"
                    />
                    <h4 class="txt-bleu-ciel separateur-left">
                      QUALITE DE PRODUITS
                    </h4>
                    <p class="txt-blanc">
                      Le plus grand inventaire de pièces pneumatiques dans l’est
                      du Canada, prêtes à être livrées rapidement.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <p />
            <p />
            <p />
          </v-row>

          <v-row>
            <div class="container py-5">
              <div
                class="row pt-md-5 aos-init aos-animate"
                data-aos="fade-up"
              ></div>
            </div>
          </v-row>
        </v-container>
      </v-content>
    </v-main>
  </v-app>
</template>

<script>
import { Carousel3d, Slide } from "vue-carousel-3d";
import Nosrefence from "../components/Nosreference.vue";
import axios from "axios";

const API_URL = "http://127.0.0.1:8000/";
const PHOTO_URL = "http://127.0.0.1:8000/Vuejs-PHP/src/API/";

export default {
  name: "HeroComponents",

  components: {
    Nosrefence,
  },
  Carousel3d,
  Slide,

  data() {
    return {
      /** Tableau slide */
      slid3dImg: [],
      PhotoPath: PHOTO_URL,
      PhotoFileName: "",
    };
  },
  
  methods: {
    // **** Recuperer la liste des Slide

     getDataSlide() {
       axios
         .get(API_URL + "Vuejs-PHP/src/API/data.model_Slide.php?action=getSlide")
         .then((response) => {
           this.slid3dImg = response.data.NameSlide;
         });
     },

        // ---* fonction chargement de l'image du slide
    Upload_Image_Slide(slidImg) {
      this.PhotoFileName = slidImg.PhotoFileName;
    },
 
 
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
