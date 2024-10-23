@extends('user.layouts.master')

@section('title')
    Achat de billet
@endsection

@section('content')
    <section class="ticket ticket-detail">
        <header class="ticket-header">
            <div class="ticket-header-content">
                <h2 class="subtitle-primary">Acheter des billets</h2>
            </div>
            <div class="ticket-header-content-main">
                <div class="ticket-header-content">
                    <h3 class="subtitle-primary">{{ $match->home_team }}</h3>
                    <h2 class="subtitle-primary">VS</h2>
                    <h3 class="subtitle-primary">{{ $match->visitor_team }}</h3>
                </div>
                <p class="para-primary ticket-header-content-main-para">
                    {{ $match->match_location }}
                    <i class="fi fi-rr-marker"></i>
                </p>
                @php
                    $match_date = date('d F Y', strTotime($match->match_date));
                @endphp
                <p class="para-primary ticket-header-content-main-para">
                    {{ $match_date }} à {{ $match->match_hour }}
                    <i class="fi fi-rr-calendar-day"></i>
                </p>
            </div>
            <a href="{{ url('ticket_cart') }}" class="btn shop-nav-list-item-btn">
                <i class="fi fi-rr-shopping-cart"></i>
            </a>
        </header>
        <main class="ticket-detail-main">
            <ul class="ticket-detail-main-list">
                {{-- <img src="{{ asset('images/vue-generative-du-stade-football-haut_784584-4672.jpg') }}" alt=""
                    class="ticket-detail-main-list-img"> --}}
                <li class="ticket-detail-main-list-item">
                    <form action="" method="POST">
                        <header class="ticket-detail-main-list-item-header">
                            <h3 class="subtitle">Billet de base</h3>
                        </header>
                        <main class="ticket-detail-main-list-item-main">
                            {{-- place  --}}
                            <h4 class="subtitle-primary ticket-detail-main-list-item-main-subtitle">Place disponible</h4>
                            @foreach ($stadium_place as $place)
                                <label
                                    class="shop-main-desc-input-radio ticket-detail-main-list-item-main-radio">{{ $place->stadium_place_location }}
                                    <input type="radio" checked='checked' name="taille" value="Tribune" id=""
                                        class="shop-main-desc-input-radio-input">
                                    <span class="shop-main-desc-input-radio-checkmark"></span>
                                    <span>{{ $place->stadium_place_number }}</span>
                                </label>
                            @endforeach
                            {{-- end place  --}}
                        </main>
                        <footer class="ticket-detail-main-list-item-footer">
                            <p class="para">Prix : 5000 Ar</p>
                            <button type="submit" class="btn btn-primary ticket-detail-main-list-item-footer-btn">
                                Ajouter au panier
                                <span class="">
                                    <i class="fi fi-rr-shopping-cart-add"></i>
                                </span>
                            </button>
                        </footer>
                    </form>
                </li>
            </ul>
        </main>
    </section>

    <script></script>
@endsection
