<template>
	<div class="row justify-content-center">
	    <div class="col-md-4 col-sm-4">
	       <h2 align="center" class="text-secondary"><i class="fa fa-qrcode"></i> QRCode Tester</h2>		
	       <!-- two components -->
	   			<testdragin  v-if="buttonTitle == 'Switch to Scanner'"></testdragin>
					<testscanner v-else></testscanner>
					<!-- toggle between two components -->
					<button @click="btn()" class="btn btn-dark btn-block mt-2">
							<i class="fa fa-random"></i>	{{ buttonTitle }}
					</button>
			</div>
	</div>
</template>
<script type="text/javascript">
		import testscanner from './QRCodeTestScanner.vue';
		import testdragin from './QRCodeTestDragIn.vue';

		export default{
			components: {
				testscanner, testdragin
			},
			data(){
				return{
					buttonTitle: 'Switch to Drag In Drop'
				}
			},
			methods:{
					btn(){
							// change the button title
							if(this.buttonTitle == 'Switch to Drag In Drop'){
									this.buttonTitle = 'Switch to Scanner'
							}else{
									this.buttonTitle = 'Switch to Drag In Drop'
							}
					}
			}
		}
</script>
