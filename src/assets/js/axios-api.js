// import Vue from 'vue';
import axios from 'axios'
// import AxiosPlugin from 'vue-axios-cors';

// Vue.use(AxiosPlugin, axios)

const getApi = axios.create({

    baseURL: 'http://127.0.0.1:8000/',
    timeout: 1000,
})

export { getApi }