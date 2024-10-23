@extends('admin.layouts.master')

@section('title')
    Ajout Place
@endsection

@section('content')

    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Ajouter une place</h2>
        <form action="{{ Route('add_place') }}" class="form team-add-form" method="POST">
            @csrf
            <div class="team-add-content">
                <h3 class="subtitle-primary team-add-main-content-title">
                    Information de la place
                </h3>
                @foreach ($stade as $item)
                    <p class="para-secondary">Place disponible : {{ $item->stade_place_location_number_disponible }} sieges</p>
                @endforeach
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
                            <input type="text" name="stadium-place-location" id="location" class="form-input"
                                placeholder="Lieu de la place">
                        </div>
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-1"></i>
                            </span>
                            <input type="number" name="stadium-place-number" id="number" class="form-input"
                                placeholder="Nombre de place">
                        </div>
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-quote-right"></i>
                            </span>
                            <textarea name="stadium-place-desc" id="desc" rows="4" class="form-input"
                                placeholder="Description de la place"></textarea>
                        </div>
                    </div>
                    <div class="team-add-form-img-content">
                        <img src="{{ asset('images/barea-zebu.png') }}" alt="" class="team-add-form-img"
                            id="image">
                    </div>
                </div>
                <button type="submit" class="btn team-add-form-btn">
                    Ajouter
                    <i class="fi fi-rr-add"></i>
                </button>
            </div>
        </form>
    </main>
@endsection
