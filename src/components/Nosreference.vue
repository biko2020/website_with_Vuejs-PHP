<template>
  <v-main>
    <v-content>
      <v-container>
        <!-- slide barre nos partenaires-->
        <h4 class="txt-bleu text-uppercase">
          <span>Ils nous ont fait confiance :</span>
        </h4>
        <v-row>
          <div class="container py-5">
            <agile :options="myOptions" class="slide">
              <div v-for="(img, index) in img_Barre" :key="index">
                <v-img :src="img.images"> </v-img>
              </div>
              <template slot="prevButton">prev</template>
              <template slot="nextButton">next</template>
            </agile>
          </div>
        </v-row>

        <!-- --------------------- -->
      </v-container>
    </v-content>
  </v-main>
</template>
<script>
import { VueAgile } from "vue-agile";
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

      slide_Barre: "img_Barre",
      img_Barre: [
        {
          images: require("@/assets/logo/references/1.png"),
        },
        {
          images: require("@/assets/logo/references/2.png"),
        },
        {
          images: require("@/assets/logo/references/3.jpg"),
        },
        {
          images: require("@/assets/logo/references/4.png"),
        },
        {
          images: require("@/assets/logo/references/5.jpg"),
        },
        {
          images: require("@/assets/logo/references/6.png"),
        },
        {
          images: require("@/assets/logo/references/7.jpeg"),
        },
        {
          images: require("@/assets/logo/references/8.png"),
        },
        {
          images: require("@/assets/logo/references/9.jpg"),
        },
        {
          images: require("@/assets/logo/references/10.png"),
        },
        {
          images: require("@/assets/logo/references/11.jpg"),
        },
        {
          images: require("@/assets/logo/references/12.jpg"),
        },
      ],
    };
  },
};
</script>
<style src="@/assets/css/style.css"></style>
