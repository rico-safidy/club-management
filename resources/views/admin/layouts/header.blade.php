<header class="dashboard-header">
    <div class="dashboard-header-content-left">
        <span class="dashboard-header-content-left-icon" id="open-btn">
            <i class="fi fi-rr-menu-burger"></i>
        </span>
        <a href="{{ url('/') }}" class="dashboard-header-content-left-link" id="home-link-header">
            <span class="dashboard-header-content-left-link-icon">
                <i class="fi fi-rr-home"></i>
            </span>
            Accueil
        </a>
        <h3 class="subtitle-primary">Tableau de bord</h3>
    </div>
    <div class="dashboard-header-content">
        <div class="dashboard-header-content-desc">
            <h4 class="subtitle-primary">{{ Session::get('user')->first_name }} {{ Session::get('user')->last_name }}
            </h4>
            <hr class="dashboard-header-line">
            <p class="para-primary">{{ Session::get('user')->email }}</p>
        </div>
    </div>
</header>

{{-- nav --}}
<section class="dashboard">
    <main class="dashboard-main">
        <aside class="dashboard-left-nav">
            <ul class="dashboard-left-nav-list">
                <span class="dashboard-left-nav-list-icon" id="close-btn">
                    <i class="fi fi-rr-cross"></i>
                </span>
                <li class="dashboard-left-nav-item">
                    <a href="{{ url('/') }}" class="dashboard-left-nav-link">
                        <span class="dashboard-header-content-left-link-icon">
                            <i class="fi fi-rr-home"></i>
                        </span>
                        Accueil
                    </a>
                </li>

                @php
                    $curr_page = basename(request()->path());
                    // dd($curr_page);
                @endphp

                <li class="dashboard-left-nav-item">
                    <a href="{{ Route('dashboard') }}"
                        @if ($curr_page == 'dashboard') class="dashboard-left-nav-link active"
                        @else
                            class="dashboard-left-nav-link" @endif
                        id="home-link">
                        <span class="dashboard-left-nav-link-icon">
                            <i class="fi fi-rr-stats"></i>
                        </span>
                        Dashboard
                    </a>
                </li>
                <li class="dashboard-left-nav-item">
                    <a href="{{ url('/palmares') }}" @if ($curr_page == 'palmares') class="dashboard-left-nav-link active"
                        @else
                            class="dashboard-left-nav-link" @endif>
                        <span class="dashboard-left-nav-link-icon">
                            <i class="fi fi-rr-trophy"></i>
                        </span>
                        Palmarès
                    </a>
                </li>
                <li class="dashboard-left-nav-item">
                    <button class="dashboard-left-nav-link dashboard-dropdown">
                        <span class="dashboard-left-nav-link-icon">
                            <i class="fi fi-rr-command"></i>
                        </span>
                        Equipe
                        <span class="dashboard-left-nav-link-icon dashboard-dropdown-indication">
                            <i class="fi fi-rr-angle-small-down"></i>
                        </span>
                    </button>
                    <div class="dashboard-dropdown-content">
                        <a href="{{ Route('team_admin') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-users"></i>
                            </span>
                            Equipes
                        </a>
                        <a href="{{ Route('team_category') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-user-gear"></i>
                            </span>
                            Categorie
                        </a>
                    </div>
                </li>

                <li class="dashboard-left-nav-item">
                    <button class="dashboard-left-nav-link dashboard-dropdown">
                        <span class="dashboard-left-nav-link-icon">
                            <i class="fi fi-rr-command"></i>
                        </span>
                        Boutique
                        <span class="dashboard-left-nav-link-icon dashboard-dropdown-indication">
                            <i class="fi fi-rr-angle-small-down"></i>
                        </span>
                    </button>
                    <div class="dashboard-dropdown-content">
                        <a href="{{ url('/shop_admin') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-store-alt"></i>
                            </span>
                            Boutique
                        </a>
                        <a href="{{ url('/category') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-diagram-project"></i>
                            </span>
                            Categories
                        </a>
                        <a href="{{ url('/size') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-shirt-long-sleeve"></i>
                            </span>
                            Taille
                        </a>
                        <a href="{{ url('/color') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-claw-marks"></i>
                            </span>
                            Couleur
                        </a>
                    </div>
                </li>

                <li class="dashboard-left-nav-item">
                    <button class="dashboard-left-nav-link dashboard-dropdown">
                        <span class="dashboard-left-nav-link-icon">
                            <i class="fi fi-rr-command"></i>
                        </span>
                        Operations
                        <span class="dashboard-left-nav-link-icon dashboard-dropdown-indication">
                            <i class="fi fi-rr-angle-small-down"></i>
                        </span>
                    </button>
                    <div class="dashboard-dropdown-content">
                        <a href="{{ Route('users') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-users"></i>
                            </span>
                            Utilisateurs
                        </a>
                        <a href="{{ Route('actuality_admin') }}"
                            class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-photo-video"></i>
                            </span>
                            Actualites
                        </a>
                        <a href="{{ Route('match_admin') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-football"></i>
                            </span>
                            Matchs
                        </a>
                        <a href="{{ Route('trophy') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-trophy"></i>
                            </span>
                            Trophés
                        </a>

                    </div>
                </li>
                
                {{-- <li class="dashboard-left-nav-item">
                    <button class="dashboard-left-nav-link dashboard-dropdown">
                        <span class="dashboard-left-nav-link-icon">
                            <i class="fi fi-rr-command"></i>
                        </span>
                        Billetterie
                        <span class="dashboard-left-nav-link-icon dashboard-dropdown-indication">
                            <i class="fi fi-rr-angle-small-down"></i>
                        </span>
                    </button>
                    <div class="dashboard-dropdown-content">
                        <a href="{{ Route('ticket') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-ticket-alt"></i>
                            </span>
                            Billetterie
                        </a>
                        <a href="{{ Route('stade') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-house-chimney-window"></i>
                            </span>
                            Stadium
                        </a>
                        <a href="{{ Route('ticket_category') }}"
                            class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-diagram-project"></i>
                            </span>
                            Categories
                        </a>
                    </div>
                </li> --}}

                <li class="dashboard-left-nav-item">
                    <a href="" class="dashboard-left-nav-link">
                        <span class="dashboard-left-nav-link-icon">
                            <i class="fi fi-rr-user"></i>
                        </span>
                        Mon compte
                    </a>
                </li>
            </ul>
        </aside>
        {{-- end nav --}}

        <script>
            // dropdown at leftNav
            document.addEventListener('DOMContentLoaded', () => {
                const dropdown = document.getElementsByClassName('dashboard-dropdown')

                for (let i = 0; i < dropdown.length; i++) {
                    dropdown[i].addEventListener('click', () => {
                        dropdown[i].classList.toggle('dashboard-dropdown-active')
                        let panel = dropdown[i].nextElementSibling
                        if (panel.style.maxHeight) {
                            panel.style.maxHeight = null
                        } else {
                            panel.style.maxHeight = panel.scrollHeight + 'px'
                        }
                    })
                }
            })

            // open & show left nav
            const openBtn = document.querySelector('#open-btn')
            const closeBtn = document.querySelector('#close-btn')
            const navContent = document.querySelector('.dashboard-left-nav')

            openBtn.addEventListener('click', () => {
                navContent.style.left = 0
            })
            closeBtn.addEventListener('click', () => {
                navContent.style.left = '-15rem'
            })
        </script>
