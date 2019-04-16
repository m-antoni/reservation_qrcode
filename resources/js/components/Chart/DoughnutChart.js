import VueCharts from 'vue-chartjs'
import { Doughnut } from 'vue-chartjs'

export default {
 extends: Doughnut,
 mounted () {
 this.renderChart({
	labels: ['Members', 'Payments', 'Logs' ],
 	datasets: [
				{
					label: 'User Logs Chart',
					data: [200, 150, 300],
				 	backgroundColor: ['#00BFFF','#FF7F50','#EE3B3B'],
				 	borderWidth: 0, 
				 }
		 	], 
		 },{responsive: true, maintainAspectRatio: false })
	}
}
