import Vue from 'vue';
import PageComponent from "./components/PageComponent";
import HeaderComponent from "./components/HeaderComponent";
import TodoComponent from "./components/TodoComponent";

const vueRootElement = document.getElementById('app');

Vue.component('pagecomponent', PageComponent);
Vue.component('headercomponent', HeaderComponent);
Vue.component('todocomponent', TodoComponent);

if (vueRootElement) {
    window.$vueApp = new Vue({
        el: '#app',
        data: {},
        components: {
            PageComponent,
            HeaderComponent
        }
    });
}
