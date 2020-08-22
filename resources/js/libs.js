require('@fortawesome/fontawesome-free/js/all.min')

window.videojs = require('video.js/dist/video.min')
require('@silvermine/videojs-quality-selector/dist/js/silvermine-videojs-quality-selector.min');
window.HELP_IMPROVE_VIDEOJS = false;

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
