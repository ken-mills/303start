<template>
    <div>
        <h2>Join our mailing list!</h2>
    </div>
</template>
<style>
</style>
<script>
    export default{

        data(){
            return {
                firstName: '',
                lastName: '',
                email: ''
            }
        },

        ready: function(){

            console.log('maillist is ready.');
            console.log(this.baseUrl);

        },

        http:
            {
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                }
            }

    }
</script>
