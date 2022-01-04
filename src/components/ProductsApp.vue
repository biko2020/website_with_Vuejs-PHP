<template>
  <v-content>
    <v-container fill-height fluid class="my-15">
      <div></div>
      <v-row class="row text-center pt-md-5 aos-init aos-animate">
        <v-col lg="12" class="col-12 align-self-center py-md-5">
          <v-subheader class="text-h4 justify-center">
            LES PLUS GRANDES MARQUES DE L’INDUSTRIE SOUS UN MÊME
            TOIT</v-subheader
          >
        </v-col>
      </v-row>

      <!--  ************* Debut Bloc Menu de Categories*******************   -->

      <v-row class="row text-center pt-md-5 aos-init aos-animate">
        <div class="justify-center">
          <v-chip
            v-for="item in Categories"
            v-bind:key="item.CategorieId"
            style="width: 367px"
            @click="
              (activeDomaine = item.CategorieName),
                getFilterProducts(item.CategorieName),
                Upload_Image_Product
            "
            :color="activeDomaine === item.CategorieName ? 'success' : ''"
            class="mx-5 my-5 justify-center"
            >{{ item.CategorieName }}</v-chip
          >
        </div>
      </v-row>

      <!--  ************* Fin Bloc Menu *******************   -->

      <v-row justify="center">
        <!--  ******** Slot Produits *********  -->

        <slot>
          <v-col
            lg="4"
            v-for="produit in Produits"
            v-bind:key="produit.ProductId"
          >
            <v-card class="mx-auto my-12" max-width="374" style="height: 500px">
              <v-img
                height="250"
                :src="PhotoPath + produit.PhotoFileName"
                gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              >
              </v-img>

              <v-card-title>{{ produit.ProductName }}</v-card-title>

              <v-card-text>
                <span
                  class="d-inline-block text-truncate"
                  style="max-width: 300px"
                >
                  {{ produit.ProductDecrip }}
                </span>
              </v-card-text>

              <v-divider></v-divider>
              <v-card-actions class="my-2">
                <v-btn
                  color="success"
                  rounded
                  @click="
                    $refs.pageDetailProduit.showDetails(
                      produit.ProductName,
                      produit.ProductDecrip
                    )
                  "
                  >plus
                </v-btn>

                <v-spacer />
                <v-rating
                  :value="4.5"
                  color="amber"
                  dense
                  half-increments
                  readonly
                  size="14"
                >
                </v-rating>
              </v-card-actions>
            </v-card>
          </v-col>
        </slot>
      </v-row>

      <!--referencé notre fenetre Modal( "page detail produits" ) -->
      <modal ref="pageDetailProduit"> </modal>
      <!-- *---------------------------------------------------* -->
    </v-container>
  </v-content>
</template>

<script>
import Modal from "@/components/Modal.vue";
import axios from "axios";

const API_URL = "http://127.0.0.1:8000/";
const PHOTO_URL = "http://127.0.0.1:8000/Photos/";

export default {
  name: "ProductsApp",

  components: {
    Modal,
  },

  data() {
    return {
      Categories: [],
      Produits: [],
      activeDomaine: "",
      PhotoPath: PHOTO_URL,
      PhotoFileName: "",
    };
  },

  methods: {
    // ---* fonction pour récuperer la liste des catégories
    getCategories() {
      axios.get(API_URL + "categorie").then((response) => {
        this.Categories = response.data;
      });
    },

    // ---* fonction pour filtrer la liste des produits par catégorie
    getFilterProducts(ref_categorie) {
      axios.get(API_URL + `producte/${ref_categorie}`).then((response) => {
        this.Produits = response.data;
      });
    },

    // ---* fonction chargement de l'image du produit
    Upload_Image_Product(produit) {
      this.PhotoFileName = produit.PhotoFileName;
    },
  },

  // ---* function mounted ---

  mounted: function () {
    this.getCategories();
    this.getFilterProducts();
    this.Upload_Image_Product;
  },
};
</script>

<style src="@/assets/css/style.css"></style>
