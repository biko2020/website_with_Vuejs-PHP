<template>
  <div class="text-center">
    <v-dialog v-model="dialog" width="500">
      <v-card>
        <v-card-title class="text-h5 grey lighten-2">
          {{ titre }}
        </v-card-title>

        <v-card-text>
          {{ description }}
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="primary" text @click="dialog = false">
            ok
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  name: "Modal",
  data() {
    return {
      dialog: false,
    };
  },
  methods: {
    showDetails(titre, description) {
      this.dialog = true;
      this.titre = titre;
      this.description = description;
      //this.image = image;
    },
  },
};
</script>
<style src="@/assets/css/style.css"></style>
