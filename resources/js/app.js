require('./bootstrap');
import { createApp } from 'vue';

import TableVue from "./components/base/TableVue"

import ProvinceAbm from "./components/module/province/ProvinceAbm.vue"

createApp({
    components: {
        TableVue,
        ProvinceAbm
    }
}).mount('#init-vue');
