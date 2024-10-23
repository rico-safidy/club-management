@extends('admin.layouts.master')

@section('title')
    Mise a jour du place au stadium
@endsection

@section('content')
    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Mettre a jour la place au stadium</h2>
        <form action="{{ Route('update_place', $place->id) }}" class="form team-add-form" method="POST">
            @csrf
            @method('PUT')
            <div class="team-add-content">
                @if (Session('message'))
                    <p style="color: #128f3c">{{ Session('message') }}</p>
                @endif
                <div class="team-add-form-main">
                    <div class="team-add-form-desc">
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-diagram-project"></i>
                            </span>
                            <input type="text" value="{{ $place->stadium_place_location }}" name="u-location" id="place"
                                class="form-input" placeholder="Categorie">
                        </div>
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-1"></i>
                            </span>
                            <input type="number" name="u-number" value="{{ $place->stadium_place_number }}" id="number" class="form-input" placeholder="Nombre de place">
                        </div>
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-quote-right"></i>
                            </span>
                            <textarea name="u-desc" id="desc" rows="4" class="form-input" placeholder="Description de la place">{{ $place->stadium_place_description }}</textarea>
                        </div>
                    </div>
                    <div class="team-add-form-img-content">
                        <img src="{{ asset('images/barea-zebu.png') }}" alt="" class="team-add-form-img"
                            id="image">
                    </div>
                </div>
                <button type="submit" class="btn team-add-form-btn">
                    Changer
                    <i class="fi fi-rr-pen-fancy"></i>
                </button>
            </div>
        </form>
    </main>
@endsection
