<!DOCTYPE html>
<html>

<head>
    <title>Laravel Stripe Payment Gateway Integrate Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="col-md-offset-3 px-2">
                    <img src="{{asset('main/images/resturant.png')}}" alt="">
                </div>

                <form role="form" action="{{ route('make-payment') }}" method="post" class="stripe-payment" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="stripe-payment">
                    @csrf
                    <div class="panel panel-default">
                        <div class="panel-body">


                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-6 form-group required'>
                                    <label class='control-label'>Billing Name</label> <input placeholder="Enter Your Name" name="BillName" class='form-control' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-6 form-group required'>
                                    <label class='control-label'>Billing Email</label> <input placeholder="Example@gmail.com" name="BillEmail" class='form-control' type='email'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-12 form-group required'>
                                    <label class='control-label'>Billing Phone</label> <input class='form-control' name="BillPhone" placeholder="9425650001" type='tel'>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-12 form-group required'>
                                    <label class='control-label'>Shipping Address</label> <input class='form-control' name="BillAddress" placeholder="Enter your shipping address.." type='tel'>
                                </div>
                            </div>


                        </div>
                    </div>









                    <div class="panel panel-default">
                        <div class="panel-body">

                            @if (Session::has('success'))
                            <div class="alert alert-primary text-center">
                                <p>{{ Session::get('success') }}</p>
                            </div>
                            @endif



                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input class='form-control' name="CardName" size='4' type='text'>
                                </div>

                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label> <input autocomplete='off' name="CardNumber" class='form-control card-num' size='20' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label>
                                    <input autocomplete='off' class='form-control card-cvc' name="CardCVC" placeholder='e.g 595' size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input class='form-control card-expiry-month' name="CardMonth" placeholder='MM' size='2' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input class='form-control card-expiry-year' name="CardYear" placeholder='YYYY' size='4' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-md-12 hide error form-group'>
                                    <div class='alert-danger alert'>Fix the errors before you begin.</div>
                                </div>
                            </div>

                            <div class="row" id="pay">
                                <button class="btn btn-success btn-lg btn-block" type="submit">Pay</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $("#pay").click(function() {
        $("#pay").hide();
    })
    $(function() {
        var $form = $(".stripe-payment");
        $('form.stripe-payment').bind('submit', function(e) {
            var $form = $(".stripe-payment"),
                inputVal = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputVal),
                $errorStatus = $form.find('div.error'),
                valid = true;
            $errorStatus.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorStatus.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-num').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeRes);
            }

        });

        function stripeRes(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>

</html>