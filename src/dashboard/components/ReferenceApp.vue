<template>
  <v-main>
    <v-container fill-height fluid class="my-15 grey lighten-5">
      <v-row no-gutters>
        <v-col cols="3"> </v-col>
        <v-col cols="6">
         
        </v-col>
      </v-row>
      <v-row no-gutters>
        <v-col cols="3">
          <span class="input-group-text">Entrer le nom de partenaire</span>
        </v-col>
        <v-col cols="6">
          <input
            type="text"
            class="form-control"
            v-model="PartenaireName"
            style="width: 95%"
          />
          <input 
          type="hidden"
          class="form-control"
          :value="ImageToDelete"
          style="width:95%"
          />
        </v-col>
      </v-row>
     <!-- Bloc Téléchargement de l'image-->
      <v-row>
        <v-col clos="6">
          <span> Choisir le logo </span>
        </v-col>
        <!--  ******* appel de la fonction imageUpload ***** -->
        <v-col cols="6" >
          <img width="250px" height="250px" :src="PhotoPath+'uploadPartenaire/'+ PhotoFileName" />
          <input
            :v-bind="value"
            type="file"
            name="monFichier"
            @change="imageUpload"
          />
          <!--  ******* --------------------------------***** -->
        </v-col>
      </v-row>
      <!-- Fin Bloc ----------------------->

      <v-row>
        <!--  ******* appel de la fonction Ajouter / Mettre à jour l'enregistrement ***** -->
        <v-col cols="3" align="right">
          <button
            type="button"
            @click="create_Function()"
            v-if="id == 0"
            class="btn btn-primary"
          >
            Ajouter
          </button>
          <button
            type="button"
            @click="update_Function()"
            v-if="id != 0"
            class="btn btn-primary"
          >
            Mettre à jour
          </button>
          <!--  ******* __________________________###############______________________ **** -->
        </v-col>
      </v-row>
      <v-row>
        <!--  ************** affichage des enregistrements sur la table  ****************   -->
        <table class="table is-fullwidth">
          <thead>
            <tr>
              <th>N° </th>
              <th>Name de Partenaire</th>
              <th>image</th>
              <th>Opérations</th>
              
            </tr>
          </thead>

          <tbody>
            <!-- **** boucle recuperer des enregistrements Produits depuis la db **** -->
            <tr v-for="item in partenaires" v-bind:key="item.id">
              <td>{{ item.id }}</td>
              <td>{{ item.nom }}</td>
              <td><img width="100px" height="100px" :src="PhotoPath+'uploadPartenaire/'+ item.PhotoFileName" /></td>
              <td>
                <!-- **** fonction Edite **** -->
                <button
                  type="button"
                  @click="edit_Function(item)"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-pencil-square"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                    />
                    <path
                      fill-rule="evenodd"
                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                    />
                  </svg>
                </button>

                <!-- **** fonction delete **** -->
                <button
                  type="button"
                  @click="delete_Function(item.id)"
                  class="btn btn-light mr-1"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-trash-fill"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"
                    />
                  </svg>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <!--  ************** ___________fin de la table______________  ****************   -->
      </v-row>
    </v-container>
  </v-main>
</template>

<script>
import axios from "axios";

const API_URL = "http://127.0.0.1:8000/";
const PHOTO_URL = "http://127.0.0.1:8000/Vuejs-PHP/src/API/";

export default {
  name: "ReferenceApp",

  data() {
    return {

      partenaires: [],
      id: 0,
      PartenaireName: "",
      monFichier: "",
      PhotoFileName: "logo.png",
      PhotoPath: PHOTO_URL,

      ImageToDelete : "",
      
      
    };
  },

  methods: {
    // **** Recuperer la liste des Partenaires

     getDataPartenaire() {
       axios.get(API_URL + "Vuejs-PHP/src/API/data.model_Partenaire.php?action=getPartenaire")
         .then((response) => {
           this.partenaires = response.data.NamePartenaire;
          
         });
     },

   
    // **** Edition des enregistrements

     edit_Function(item) {
       this.id = item.id;
       this.PartenaireName = item.nom;
       this.PhotoFileName = item.PhotoFileName;
       this.ImageToDelete = item.PhotoFileName;

    },

    // **** Ajouter des enregistrements
    create_Function() {
      if (this.PartenaireName != "") {

        let rowData = {
         
          PartenaireName: this.PartenaireName,
          PhotoFileName: this.PhotoFileName,
        };
        //converti la donnée (rowData) en chaîne JSON.
        rowData = JSON.stringify(rowData);

        //crée un nouvel objet FormData(paires clé/valeur ).
        //pour savoir plus-> https://developer.mozilla.org/fr/docs/Web/API/FormData
        let formData = new FormData();
        //la méthode append permets d'ajoute ou rajoute une nouvelle valeur a un clé.
        formData.append("data", rowData);

        axios
          .post(
            API_URL + "Vuejs-PHP/src/API/data.model_Partenaire.php?action=create_Partenaire",
            formData,
            {
              config: {
                headers: { "Content-Type": "multipart/form-data" },
              },
            }
          )
          .then((response) => {
            alert(response.data.message);

              this.getDataPartenaire();
          // vider les champs imput, textarea, image par defaut
               this.PhotoFileName = "logo.png";
               this.PartenaireName = "";

          });
          
      }
    },

    // **** Modification des enregistrements

     update_Function() {
       let rowData = {
         id: this.id,
         PartenaireName: this.PartenaireName,
         PhotoFileName: this.PhotoFileName,
         ImageToDelete: this.ImageToDelete,
       };
       //converti la donnée (rowData) en chaîne JSON.
       rowData = JSON.stringify(rowData);

       let formData = new FormData();

       formData.append("data", rowData);

       axios
         .post(
           API_URL + "Vuejs-PHP/src/API/data.model_Partenaire.php?action=Update_Partenaire",
           formData,
           {
             config: {
               headers: { "Content-Type": "multipart/form-data" },
             },
           }
         )
         .then((response) => {
           alert(response.data.message);
           // vider les champs imput, textarea, image par defaut
              this.PhotoFileName = "logo.png";
              this.PartenaireName = "";
              
         });
    },
    // **** Suppression des enregistrements

     delete_Function(id) {
       if (!confirm("Êtes-vous sûr de vouloir supprimer ce partenaire ?")) {
         return;
       }
       let rowData = 
       { 
         id: id,
         PhotoFileName: this.PhotoFileName 
       };
       rowData = JSON.stringify(rowData);
       let formData = new FormData();
       formData.append("data", rowData);

       axios
         .post(
           API_URL + "Vuejs-PHP/src/API/data.model_Partenaire.php?action=delete_Partenaire",
           formData,
           {
             config: {
               headers: { "Content-Type": "multipart/form-data" },
             },
           }
         )
         .then((response) => {
          this.getDataPartenaire();
           alert(response.data.message);
         });
     },

    // ****  Télechargement de l'images

    imageUpload(event) {
      let formData = new FormData();
      formData.append("monFichier", event.target.files[0]);
      axios
        .post(API_URL + "Vuejs-PHP/src/API/uploadFile.php?action=partenaire", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
            //'enctype': 'multipart/form-data'
          },
        })
        .then((response) => {
          this.PhotoFileName = response.data.image;
          alert(this.PhotoFileName);
         
        });
    }, 
  },
  mounted: function () {
    this.getDataPartenaire();
    //this.update_Function();
    this.imageUpload();
  },
};
</script>

<style>
thead,
tfoot {
  background-color: #3f87a6;
  color: #fff;
}

tbody {
  background-color: #e4f0f5;
}

table {
  border-collapse: collapse;
  border: 2px solid rgb(200, 200, 200);
  letter-spacing: 1px;
  font-family: sans-serif;
  font-size: 0.8rem;
}

td,
th {
  border: 1px solid rgb(190, 190, 190);
  padding: 5px 10px;
}

td {
  text-align: center;
}
input {
  width: 50%;
}
</style>