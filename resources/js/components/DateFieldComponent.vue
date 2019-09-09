<template id="date-field-component">
	<label>
		{{ label }}
		<input type="date" v-model="field.value">
	</label>
</template>

<script>
	export default{
		props:['label','field'],
		data:()=>{
			return{
				
			}
		}
	}
</script>