@extends('admin.layouts.master')

@section('title')
    Mise a jour
@endsection

@section('content')
    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Mise a jour du categorie</h2>
        <form action="{{ Route('update_category', $categories->id) }}" class="form team-add-form" method="POST">
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
                            <input type="text" value="{{ $categories->category }}" name="category-update" id="category"
                                class="form-input" placeholder="Categorie">
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
