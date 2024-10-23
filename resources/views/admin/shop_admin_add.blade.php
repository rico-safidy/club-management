@extends('admin.layouts.master')

@section('title')
    Ajout Marchandise
@endsection

@section('content')
    <main class="team-add">
        <h2 class="subtitle-primary team-add-subtitle">Ajouter une marchandise</h2>
        @if ($errors)
            @foreach ($errors->all() as $error)
                <p style="color: #eb3232">{{ $error }}</p>
            @endforeach
        @endif
        <form action="{{ Route('insert_article') }}" class="form team-add-form" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="team-add-content">
                {{-- type --}}
                <div class="form-content shop-main-desc-form-content">
                    <label class="label shop-main-desc-form-label">Type :</label>
                    @foreach ($categories as $category)
                        <label class="shop-main-desc-input-radio">{{ $category->category }}
                            <input type="radio" checked='checked' name="category" value="{{ $category->category }}"
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
                    <input type="text" name="name" id="" class="form-input" placeholder="Nom">
                </div>

                {{-- size --}}
                <div class="form-content">
                    <label for="" class="label">Taille Disponible :</label>
                    <div class="container-inline">
                        @foreach ($sizes as $size)
                            <label class="container container-inline">{{ $size->sizes }}
                                <input type="checkbox" name="size[]" value="{{ $size->sizes }}">
                                <span class="checkmark"></span>
                            </label>
                        @endforeach
                    </div>
                </div>
                {{-- size --}}

                {{-- color  --}}
                <div class="form-content">
                    <label for="" class="label">Couleur Disponible :</label>
                    <div class="container-inline">
                        @foreach ($colors as $color)
                            <label class="container container-inline">{{ $color->name }}
                                <input type="checkbox" name="color[]" value="{{ $color->name }}">
                                <span class="checkmark"></span>
                            </label>
                        @endforeach
                    </div>
                </div>
                {{-- color  --}}

                <div class="form-content">
                    <label for="" class="form-label">Prix</label>
                    <span class="checkout-main-form-icon">
                        <i class="fi fi-rr-money-bill-wave"></i>
                    </span>
                    <input type="text" name="price" id="" class="form-input" placeholder="Prix">
                </div>

                <div class="form-content">
                    <span class="checkout-main-form-icon">
                        <i class="fi fi-rr-images-user"></i>
                    </span>
                    <input type="file" name="image" id="" class="form-input">
                </div>
                <button type="submit" class="btn team-add-form-btn">
                    Ajouter
                    <i class="fi fi-rr-add"></i>
                </button>
            </div>
        </form>
    </main>
@endsection
