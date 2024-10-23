<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture</title>
</head>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .facture {
        height: 100vh;
        max-width: 700px;
        margin: auto;
        position: relative;
    }

    li {
        list-style-type: none;
    }

    .header {
        background: #010a18;
        color: #dddddd;
    }

    .list {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: .5rem 2rem;
    }

    .item:first-child {
        display: flex;
        align-items: center;
        gap: 2rem
    }

    .item:last-child {
        text-align: end;
    }

    .logo {
        width: 60px;
    }

    .logo-img {
        width: 100%
    }

    .nav-title {
        font-size: 2rem;
    }

    .nav-subtitle {
        margin: 0 0 .2rem 0;
    }

    .para-i {
        font-size: .9rem;
        font-style: italic;
        margin: 0 0 .1rem 0;
    }

    .coordinate {
        padding: 0rem 2rem;
    }

    .coordinate-list {
        margin: 2rem 0;
        display: flex;
        justify-content: space-between;
    }

    .item-desc {
        display: flex;
        justify-content: space-between;
        gap: 2rem;
    }

    .gray {
        background: #cacaca;
        padding: 1rem
    }

    .subtitle {
        margin: 0 0 .4rem 0;
        font-size: 1rem;
    }

    .para {
        margin: 0 0 .3rem 0;
        font-size: .9rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        text-align: end;
    }

    th {
        text-align: center;
        padding: .4rem;
        font-size: .9rem;
    }

    td {
        font-size: .8rem;
        padding: .4rem;
    }

    .footer {
        position: absolute;
        bottom: 2rem;
        left: 0;
        width: 100%;
        padding: .5rem 2rem;
    }

    .footer-title {
        margin: 0 0 .5rem 0;
        font-size: .8rem;
        color: #414141;
    }

    .footer-para {
        font-size: .8rem;
        color: #444444;
        margin: 0 0 .3rem 0;
    }
</style>

<body>
    <section class="facture">
        <header class="header">
            <nav class="nav">
                <ul class="list">
                    <item class="item">
                        <div class="logo">
                            <img src="{{ asset('images/logo.png') }}" alt="" class="logo-img">
                        </div>
                        <h2 class="nav-title">Facture</h2>
                    </item>
                    <item class="item">
                        <h4 class="nav-subtitle">Barea de Madagascar</h4>
                        <p class="para-i">Antananarivo</p>
                        <p class="para-i">Analamahitsy</p>
                    </item>
                </ul>
            </nav>
        </header>
        <section class="coordinate">
            <div class="coordinate-list">
                <div class="coordinate-item">
                    <h3 class="subtitle">Client:</h3>
                    <p class="para">{{ $payment->customer_name }}</p>
                    <p class="para">{{ $payment->customer_adress }}</p>
                </div>
                <div class="coordinate-item gray">
                    <div class="item-desc">
                        @php
                            $date = date('d F Y', strTotime($payment->created_at));
                        @endphp
                        <p class="para">Date: </p>
                        <p class="para">{{ $date }}</p>
                    </div>
                    <div class="item-desc">
                        <p class="para">Numero de facture: </p>
                        <p class="para">{{ $payment->invoice_number }}</p>
                    </div>
                    <div class="item-desc">
                        <p class="para">Paiement: </p>
                        <p class="para">Stripe</p>
                    </div>
                </div>
            </div>
            <div class="information">
                <h3 class="subtitle">Informations additionnelles:</h3>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Nombre</th>
                            <th>Taille</th>
                            <th>Couleur</th>
                            <th>Prix Unitaire</th>
                            <th>Prix Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_price = 0;
                            $final_price = 0;
                        @endphp
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article['article'] }}</td>
                                <td>{{ $article['number'] }}</td>
                                <td>{{ $article['size'] }}</td>
                                <td>{{ $article['color'] }}</td>
                                <td>${{ $article['price'] }}</td>
                                <td>
                                    @php
                                        $total_price = $article['price'] * $article['number'];
                                        $final_price += $total_price;
                                    @endphp
                                    ${{  $total_price }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <th>Total TTC</th>
                            <th style="text-align: end">${{ $final_price }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
        <footer class="footer">
            <h4 class="footer-title">Coordonnée</h4>
            <p class="footer-para">034 58 541 25</p>
            <p class="footer-para">barea@gmail.com</p>
        </footer>
    </section>

    @if (isset($message))
        <p class="success-message">
            {{ $message }}
        </p>
    @endif
    {{-- <p class="success-message">Achat effectuee avec succes !</p> --}}
</body>

<style>
    .success-message {
        position: absolute;
        bottom: 2rem;
        width: 100%;
        text-align: center;
        color: green;
    }
</style>

</html>
