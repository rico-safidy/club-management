@extends('user.layouts.master')

@section('title')
    Equipe
@endsection

@section('content')
    {{-- TEAM --}}
    <section class="section team">
        <h1 class="title team-title">Notre Equipe</h1>

        <div class="team-card-content">
            <nav class="team-nav">
                <ul class="team-nav-list">
                    <li class="team-nav-list-item">
                        {{-- <button class="team-nav-list-item-btn" onclick="selectPost('all', event)" --}}
                        {{-- id="defaultOpen">Tout</button> --}}
                        <button class="team-nav-list-item-btn" onclick="selectPost('gardien', event)">Gardien</button>
                        <button class="team-nav-list-item-btn" onclick="selectPost('defense', event)">Defense</button>
                        <button class="team-nav-list-item-btn" onclick="selectPost('milieu', event)">Milieu</button>
                        <button class="team-nav-list-item-btn" onclick="selectPost('attaquant', event)">Attaquant</button>
                        <button class="team-nav-list-item-btn" onclick="selectPost('staff', event)">Staff</button>
                    </li>
                    {{-- <li class="team-nav-list-item">
                        <span class="team-nav-list-item-icon">
                            <i class="fi fi-rr-search"></i>
                        </span>
                        <input type="search" name="search" id="">
                    </li> --}}
                </ul>
            </nav>

            {{-- gardien --}}
            <div class="main team-card-main" id="gardien">
                <h2 class="team-subtitle">Gardien de but</h2>

                <!-- Container Swiper pour cette section -->
                <div class="swiper-container team-card-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($teams as $team)
                            @if ($team->post == 'Gardien de but')
                                <!-- Chaque carte devient un élément Swiper -->
                                <div class="swiper-slide">
                                    <a href="{{ url('/team_detail/' . $team->id) }}" class="team-card-item">
                                        <img src="{{ asset('storage/imageTeam/' . $team->profile) }}" alt=""
                                            class="team-card-item-img">
                                        <div class="team-card-item-desc">
                                            <h1 class="team-card-item-desc-title">{{ $team->number }}</h1>
                                            <div class="team-card-item-desc-content">
                                                <h3 class="team-card-item-desc-subtitle">{{ $team->pseudo }}</h3>
                                                <p class="para team-card-item-desc-para">{{ $team->post }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div> <!-- Fin swiper-slide -->
                            @endif
                        @endforeach
                    </div> <!-- Fin swiper-wrapper -->

                    <!-- Ajouter des boutons de navigation Swiper -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div> <!-- Fin swiper-container -->
            </div>
            {{-- gardien --}}

            {{-- defense --}}
            <div class="main team-card-main" id="defense">
                <h2 class="team-subtitle">Defense</h2>
                <!-- Container Swiper pour cette section -->
                <div class="swiper-container team-card-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($teams as $team)
                            @if ($team->post == 'Defense')
                                <!-- Chaque carte devient un élément Swiper -->
                                <div class="swiper-slide">
                                    <a href="{{ url('/team_detail/' . $team->id) }}" class="team-card-item">
                                        <img src="{{ asset('storage/imageTeam/' . $team->profile) }}" alt=""
                                            class="team-card-item-img">
                                        <div class="team-card-item-desc">
                                            <h1 class="team-card-item-desc-title">{{ $team->number }}</h1>
                                            <div class="team-card-item-desc-content">
                                                <h3 class="team-card-item-desc-subtitle">{{ $team->pseudo }}</h3>
                                                <p class="para team-card-item-desc-para">{{ $team->post }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div> <!-- Fin swiper-slide -->
                            @endif
                        @endforeach
                    </div> <!-- Fin swiper-wrapper -->

                    <!-- Ajouter des boutons de navigation Swiper -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div> <!-- Fin swiper-container -->
            </div>
            {{-- defense --}}

            {{-- milieu --}}
            <div class="main team-card-main" id="milieu">
                <h2 class="team-subtitle">Milieu de terrain</h2>

                <!-- Container Swiper pour cette section -->
                <div class="swiper-container team-card-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($teams as $team)
                            @if ($team->post == 'Milieu de terrain')
                                <!-- Chaque carte devient un élément Swiper -->
                                <div class="swiper-slide">
                                    <a href="{{ url('/team_detail/' . $team->id) }}" class="team-card-item">
                                        <img src="{{ asset('storage/imageTeam/' . $team->profile) }}" alt=""
                                            class="team-card-item-img">
                                        <div class="team-card-item-desc">
                                            <h1 class="team-card-item-desc-title">{{ $team->number }}</h1>
                                            <div class="team-card-item-desc-content">
                                                <h3 class="team-card-item-desc-subtitle">{{ $team->pseudo }}</h3>
                                                <p class="para team-card-item-desc-para">{{ $team->post }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div> <!-- Fin swiper-slide -->
                            @endif
                        @endforeach
                    </div> <!-- Fin swiper-wrapper -->

                    <!-- Ajouter des boutons de navigation Swiper -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div> <!-- Fin swiper-container -->
            </div>
            {{-- milieu --}}

            {{-- attaquant --}}
            <div class="main team-card-main" id="attaquant">
                <h2 class="team-subtitle">Attaquant</h2>

                <!-- Container Swiper pour cette section -->
                <div class="swiper-container team-card-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($teams as $team)
                            @if ($team->post == 'Attaquant')
                                <!-- Chaque carte devient un élément Swiper -->
                                <div class="swiper-slide">
                                    <a href="{{ url('/team_detail/' . $team->id) }}" class="team-card-item">
                                        <img src="{{ asset('storage/imageTeam/' . $team->profile) }}" alt=""
                                            class="team-card-item-img">
                                        <div class="team-card-item-desc">
                                            <h1 class="team-card-item-desc-title">{{ $team->number }}</h1>
                                            <div class="team-card-item-desc-content">
                                                <h3 class="team-card-item-desc-subtitle">{{ $team->pseudo }}</h3>
                                                <p class="para team-card-item-desc-para">{{ $team->post }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div> <!-- Fin swiper-slide -->
                            @endif
                        @endforeach
                    </div> <!-- Fin swiper-wrapper -->

                    <!-- Ajouter des boutons de navigation Swiper -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div> <!-- Fin swiper-container -->
            </div>
            {{-- attaquant --}}

            {{-- staff --}}
            <div class="main team-card-main" id="staff">
                <h2 class="team-subtitle">Staff</h2>

                <!-- Container Swiper pour cette section -->
                <div class="swiper-container team-card-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($staffs as $team)
                            <!-- Chaque carte devient un élément Swiper -->
                            <div class="swiper-slide">
                                <a href="{{ url('/team_detail/' . $team->id) }}" class="team-card-item">
                                    <img src="{{ asset('storage/imageTeam/' . $team->profile) }}" alt=""
                                        class="team-card-item-img">
                                    <div class="team-card-item-desc">
                                        <h1 class="team-card-item-desc-title">{{ $team->number }}</h1>
                                        <div class="team-card-item-desc-content">
                                            <h3 class="team-card-item-desc-subtitle">{{ $team->pseudo }}</h3>
                                            <p class="para team-card-item-desc-para">{{ $team->post }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div> <!-- Fin swiper-slide -->
                        @endforeach
                    </div> <!-- Fin swiper-wrapper -->

                    <!-- Ajouter des boutons de navigation Swiper -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div> <!-- Fin swiper-container -->
            </div>
            {{-- staff --}}

        </div>
    </section>
    {{-- TEAM --}}

    <script>
        // tab team
        function selectPost(teamPost, evt) {
            const postContents = document.querySelectorAll('.team-card-main')
            const postBtns = document.querySelectorAll('.team-nav-list-item-btn')
            postContents.forEach(postContent => {
                postContent.style.display = 'none'
            });
            postBtns.forEach(postBtn => {
                postBtn.className = postBtn.className.replace(" team-nav-list-item-btn-active", "")
            });
            document.getElementById(teamPost).style.display = 'block'
            evt.currentTarget.className += ' team-nav-list-item-btn-active'
        }
    </script>
@endsection
