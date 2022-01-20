<template>
  <v-container fill-height fluid class="my-15">
    <section class="section about-hero">
      <div class="grid about-hero__grid">
        <div class="grid__item grid__item--tablet-up-half about-hero__content">
          <div class="section-heading gutter-bottom--reset">
            <p
              class="
                  section-heading__kicker
                  heading--5
                  text-left--tablet-up
                  text-center--mobile
                  color-black
                "
            >
              About us
            </p>
            <h1
              class="
                  section-heading__heading
                  heading--1
                  text-left--tablet-up
                  text-center--mobile
                  about-hero__heading
                "
            >
              HORIZON EQUIPEMENT
            </h1>
            <p
              class="
                  section-heading__subhead
                  heading--2 heading--3
                  text-left--tablet-up
                  text-center--mobile
                "
            >
              est une société qui opère dans le domaine de la distribution de
              matériel, prestation d’études, d’installation, mise en service et
              réalisation des œuvres. Grâce à la vaste gamme de produits HORIZON
              EQUIPEMENT couvre différents secteurs tels que les loisirs, le
              civil,l’industriel/ chantier, l’agriculture,.....
            </p>
          </div>
        </div>
        <div
          class="
              grid__item grid__item--tablet-up-half
              about-hero__image-container
            "
        >
          <span
            class="image lazyload-image about-hero__image-spill"
            style="max-width: 837px; max-height: 564px"
            ><span
              class="lazyload-image__placeholder"
              style="padding-bottom: 67.3835%"
              ><img
                alt=""
                data-sizes="100vw"
                data-srcset=""
                class="lazyloaded"
                sizes="100vw"
                srcset="
                    @/assets/images/img_Aboutus/1.jpg
                  "/></span
          ></span>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="grid grid--vertically-centered about-online-store">
        <div
          class="grid__item grid__item--tablet-up-half about-online-store__image-container"
        >
          <picture class="picture about-online-store__image">
            <img
              class=" lazyloaded"
              srcset="@/assets/images/img_Aboutus/logo.png"
            />
          </picture>
        </div>
        <div
          class="
              grid__item grid__item--tablet-up-half
              about-online-store__content
            "
        >
          <div
            class="
                section-heading
                about-online-store__content
                gutter-bottom--reset
              "
          >
            <p
              class="
                  section-heading__kicker
                  heading--5
                  color-green-80
                  text-left--tablet-up
                  text-center--mobile
                  gutter-bottom--half
                "
            >
              Histoire de HORIZON EQUIPEMENT
            </p>
            <h2
              class="
                  section-heading__heading
                  text-left--tablet-up
                  text-center--mobile
                  gutter-bottom--half
                  about-heading
                "
            >
              Le premier démarrage de HORIZON EQUIPEMENT
            </h2>
            <p
              class="
                  section-heading__subhead
                  text-major
                  text-left--tablet-up
                  text-center--mobile
                  color-gray-80
                  gutter-bottom--reset
                "
            >
              Notre histoire dans ce secteur d'activité commence depuis les
              années ...
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- composant nos partenaires-->
    <Nosreference />
    <!-- --------------------- -->
    <section class="section about-hero">
      <div class="grid grid--vertically-centered">
        <div
          class="grid__item grid__item--tablet-up-two-thirds grid__item--tablet-up-push-1"
        >
          <div class="section-heading about-mission__content">
            <h2
              class="section-heading__heading gutter-bottom--half about-heading"
            >
              Ils nous ont fait confiance :
            </h2>
            <hr />
            
               <div v-for="(text, id) in textes" :key="id">
                 <p class="section-heading__subhead text-major color-green-80 ">
              <br />
               {{text.nom}}<br></p>
               </div>           
          </div>
        </div>
      </div>
    </section>
    <hr />
  </v-container>
</template>
<script>

import axios from "axios";
const API_URL = "http://127.0.0.1:8000/";

import Nosreference from "../components/Nosreference.vue";
export default {
  name: "AboutApp",
  components: {
    Nosreference,
  },

  data() {
    return{
      textes: [],
      text:"",

    };
  },

 methods: {
      // **** Recuperer la liste des Partenaires

     getDataPartenaire() {
       axios.get(API_URL + "Vuejs-PHP/src/API/data.model_Partenaire.php?action=getPartenaire")
         .then((response) => {
           this.textes = response.data.NamePartenaire;
          
         });
     },
  },
  mounted: function () {
    this.getDataPartenaire();
  
  }, 
};
</script>

<style src="@/assets/css/about.css"></style>
