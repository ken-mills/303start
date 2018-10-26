<template>

	<div>
		<b-dropdown id="ddown1" text="Menu" class="m-md-2" no-caret>

			<template slot="button-content">
				<span><i class="fa fa-bars" aria-hidden="true"></i></span>
			</template>

			<b-dropdown-item to="/" exact>Home</b-dropdown-item>
			<b-dropdown-item to="/overview" exact class="ddItem">team303 Overview</b-dropdown-item>
			<b-dropdown-item to="/features" exact class="ddItem">team303 Features</b-dropdown-item>
			<b-dropdown-item to="/maillist" exact>News</b-dropdown-item>
			<b-dropdown-item to="/about" exact>About</b-dropdown-item>

		</b-dropdown>
	</div>

</template>

<script>

	import bDropdown from 'bootstrap-vue/es/components/dropdown/dropdown';
	import bDropdownItem from 'bootstrap-vue/es/components/dropdown/dropdown-item';

	export default {
		name: "nav-button",
		components: {
			'b-dropdown': bDropdown,
			'b-dropdown-item': bDropdownItem
		},
		data() {
			return{
			}
		},
		methods: {

		}

	}

</script>

<style scoped>

</style>