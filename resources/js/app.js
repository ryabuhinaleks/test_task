
require('./bootstrap');

window.Vue = require('vue');



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('account-component', require('./components/AccountComponent.vue').default);
Vue.component('create-component', require('./components/EventCreateComponent.vue').default);
Vue.component('update-component', require('./components/EventUpdateComponent.vue').default);
Vue.component('information-component', require('./components/EventDataComponent.vue').default);
Vue.component('calendar-component', require('./components/CalendarComponent.vue').default);


const app = new Vue({
    el: '#app',
});
