@extends('admin.layouts.master')

@section('title')
    Ajout Couleur
@endsection

@section('content')

    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Ajouter une couleur</h2>
        <form action="{{ Route('insert_color') }}" class="form team-add-form" method="POST">
            @csrf
            <div class="team-add-content">
                <h3 class="subtitle-primary team-add-main-content-title">Information de la couleur</h3>
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <p style="color: #df3838">{{ $error }}</p>
                    @endforeach
                @endif
                <div class="team-add-form-main">
                    <div class="team-add-form-desc">
                        <div class="form-content">
                            <span class="checkout-main-form-icon">
                                <i class="fi fi-rr-diagram-project"></i>
                            </span>
                            <input type="text" name="color" id="category" class="form-input" placeholder="Couleur">
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
