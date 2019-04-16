import VueCharts from 'vue-chartjs'
import { Bar } from 'vue-chartjs'

export default {
 extends: Bar,
 mounted () {
 this.renderChart({
 	labels: ['Visa', 'Master Card', 'Discovery Card','RCBC' ],
 	datasets: [
				{
					label: 'Logs Chart',
					data: [30, 120, 50, 100],
					fill: false,
				 	backgroundColor: ['#2F4F4F', '#00BFFF', '#f87979', '#EE3B3B'],
				 	pointColor: '#00BFFF'
				 	
				 }
		 	], 
		 },{responsive: true, maintainAspectRatio: false })
	}
}
