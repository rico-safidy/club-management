@extends('errors.layouts.master')

@section('title')
    Page Introuvable
@endsection

@section('content')
    <section class="not-found">
        <div class="not-found-desc">
            <h1 class="title not-found-desc-title">404</h1>
            <h1 class="title not-found-desc-subtitle">Page Introuvable</h1>
            <p class="para not-found-desc-para">
                Desolé, la page que vous avez demandé est introuvable !
                <br>
                Veuillez retourner a la page d'accueil, s'il vous plait !
            </p>
            <a href="{{ Route('home') }}" class="btn btn-primary not-found-desc-btn">Accueil</a>
        </div>
    </section>
@endsection
