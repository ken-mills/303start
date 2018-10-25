<template>

	<div id="app-container">

				<transition
						name="fade"
						mode="out-in"
				>
					<router-view/>
				</transition>

				<router-view name="nav"></router-view>

		<footer class="text-center">
			&copy; 303start.com
		</footer>

	</div>

</template>

<script>

	export default {
		name: "MainApp",
		props: [],
		components: {},
		data() {
			return {
				baseUrl: '/',
				apiToken: '',
				prevHeight: 0,
			}
		},
		mounted: function () {
			this.$nextTick(function () {
				console.log('main-app is ready!');
			})
		},
	}
</script>

<style scoped>
	.fade-enter-active,
	.fade-leave-active {
		transition-duration: 0.3s;
		transition-property: opacity;
		transition-timing-function: ease;
	}

	.fade-enter,
	.fade-leave-active {
		opacity: 0
	}
</style>