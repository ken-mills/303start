<template>

    <div :class="alertClasses">{{{ alertMessage }}}</div>

</template>

<script>

export default {

    data(){

        return{
            alertMessage:'',
            alertType:'info'
        }

    },

    computed: {
        alertClasses: function(){
            var alertType = this.alertType;
            return {
                'alert':true,
                'alert-info': alertType == 'info',
                'alert-success': alertType == 'success',
                'alert-warning': alertType == 'warning',
                'alert-danger': alertType == 'danger'
            };
        }
    },

    events: {
        'alert-msg': function (args) {
            console.log('Alert received: '+ args['message'])
            this.alertMessage = args['message'];
            this.alertType = args['type'];
        }
    }


};

</script>