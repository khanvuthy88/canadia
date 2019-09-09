<template id="select-field-component">
	<label>
		{{ label }}
		<select v-model="fields.value" @change="getSelectField($event)">
			<option v-for="(field,value) in fields" v-bind:value="field.id">{{ field.name }}</option>
		</select>
	</label>
	<!-- <p>You select : {{ selected }}</p> -->
</template>

<script>
	export default{
		props:['label','fields'],
		data:()=>{
			return{
				selected: 1,
			}
		},
		methods:{
			getSelectField:(event)=>{
				console.log(event.target.value);
			}
		}
	}
</script>