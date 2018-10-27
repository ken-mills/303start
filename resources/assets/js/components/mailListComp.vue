<template>

	<div id="news" class="call-out" style="background-image: url(images/CycleRoad1080.jpg)">
		<div class="text-vertical-center news">
			<h2>team303 coming soon</h2>

			<h2>Join our mailing list!</h2>
			<form role="form" class="form-horizontal" method="POST" v-on:submit.prevent="submitFan">

				<input type="hidden" id="hpot" placeholder="This field is not required. Please ignore." v-model="hPot" maxlength="5">

				<div class="col-sm-4 col-sm-offset-4">
					<b-alert :show="showAlert" :variant="msgVariant">
						{{message}}
					</b-alert>
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
	</div>

</template>
<style>
</style>
<script>

	import bAlert from 'bootstrap-vue/es/components/alert/alert';

	export default {

		props: ['apiToken'],

		data: function () {
			return {
				firstName: '',
				lastName: '',
				email: '',
				hPot: '',

				showAlert: false,
				message: '',
				msgVariant: 'primary'
			}
		},

		mounted: function () {
			this.$nextTick(function () {
				// Code that will run only after the
				// entire view has been rendered
				console.log('maillist is ready!');
				console.log(this.email);
			})
		},

		components: {
			bAlert: bAlert
		},

		methods: {

			checkForHoney: function (pot) {

				if (pot) {

					console.log('Found some honey');
					return true;

				}

				return false;

			},

			validateEmail: function (email) {
				if (email) {

					if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {

					} else {

						return 'The email address does not appear to be valid. Please try again, thanks!';

					}

				} else {

					return 'Please, enter an email address';
				}

				return null;

			},

			parseObject: function (obj, msg) {

				console.log("parseObject:  ", obj);
				for (var k in obj) {
					console.log("key = " + obj[k]);
					if (typeof obj[k] == "object" && obj[k] !== null) {

						msg = this.parseObject(obj[k], msg);

					}
					else {

						// do something...
						if (k == "message") {
							msg = msg + obj[k] + "<br>";
						}

					}
				}

				return msg;
			},

			parseValidationErrors: function (data) {

				var msg = "";

				Object.values(data).forEach(function(element) {
				  	console.log(element);
				  	msg = msg + ' ' + element;
				});

				return msg;

			},

			goodSubmission: function () {

				var _this = this; //can't reference this in callbacks

				if (this.checkForHoney(this.hPot)) {

					this.$http.post(this.baseUrl + '/api/log', {msg: "Honey pot had data, ignoring post request"});

					this.hpot = '';

					return false; //Don't do anything.

				} else {

					var msg = this.validateEmail(this.email);

					if (msg) {

						_this.message = msg;
						_this.msgVariant = 'danger';

						_this.showAlert = true;

						return false;

					}
				}

				return true;

			},

			submitFan: function (e) {

				var _this = this;

				if (this.goodSubmission()) {

					console.log("Submitting Fan!" + this.email);

					this.$http.post('/api/subscription', {
						'first_name': this.firstName,
						'last_name': this.lastName,
						'email': this.email
					})
						.then(function (response) {
							//success
							console.log('Post response: ', response);


							if (response.data.status === 'ok') {

								_this.message = 'Thanks for joining our mailing list! ' +
									'Please check your email inbox and confirm your email address.';
								_this.msgVariant = 'info';

							}

							_this.showAlert = true;

						}).catch(function (error) {
						//error
						if (error.response) {
							// The request was made and the server responded with a status code
							// that falls out of the range of 2xx
							console.log(error.response.status);
							_this.message = _this.parseValidationErrors(error.response.data.errors);
							_this.msgVariant = 'danger';
							_this.showAlert = true;

						} else if (error.request) {
							// The request was made but no response was received
							// `error.request` is an instance of XMLHttpRequest in the browser and an instance of
							// http.ClientRequest in node.js
							_this.message = 'Whoops, nothing happened. No response from server.' +
								' Please try submitting again or emailing support@303start.com.' +
								' Sorry for the inconvenience.';
							_this.msgVariant = 'danger';
							_this.showAlert = true;
						} else {
							// Something happened in setting up the request that triggered an Error
							_this.message = 'Whoops, bad request.';
							_this.msgVariant = 'danger';
							_this.showAlert = true;
							console.log('Error', error.message);
						}
 						console.log(error.config);
					});

				}
			}
		}

	}

</script>
