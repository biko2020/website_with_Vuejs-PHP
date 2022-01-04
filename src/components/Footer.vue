<template>
  <v-main>
    <!-- composant Nos fournisseurs -->
    <Nosfournisseur />
    <!-- ------------------------- -->

    <v-footer padless fluid>
      <v-col lg="12">
        <v-row justify="center">
          <v-col lg="4" class="text-center">
            <v-toolbar-title
              ><span class="H_logo">HORIZON </span>
              <span class="E_logo"> EQUIPEMENT</span></v-toolbar-title
            >
            <v-card-text>
              <v-btn
                v-for="icon in icons"
                :key="icon"
                class="mx-4 black--text"
                icon
              >
                <v-icon size="24px">
                  {{ icon }}
                </v-icon>
              </v-btn>
            </v-card-text>
            <v-subheader>
              HORIZON EQUIPEMENT a noué des partenariats stratégiques avec des
              experts et des professionnels dans ses secteurs d’intérêt au Maroc
              et à l’étranger afin de mieux répondre aux exigences du marché
              marocain.
            </v-subheader>
            <v-form class="mt-4">
              <v-text-field label="Email" outline dense />
              <v-btn rounded color="success">Demande Devis</v-btn>
            </v-form>
            <br />
            <span>
              Adresse: Bd Palestine lotissement Grini Imm A appt 5-Mohammedia
              <br />
              Tél: +212 6 66 45 27 47 Tél: +212 6 68 45 15 75 Fax: +212 5 21 00
              24 19 <br />
              E-mail: contact@horizonequipement.ma
            </span>
          </v-col>
        </v-row>

        <div class="mt-10">
          <v-divider></v-divider>
          <v-subheader>
            Copyright Horizon Equipements. All Rights Reserved
            {{ new Date().getFullYear() }} — <strong> </strong>
            <v-spacer />
            <strong>Designed and Developed by Ait Oufkir</strong>
          </v-subheader>
        </div>
      </v-col>
    </v-footer>
  </v-main>
</template>

<script>
import Nosfournisseur from "../components/Nosfournisseur";
export default {
  name: "Footer",
  components: {
    Nosfournisseur,
  },

  data() {
    return {
      icons: ["mdi-facebook", "mdi-twitter", "mdi-linkedin", "mdi-instagram"],
    };
  },
};
</script>

<style src="@/assets/css/style.css"></style>>
