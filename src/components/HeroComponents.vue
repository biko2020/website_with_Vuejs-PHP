<template>
  <v-app>
    <v-main>
      <v-content>
        <v-container fill-height fluid class="my-15 ">
          <v-row>
            <v-col>
              <carousel-3d
                :height="600"
                :width="500"
                :border="1"
                @load="slideHeight()"
              >
                <slide v-for="(slid, i) in slid3dImg" :key="i" :index="i">
                  <figure>
                    <v-img :src="slid.image"> </v-img>
                  </figure>
                  <hr />
                  <h5 class="txt-slide-titre">{{ slid.title }}</h5>
                  <figcaption>
                    <p>{{ slid.sousTitle }}</p>
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
            <div class="row-gris-fonce  bloc-gris">
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
export default {
  name: "HeroComponents",

  components: {
    Nosrefence,
  },
  Carousel3d,
  Slide,

  data() {
    return {
      /** slide carousel 3 D */
      slid3dImg: [
        {
          image: require("@/assets/images/carousel_accueil/1.jpg"),
          title: "Groupes électrogènes-pompes",
          sousTitle:
            "Prenez le temps de vous poser les bonnes questions ! Nos experts vous conseillent sur ce qu'il faut savoir avant d'acheter un equipement ou de choisir une machine industrielle.",
        },
        {
          image: require("@/assets/images/carousel_accueil/2.jpg"),
          title: "Matériel technique",
          sousTitle:
            "Professionnel, vous avez besoin de conseils pour choisir vos équipements  ? Vous êtes à la recherche des dernières tendances du marché pour mieux développer votre établissement ? Horizon equipement est fait pour VOUS ! Vous aurez toutes les réponses à vos questions.",
        },
        {
          image: require("@/assets/images/carousel_accueil/3.jpg"),
          title:
            "Conditionnement de produits en sac (Pesage, couture, soudure)",
          sousTitle:
            "Nous mettons à contribution notre expertise, notre expérience et notre écosystème de professionnels pour vous accompagner dans l’achat de vos machines et équipements industriels.",
        },
        {
          image: require("@/assets/images/carousel_accueil/4.jpg"),
          title: "Matériel didactique et scientifique-instrument de mesure",
          sousTitle:
            "Horizon equipement vous offre des equipements didactiques dédiés à l’enseignemen supérieur et des outils technologiques modernes pour une formation rapide, facile et efficace.",
        },
        {
          image: require("@/assets/images/carousel_accueil/5.jpg"),
          title: "Matériel de sûreté et de défense",
          sousTitle:
            "Vous êtes à la recherche de dernier équipements en matière de sécurité et de défense, Horizon equipement vous offre toute une gamme de produits : Equipement Anti-Riot, Engrenages militaires, Gilet pare-balles, Solution d’armures transparente, Décontamination, Détection explosive. ",
        },
      ],
    };
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
