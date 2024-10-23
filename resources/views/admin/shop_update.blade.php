@extends('admin.layouts.master')

@section('title')
    Mise à jour Marchandise
@endsection

@section('content')
    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Ajouter une marchandise</h2>
        @if ($errors)
            @foreach ($errors->all() as $error)
                <p style="color: #eb3232">{{ $error }}</p>
            @endforeach
        @endif
        @if (Session('message'))
            <p style="color: #106610">{{ Session('message') }}</p>
        @endif
        <form action="{{ Route('update_shop', $article->id) }}" class="form team-add-form" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="team-add-content">
                {{-- type --}}
                <div class="form-content shop-main-desc-form-content">
                    <label class="label shop-main-desc-form-label">Type :</label>
                    @foreach ($categories as $category)
                        <label class="shop-main-desc-input-radio">{{ $category->category }}
                            <input type="radio" checked='checked' name="u-category" value="{{ $category->category }}"
                                id="" class="shop-main-desc-input-radio-input">
                            <span class="shop-main-desc-input-radio-checkmark"></span>
                        </label>
                    @endforeach
                </div>
                {{-- type --}}

                <div class="form-content">
                    <span class="checkout-main-form-icon">
                        <i class="fi fi-rr-t"></i>
                    </span>
                    <input type="text" name="u-name" value="{{ $article->name }}" id="" class="form-input" placeholder="Nom">
                </div>

                {{-- size --}}
                <div class="form-content">
                    <label for="" class="label">Taille Disponible :</label>
                    @foreach ($sizes as $size)
                        <div class="form-content-container">
                            <input type="checkbox" name="u-size[]" class="" value="{{ $size->sizes }}"
                                placeholder="Description">
                            <label for="">{{ $size->sizes }}</label>
                        </div>
                    @endforeach
                </div>
                {{-- size --}}

                {{-- color  --}}
                <div class="form-content">
                    <label for="" class="label">Couleur Disponible :</label>
                    @foreach ($colors as $color)
                        <div class="form-content-container">
                            <input type="checkbox" name="u-color[]" class="" value="{{ $color->name }}"
                                placeholder="Description">
                            <label for="">{{ $color->name }}</label>
                        </div>
                    @endforeach
                </div>
                {{-- color  --}}

                <div class="form-content">
                    <label for="" class="form-label">Prix</label>
                    <span class="checkout-main-form-icon">
                        <i class="fi fi-rr-dollar"></i>
                    </span>
                    <input type="text" name="u-price" value="{{ $article->price }}" id="" class="form-input" placeholder="Prix">
                </div>

                <div class="form-content">
                    <span class="checkout-main-form-icon">
                        <i class="fi fi-rr-images-user"></i>
                    </span>
                    <input type="file" name="u-image" id="" class="form-input">
                </div>
                <button type="submit" class="btn team-add-form-btn">
                    Mettre a jour
                    <i class="fi fi-rr-pen-fancy"></i>
                </button>
            </div>
        </form>
    </main>
@endsection
