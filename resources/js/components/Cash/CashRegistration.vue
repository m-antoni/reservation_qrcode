<template>
	<div class="container pt-3 pb-5">
			<div class="row">
					<div class="col-md-6">
							<h2><i class="fa fa-money"></i> Cash Registration</h2>
							<form @submit.prevent>
									 <div class="form-group">
						          <label for="name">Name on Card:</label>
						          <input type="text" class="form-control" id="name" v-validate="'required'" name="name" v-model="name">
						           <span class="error" v-if="errors.has('name')">{{ errors.first('name') }}</span>
						      </div>

						      <div class="form-group">
						          <label for="email">Email Address:</label>
						          <input type="email" class="form-control" id="email" v-model="email" v-validate="'required|email'" name="email">
						          <span class="error" v-if="errors.has('email')">{{ errors.first('email') }}</span>
						      </div>
										
									<div class="form-group">
						          <label for="phone">Phone:</label>
						          <input type="text" class="form-control" id="phone" v-model="phone" v-validate="'required|min:11'" name="phone">
						          <span class="error" v-if="errors.has('phone')">{{ errors.first('phone') }}</span>
						      </div>

			            <div class="form-group">
			                <label for="amount">Amount:</label>
			                  <select v-model="amount" class="form-control" name="amount" id="amount" v-validate="'required'">
			                      <option v-for="data in amounts" :value="data.value">{{ data.text }}</option>
			                  </select>
			                  <span class="error" v-if="errors.has('amount')">{{ errors.first('amount') }}</span>
			            </div>

				          <div class="form-group">
				              <label for="date">Set Date:</label>
				               <input type="date" v-model="date" name="date" id="date" class="form-control" v-validate="'required|date|after:tomorrow'">
			                 <span class="error" v-if="errors.has('date')">{{ errors.first('date') }}</span>
			          	</div>

									<div class="form-group">
											<input type="submit" @click="submitCash()" class="btn btn-outline-info btn-md btn-block" value="Submit">
									</div>
									<div class="form-group">
											<a href="/" class="btn btn-outline-light btn-block">Go back</a>
									</div>
							</form>	

					</div>

					<div class="col-md-4 offset-2">
							<h2><i class="fa fa-qrcode"></i> QRCode Scanner</h2>
							<cashqrcodebrowser></cashqrcodebrowser>
					</div>
			</div>
	</div>
</template>
<script type="text/javascript">
	export default{
		data(){
			return{
          name: '',
          email: '',
          phone: '',
          date: '',
          amount: '',
          amounts:[
            {text: '1,200.00 | Day', value: '1,200'},
            {text: '2,000.00 | Night ', value: '2,000'},
            {text: '7,000.00 | 7 Packs', value: '7,000'},
            {text: '10,000.00 | 10 Packs', value: '1,0000'}
          ],
          status: 'unpaid',
          errorsMessages: []
        }
    },
		methods:{
			submitCash(){
				this.$validator.validateAll().then(() =>{
							axios.post('/cash',{
							name: this.name,
							email: this.email,
							phone: this.phone,
							date: this.date,
							amount: this.amount
						
						}).then(response => {

								window.location = response.data.redirect;

						}).catch(error => {
							if(error.response.status == 422){
								this.errors = error.response.data.errors
								this.messages = error.response.data.messages

								this.$toast.error(this.errors.card_number[0], 'Error',{
									icon: 'ico-warning',
									position: 'topCenter',
									transitionOut: 'fadeOutUp'
								});

							}else{
								this.$toast.error('Something is wrong','Error',{
									icon: 'ico-warning',
									position: 'topCenter',
									transitionOut: 'fadeOutUp'
								})	
							}
						})
				})
			},
		}
	}
</script>
<style scope>
.v--modal-overlay {
	background: transparent;
}
.vue-dialog .dialog-c-text{
	font-weight: 600 !important;
}
</style>	

