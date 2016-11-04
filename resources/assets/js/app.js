
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

Vue.component('team-editor', {
    data: function() {
        return {
            lunch: 'test'
        };
    }
});

const app = new Vue({
    el: '#app',
});
