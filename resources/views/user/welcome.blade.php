@extends('user.layouts.master')

@section('title')
    Accueil
@endsection

@section('content')
    {{-- header  --}}
    <header class="header">

        <div class="header-content">
            <!-- Pieces Slider -->
            <div class="pieces-slider">
                <!-- Each slide with corresponding image and text -->
                @foreach ($actus as $actu)
                    <div class="pieces-slider__slide">
                        <img class="pieces-slider__image" src="{{ asset('storage/imageActu/' . $actu->image) }}"
                            alt="">
                        <h2 class="pieces-slider__text">{{ $actu->title }}</h2>
                        <p class="para-primary">{{ $actu->description }}</p>
                    </div>
                @endforeach
                <!-- Canvas to draw the pieces -->
                <canvas class="pieces-slider__canvas"></canvas>
                <!-- Slider buttons: prev and next -->
                <button class="pieces-slider__button pieces-slider__button--prev">
                    <i class="fi fi-rr-angle-left"></i>
                </button>
                <button class="pieces-slider__button pieces-slider__button--next">
                    <i class="fi fi-rr-angle-right"></i>
                </button>
            </div>
        </div>

    </header>
    {{-- header  --}}

    {{-- next game --}}
    <section class="section game">
        <h1 class="title game-title">Prochain Match</h1>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($next_games as $next_game)
                    <div class="swiper-slide game-card-item">
                        <div class="game-card-item-content-1">
                            <h3 class="subtitle game-card-item-team">{{ $next_game->home_team }}</h3>
                            <p class="title game-card-item-team game-card-item-team-vs">vs</p>
                            <h3 class="subtitle game-card-item-team">{{ $next_game->visitor_team }}</h3>
                        </div>
                        <div class="game-card-item-content-2">
                            <h3 class="subtitle game-card-item-subtitle">{{ $next_game->match_type }}</h3>
                            @php
                                $date = date('d F Y', strtotime($next_game->match_date));
                            @endphp
                            <p class="para game-card-item-para">
                                <i class="fi fi-rr-calendar-day"></i>
                                {{ $date }}
                            </p>
                            <p class="para-primary game-card-item-para">
                                <i class="fi fi-rr-marker"></i>
                                {{ $next_game->match_location }}
                            </p>
                            <button class="btn game-card-item-link match-modal-btn">
                                <i class="fi fi-rr-menu-dots-vertical"></i>
                                <span>Plus</span>
                            </button>
                            <div class="match-modal">
                                <div class="match-modal-content">
                                    <a href="{{ url('/match/' . $next_game->id) }}" class="btn match-modal-content-btn">
                                        <i class="fi fi-rr-eye"></i>
                                        <span>Aller au match</span>
                                    </a>

                                    {{-- @if ($next_game->home_team == 'Madagascar')
                                        @if (Session::has('user'))
                                            <a href="{{ url('/ticket_shop/' . $next_game->id) }}"
                                                class="btn match-modal-content-btn">
                                                <i class="fi fi-rr-ticket"></i>
                                                <span>Acheter des billets</span>
                                            </a>
                                        @endif
                                    @endif --}}
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add navigation controls -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    {{-- next game --}}

    {{-- Palmares --}}
    <section class="palmares">
        <h1 class="title">Palmarès du Club</h1>
        <div class="palmares-content">
            <div class="palmares-img-container" data-aos="fade-right">
                <img src="{{ asset('images/trophe-can.jpg') }}" alt="" class="palmares-img">
            </div>
            <div class="palmares-desc">
                <img src="{{ asset('images/trophe-can.png') }}" alt="" class="palmares-desc-img">
                <ul class="palmares-desc-list">
                    @foreach ($trophies as $trophy)
                        <li class="palmares-desc-list-item" data-aos="fade-down">
                            <HR class="palmares-desc-list-item-line">
                            </HR>
                            <div class="palmares-desc-list-item-content">
                                <span class="palmares-desc-list-item-icon">
                                    <i class="fi fi-rr-trophy"></i>
                                </span>
                                <h1 class="para palmares-desc-list-item-title">{{ $trophy->number_trophy }}</h1>
                            </div>
                            <p class="para">{{ $trophy->name_trophy }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    {{-- endPalmares --}}

    {{-- Shop --}}
    <section class="section shop-home">
        <div class="shop-home-main">
            <a href="{{ route('shop') }}" class="shop-home-main-link">
                <img src="{{ asset('images/shirt-consept-copy.jpg') }}" alt="" class="shop-home-main-img">
            </a>
            <h1 class="title">Nouveau maillot a domicile du barea</h1>
        </div>
    </section>
    {{-- Shop --}}

    {{-- donate  --}}
    <section class="section donate">
        <main class="donate-main">
            <aside class="donate-main-desc">
                <h1 class="title-primary">Faire un don</h1> <br>
                <h3 class="subtitle-secondary" style="margin-bottom: .5rem">Je fais un dont pour le club</h3>
                <p class="para-primary">
                    Notre Equipe vous a plu, vous voulez nous soutenir sans engagement et en toute
                    simplicité, faites un Don du montant de votre choix. <br>
                    Grâce à vous, notre club auron la force de porter plus loin le nom et le drapeau de notre patrie.
                </p>
            </aside>
            <aside class="donate-main-form">
                <form action="" id="donate-form">
                    {{-- <header class="donate-main-form-header">
                        <h3 class="subtitle-secondary">Coordonnées</h3>
                    </header>
                    <main class="donate-main-form-main">
                        <div class="form-content">
                            <label for="" class="form-label">Nom</label>
                            <span class="form-icon">
                                <i class="fi fi-rr-user"></i>
                            </span>
                            <input type="text" class="form-input" placeholder="Votre nom">
                        </div>
                        <div class="form-content">
                            <label for="" class="form-label">Prénom</label>
                            <span class="form-icon">
                                <i class="fi fi-rr-user"></i>
                            </span>
                            <input type="text" class="form-input" placeholder="Votre prenom">
                        </div>
                        <div class="form-content">
                            <label for="" class="form-label">Email</label>
                            <span class="form-icon">
                                <i class="fi fi-rr-envelope"></i>
                            </span>
                            <input type="email" class="form-input" placeholder="Votre Email">
                        </div>
                        <div class="form-content">
                            <label for="" class="form-label">Confirmation Email</label>
                            <span class="form-icon">
                                <i class="fi fi-rr-envelope"></i>
                            </span>
                            <input type="email" class="form-input" placeholder="Confirmer l'Email">
                        </div>
                    </main> --}}
                    <header class="donate-main-form-header">
                        <h3 class="subtitle-secondary">Montant du Don</h3>
                    </header>
                    <main class="donate-main-form-main">
                        <div class="form-content donate-main-form-main-content">
                            <label for="" class="form-label">Montant</label>
                            <span class="form-icon">
                                <i class="fi fi-rr-dollar"></i>
                            </span>
                            <input type="number" value="" class="form-input" id="sum"
                                placeholder="Montant en $">
                            <span class="donate-main-form-main-indice">$</span>
                        </div>
                        <a href="{{ Route('donation_checkout') }}" id="donate-btn"
                            class="btn btn-primary donate-main-form-btn disabled" aria-disabled="true">
                            <span class="donate-main-form-btn-text">Valider et Payer</span>
                            <i class="fi fi-rr-donate"></i>
                        </a>
                    </main>
                </form>
            </aside>
        </main>
    </section>
    {{-- donate  --}}

    <script>
        // Wrap every letter in a span
        let textWrapper = document.querySelectorAll('.ml2');
        textWrapper.forEach(item => {
            item.innerHTML = item.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
        });

        // Hide and show link match
        let matchModalBtn = document.querySelectorAll('.match-modal-btn');

        matchModalBtn.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e
                    .stopPropagation(); // Empêche la propagation du clic pour éviter de déclencher la fermeture du modal immédiatement
                let content = e.target.closest('.game-card-item');
                let matchModal = content.querySelector('.match-modal');

                // Ferme tous les autres modals ouverts avant d'ouvrir le nouveau
                document.querySelectorAll('.match-modal.show-match-modal').forEach(modal => {
                    modal.classList.remove('show-match-modal');
                });

                // Affiche ou cache le modal cliqué
                matchModal.classList.toggle('show-match-modal');
            });
        });

        // Ferme le modal quand on clique n'importe où sur la page
        document.addEventListener('click', (e) => {
            // Si le clic n'est pas sur un bouton ou dans le modal lui-même, cacher le modal
            if (!e.target.closest('.match-modal') && !e.target.closest('.match-modal-btn')) {
                document.querySelectorAll('.match-modal.show-match-modal').forEach(modal => {
                    modal.classList.remove('show-match-modal');
                });
            }
        });


        anime.timeline({
                loop: true
            })
            .add({
                targets: '.ml2 .letter',
                translateY: [100, 0],
                translateZ: 0,
                opacity: [0, 1],
                easing: "easeOutExpo",
                duration: 1400,
                delay: (el, i) => 300 + 30 * i
            }).add({
                targets: '.ml2 .letter',
                translateY: [0, -100],
                opacity: [1, 0],
                easing: "easeInExpo",
                duration: 1200,
                delay: (el, i) => 100 + 30 * i
            });

        // get price donation
        function getPrice() {
            let sum = document.querySelector('#sum').value
            const donateBtn = document.querySelector('#donate-btn')
            sum = parseInt(sum)

            if (!sessionStorage.getItem(sum)) {
                sessionStorage.setItem('sum', JSON.stringify(sum))
            } else {
                sessionStorage.setItem('sum', JSON.stringify(sum))
            }
        }
        setInterval(getPrice, 100)

        const donateBtn = document.getElementById('donate-btn');
        const sumInput = document.getElementById('sum');

        // vérifier le champ de montant
        function checkSum() {
            const sumValue = parseFloat(sumInput.value);

            if (!isNaN(sumValue) && sumValue > 0) {
                donateBtn.classList.remove('disabled');
                donateBtn.removeAttribute('aria-disabled');
            } else {
                donateBtn.classList.add('disabled');
                donateBtn.setAttribute('aria-disabled', 'true');
            }
        }
        sumInput.addEventListener('input', checkSum);
    </script>
@endsection
