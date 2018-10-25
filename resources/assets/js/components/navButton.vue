<template>

<div>
  <b-dropdown id="ddown1" text="Menu" class="m-md-2">
				<b-dropdown-item to="/">Home</b-dropdown-item>
				<b-dropdown-item >team303 Overview</b-dropdown-item>
				<b-dropdown-item to="/features">team303 Features</b-dropdown-item>
				<b-dropdown-item to="/maillist">News</b-dropdown-item>
				<b-dropdown-item to="/about">About</b-dropdown-item>
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
			'b-dropdown-item' : bDropdownItem
		}
	}

</script>

<style scoped>

</style>