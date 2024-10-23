@extends('admin.layouts.master')

@section('title')
    Ajout Match
@endsection

@section('content')
    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Ajouter un match</h2>
        <form action="{{ Route('insert_match') }}" class="form team-add-form" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="team-add-content">
                <h3 class="subtitle-primary team-add-main-content-title">Information du match</h3>
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <p style="color: #df3838">{{ $error }}</p>
                    @endforeach
                @endif
                <h4 class="subtitle-primary">Nom des equipes</h4>
                <div class="form-content-container">
                    <div class="form-content">
                        <span class="checkout-main-form-icon">
                            <i class="fi fi-rr-users-alt"></i>
                        </span>
                        <input type="text" name="home-team" id="" class="form-input"
                            placeholder="Equipe a domicile">
                    </div>
                    vs
                    <div class="form-content">
                        <span class="checkout-main-form-icon">
                            <i class="fi fi-rr-users-medical"></i>
                        </span>
                        <input type="text" name="visitor-team" id="" class="form-input"
                            placeholder="Equipe visiteur">
                    </div>
                </div>
                <div class="form-content">
                    <span class="checkout-main-form-icon">
                        <i class="fi fi-rr-football"></i>
                    </span>
                    <input type="text" name="type" id="" class="form-input" placeholder="Type du match">
                </div>
                <h4 class="subtitle-primary">Date et lieu</h4>
                <div class="form-content">
                    <span class="checkout-main-form-icon">
                        <i class="fi fi-rr-marker"></i>
                    </span>
                    <input type="text" name="location" id="" class="form-input" placeholder="Lieu du match">
                </div>
                <div class="form-content-container">
                    <div class="form-content">
                        <span class="checkout-main-form-icon">
                            <i class="fi fi-rr-calendar-day"></i>
                        </span>
                        <input type="date" name="date" id="" class="form-input" placeholder="Type du match">
                    </div>
                    <div class="form-content">
                        <span class="checkout-main-form-icon">
                            <i class="fi fi-rr-clock"></i>
                        </span>
                        <input type="text" name="hour" id="" class="form-input" placeholder="Heure du match">
                    </div>
                </div>
                <div class="form-content">
                    <span class="checkout-main-form-icon">
                        <i class="fi fi-rr-quote-right"></i>
                    </span>
                    <textarea name="desc" id="" rows="4" class="form-input" placeholder="Description du match"></textarea>
                </div>

                <button type="submit" class="btn team-add-form-btn">
                    Ajouter
                    <i class="fi fi-rr-add"></i>
                </button>
            </div>
        </form>
    </main>
@endsection
