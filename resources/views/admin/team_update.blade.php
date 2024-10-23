@extends('admin.layouts.master')

@section('title')
    Mise a jour d'equipe
@endsection

@section('content')
    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Mette a jour un Joueur</h2>
        @if ($errors)
            @foreach ($errors->all() as $error)
                <p style="color: #e42d2d">{{ $error }}</p>
            @endforeach
        @endif
        @if (Session('message'))
            <p style="color: #138630">{{ Session('message') }}</p>
        @endif
        <form action="{{ Route('update_team', $team->id) }}" class="form team-add-form" id="update-form" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="team-add-main-content">
                <div class="team-add-content">
                    <h3 class="subtitle-primary team-add-main-content-title">Information Personnelle</h3>
                    <div class="login-main-content">
                        <div class="form-content">
                            <label for="" class="form-label">Nom</label>
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-user"></i>
                            </span>
                            <input type="text" value="{{ $team->first_name }}" name="u-fname" id="" class="form-input" placeholder="Rakoto">
                        </div>
                        <div class="form-content">
                            <label for="" class="form-label">Prenom</label>
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-user"></i>
                            </span>
                            <input type="text" name="u-lname" value="{{ $team->last_name }}" id="" class="form-input" placeholder="Nirina">
                        </div>
                    </div>
                    <div class="login-main-content">
                        <div class="form-content">
                            <label for="" class="form-label">Date de naissance</label>
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-calendar-day"></i>
                            </span>
                            <input type="date" name="u-birth-date" value="{{ $team->birth_date }}" id="" class="form-input"
                                placeholder="Date de naissance">
                        </div>
                        <div class="form-content">
                            <label for="" class="form-label">Lieu de naissance</label>
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-marker"></i>
                            </span>
                            <input type="text" name="u-birth-place" value="{{ $team->birth_place }}" id="" class="form-input"
                                placeholder="Lieu de naissance">
                        </div>
                    </div>
                </div>
                <div class="team-add-content">
                    <h3 class="subtitle-primary team-add-main-content-title">Information Professionnelle</h3>
                    <div class="form-content">
                        <span class="checkout-main-form-icon">
                            <i class="fi fi-rr-images-user"></i>
                        </span>
                        <input type="file" name="u-profile" value="{{ $team->profile }}" id="" class="form-input">
                    </div>
                    <div class="login-main-content">
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-user"></i>
                            </span>
                            <input type="text" name="u-pseudo" value="{{ $team->pseudo }}" id="" class="form-input" placeholder="John">
                        </div>
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-1"></i>
                            </span>
                            <input type="number" name="u-number" value="{{ $team->number }}" id="" class="form-input" placeholder="Numero">
                        </div>
                    </div>

                    {{-- post --}}
                    <div class="form-content shop-main-desc-form-content">
                        <div class="form-content">
                            <label for="post" class="label">Poste</label>
                            <select name="u-post" id="">
                                <option value="{{ $team->post }}">{{ $team->post }}</option>
                                @foreach ($team_categories as $team_category)
                                <optgroup name="post" label="{{ $team_category->name }}">
                                        @if ($team_category->name == 'Joueur')
                                            @foreach ($player_categories as $player_category)
                                                <option value="{{ $player_category->name }}">
                                                    {{ $player_category->name }}
                                                </option>
                                            @endforeach
                                        @else
                                            @foreach ($staff_categories as $staff_category)
                                                <option value="{{ $staff_category->name }}">
                                                    {{ $staff_category->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- post --}}

                    <button type="submit" class="team-add-form-btn">Mettre à jour</button>
                </div>
            </div>

        </form>
    </main>

@endsection
