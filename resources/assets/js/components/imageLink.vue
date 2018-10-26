<template>

	<div class="col-xs-12 col-sm-3">

		<a href="#" v-on:click="sendClick()">
		<img v-bind:style="backgroundSrc" class="img-circle icon-303"/></a>
		<h4>{{title}}</h4>

	</div>

</template>

<script>
	export default {
		name: "team303-attribute",
		props: ['id', 'title', 'imageSrc'],
		components: {},
		data() {
			return {}
		},
		mounted: function () {
		},
		watch: {},
		computed: {
			backgroundSrc (){
				return { 'background-image':  'url(' + this.imageSrc + ')' };
			}
		},

		methods: {
			sendClick: function(e){
				this.$emit('click',this.id);
			}
		}
	}
</script>

<style scoped>

</style>