/**
 * Created by Ken on 8/2/2016.
 */


import Vue from 'vue'
import MainApp from './components/main'
import router from './router'

window.axios = require('axios');
Vue.prototype.$http = axios;

new Vue({

	el: '#app',
	name: '303start',
	components: {
		'MainApp': MainApp
	},
	router,
	template: '<main-app></main-app>',
	mounted: function () {

		this.$nextTick(function () {
			// Code that will run only after the
			// entire view has been rendered
			console.log('Vue is ready!');
		})

	}

});

