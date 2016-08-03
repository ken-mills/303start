<template>
    <div>
        <h2>Join our mailing list!</h2>
        <form role="form" class="form-horizontal" method="POST" v-on:submit.prevent="submitFan">
          <div class="form-group">
            <label for="fName" class="sr-only">First Name:</label>
            <div class="col-sm-4 col-sm-offset-4">
                <input type="text" class="form-control" id="fName" placeholder="First name:" v-model="firstName">
            </div>
          </div>
          <div class="form-group">
            <label for="lName" class="sr-only">Last Name:</label>
            <div class="col-sm-4 col-sm-offset-4">
                <input type="text" class="form-control" id="lName" placeholder="Last name:" v-model="lastName">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="sr-only">Email:</label>
            <div class="col-sm-4 col-sm-offset-4">
                <input type="text" class="form-control" id="email" placeholder="Email:" v-model="email">
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

    export default{

        props: ['baseUrl'],

        data(){
            return {
                firstName: 'Ken',
                lastName: 'Mills',
                email: 'ken@pkmills.com',
            }
        },

        ready: function(){

            console.log('maillist is ready!');
            console.log(this.baseUrl);
            console.log(this.email);

        },

        http:
            {
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                }
            },

        methods:{
            submitFan: function(e) {

                var url = this.baseUrl + '/fan';

                console.log('Sending mailing list request: ' + url);

                this.$http.post(url, {'first_name': this.firstName, 'last_name': this.lastName, 'email': this.email, })
                        .then(function (response) {
                            //success
                            alert("Thank you!")
                        }, function (response) {
                            //error
                            alert("There was a problem adding you to the mailing list. Sorry for the inconvenience. Please give us a call.");
                        });
            }
        }

    }
</script>
