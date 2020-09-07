import EventComponent from './components/EventComponent';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import Vuelidate from 'vuelidate'
import Notifications from 'vue-notification'

require('./bootstrap');

window.Vue = require('vue');
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(Vuelidate)
Vue.use(Notifications)

Vue.component('event-component', require('./components/EventComponent.vue').default);

new Vue({
    render: h => h(EventComponent),
}).$mount('#app');