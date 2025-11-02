import './bootstrap';

//dashboard template
// imports for css
import "@/assets/vendor/bootstrap/css/bootstrap.min.css";
import "@/assets/vendor/bootstrap-icons/bootstrap-icons.css";
import "@/assets/vendor/boxicons/css/boxicons.min.css";
import "@/assets/vendor/quill/quill.snow.css";
import "@/assets/vendor/quill/quill.bubble.css";
import "@/assets/vendor/remixicon/remixicon.css";
import "@/assets/vendor/simple-datatables/style.css";
import "@/assets/css/style.css";

// imports js
import "@/assets/vendor/apexcharts/apexcharts.min.js";
import "@/assets/vendor/bootstrap/js/bootstrap.bundle.min.js";
import "@/assets/vendor/chart.js/chart.umd.js";
import "@/assets/vendor/echarts/echarts.min.js";
import "@/assets/vendor/quill/quill.min.js";
import "@/assets/vendor/simple-datatables/simple-datatables.js";
import "@/assets/vendor/tinymce/tinymce.min.js";
import "@/assets/vendor/php-email-form/validate.js";
// main js file
import "@/assets/js/main.js";


import axios from 'axios';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

// Axios default config
axios.defaults.baseURL = '/';
const token = localStorage.getItem('access_token');
if (token) {
  axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

createApp(App)
  .use(router)
  .mount('#app');
