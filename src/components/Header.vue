<template>
  <div id="app">
    <v-toolbar></v-toolbar>
    <v-app-bar dark fixed>
      <v-app-bar-nav-icon @click="drawer = true" class="d-flex d-sm-none">
      </v-app-bar-nav-icon>
      <v-toolbar-title class="H_logo">
        <v-img src="@/assets/logo/app/logo.png"></v-img>
      </v-toolbar-title>
      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>

      <template v-slot:extension>
        <!-- ajouter la class d-none d-sm-flex pour l'afficher un ecran moyenne et plus -->

        <v-tabs
          v-model="tab"
          center-active
          centered
          align-with-title
          class="d-none d-sm-flex justify-center"
          slider-color="yellow"
          background-color="transparent"
        >
          <v-tab
            link
            v-for="(menu, index) in menus"
            :key="index"
            :href="`#tab-${index}`"
            :to="menu.route"
          >
            {{ menu.title }}
          </v-tab>
        </v-tabs>
      </template>
    </v-app-bar>
    <!-- ajouter la barre de navigation -->
    <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
      color="transparent"
    >
      <v-list nav dense class="item-Menu">
        <v-list-item-group>
          <v-list-item
            link
            v-for="(menu, index) in menus"
            :key="index"
            :href="`#tab-${index}`"
            :to="menu.route"
          >
            <v-list-item-title @click="tab = index">
              {{ menu.title }}
            </v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
    <!-- Navigation bar ends -->
  </div>
</template>

<script>
export default {
  name: "Header",

  data() {
    return {
      drawer: false,
      tab: null,

      menus: [
        { title: "Home", route: "/" },
        { title: "Produits", route: "products" },
        { title: "Services", route: "services" },
        { title: "About-Us", route: "about" },
        { title: "Contact", route: "contact" },
      ],
    };
  },
};
</script>

<style scoped>
.H_logo {
  position: relative;
  padding: 0;
  top: 40%;
}
.item-Menu {
  margin: 10px;
  border-radius: 4px;
}
.item-Menu :hover {
  background: rgb(184, 182, 182);
}
.item-Menu :active {
  background: rgb(129, 129, 128);
}
</style>
