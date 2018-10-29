<template>

<div>
	<div id="services" class="bg-primary fill">

		<div class="row text-center">
			<div class="col-12">
				<h2>team303<em><small class="text-light"> - engage your team</small> </em></h2>
			</div>
		</div>

		<div class="row text-center" >

			<image-link
					v-for="(item) in attributes"
					:key="item.id"
					:id="item.id"
					:imageSrc="item.imageSrc"
					:title="item.title"
					v-on:click="showText"
			>

			</image-link>

		</div>
		<!-- /.row (nested) -->
		<div class="row text-center">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				<div class="popup303 text-justify" title="Attributes">
					<!-- Relationships -->
					<p v-if="displayId === 1" id="pp1">A foundation for creating an excellent company is an investment in people. Knowledge, skills, and
						attitude are important competencies to develop and monitor. team303 does that but organizations
						often forget to invest in and nurture the relationships between people, between supervisors and
						employees, between executives and managers, or between team leaders and team members. The team303 design was based on
						this core principle. team303 provides tools to develop strong, transparent, mentoring relationships
						between people.</p>
					<!-- Simplicity -->
					<p v-else-if="displayId === 2" id="pp2">Organizations everywhere including many in the Fortune 500 have decided to trash their bureaucratic,
						paper based, time sucking, performance managements systems. Why? Organizations are moving too fast.
						These systems were designed for a different era. Many organizations are now simply asking their
						managers and supervisors to meet with staff more frequently, communicate more, and create more time
						for mentoring but with what tools? How do your leaders know this is actually happening? team303
						provides the toolbox to help supervisors engage with their teams. team303 provides your organization's leaders with a window
						into how their employees are engaging, in light, fun, and non-threatening ways.</p>
					<!-- Fun -->
					<p v-else-if="displayId === 3" id="pp3">team303 integrates gaming concepts to make employee engagement fun. Employees earn points when they engage with your organization.</p>
					<p v-else-if="displayId === 4" id="pp4">team303 has optional components that allow your organization to select and customize an employee
						engagement system that fits your culture. You decide which components and features are right for
						your organization.</p>
				</div>
			</div>

		</div>
	</div>

</div>
</template>
<style>
</style>
<script>

	import ImageLink from './imageLink'

	export default {

		name: 'overview',
		components: {ImageLink: ImageLink},

		data: function () {
			return {
				displayId: 0,
				attributes: [
					{
						id: 1,
						title: 'relationships',
						imageSrc: 'images/connectgreen.jpg',
					},
					{
						id: 2,
						title: 'simplicity',
						imageSrc: 'images/treeb.jpg',
					},
					{
						id: 3,
						title: 'fun',
						imageSrc: 'images/fireworkgreen.jpg',
					},
					{
						id: 4,
						title: 'customizable',
						imageSrc: 'images/geargreen.jpg',
					},
				]
			}
		},

		mounted: function () {
			this.$nextTick(function () {
				// Code that will run only after the
				// entire view has been rendered
				//console.log('team303Overview is ready!');
			})
		},

		methods: {
			showText: function (id) {

				//console.log('attribute clicked: ' + id);
				this.displayId = parseInt(id);

			}
		}

	}

</script>
