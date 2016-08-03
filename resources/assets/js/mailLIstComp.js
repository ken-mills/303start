/**
 * Created by Ken on 8/2/2016.
 */

var Vue = require('vue');

Vue.use(require('vue-resource'));

var MailList = require('./mailListComp.vue');

Vue.component('fan303', MailList);

new Vue({

el:'#maillist-app',

ready: function(){

    console.log('Vue is ready!');

}

});

