import Vue from 'vue'
import Router from 'vue-router'
import Home from '../views/Home'
import Features from '../views/Features'
import navButton from '../components/navButton'
import Team303Overview from '../components/team303Overview'
import MailingListComp from '../components/mailListComp'
import About from '../views/About'


Vue.use(Router)

const router = new Router({

	base: '/',

	routes: [
		{
			path: '/',
			name: 'home',
			components: {
				default: Home,
				nav: navButton
			},
			props: false,
		},
		{
			path: '/overview',
			name: 'overview',
			components: {
				default: Team303Overview,
				nav: navButton
			},
			props: false,
		},
		{
			path: '/features',
			name: 'features',
			components: {
				default: Features,
				nav: navButton
			},
			props: false,
		},
		{
			path: '/maillist',
			name: 'maillist',
			components: {
				default: MailingListComp,
				nav: navButton
			},
			props: true,
		},
		{
			path: '/about',
			name: 'about',
			components: {
				default: About,
				nav: navButton
			},
			props: false,
		},

	]


})

export default router