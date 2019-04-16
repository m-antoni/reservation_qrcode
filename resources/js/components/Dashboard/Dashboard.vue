<template>
	<div class="row">
		<div class="col-md-12 pb-5">
			<linechart></linechart>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<doughnutchart></doughnutchart>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<barchart></barchart>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">

import linechart from '../Chart/LineChart';
import doughnutchart from '../Chart/DoughnutChart';
import barchart from '../Chart/BarChart';

export default{
props:{
	user: Object,
},
components: { linechart, doughnutchart, barchart },
	created(){
		//this.welcomeMessage()
	},
	data(){
		return{
			name: this.user.name
		}
	},
	methods:{
		welcomeMessage(){
			this.$toast.success('<strong> Welcome Back ' + this.name + '</strong>','Success',{
				icon: 'ico-success',
				position: 'topCenter',
				transitionOut: 'flipOutX'
			})
		}
	}
}
</script>