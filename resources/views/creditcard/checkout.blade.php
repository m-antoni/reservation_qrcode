<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Balagbag Traverse</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bttn.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/registration.css') }}" rel="stylesheet">
         <!-- stripe script -->
        <script src="https://js.stripe.com/v3/"></script>
        <!-- stripe default styles -->
        <style>
            /**
             * The CSS shown here will not be introduced in the Quickstart guide, but shows
             * how you can use CSS to style your Element's container.
             */
            .StripeElement {
              background-color: white;
              padding: 10px 12px;
              border-radius: 4px;
              border: 1px solid #ccd0d2;
              box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
              -webkit-transition: box-shadow 150ms ease;
              transition: box-shadow 150ms ease;
            }
            .StripeElement--focus {
              box-shadow: 0 1px 3px 0 #cfd7df;
            }
            .StripeElement--invalid {
              border-color: #fa755a;
            }
            .StripeElement--webkit-autofill {
              background-color: #fefde5 !important;
            }
            #card-errors {
                color: #fa755a;
            }
        </style>
    </head>
    <body>
        <div class="container pt-3 pb-5" id="app">
          <div class="row">
             <div class="col-md-6">
                <h2><i class="fa fa-edit"></i> Registration Form</h2>
                <div class="spacer"></div>
                <paymentform></paymentform>
            </div>
            <div class="col-md-4 offset-2">
                <h2><i class="fa fa-qrcode"></i> QRCode Scanner</h2>
                <qrcodebrowser></qrcodebrowser>
            </div>
          </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
