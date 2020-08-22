import VueCompositionAPI, {reactive, ref} from '@vue/composition-api';
import Vue from 'vue';

Vue.use(VueCompositionAPI);

window.ref = ref;
window.reactive = reactive;
