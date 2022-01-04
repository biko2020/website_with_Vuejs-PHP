<template>
  <v-main>
    <v-content>
      <v-container>
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
          <div id="app" v-if="logo === 'logo_Fournisseurs'">
            <sequential-entrance>
              <v-img class="box" src="@/assets/logo/fournisseurs/alfa.png">
              </v-img>
              <v-img class="box" src="@/assets/logo/fournisseurs/lotus.png">
              </v-img>
              <v-img class="box" src="@/assets/logo/fournisseurs/alpha.png">
              </v-img>
              <v-img class="box" src="@/assets/logo/fournisseurs/edibon.png">
              </v-img>
              <v-img class="box" src="@/assets/logo/fournisseurs/idea.png">
              </v-img>
              <v-img class="box" src="@/assets/logo/fournisseurs/semic.png">
              </v-img>
              <v-img class="box" src="@/assets/logo/fournisseurs/standart.png">
              </v-img>
              <v-img class="box" src="@/assets/logo/fournisseurs/sumakpump.png">
              </v-img>
              <v-img
                class="box"
                src="@/assets/logo/fournisseurs/cleananvac.png"
              >
              </v-img>
              <v-img class="box" src="@/assets/logo/fournisseurs/lega.png">
              </v-img>
            </sequential-entrance>
          </div>
        </div>
        <!--- --- --- --- ------- --- --- --- --->
      </v-container>
    </v-content>
  </v-main>
</template>
<script>
export default {
  name: "Nosfournisseur",

  data() {
    return {
      logo: "logo_Fournisseurs",
      logo_Fournisseurs: [
        {
          images: require("@/assets/logo/fournisseurs/alfa.png"),
        },
      ],
    };
  },
};
</script>

<style src="@/assets/css/style.css"></style>
