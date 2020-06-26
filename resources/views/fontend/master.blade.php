<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/styles.css')}}">



    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/magnific-popup.css')}}">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>


<body class=" ">

@include('fontend.inc.header')


<div class="content-wrapper">
  @yield('content');
</div>

<!-- Footer -->

@include('fontend.inc.footer')


 <script src="https://js.stripe.com/v3/"></script>
<script src="{{asset('fontend/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('fontend/js/crum-mega-menu.js')}}"></script>
<script src="{{asset('fontend/js/swiper.jquery.min.js')}}"></script>
<script src="{{asset('fontend/js/theme-plugins.js')}}"></script>
<script src="{{asset('fontend/js/main.js')}}"></script>
<script src="{{asset('fontend/js/form-actions.js')}}"></script>

<script src="{{asset('fontend/js/velocity.min.js')}}"></script>
<script src="{{asset('fontend/js/ScrollMagic.min.js')}}"></script>
<script src="{{asset('fontend/js/animation.velocity.min.js')}}"></script>
        <script>
            // Create a Stripe client.
            var stripe = Stripe('pk_test_51Gx4RHGN82mlZ9FRpFQJX53WYhxxiNUDyANdIU7JTBOp2VE9UqCU7Me2YLu0pGdbhmFCfhBU670F9cTdzcKVH6s200EvaEy45p');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();

              stripe.createToken(card).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error.
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
                } else {
                  // Send the token to your server.
                  stripeTokenHandler(result.token);
                }
              });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);

              // Submit the form
             // form.submit();
            }
        </script>

<!-- ...end JS Script -->


</body>

<!-- Mirrored from theme.crumina.net/html-seosight/16_shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2016 13:03:04 GMT -->
</html>
