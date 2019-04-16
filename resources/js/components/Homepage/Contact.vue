<template>
	<div>
		<section id="contact-bg">
		    <div id="contact" class="container">
		        <div class="row justify-content-center">
		            <div class="col-md-8">
		            	<form @submit.prevent>
		                    <h2 data-aos="fade-up"><i class="fa fa-comment-o"></i> Send us your Inquiries</h2>
		                    <hr class="bg-white">
		                    <div class="form-group">
		                       	<label>Name:</label>
		                        <input type="text" v-model="name" name="name" class="form-control">
		                    </div>
		                    <div class="form-group">
		                    	<label>Email:</label>
		                       	<input type="email" v-model="email" name="email" class="form-control">
		                    </div>
		                    <div class="form-group">
		                    	<label>Message:</label>
		                      	<textarea name="message" v-model="message" class="form-control" rows="4"></textarea>
		                    </div>
		                    <div class="form-group">
		                    	<button v-on:click="postMessage()" class="bttn bttn-lg bttn-stretch bttn-block">
		                    		<i class="fa fa-send"></i> Send Message
	 	                    	</button>
		                    </div> 
		              	</form>
		            </div>
		        </div>
		    </div>
		</section> 
	</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return {
				name: '',
				email: '',
				message: '',
			}
		},
		methods:{
			postMessage(){
				// passing data to api
				axios.post('/comment',{
					name: this.name,
					email: this.email,
					message: this.message
				})
				.then(response => {
					 this.$toast.show('Message has been sent!', 'Success',{
              icon: 'ico-success',
              iconColor: 'rgb(0, 255, 184)',
              theme: 'dark',
              progressBarColor: 'rgb(0, 255, 184)',
              position: 'topCenter',
              transitionIn: 'bounceInDown',
              transitionOut: 'flipOutX'
          })
					// empty the fields if success
					this.name = '',
					this.email = '',
					this.message = ''
				})
				.catch(error => {
					this.$toast.error('Something went wrong!',"Error",{
						icon: 'ico-warning',
						position:'topCenter',
						transitionOut:'fadeOutUp'
					})
				})
			}
		}
	}
</script>