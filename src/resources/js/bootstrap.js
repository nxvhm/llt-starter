import axios from 'axios';
window.axios = axios;

import './../tabler/css/tabler.css'
import './../tabler/css/tabler-props.css'
import './../tabler/css/tabler-vendors.css'
import './../tabler/css/tabler-themes.css'
import '@tabler/icons-webfont/dist/tabler-icons.min.css'
import "toastify-js/src/toastify.css"

import './../tabler/js/tabler.js'

import Toastify from 'toastify-js'

window.toast = Toastify;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
