import '@fortawesome/fontawesome-free/js/all.min';
import Vue from 'vue';
import vuetify from './vuetify';
import VueCompositionAPI, {reactive, ref} from '@vue/composition-api';
import AppBarNavButton from './components/app/AppBarNavButton';
import AppBarNavDropdown from './components/app/AppBarNavDropdown';
import AppDrawerNavDropdown from './components/app/AppDrawerNavDropdown';

Vue.component('app-bar-nav-dropdown', AppBarNavDropdown);
Vue.component('app-bar-nav-button', AppBarNavButton);
Vue.component('app-drawer-nav-dropdown', AppDrawerNavDropdown);

Vue.use(VueCompositionAPI);

window.Vue = Vue;
window.vuetify = vuetify;
window.ref = ref;
window.reactive = reactive;
