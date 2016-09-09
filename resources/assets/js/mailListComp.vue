<template>
    <div>
        <h2>Join our mailing list!</h2>
        <form role="form" class="form-horizontal" method="POST" v-on:submit.prevent="submitFan">

          <input type="hidden" id="hpot" placeholder="This field is not required. Please ignore." v-model="hPot" maxlength="5">

          <div class="col-sm-4 col-sm-offset-4">
              <alert303 v-show="showAlert"></alert303>
          </div>

          <div class="form-group">
            <label for="fName" class="sr-only">First Name:</label>
            <div class="col-sm-4 col-sm-offset-4">
                <input type="text" class="form-control" id="fName" placeholder="First name:" v-model="firstName" maxlength="250">
            </div>
          </div>

          <div class="form-group">
            <label for="lName" class="sr-only">Last Name:</label>
            <div class="col-sm-4 col-sm-offset-4">
                <input type="text" class="form-control" id="lName" placeholder="Last name:" v-model="lastName" maxlength="250">
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="sr-only">Email:</label>
            <div class="col-sm-4 col-sm-offset-4">
                <input type="text" class="form-control" id="email" placeholder="Email:" v-model="email" maxlength="250">
            </div>
          </div>

           <div class="form-group">
            <div class="col-sm-4 col-sm-offset-4">
              <button type="submit" class="btn btn-default">Submit</button>
            </div>
          </div>

        </form>
    </div>
</template>
<style>
</style>
<script>

    var Alert = require('./alert.vue');

    export default{

        props: ['baseUrl', 'apiToken'],

        data(){
            return {
                firstName: '',
                lastName: '',
                email: '',
                hPot: '',
                showAlert: false,
            }
        },

        ready: function () {

            console.log('maillist is ready!');
            console.log(this.baseUrl);
            console.log(this.email);

        },

        http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            }
        },

        components: {
            alert303: Alert
        },

        methods: {

            checkForHoney: function ( pot ) {

                if (pot) {

                    console.log('Found some honey');
                    return true;

                }

                return false;

            },

            validateEmail: function (email) {
                if(email) {

                    if( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){

                    }else{

                        return 'The email address does not appear to be valid. Please try again, thanks!';

                    }

                }else{

                    return 'Please, enter an email address';
                }

                return null;

            },

            parseObject: function(obj,msg){

                for (var k in obj)
                {
//                    console.log("key = "  + obj[k]);
                    if (typeof obj[k] == "object" && obj[k] !== null){

                        msg = this.parseObject(obj[k], msg);

                    }
                    else{

                        // do something...
                        if(k == "message" ) {
                            msg = msg + obj[k] + "<br>";
                        }

                    }
                }

                return msg;
            },

            parseValidationErrors: function(data){

                var msg = "";

                return this.parseObject(data,msg);

            },

            goodSubmission: function(){

                var instance = this; //can't reference this in callbacks

                if(this.checkForHoney(this.hPot)) {

                    this.$http.post(this.baseUrl + '/api/log', {msg: "Honey pot had data, ignoring post request"});

                    this.hpot = '';

                    return false; //Don't do anything.

                }else{

                    var msg = this.validateEmail(this.email);

                    if(msg){

                        instance.$broadcast('alert-msg', {
                            'message': msg,
                            'type': 'danger'
                        });

                        instance.showAlert = true;

                        return false;

                    }
                }

                return true;

            },

            submitFan: function (e) {

                var instance = this;

                if(this.goodSubmission()){

                    console.log("Submitting Fan!" + this.email);

/*
                     this.$http.get('/image.jpg').then((response) => {

                        // resolve to Blob
                        return response.blob();

                      }).then(blob) => {
                        // use image Blob
                      });
*/

                    this.$http.post(this.baseUrl + '/api/subscription', {
                        'first_name': this.firstName,
                        'last_name': this.lastName,
                        'email': this.email,
                    })
                    .then((response) => {
                        //success

                        console.log(response.json());
                        var jm = response.json();

                        if(jm.status == 'ok' ){

                            this.$broadcast('alert-msg', {
                                'message': 'Thanks for joining our mailing list! ' + '<br>' +
                                'Please check your email inbox and confirm your email address.',
                                'type': 'info'
                            });

                        }else{

                            var prefix = 'Whoops, validation failed! ' + '<br>' ;
                            var errorList = this.parseValidationErrors(jm.errors);

                            this.$broadcast('alert-msg', {
                                'message': prefix.concat(errorList),
                                'type': 'warning'
                            });

                        }

                        this.showAlert = true;

                    }, (response) => {
                        //error

                        this.$broadcast('alert-msg', {
                            'message': 'Whoops, something happened. error code = ' +
                                    response.status +
                                    ' Please try submitting again or emailing ' +
                                    '<a href="mailto:support@303start.com">' +
                                    ' support ' +
                                    '</a>.' +
                                    ' Sorry for the inconvenience.',
                            'type': 'danger'
                        });
                        this.showAlert = true;
                    });

                }
            }
        }

    }

</script>
