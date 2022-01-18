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
                getFilterProducts(activeDomaine)"
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
            v-bind:key="produit.ProductId "
          >
            <v-card class="mx-auto my-12" max-width="374" style="height: 500px">
              <v-img
                height="250"
                :src="PhotoPath +'upload/'+ produit.PhotoFileName"
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
const PHOTO_URL = "http://127.0.0.1:8000/Vuejs-PHP/src/API/";

export default {
  name: "ProductsApp",

  components: {
    Modal,
  },

  data() {
    return {
      Categories: [],
      Produits: [],
      defaultCatgetorie: "Matériel technique",
      PhotoPath: PHOTO_URL,
      PhotoFileName: "",

      activeDomaine:"",
    };
  },

  methods: {
    // ---* fonction pour récuperer la liste des catégories
    getCategories() {
      
      axios.get(API_URL + "Vuejs-PHP/src/API/data.model.php?action=getCategorie")
      .then((response) => {
        this.Categories = response.data.NameCategorie;
        this.defaultCatgetorie = this.Categories[0].CategorieName;
        
      });
    },

    // ---* fonction pour filtrer la liste des produits par catégorie
   getFilterProducts(getSelectCatory) {

      let rowData = { getSelectCatory: getSelectCatory };
      rowData = JSON.stringify(rowData);
      let formData = new FormData();
      formData.append("data", rowData);

      axios
        .post(
          API_URL + "Vuejs-PHP/src/API/data.model.php?action=Filter_Products",formData,
            {
              config: {
                headers: { "Content-Type": "multipart/form-data" },
              },
            }
        )
        .then((response) => {
          this.Produits = response.data.NameProduct;
          
        });
    },

    // afficher les produits d'une categorie au chargement de la parge d'une maniere aléatoire
    getDefaultProducts() {
      
      let rowData = {
         defaultCatgetorie :this.defaultCatgetorie
        };
      rowData = JSON.stringify(rowData);
      let formData = new FormData();
      formData.append('data',rowData);

      // selectionner la categorie par defaut pour l'afficher au démarrage
      axios
        .post(
          API_URL + "Vuejs-PHP/src/API/data.model.php?action=get_default_Products",formData,
            {
              config: {
                headers: { "Content-Type": "multipart/form-data" },
              },
            }
        )
        .then((response) => {
          this.Produits = response.data.NameProduct;
         
         
          
         
        });
    }
  },

  // ---* function mounted ---

  mounted: function () {
    this.getCategories();
    this.getDefaultProducts();
    //this.getFilterProducts();
  },
};
</script>

<style src="@/assets/css/style.css"></style>
