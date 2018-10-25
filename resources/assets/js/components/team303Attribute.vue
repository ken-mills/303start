<template>

	<div class="col-xs-12 col-sm-3">

		<img v-bind:style="backgroundSrc" class="img-circle icon-303"/>
		<h4>{{title}}</h4>
		<div class="btn-spacing">
			<button :id="id" v-on:click="sendClick($event)" class="btn btn-default">learn more</button>
		</div>

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
				this.$emit('click',e.target.id);
			}
		}
	}
</script>

<style scoped>

</style>