
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';

// iziToast 
import VueIziToast from "vue-izitoast";
import 'izitoast/dist/css/iziToast.min.css';

import VueQrcodeReader from 'vue-qrcode-reader';
import 'vue-qrcode-reader/dist/vue-qrcode-reader.css';
import VeeValidate from 'vee-validate';

Vue.use(VueIziToast);
Vue.use(VueQrcodeReader);
Vue.use(VeeValidate);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 
// Vue.component('example-component', require('./components/ExampleComponent.vue'))
Vue.component('index', require('./components/Homepage/Index.vue'));
Vue.component('reserve', require('./components/Homepage/Reserve.vue'));

// Credit Card Payment
Vue.component('qrcodebrowser', require('./components/CreditCard/QRCodeBrowser.vue'));
Vue.component('paymentform', require('./components/CreditCard/PaymentForm.vue'));
Vue.component('cardelement', require('./components/CreditCard/CardElement.vue'));
Vue.component('download', require('./components/CreditCard/DownloadFile.vue'));
// Cash Registration
Vue.component('cashqrcodebrowser', require('./components/Cash/CashQRCodeBrowser.vue'));
Vue.component('cashregistration', require('./components/Cash/CashRegistration.vue'));
Vue.component('cashdownloadfile', require('./components/Cash/CashDownloadFile.vue'));

// Dashboard
Vue.component('dashboard', require('./components/Dashboard/Dashboard.vue'));
// ADMIN LOGIN QRCODE
Vue.component('adminloginqrcode', require('./components/AdminLogin/AdminLogin.vue'));
// ADMIN PAGES QRCODE
Vue.component('qrcodetester', require('./components/Adminpages/QRCodeTester.vue'));
Vue.component('qrcodescanner', require('./components/Adminpages/QRCodeScanner.vue'));

const app = new Vue({
    el: '#app',
	  data(){
	  	return{
					notification:{
		  			options:{
	    				show: {
	    				  icon: 'ico-success',
	              iconColor: 'rgb(0, 255, 184)',
	              theme: 'dark',
	              progressBarColor: 'rgb(0, 255, 184)',
	              position: 'topCenter',
	              transitionIn: 'bounceInDown',
	              transitionOut: 'flipOutX'
		    			},
		    			error: {
		    				icon: 'ico-warning',
								position:'topCenter',
								transitionOut:'fadeOutUp'
		    			}
		  		}
	  		}
	  	}
	  }
});
