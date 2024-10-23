@extends('user.layouts.master')

@section('title')
    Paiement du billet
@endsection

@section('content')
    <section class="donate-checkout">
        <main class="donate-checkout-main">
            <form action="" method="POST" class="donate-checkout-main-form" id="validation-form">
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
                    <p style="color: red" id="charge-error">
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
                    <span class="donate-checkout-main-form-btn-icon">
                        <i class="fi fi-rr-ticket"></i>
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
@endsection
