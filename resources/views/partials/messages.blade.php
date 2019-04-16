
@if (session('success'))

<script type="text/javascript">
		iziToast.show({
			  title: 'Success',
			  message: '{{session('success')}}',
			 	icon: 'ico-success',
			  iconColor: 'rgb(0, 255, 184)',
			  theme: 'dark',
			  progressBarColor: 'rgb(0, 255, 184)',
			  position: 'topCenter',
			  transitionIn: 'fadeInLeft',
			  transitionOut: 'fadeOutUp'
		});
</script>

@endif