    {{-- nav --}}
    <nav class="nav">
        <ul class="nav-list">
            <li class="nav-item">
                <span class="nav-link nav-link-btn-menu" id="open-btn">
                    <i class="fi fi-rr-menu-burger"></i>
                </span>
                <a href="{{ url('/') }}" class="nav-link">
                    <img class="nav-logo" src="{{ asset('images/logo.png') }}" alt="">
                </a>
            </li>
            <li class="nav-item nav-item-content">
                <span class="nav-link nav-link-btn-menu nav-link-btn-menu-close" id="close-btn">
                    <i class="fi fi-rr-angle-small-left"></i>
                </span>
                <a href="{{ url('/') }}" class="nav-link">Accueil</a>
                <a href="{{ Route('team') }}" class="nav-link">Equipe</a>
                <a href="{{ url('/shop') }}" class="nav-link">Boutique</a>
                <a href="{{ Route('contact') }}" class="nav-link">Contact</a>
                @if (Session::has('user'))
                    @if (Session::get('user')->statut === 'admin')
                        <a href="{{ Route('dashboard') }}" class="nav-link">Dashboard</a>
                    @endif
                @endif
            </li>
            <li class="nav-item">
                @if (Session::has('user'))
                    <a href="{{ url('/profile') }}" class="nav-link"
                        title="{{ Session::get('user')->fname }} {{ Session::get('user')->lname }}">
                        <i class="fi fi-rr-user"></i>
                    </a>
                @else
                    <a href="{{ Route('login') }}" class="nav-link" title="Connexion">
                        <i class="fi fi-rr-sign-in-alt"></i>
                    </a>
                @endif
                @if (Session::has('user'))
                    <a href="{{ Route('logout') }}" class="nav-link" title="Deconnexion">
                        <i class="fi fi-rr-exit"></i>
                    </a>
                @endif
            </li>
        </ul>
    </nav>
    {{-- endNav --}}

    <script>

        // Open & hide nav
        const openBtn = document.querySelector('#open-btn')
        const closeBtn = document.querySelector('#close-btn')
        const navContents = document.querySelector('.nav-item-content')

        openBtn.addEventListener('click', () => {
            navContents.style.left = 0
            openBtn.style.display = 'none'
        })
        closeBtn.addEventListener('click', () => {
            navContents.style.left = '-15rem'
            openBtn.style.display = 'block'
        })
    </script>
