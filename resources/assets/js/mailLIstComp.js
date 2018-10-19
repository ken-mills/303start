/**
 * Created by Ken on 8/2/2016.
 */

var Vue = require('vue');

window.axios = require('axios');
Vue.prototype.$http = axios;


var MailList = require('./mailListComp.vue');

Vue.component('fan303', MailList);

new Vue({

el:'#maillist-app',

mounted: function(){

  this.$nextTick(function () {
    // Code that will run only after the
    // entire view has been rendered
    console.log('Vue is ready!');
  })

}

});

