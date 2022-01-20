require('./bootstrap');
import { createApp } from 'vue';

import TableVue from "./components/base/TableVue"
import Message from "./components/base/Message"

import ProvinceAbm from "./components/module/province/ProvinceAbm.vue"

createApp({
    components: {
        TableVue,
        Message,
        ProvinceAbm
    }
}).mount('#init-vue');
