@extends('admin.layouts.master')

@section('title')
    Mise a jour Stadium
@endsection

@section('content')

    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Mettre a jour le Stadium</h2>
        <form action="{{ Route('update_stade', $stade->id) }}" class="form team-add-form" method="POST">
            @csrf
            @method('PUT')
            <div class="team-add-content">
                <h3 class="subtitle-primary team-add-main-content-title">Information de la stade</h3>
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <p style="color: #df3838">{{ $error }}</p>
                    @endforeach
                @endif
                <div class="team-add-form-main">
                    <div class="team-add-form-desc">
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-marker"></i>
                            </span>
                            <input type="text" name="u-s-name" value="{{ $stade->stade_name }}" id="name" class="form-input" placeholder="Nom de votre stade">
                        </div>
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-marker"></i>
                            </span>
                            <input type="text" name="u-s-location" value="{{ $stade->stade_location }}" id="location" class="form-input" placeholder="Lieu de la stade">
                        </div>
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-1"></i>
                            </span>
                            <input type="number" name="u-s-place-number" value="{{ $stade->stade_place_number }}" id="number" class="form-input" placeholder="Nombre du place dans la stade">
                        </div>
                    </div>
                    <div class="team-add-form-img-content">
                        <img src="{{ asset('images/barea-zebu.png') }}" alt="" class="team-add-form-img"
                            id="image">
                    </div>
                </div>
                <button type="submit" class="btn team-add-form-btn">
                    Mettre à jour
                    <i class="fi fi-rr-add"></i>
                </button>
            </div>
        </form>
    </main>
@endsection
