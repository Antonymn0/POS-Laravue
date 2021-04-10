require('./bootstrap');
window.vue = require('vue');

import 'bootstrap/dist/css/bootstrap.min.css'
import 'jquery/src/jquery.js'
import 'bootstrap/dist/js/bootstrap.min.js'

import '@fortawesome/fontawesome-free/css/all.css'
import '@fontawesome/fontawesome-free/js/all.js'
import "~/font-awesome/scss/font-awesome.scss";

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import App from './App.vue';
 
import VueAxios from 'vue-axios';
import axios from 'axios';
import Vue from 'vue';
Vue.use(VueAxios, axios);

const routes = [
    {
        name: '/',
        path: '/home', 
        component: App
    }
];

const router = new VueRouter( { mode:'history', routes:routes})
const app = new Vue(Vue.util.extend({router}, App)).$mount('#app');
  