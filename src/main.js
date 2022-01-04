import Vue from 'vue'
import axios  from 'axios'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'


import VueAgile from 'vue-agile';
Vue.use(VueAgile);

import Carousel3d from 'vue-carousel-3d';
Vue.use(Carousel3d);


import SequentialEntrance from 'vue-sequential-entrance';
import 'vue-sequential-entrance/vue-sequential-entrance.css';
Vue.use(SequentialEntrance);

Vue.config.productionTip = false


axios.defaults.baseURL ='http://127.0.0.1:8000/'


new Vue({
  router,
  axios,
  vuetify,


  render: h => h(App)
}).$mount('#app')
