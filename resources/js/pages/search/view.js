import Vue from 'vue';
import axios from 'axios';
import scaleLoader from 'vue-spinner/src/ScaleLoader';

Vue.component('scale-loader', scaleLoader);

new Vue({
    el: '#searchBox',
    data: function () {
        return {
            isAdding: false,
        }
    }
});
