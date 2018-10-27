<template>

	<div id="app-container" >

				<transition
						name="fade"
						mode="out-in"
				>
					<router-view/>
				</transition>

				<router-view name="nav"></router-view>

				<footer class="fixed-bottom text-center">	&copy; 303start.com 2018</footer>

	</div>

</template>

<script>

	export default {
		name: "MainApp",
		props: [],
		components: {},
		data() {
			return {
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

</style>