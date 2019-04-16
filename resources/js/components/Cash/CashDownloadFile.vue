<template>
	<div class="row justify-content-center">
			<div class="col-md-4 offset-md-2 col-sm-12 offset-md-0 pt-5">
					<div id="qrcodebrowser">
							<img src="/img/qrcode_image.png" class="img-thumbnail">
								<a @click="backText()" href="/cash/downloadfile" class="btn btn-outline-warning btn-block my-3">
									<i v-if="title == 'Download'" class="fa fa-download"></i>
									<i v-else="title == 'Back'" class="fa fa-arrow-left"></i> {{title}}
								</a>
					</div>
			</div>	
	</div>
</template>
<script type="text/javascript">
	export default{
		data(){
			return {
				title: 'Download',
			}
		},
		methods:{
			backText(){
				this.title = 'Back'
			}
		}
}
</script>
