@extends('layouts.main')

@section('content')
  {{-- 
    11-30-2018: Email Send Functionality
    12-08-2018:
           Change to architecture to VueJS Components,
           Contact.vue dyanmic sending and validation using axios
    12-13-2018:
           Message section at user using Vue.js 
    
  --}}

<div id="app">

    {{-- vue component --}}
    <index :notification="notification"></index>

</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
          // animation script
          AOS.init({
              offset: 200,
              duration: 2000
          });
          
          // Carousel Script
          $('.carousel').carousel({
              interval: 3000
          });

          // iziModal script
          $("#trigger01").iziModal();
            $(document).on('click', '.trigger01', function (event) {
              event.preventDefault();
              $('#trigger01').iziModal('open');
              //$('#gallery-01').iziModal('setZindex', 99999);
              //$('#gallery-01').iziModal('open', { zindex: 99999 });
              $('#trigger01').iziModal('setWidth', 800);
              $('#trigger01').iziModal('setHeaderColor', '#008B8B');
          });

        });
    </script>
@endsection
