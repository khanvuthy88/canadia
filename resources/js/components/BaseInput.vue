<template id="base-input">
	<label>
		{{ label }}
		<input 
			v-bind="$attrs"
			v-bind:value="value"
			v-on:input="$emit('input', $event.target.value)"
		>
	</label>
</template>

<script>
	export default{
		props: ['label', 'value'],
		data:()=>{
			return {

			}
		}
	}
</script>