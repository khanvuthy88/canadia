<template>
	<section id="create_account">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<article>
						<header>
							<div class="progress">
								<div class="progress-step"
									:class="{'active':index === activeStep}"
									v-for="(step, index) in formSteps"
									:key="'step'+index">
									{{ index + 1 +'. ' + step.title }}
								</div>
							</div>
						</header>
						<section :class="animation">
							<div class="form">
								<h2>{{ formSteps[activeStep].title }}</h2>
								<div class="form-content">
									<div class="input-fields">
										<div class="input-container"
											v-for="(field, index) in formSteps[activeStep].fields"
											:key="'field'+index">                    

                      <select v-if="field.type == 'radio'" v-model="field.value">
                        <option v-for="(option, index) in field.options" v-model="option.value">{{ option.label }}</option>
                      </select>

                      <DateFieldComponent v-if="field.type=='date'" v-bind:field="field"></DateFieldComponent>


											<input  v-if="field.type == 'text'" v-bind:id="'id_'+index" type="text" :class="{'wrong-input': !field.valid}" v-model="field.value" required>
		            						<label class="input-label">{{ field.label }}</label>
										</div>
									</div>
									<div class="actions">
										<button v-if="activeStep > 0 && activeStep +1 < formSteps.length" @click="prevStep">Prev</button>
										<button v-if="activeStep +1 < formSteps.length -1" @click="checkFields">next</button>
										<button v-if="activeStep +1 === formSteps.length -1" @click="checkFields">Submite</button>
									</div>	
								</div>							
							</div>
						</section>
    				</article>
				</div>
			</div>
		</div>
	</section>
</template>

<script>	
  import DateFieldComponent from './DateFieldComponent.vue'; 

	export default {
    components:{
      DateFieldComponent
    },
		data: () =>{
			return{
				activeStep: 0,
		        animation: 'animate-in', 
		       	data_collection: [],		       	       
		        formSteps: [{
		        	title: 'Your information',
		        	fields:[
		        		{ label : "What's Your Title?", value:'', valid:true, type:'radio',
                  options:[{label:'Mr.',value:'mr.'},{ value:'mrs',label:'Mrs'}, {value:'miss',label:'Miss'}], pattern: /.+/},
		        		{ label: "Family name", value: '', valid: true, type:'text', pattern: /.+/ },
		        		{ label: "Middle name", value: '', valid: true, type:'text', pattern: /.+/ },
                { label: 'Given name', value: '', valid: true, type: 'text', pattern: /.+/ },
                { label: 'Date of birth', value: '', valid: true, type:'date', pattern: /.+/}
		        	]
		        },
		        {
		        	title: "Your Details",
					fields: [
						{ label: "What does CSS stand for?", value: '', valid: true, type:'text', pattern: /.+/ },
						{ label: "HTML tag for an internal style sheet?", value: '', valid: true, type:'text', pattern: /.+/ },
						{ label: "Property for the background color?", value: '', valid: true, type:'text', pattern: /.+/ }
					]
		        },
		        {
		        	title: "Your Account",
					fields: [
						{ label: "Your first name?", value: '', valid: true, type:'text', pattern: /.+/ },
						{ label: "Your last name?", value: '', valid: true, type:'text', pattern: /.+/ },
						{ label: "Your email?", value: '', valid: true, type:'text', pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/ }
					]
		        },
		        {
		        	title: "Thank you for participating!",
		        }],
			}
		},
		ready() {
			window.addEventListener('unload', this.leaving);
		},
	    computed: {
	    	getActive:{
	    		get:function(){
	    			return this.activeStep;
	    		},
	    	}
	    },
	    methods: {
	    	leaving: function () {
                alert("Leaving...");
            },
	    	nextStep(){
	    		this.animation = 'animate-out';
		        setTimeout(() => {
		          this.animation = 'animate-in';
		          this.activeStep += 1;
		        }, 550);
	    	},
	    	prevStep(){
	    		this.animation = 'animate-out';
		      	setTimeout(()=>{
		      		this.animation = 'animate-in';
		          	this.activeStep -= 1;
		      	},500);
		   	},

		   	checkFields(){
		   		let valid = true;
		   		let form_value = [];
        		this.formSteps[this.activeStep].fields.forEach((index,field) =>{
              if(index.type == 'radio'){
                index.valid=true;
                form_value.push(index.value);
              }else{
                // console.log(index);
                if(!index.pattern.test(index.value)){
                  valid = false;
                  index.valid=false;
                }else{
                  index.valid = true;
                  form_value.push(index.value);
                } 
              }        			       			
        		});
        		if(valid){
        			this.data_collection.push({
        				id: this.activeStep,
        				value: form_value,
        			});
        			if(this.activeStep === this.formSteps.length -2){        				
        				console.log(this.data_collection);
        				this.createAcccount(this.data_collection);
        			}
    				this.nextStep();

    			}else{
    				this.animation = 'animate-wrong';
					setTimeout(() => {
						this.animation = '';
					}, 400);
    			}
		   	},

		   	sanitizeTitle() {
		   		let slug='Hello world';
		      	slug = slug.replace(/\s*$/g, '');
		      	slug = slug.replace(/\s+/g, '-');
		      	return slug;
		   	},

		   	createAcccount(data){
		   		axios.post('/account/create',data).then(({data})=>{
		   			console.log("This is create"+data);
		   		});
		   	}
	    }
	}
</script>

<style lang="scss" scoped>
  // @import url('https://fonts.googleapis.com/css?family=Noto+Sans&display=swap');
  @mixin flexbox() {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  #create_account {
    @include flexbox();
    width: 100%;
    background: radial-gradient(#DF5C2E, #A43227);
  }
  article {
    margin: 10px;
    width: calc(100% - 20px);
    header {
      width: 100%;
      background-color: #fff;
      box-shadow: 0 15px 30px rgba(0,0,0,.2),
                  0 10px 10px rgba(0,0,0,.2);
    	display: block;
    	position: relative;
    }
    .progress-step {
      @include flexbox();
      position: relative;
      justify-content: space-between;
      padding: 15px;
      color: #fff;
      font-weight: bold;
      width: 100%;
      &.active {
        background-color: #DF5C2E;
        ~ .progress-step {
          color: #555;
          // background-color: #ccc;
        }
        ~ .progress-step::before {
          &:before {
	        content: '';
	        position: absolute;
	        width: 2px;
	        left: 0px;
	        height: 47px;
	        background-color: #DF5C2E;
	        z-index: 10;
	      }
        }
      }
      &:before {
        content: '';
        position: absolute;
        width: 2px;
        height: 47px;
        background-color: #DF5C2E;
        z-index: 10;
        left: 0px;
      }
      &:first-child::before {
        display: none;
      }
    }
    section {
      width: 100%;
      background-color: #fff;
      box-shadow: 0 15px 30px rgba(0,0,0,.2),
                  0 10px 10px rgba(0,0,0,.2);
    	.form{
    		@include flexbox();
      		// flex-direction: column;
      		justify-content:space-between;
      		h2,div{
      			width:50%;
      		}
      		h2{
      			text-align: center;
      		}
      		.form-content{
      			display: block;
      			.input-fields{
      				width:100%;
      				.input-container{
      					width:100%;
      				}
      			}
      			.actions{
      				margin: 15px;
      			}
      		}
    	}
      h2 {
        font-size: 1.6rem;
        color: #DF5C2E;
        margin: 0;
        padding: 20px;
      }
      .input-fields {
        @include flexbox();
        flex-direction: column;
        width: 100%;
      }
      .input-container {
        position: relative;
        padding: 30px 20px 20px 20px;
        width: calc(100% - 80px);
        // max-width: 400px;
        input,select {
          	background-color: transparent;
		    border: none;
		    border-bottom: 1px solid #9e9e9e;
		    border-radius: 0;
		    outline: none;
		    height: 3rem;
		    width: 100%;
		    font-size: 1rem;
		    margin: 0 0 20px 0;
		    padding: 0;
		    box-shadow: none;
		    box-sizing: content-box;

          &.form-control{
          	background-color: transparent;
		    border: none;
		    border-bottom: 1px solid #9e9e9e;
		    border-radius: 0;
		    outline: none;
		    height: 3rem;
		    width: 100%;
		    font-size: 1rem;
		    margin: 0 0 20px 0;
		    padding: 0;
		    box-shadow: none;
		    box-sizing: content-box
          }
          &:valid + .input-label {
            top: 10px;
            left: 20px;
            font-size: .7rem;
            font-weight: normal;
            color: #999;
          }
          &.wrong-input + .input-label {
            color: #B92938;
          }
        }
      }
      .input-label {
        position: absolute;
        top: 32px;
        left: 20px;
        font-size: 1.35rem;
        pointer-events: none;
        transition: .2s ease-in-out;
      }
      .actions {
        margin: 0;
        button {
          font-family: 'Noto Sans', sans-serif;
          outline: none;
          border: none;
          color: #fff;
          background-color: #DF5C2E;
          font-size: 1.35rem;
          padding: 5px 20px;
          margin: 0;
          text-transform: uppercase;
          border-radius: 3px;
          cursor: pointer;
        }
      }
    }
  }
  .animate-in {
    transform-origin: left;
    animation: in .6s ease-in-out;
  }
  .animate-out {
    transform-origin: bottom left;
    animation: out .6s ease-in-out;
  }
  .animate-wrong {
    animation: wrong .4s ease-in-out;
  }
  @keyframes in {
    0% {
      opacity: 0;
      transform: rotateY(90deg);
    }
    100% {
      opacity: 1;
      transform: rotateY(0deg);
    }
  }
  @keyframes out {
    0% { transform: translateY(0px) rotate(0deg); }
    60% { transform: rotate(10deg); }
    100% { transform: translateY(1000px); }
  }
  @keyframes wrong {
    0% { transform: translateX(0); }
    20% { transform: translateX(40px); }
    40% { transform: translateX(20px); }
    60% { transform: translateX(40px); }
    80% { transform: translateX(20px); }
    100% { transform: translateX(0); }
  }
</style>