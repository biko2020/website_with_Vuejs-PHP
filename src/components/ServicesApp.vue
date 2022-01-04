<template>
  <v-container fill-height fluid class="my-15">
    <v-row class="row text-center pt-md-5 aos-init aos-animate ">
      <v-col lg="12" class="col-12 align-self-center py-md-5 ">
        <v-subheader class="text-h4 justify-center"
          >LE PLUS HAUT NIVEAU D’EXPERTISE AU MÈTRE CARRÉ</v-subheader
        >
        <br />
        <br />
        <p>
          Notre service de réparation et reconditionnement offre une prise en
          charge structurée, planifiée et rassurante.
        </p>
      </v-col>
    </v-row>

    <v-row class="row text-center pt-md-5 aos-init aos-animate justify-center">
      <div class="justify-center">
        <v-chip
          style="width:300px "
          @click="activeService = 'service_ME'"
          :color="activeService === 'service_ME' ? 'success' : ''"
          class="mx-5 my-5 justify-center"
          >MODERNISATION D'ÉQUIPEMENT</v-chip
        >
        <v-chip
          style="width:300px "
          @click="activeService = 'service_IMR'"
          :color="activeService === 'service_IMR' ? 'success' : ''"
          class="mx-5 my-5 justify-center"
          >INSTALLATION ET MISE EN ROUTE</v-chip
        >
        <v-chip
          style="width:300px "
          @click="activeService = 'service_REP'"
          :color="activeService === 'service_REP' ? 'success' : ''"
          class="mx-5 my-5 justify-center"
          >SERVICES RÉPARATION</v-chip
        >
      </div>

      <slot v-if="activeService === 'service_ME'">
        <v-col lg="12" v-for="(me, meIndex) in service_ME" :key="meIndex">
          <v-card>
            <v-img
              :src="me.image"
              class="white--text align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              height="200px"
            >
            </v-img>
            <v-card-title>{{ me.title }}</v-card-title>
            <v-card-text>
              <div>{{ me.description }}</div>
            </v-card-text>
          </v-card>
        </v-col>
        <!-- retour a la ligne -->
        <div class="my-15">
          <hr />
        </div>

        <div class="row-noir">
          <div class="container-fluid py-md-5 ">
            <div class="row py-5 aos-init aos-animate" data-aos="fade-up">
              <div class="col-md-4 p-0 ">
                <div class="px-3  px-lg-5 separateur-v-b h-100">
                  <p class="txt-bleu-ciel font-weight-bold">PROLONGER</p>
                  <p class="txt-blanc small">
                    <strong
                      >La longévité de vos équipements est vitale, surtout dans
                      un contexte de contrôle rigoureux des coûts.</strong
                    >
                  </p>
                  <p class="txt-blanc small">
                    L’acquisition d’un équipement industriel représente un
                    investissement majeur pouvant prendre des années à être
                    rentabilisé. Nous proposons des interventions simples visant
                    à remplacer des pièces obsolètes sans changer tout votre
                    système, ou encore à reconditionner celles qui sont usées
                    afin de donner un second souffle à vos équipements.
                  </p>
                </div>
              </div>
              <div class="col-md-4 p-0">
                <div class="px-3 px-lg-5  separateur-v-b h-100">
                  <p class="txt-bleu-ciel font-weight-bold">MODERNISER</p>
                  <p class="txt-blanc small">
                    <strong
                      >L’avancement des technologies est rapide. La pression de
                      demeurer compétitif est omniprésente.</strong
                    >
                  </p>

                  <p class="txt-blanc small">
                    Parfois, l’obsolescence ou la perte de productivité d’un
                    équipement apparaît plus rapidement que prévu. Peu importe
                    le contexte, nous vous aidons à vous moderniser. Nous
                    identifions des solutions d’amélioration progressives afin
                    que vous puissiez suivre l’évolution des technologies et
                    maintenir votre capacité à un niveau maximal.
                  </p>
                </div>
              </div>
              <div class="col-md-4 p-0 mb-0">
                <div class="px-3  px-lg-5 h-100">
                  <p class="txt-bleu-ciel font-weight-bold">MODIFIER</p>
                  <p class="txt-blanc small">
                    <strong
                      >Notre service de modernisation permet de modifier les
                      systèmes d’un équipement tout en limitant l'achat de
                      matériel neuf.</strong
                    >
                  </p>

                  <p class="txt-blanc small">
                    Votre entreprise est en croissance et veut accroître sa
                    production ? Vous planifiez des changements à vos processus
                    de production ? Nous pouvons vous soutenir afin d’apporter
                    des ajustements significatifs ou même d’ajouter de nouvelles
                    fonctions opérationnelles.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- retour a la ligne -->
          <div class="my-15">
            <hr />
          </div>
        </div>
      </slot>
      <slot v-if="activeService === 'service_IMR'">
        <v-col lg="12" v-for="(imr, imrIndex) in service_IMR" :key="imrIndex">
          <v-card>
            <v-img
              :src="imr.image"
              class="white--text align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              height="200px"
            >
            </v-img>
            <v-card-title>{{ imr.title }}</v-card-title>
            <v-card-text>
              <div>{{ imr.description }}</div>
            </v-card-text>
          </v-card>
        </v-col>
        <!-- retour a la ligne -->
        <div class="my-15">
          <hr />
        </div>
        <div class="row-gris">
          <div class="container-fluid py-md-5 ">
            <div class="row py-5 aos-init aos-animate" data-aos="fade-up">
              <div class="col-md-4 p-0 ">
                <div class="px-3  px-lg-5 separateur-v-bf h-100">
                  <p class="txt-bleu font-weight-bold">PLANIFICATION</p>
                  <p class=" small">
                    Une planification rigoureuse des différentes étapes de
                    l’exécution est primordiale. Nous allons sur place observer
                    les lieux avant de procéder. Le jumelage de notre expertise
                    à votre expérience est la clé du succès d’un projet majeur
                    d’installation réussi.
                  </p>
                </div>
              </div>
              <div class="col-md-4 p-0">
                <div class="px-3 px-lg-5  separateur-v-bf h-100">
                  <p class="txt-bleu font-weight-bold">EXÉCUTION</p>
                  <p class=" small">
                    De l’équipement spécialisé entre les mains d’une équipe
                    rodée, c’est précisément ce que vous gagnez avec nous. Une
                    fine connaissance des pièces et une large expérience sur le
                    terrain font toute la différence entre un démarrage raté ou
                    très efficace.
                  </p>
                </div>
              </div>
              <div class="col-md-4 p-0">
                <div class="px-3  px-lg-5 h-100">
                  <p class="txt-bleu font-weight-bold">MISE EN ROUTE</p>
                  <p class=" small">
                    Vous gagnez à tous les points de vue en nous faisant
                    confiance. Vous êtes certains que la mise en route sera
                    effectuée avec précision et rigueur. Vous évitez alors une
                    foule d’anomalies causant des arrêts répétitifs coûteux.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- retour a la ligne -->
          <div class="my-15">
            <hr />
          </div>
        </div>
      </slot>
      <hr />

      <slot v-if="activeService === 'service_REP'">
        <v-col lg="12" v-for="(rep, repIndex) in service_REP" :key="repIndex">
          <v-card>
            <v-img
              :src="rep.image"
              class="white--text align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
              height="200px"
            >
            </v-img>
            <v-card-title>{{ rep.title }}</v-card-title>
            <v-card-text>
              <div>{{ rep.description }}</div>
            </v-card-text>
          </v-card>
        </v-col>
        <!-- retour a la ligne -->
        <div class="my-15">
          <hr />
        </div>
        <div class="container-fluid py-5 ">
          <div class="row pb-md-5 aos-init aos-animate" data-aos="fade-up">
            <div class="col-md-4 p-0 ">
              <div class="px-3  px-lg-5 separateur-v-r h-100">
                <p class="txt-rouge font-weight-bold">DÉFAILLANCES ET BRIS</p>
                <p class=" small">
                  Notre service de réparation clés en main vous prend en charge
                  rapidement lorsqu’une anomalie est détectée. L’équipe peut se
                  déplacer pour récupérer l’unité défectueuse. Elle procède au
                  démontage/remontage et au changement de la pièce brisée, puis
                  à la réinstallation de l’unité.
                </p>
              </div>
            </div>
            <div class="col-md-4 p-0">
              <div class="px-3 px-lg-5  separateur-v-r h-100">
                <p class="txt-rouge font-weight-bold">
                  RECONDITIONNEMENT DE COMPOSANTES
                </p>
                <p class=" small">
                  Notre service de réparation utilise des pièces d’origine pour
                  le reconditionnement de vos composantes. Une façon
                  intelligente de leur redonner leurs performances originales
                  sans devoir procéder à leur remplacement complet.
                </p>
              </div>
            </div>
            <div class="col-md-4 p-0 m-0">
              <div class="px-3  px-lg-5 h-100">
                <p class="txt-rouge font-weight-bold">
                  CENTRE DE RÉPARATION AUTORISÉ
                </p>
                <p class=" small">
                  Nos techniciens du service de réparation sont autorisés auprès
                  des manufacturiers, ce qui signifie que les travaux sont faits
                  dans les règles de l’art et de façon à maintenir vos garanties
                  en vigueur.
                </p>
              </div>
            </div>
          </div>
          <!-- retour a la ligne -->
          <div class="my-15">
            <hr />
          </div>
        </div>
      </slot>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "ServicesApp",
  data() {
    return {
      activeService: "service_ME",

      service_ME: [
        {
          title: "TOUT LE POTENTIEL DES NOUVELLES TECHNOLOGIES",
          description:
            "La modernisation des équipements ne nécessite pas toujours de repartir entièrement à neuf. Grâce aux experts du Groupe EP, vous avez accès aux technologies les plus avancées des secteurs hydraulique, électrohydraulique, pneumatique et électrique. Vous bénéficiez de conseils d’experts et de solutions uniques pour modifier, améliorer et reconditionner vos équipements.",
          image: require("@/assets/images/img_services/1.jpg"),
        },
      ],

      service_IMR: [
        {
          title:
            "TOUT LE POTENTIEL DE VOTRE ÉQUIPEMENT AU PREMIER JOUR DE DEMARRAGE",
          description:
            "L’installation par des techniciens expérimentés fait partie intégrante de nos services. Elle couvre les étapes de la planification, de l’exécution et de la mise en route. Nous vous accompagnons du début à la fin, qu’il s’agisse de l’implantation de l’un de nos systèmes neufs, d’un projet de modernisation ou de la réinstallation lors d’une réparation.",
          image: require("@/assets/images/img_services/2.jpg"),
        },
      ],

      service_REP: [
        {
          title: "TOUT LE POTENTIEL D’ORIGINE DE VOS ÉQUIPEMENTS",
          description:
            "Notre service de réparation offre une prise en charge structurée, planifiée et rassurante. Il couvre tous les aspects de la réparation et du reconditionnement des pièces pour corriger les défaillances et redonner à vos unités leur performance d’origine. Notre équipe se charge en plus des entretiens prédictifs, préventifs et correctifs au besoin.",
          image: require("@/assets/images/img_services/3.jpg"),
        },
      ],
    };
  },
};
</script>

<style src="@/assets/css/style.css"></style>
