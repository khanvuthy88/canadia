<template id="create-account-form">
	<section id="account-form">
		<base-input label="Hello World" placeholder="Enter your username" required></base-input>
		<select-field v-bind:fields="options" v-bind:label="select_label"></select-field>
	</section>
</template>

<script>
	import BaseInput from './BaseInput.vue';
	import SelectFieldComponent from './SelectFieldComponent.vue';
	export default{
		components:{
			'base-input': BaseInput,
			'select-field': SelectFieldComponent
		},
		data:()=>{
			return{
				attrs:[],
				label:'Hello Wrold',
				select_label:'Selection label',
				value:'',
				options : [
				{
					id:1,
					name: 'Option1'
				},
				{
					id:2,
					name: 'Option2'
				}
				]
			}
		},

	}
</script>