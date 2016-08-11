<template>
    <div>
        <h2>Join our mailing list!</h2>
        <form role="form" class="form-horizontal" method="POST" v-on:submit.prevent="submitFan">

          <input type="hidden" id="hpot" placeholder="This field is not required. Please ignore." v-model="hPot" maxlength="1">

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
                firstName: 'Ken',
                lastName: 'Mills',
                email: 'pk@pkmills.com',
                hpot: '',
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

            noHoney: function () {

                if (this.hPot) {

                    //log honey pot request
                    this.$http.post(this.baseUrl + '/api/log', {msg: "Honey pot had data, ignoring post request"})
                            .then(function (response) {
                                this.hpot = '';
                            });

                    console.log('has honey');
                    return false;

                }

                console.log('no honey');

                return true;

            },

            submitFan: function (e) {

                if (this.noHoney()) {

                    this.$http.post(this.baseUrl + '/api/sub', {
                        'first_name': this.firstName,
                        'last_name': this.lastName,
                        'email': this.email,
                    })
                            .then(function (response) {
                                //success
                                this.$broadcast('alert-msg', {
                                    'message': "Thank you!",
                                    'type': 'info'
                                });
                                this.showAlert = true;
                            }, function (response) {
                                //error
                                this.$broadcast('alert-msg', {
                                    'message': "There was a problem adding you to the mailing list. Sorry for the inconvenience. Please give us a call.",
                                    'type': 'danger'
                                });
                                this.showAlert = true;
                            });

                }


            }
        }

    }

</script>
