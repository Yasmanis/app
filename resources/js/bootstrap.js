try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

window._ = require('lodash');
window.axios = require('axios');
window.toastr = require('toastr');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
