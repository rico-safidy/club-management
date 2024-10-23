@extends('user.layouts.master')

@section('title')
    Paiement du Don
@endsection

@section('content')
    <section class="donate-checkout">
        <main class="donate-checkout-main">
            <form action="{{ Route('donate') }}" method="POST" class="donate-checkout-main-form" id="validation-form">
                @csrf
                <div class="form-content">
                    <label for="" class="form-label">Titulaire de la carte</label>
                    <span class="form-icon">
                        <i class="fi fi-rr-user"></i>
                    </span>
                    <input type="text" name="card-name" id="card-name" placeholder="Votre nom" class="form-input">
                </div>
                <div class="form-content">
                    <label for="" class="form-label">Numero de la carte</label>
                    <span class="form-icon">
                        <i class="fi fi-rr-credit-card"></i>
                    </span>
                    <input type="text" name="card-number" id="card-number" placeholder="xxxx xxxx xxxx xxxx"
                        class="form-input">
                </div>
                <div class="checkout-main-form-card-content">
                    <div class="form-content">
                        <label for="" class="form-label">Mois d'expiration</label>
                        <span class="form-icon">
                            <i class="fi fi-rr-calendar-day"></i>
                        </span>
                        <input type="month" name="" id="card-expiry-month" placeholder="" class="form-input">
                    </div>
                    <div class="form-content">
                        <label for="" class="form-label">Année d'expiration</label>
                        <span class="form-icon">
                            <i class="fi fi-rr-calendar"></i>
                        </span>
                        <input type="number" name="" id="card-expiry-year" placeholder="YYYY" class="form-input">
                    </div>
                </div>
                <div class="form-content">
                    <label for="" class="form-label">CVC</label>
                    <span class="form-icon">
                        <i class="fi fi-rr-credit-card"></i>
                    </span>
                    <input type="number" name="" id="card-cvc" placeholder="CVC" class="form-input">
                </div>

                @if (isset($errors))
                    <p id="charge-error" class="hidden">
                        {{ $errors }}
                    </p>
                @endif
                @if (isset($message))
                    <p style="color: green">
                        {{ $message }}
                    </p>
                @endif

                <input type="hidden" name="sum" value="" id="sum">
                <input type="hidden" name="stripe-token" id="token-key">

                <button class="btn btn-primary donate-checkout-main-form-btn" id="btn-pay" style="width: 100%">
                    Payer
                    <span class="">
                        <i class="fi fi-rr-donate"></i>
                    </span>
                </button>
                <div class="donate-checkout-main-form-footer">
                    <span class="donate-checkout-main-form-footer-icon">
                        <i class="fi fi-brands-visa"></i>
                    </span>
                </div>
            </form>
        </main>
    </section>

    <script src="https://js.stripe.com/v2/"></script>
    <script>
        Stripe.setPublishableKey(
            'pk_test_51PSYkJP76SRag7Wh4rF2asttRRiU0vw7huoRMjLbk3WRUBXYcIy1YXk086PF8jCwlSdU8Y2jQdO9plMBWIJlZ04Y00yuYFjJHR'
        ); //public key

        let form = document.querySelector('#validate-form')
        let submit = document.querySelector('#btn-pay')
        let sum = document.querySelector('#sum')

        sum.value = sessionStorage.getItem('sum')

        submit.addEventListener('click', function(e) {
            e.preventDefault()
            let exp_mm_yyyy = document.querySelector('#card-expiry-month').value
            let mm = exp_mm_yyyy.split('-')[1]
            let btns = document.querySelectorAll('button')

            btns.forEach(btn => {
                btn.disabled = true
            });

            Stripe.createToken({
                name: document.querySelector('#card-name').value,
                number: document.querySelector('#card-number').value,
                exp_month: mm,
                exp_year: document.querySelector('#card-expiry-year').value,
                cvc: document.querySelector('#card-cvc').value,
            }, stripeResponseHandler);
        })

        function stripeResponseHandler(statut, response) {
            if (statut != 200) {
                document.querySelector('#charge-error').classList.remove('hidden')
                document.querySelector('#charge-error').textContent = response.error.message

                let btns = document.querySelectorAll('button')
                btns.forEach(btn => {
                    btn.disabled = false
                });
            } else {
                document.querySelector('#token-key').value = response.id
                document.querySelector('#validation-form').submit()
            }
        }
    </script>
@endsection
