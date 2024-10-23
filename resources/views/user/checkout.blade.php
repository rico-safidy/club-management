@extends('user.layouts.master')

@section('title')
    Caisse
@endsection

@section('content')
    <section class="checkout">
        <h2 class="title-primary checkout-title">Payment Securisé</h2>
        <header class="checkout-header">
            <div class="checkout-header-content">
                <h3 class="subtitle-primary">Totalite de votre commande</h3>
                <h2 class="subtitle-primary"><span id="price-display"></span>,00 $</h2>
            </div>
        </header>
        <main class="checkout-main">
            <form action="{{ Route('pay') }}" method="post" class="checkout-main-form" id="validation-form">
                @csrf
                {{-- Contact --}}
                <div class="checkout-main-form-container">
                    <h3 class="subtitle-secondary checkout-main-subtitle">Contact</h3>
                    <div class="login-main-content">
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-user"></i>
                            </span>
                            <input type="text" name="first-name" id="fname"
                                class="form-input checkout-main-form-input" placeholder="Nom">
                        </div>
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-user"></i>
                            </span>
                            <input type="text" name="last-name" id="lname"
                                class="form-input checkout-main-form-input" placeholder="Prenom">
                        </div>
                    </div>
                    <div class="form-content">
                        <span class="checkout-main-form-icon">
                            <i class="fi fi-rr-envelope"></i>
                        </span>
                        <input type="email" name="email" id="email" class="form-input checkout-main-form-input"
                            placeholder="Email">
                    </div>
                    <div class="form-content">
                        <span class="checkout-main-form-icon">
                            <i class="fi fi-rr-marker"></i>
                        </span>
                        <input type="text" name="adress" id="adress" class="form-input checkout-main-form-input"
                            placeholder="Adresse">
                    </div>
                    <div class="form-content">
                        <span class="checkout-main-form-icon">
                            <i class="fi fi-rr-phone-flip"></i>
                        </span>
                        <input type="number" name="phone" id="phone" class="form-input checkout-main-form-input"
                            placeholder="Telephone">
                    </div>
                </div>
                {{-- Contact --}}

                {{-- Payment --}}
                <div class="checkout-main-form-container">
                    <h3 class="subtitle-secondary sheckout-main-subtitle">Payement</h3>
                    <p class="para-primary">La transaction est securisee</p>
                    <div class="checkout-main-form-card">
                        <header class="checkout-main-form-card-header">
                            <h4 class="suptitle-primary checkout-main-form-card-header-title">Carte de Credit</h4>
                            <span class="checkout-main-form-card-header-icon">
                                <i class="fi fi-brands-stripe"></i>
                            </span>
                        </header>
                        <main class="checkout-main-form-card-main">
                            <div class="checkout-main-form-card-content">
                                <div class="form-content">
                                    <label for="" class="form-label">Titulaire de la carte</label>
                                    <span class="checkout-main-form-icon">
                                        <i class="fi fi-rr-user"></i>
                                    </span>
                                    <input type="text" name="card-name" id="card-name"
                                        class="form-input checkout-main-form-input" placeholder="Nom dans la Catre">
                                </div>
                                <div class="form-content">
                                    <label for="" class="form-label">Numéro de la carte</label>
                                    <span class="checkout-main-form-icon">
                                        <i class="fi fi-rr-credit-card"></i>
                                    </span>
                                    <input type="text" name="card-number" id="card-number"
                                        class="form-input checkout-main-form-input" placeholder="Numéro de la Catre">
                                </div>
                            </div>
                            <div class="checkout-main-form-card-content">
                                <div class="form-content">
                                    <label for="" class="form-label">Mois d'expiration</label>
                                    <span class="checkout-main-form-icon">
                                        <i class="fi fi-rr-calendar-clock"></i>
                                    </span>
                                    <input type="month" name="expiry-month" id="card-expiry-month"
                                        class="form-input checkout-main-form-input" placeholder="Mois d'expiration">
                                </div>
                                <div class="form-content">
                                    <label for="" class="form-label">Année d'éxpiration</label>
                                    <span class="checkout-main-form-icon">
                                        <i class="fi fi-rr-calendar-clock"></i>
                                    </span>
                                    <input type="number" name="expiry-year" id="card-expiry-year"
                                        class="form-input checkout-main-form-input" placeholder="yyyy">
                                </div>
                            </div>
                            <div class="form-content">
                                <label for="" class="form-label">CVC</label>
                                <span class="checkout-main-form-icon">
                                    <i class="fi fi-rr-key"></i>
                                </span>
                                <input type="text" name="cvc" id="card-cvc"
                                    class="form-input checkout-main-form-input" placeholder="CVC">
                            </div>
                        </main>
                    </div>
                </div>
                {{-- Payment --}}

                {{-- Commande --}}
                <div class="checkout-main-form-container">
                    <div class="checkout-main-form-tarif">
                        <h3 class="subtitle-primary">Prix total</h3>
                        <h2 class="subtitle-primary">
                            <span id="price-display"></span>
                            ,00 $
                        </h2>
                    </div>
                </div>
                {{-- Commande --}}

                @if (isset($errors))
                    <p style="color: #d63939" id="charge-error" class="hidden">
                        {{ $errors }}
                    </p>
                @endif

                @if (isset($message))
                    <p style="color: #1c7a1c" id="charge-error" class="hidden">
                        {{ $message }}
                    </p>
                @endif



                <div id="payment-response" style="color: #d63939"></div>

                <input type="hidden" name="stripe-token" id="token-key">
                <input type="hidden" name="final-price" value="" id="final-price">
                <input type="hidden" name="order" value="" id="order">
                <button type="submit" class="btn btn-primary checkout-main-form-btn" id="btn-pay">Payer</button>
            </form>
        </main>
    </section>

    <script src="https://js.stripe.com/v2/"></script>
    <script>
        $(document).ready(function() {
            $('#validation-form').on('submit', function(e) {
                e.preventDefault()

                $.ajax({
                    url: '{{ route('pay') }}',
                    nethod: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#payment-response').html('<p>Paiment réussi !</p>')
                    },
                    error: function(xhr) {
                        $('#payment-response').html('<p>Une erreur s \'est produite !</p>')
                    }
                })
            })
        })

        Stripe.setPublishableKey(
            'pk_test_51PSYkJP76SRag7Wh4rF2asttRRiU0vw7huoRMjLbk3WRUBXYcIy1YXk086PF8jCwlSdU8Y2jQdO9plMBWIJlZ04Y00yuYFjJHR'
        ); //public key

        let form = document.querySelector('#validation-form')
        let submit = document.querySelector('#btn-pay')
        let finalPrice = document.querySelector('#final-price')
        let order = document.querySelector('#order')
        let priceDisplay = document.querySelectorAll('#price-display')

        finalPrice.value = sessionStorage.getItem('price')
        priceDisplay.forEach(e => {
            e.textContent = sessionStorage.getItem('price')
        });
        order.value = sessionStorage.getItem('order')

        submit.addEventListener('click', (e) => {
            e.preventDefault()
            let exp_mm_yyyy = document.querySelector('#card-expiry-month').value
            let mm = exp_mm_yyyy.split('-')[1]
            let btns = document.querySelectorAll('button')

            btns.forEach(btn => {
                btn.disabled = true
            });

            //     console.log(`
        //     name: ${document.querySelector('#card-name').value},
        //     card_number: ${document.querySelector('#card-number').value},
        //     exp-month: ${mm}
        //     exp-year: ${document.querySelector('#card-expiry-year').value},
        //     cvc: ${document.querySelector('#card-cvc').value},
        // `);

            Stripe.createToken({
                name: document.querySelector('#card-name').value,
                number: document.querySelector('#card-number').value,
                exp_month: mm,
                exp_year: document.querySelector('#card-expiry-year').value,
                cvc: document.querySelector('#card-cvc').value,
            }, stripeResponseHandler)
        })

        function stripeResponseHandler(statut, response) {
            // console.log(statut);
            if (statut != 200) {
                document.querySelector('#charge-error').classList.remove('hidden')
                document.querySelector('#charge-error').textContent = response.error.message
                document.querySelector('#charge-error').classList.add('error')

                let btns = document.querySelectorAll('button')
                btns.forEach(btn => {
                    btn.disabled = false
                });
            } else {
                // console.log(response.id);
                document.querySelector('#token-key').value = response.id
                document.querySelector('#validation-form').submit()
            }
        }
    </script>
@endsection
