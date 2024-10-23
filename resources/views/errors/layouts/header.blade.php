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
            <h4 class="subtitle-primary">{{ Session::get('user')->fname }} {{ Session::get('user')->lname }}</h4>
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
                <li class="dashboard-left-nav-item">
                    <a href="{{ Route('dashboard') }}" class="dashboard-left-nav-link" id="home-link">
                        <span class="dashboard-left-nav-link-icon">
                            <i class="fi fi-rr-stats"></i>
                        </span>
                        Dashboard
                    </a>
                </li>
                <li class="dashboard-left-nav-item">
                    <a href="" class="dashboard-left-nav-link">
                        <span class="dashboard-left-nav-link-icon">
                            <i class="fi fi-rr-stats"></i>
                        </span>
                        test
                    </a>
                </li>
                <li class="dashboard-left-nav-item">
                    <a href="" class="dashboard-left-nav-link">
                        <span class="dashboard-left-nav-link-icon">
                            <i class="fi fi-rr-stats"></i>
                        </span>
                        nav
                    </a>
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
                        <a href="{{ Route('team_admin') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-users-alt"></i>
                            </span>
                            Equipe
                        </a>
                        <a href="{{ Route('actuality_admin') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-photo-video"></i>
                            </span>
                            Actualites
                        </a>
                        <a href="{{ Route('shop_admin') }}" class="dashboard-left-nav-link dashboard-dropdown-item">
                            <span class="dashboard-left-nav-link-icon">
                                <i class="fi fi-rr-store-alt"></i>
                            </span>
                            Boutique
                        </a>
                    </div>
                </li>
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

<main class="dashboard-main-content">
    <ul class="dashboard-main-content-list">
        <a href="{{ Route('users') }}" class="dashboard-main-content-item">
            <div class="dashboard-main-content-item-container">
                <div class="dashboard-main-content-item-conteiner-desc">
                    <p class="para-primary">Utilisateurs</p>
                    <h3 class="subtitle-primary">0</h3>
                </div>
                <span class="dashboard-main-content-item-container-icon-1">
                    <i class="fi fi-rr-users"></i>
                </span>
            </div>
        </a>
        <a href="{{ Route('team_admin') }}" class="dashboard-main-content-item">
            <div class="dashboard-main-content-item-container">
                <div class="dashboard-main-content-item-conteiner-desc">
                    <p class="para-primary">Equipes</p>
                    <h3 class="subtitle-primary">32</h3>
                </div>
                <span class="dashboard-main-content-item-container-icon-2">
                    <i class="fi fi-rr-users-alt"></i>
                </span>
            </div>
        </a>
        <li class="dashboard-main-content-item">
            <div class="dashboard-main-content-item-container">
                <div class="dashboard-main-content-item-conteiner-desc">
                    <p class="para-primary">Users</p>
                    <h3 class="subtitle-primary">50</h3>
                </div>
                <span class="dashboard-main-content-item-container-icon-3">
                    <i class="fi fi-rr-users"></i>
                </span>
            </div>
        </li>
        <li class="dashboard-main-content-item">
            <div class="dashboard-main-content-item-container">
                <div class="dashboard-main-content-item-conteiner-desc">
                    <p class="para-primary">Users</p>
                    <h3 class="subtitle-primary">50</h3>
                </div>
                <span class="dashboard-main-content-item-container-icon-4">
                    <i class="fi fi-rr-users-alt"></i>
                </span>
            </div>
        </li>
    </ul>


<script>
    // dropdown at leftNav
    const dropdown = document.querySelector('.dashboard-dropdown')
    const dropdownContent = document.querySelector('.dashboard-dropdown-content')
    const dropdownIndicator = document.querySelector('.dashboard-dropdown-indication')

    dropdown.addEventListener('click', () => {
        if (dropdownContent.style.display === 'block') {
            dropdownContent.style.display = 'none'
            dropdownIndicator.style.transform = 'rotateZ(0deg)'
            dropdownIndicator.style.top = '.7rem'
        } else {
            dropdownContent.style.display = 'block'
            dropdownIndicator.style.transform = 'rotateZ(180deg)'
            dropdownIndicator.style.top = '.5rem'
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
